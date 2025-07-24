---
title: An Advanced Trading Strategy with a Toggleable Trailing Stop-Loss
author: Mike
date: 2025-07-22
category: trading models
image: images/Weekly-TrailingStopLoss.png
---

### An Advanced Trading Strategy with a Toggleable Trailing Stop-Loss

This article presents an enhanced version of the "2 Standard Deviation Buy Strategy." The key improvement is the addition of a toggleable trailing stop-loss, providing greater flexibility in managing trades. This allows a trader to choose between a fixed take-profit/stop-loss exit or a more dynamic trailing stop to let profits run while protecting against reversals.

#### Key Features:

*   **Multiple Entry Conditions**: You can choose to buy when the price crosses above the upper Bollinger Band, the lower Bollinger Band, or the middle SMA.
*   **Flexible Risk Management**:
    *   **Fixed Exits**: Use a standard Take Profit (%) and Stop Loss (%).
    *   **Trailing Stop-Loss**: A new option to use a trailing stop that follows the price as it moves in your favor. This is ideal for capturing larger trends.
*   **Toggleable Logic**: A simple boolean switch in the strategy's settings allows you to enable or disable the trailing stop-loss.

---

### Case Study: The Power of a Trailing Stop-Loss

The image below shows a backtest of the strategy on a weekly chart of the SPY, using the "SMA - Cross Above" entry and a 15% trailing stop-loss. The results are impressive:

![Weekly Trailing Stop Loss](images/Weekly-TrailingStopLoss.png)

#### Analysis:

*   **Exceptional Returns**: The strategy generated a profit of over **$1.2 million** on an initial $100,000 investment.
*   **High Win Rate**: With 11 out of 12 trades being profitable (91.67%), the strategy demonstrates a high degree of reliability.
*   **Controlled Drawdown**: The maximum drawdown was a very acceptable 12.55%, showcasing the effectiveness of the trailing stop in protecting capital.

This case study highlights the advantage of using a trailing stop-loss. It allows the strategy to capture the majority of major trends, leading to significant gains, while still managing risk effectively.

---

### Pine Script Code

Below is the complete Pine Script code for the strategy. You can copy and paste this into the Pine Editor in TradingView to backtest and use it.

```pinescript
//@version=5
strategy("2 Standard Deviation Buy Strategy (TP/SL/Trailing)", 
         overlay=true, 
         initial_capital=100000, 
         pyramiding=50, 
         default_qty_value=2, 
         default_qty_type=strategy.percent_of_equity)
  
// --- INPUTS ---

// New Input Toggle for Buy Condition
buy_condition_option = input.string("Lower Band - Cross Above", title="Buy Condition",
                                     options=["Lower Band - Cross Above", "Upper Band - Cross Above", "SMA - Cross Above"], 
                                     group="Strategy Logic")

// NEW: Input to toggle the profitability check for pyramiding
pyramid_when_profitable = input.bool(true, title="Pyramid Only When Profitable?", group="Strategy Logic")

// Date Range Inputs
start_date = input.time(title="Start Date", defval=timestamp("2008-3-1"), group="Date Range")
close_date = input.time(title="Close Date", defval=timestamp("2024-10-1"), group="Date Range")

// Bollinger Bands Inputs
length = input.int(20, title="BB Length", minval=1, group="Bollinger Bands")
stdev_factor = input.float(2.0, title="StdDev Factor", minval=0.1, group="Bollinger Bands")

// Risk Management Inputs
tpPercent = input.float(2, minval=0.01, step=0.01, title="Take Profit (%)", group="Risk Management")
slPercent = input.float(1, minval=0.01, step=0.01, title="Stop Loss (%)", group="Risk Management")
useTrailingStop = input.bool(false, title="Use Trailing Stop?", group="Risk Management")
trailingStopPercent = input.float(15, minval=0.1, step=0.1, title="Trailing Stop (%)", group="Risk Management")

// --- CALCULATIONS ---

// Calculate moving average and standard deviation for Bollinger Bands
sma = ta.sma(close, length)
stdev = ta.stdev(close, length)

// Calculate upper and lower bands
upper_band = sma + stdev_factor * stdev
lower_band = sma - stdev_factor * stdev

// --- STRATEGY LOGIC ---

// Check if the current bar is within the specified date range
bool isWithinDateRange = time >= start_date and time < close_date

// Define the three possible buy conditions
bool buyBelowSignal = ta.crossover(close, lower_band)
bool buyAboveSignal = ta.crossover(close, upper_band)
bool buyAtSMASignal = ta.crossover(close, sma) 

// UPDATED: Condition to only add to a position if it's profitable
bool canPyramid = not pyramid_when_profitable or (strategy.position_size == 0 or close > strategy.position_avg_price)

// Entry Logic
if (isWithinDateRange and canPyramid)
    if (buy_condition_option == "Lower Band - Cross Above" and buyBelowSignal)
        strategy.entry("Buy", strategy.long)
    if (buy_condition_option == "Upper Band - Cross Above" and buyAboveSignal)
        strategy.entry("Buy", strategy.long)
    if (buy_condition_option == "SMA - Cross Above" and buyAtSMASignal)
        strategy.entry("Buy", strategy.long)

// --- EXIT LOGIC ---
var float trail_level = na

if (strategy.position_size > 0)
    // If we just entered a new position, set the initial stop loss
    if strategy.position_size[1] == 0
        trail_level := close * (1 - slPercent / 100)
    
    // Update the trailing stop level if price moves favorably
    if (useTrailingStop)
        trail_level := math.max(trail_level, high * (1 - trailingStopPercent / 100))
        strategy.exit("Trailing SL Exit", from_entry="Buy", stop=trail_level)
    else
        // Original TP/SL logic
        float stopLossPrice = strategy.position_avg_price * (1 - slPercent / 100)
        float takeProfitPrice = strategy.position_avg_price * (1 + tpPercent / 100)
        strategy.exit("TP/SL Exit", from_entry="Buy", stop=stopLossPrice, limit=takeProfitPrice)

// Reset trail level on position close
if strategy.position_size == 0
    trail_level := na

// Close all positions if the backtest end date is reached
if (time >= close_date)
    strategy.close_all(comment="End of Backtest Period")
    
// --- PLOTTING ---

// Plot the Bollinger Bands on the chart
plot(sma, "SMA", color=color.orange)
plot(upper_band, "Upper Band", color=color.blue)
plot(lower_band, "Lower Band", color=color.blue)
```