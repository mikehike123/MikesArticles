---
title: Breakout Strategy w/ Controlled Pyramiding
author: Mike Clark
date: July 27, 2025
image: 
---

### Documentation: Breakout Strategy w/ Controlled Pyramiding

This document outlines a trend-following and momentum-based trading strategy designed for TradingView's Pine Script.

#### 1. Core Concept

The strategy aims to capitalize on strong upward price movements (bullish trends) by entering the market when the price "breaks out" of a recent trading range. It is designed to let winning trades run by using a very wide trailing stop-loss and to increase exposure to a strongly trending position by systematically adding to it.

#### 2. Entry Logic

**Initial Entry:**
The strategy initiates a long position only when the following conditions are met:
*   **Long Entry:** The current price closes *above* the highest high of the last **20 bars**.
*   **Date Filter:** The trade must occur within the specified date range.

**Pyramiding (Adding to a Position):**
Once in a position, the strategy can add to it up to a maximum of **5 total entries**. A new entry is only triggered if **all** of the following conditions are true:
1.  Pyramiding is enabled.
2.  A new long breakout signal occurs (price closes above the 20-bar high again).
3.  The existing open position is already profitable by at least **20%**.

#### 3. Exit Logic

A position is closed based on a clear hierarchy:

1.  **Trailing Stop-Loss (Primary Exit Method):** The main exit rule is a very wide trailing stop.
    *   A stop-loss is set **50%** below the highest price point reached since the position was opened.
    *   This stop-loss only moves up, "trailing" the price to protect a portion of the gains from a catastrophic reversal. If the price falls by **50%** from its peak during the trade, the position is closed.

2.  **End of Date Range:**
    *   If the trailing stop is not hit by the "End Date," any open position will be automatically closed.

3.  **Take Profit (Effectively Disabled):**
    *   The Take Profit is set to an extremely high level to ensure it is virtually never hit. The strategy's design relies on the trailing stop to exit trades.

#### 4. Position Sizing and Risk Management

The strategy is designed to scale into a full position over a maximum of **five entries**.

*   **Sizing:** With a maximum of 5 entries set, each trade (the initial entry and subsequent pyramid entries) is sized at **20% of the total intended capital**. The position is gradually built to a full 100% allocation as profit conditions are met.

*   **Risk Mitigation:** This pyramiding approach is a deliberate risk management technique. Instead of committing 100% of capital on the initial signal, the position is built as the trend proves itself. If the initial entry fails, only a fifth (20%) of the intended capital is exposed, which can reduce drawdowns compared to a single 100% entry.

#### 5. Key Observation on Strategy Performance

Further testing reveals a critical insight: **the specific entry signal is not the primary driver of the strategy's success.** Experimentation shows that altering the `Breakout Period` has a surprisingly minor impact on performance when averaged over a basket of stocks. This suggests that the strategy's "alpha," or edge, is found not in the entry signal, but in its disciplined, rules-based trade management system.

The breakout signal acts merely as a catalyst to get into the market. The true drivers of performance are the **position sizing model** (scaling in only after a 20% gain) and the **exit model** (a wide 50% trailing stop that gives trends maximum room to run).

#### 6. Historical Performance (Backtested Results)

To illustrate the strategy's potential over a long period, backtests were conducted from January 1, 1999, to the present across a diversified basket of symbols. The following table summarizes these results.



| Symbol | Total Percent Gain | Max Drawdown (%) | Entries |
| :--- | :--- | :--- | :--- |
| **NVDA** | 120,000% | 100% | 5 |
| **TQQQ** | 11,000% | 30% | 5 |
| **NKE** | 1,200% | 13% | 5 |
| **RIO** | 730% | 42% | 5 |
| **BA** | 577% | 60% | 5 |
| **QQQ** | 466% | 5% | 5 |
| **XLU** | 443% | 25% | 5 |
| **SPY** | 440% | 10% | 5 |
| **XLV** | 419% | 13% | 5 |
| **ARKK** | 190% | 7% | 5 |
| **FXI** | 141% | 21% | 5 |

**Portfolio-Level Analysis**

Assuming a starting capital of **$100,000** on January 1, 1999, allocated equally among the 11 symbols, the combined hypothetical performance is as follows:

*   **Total Final Value:** **$12,427,818**
*   **Total Net Profit:** **$12,327,818**
*   **Total Percent Profit:** **+12,328%**
*   **Compound Annual Growth Rate (CAGR):** **19.5%**



### Section 7: From Raw Strategy to a Sophisticated Portfolio

While the backtested results of the raw strategy are impressive, a critical assessment reveals both powerful strengths and significant real-world weaknesses. A truly robust investment plan must harness the former while actively mitigating the latter.

#### Strengths and Weaknesses of the Core Strategy

**Strengths:**
*   **Positive Asymmetry:** The strategy is engineered to capture massive, outlier trends by letting winners run.
*   **Intelligent Risk Management:** The pyramiding model acts as a powerful risk filter.
*   **Robustness:** The strategy's success is not dependent on a perfectly optimized entry signal.

**Weaknesses:**
*   **Vulnerability to "Whipsaw" Markets:** Choppy markets could lead to many small losses.
*   **Psychological Strain:** Enduring 50% drawdowns from a peak is emotionally difficult.
*   **Single-Stock Risk:** The strategy is vulnerable to catastrophic failures (Enron) and overly dependent on finding hyper-winners (NVIDIA).

The clear conclusion is that while the framework is powerful, applying it blindly to individual stocks is too volatile. The solution is to evolve it into a structured, diversified portfolio.

#### The Foundation: A Diversified Systematic Engine

The first step is to mitigate single-stock risk by applying the strategy to a diversified basket of low-cost index and commodity ETFs. This portfolio captures broad economic trends and benefits from natural diversification.

| Symbol | Description |
| :--- | :--- |
| **SPY** | S&P 500 Index |
| **QQQ** | Nasdaq-100 Index |
| **XLU** | Utilities Sector Index |
| **XLV** | Health Care Sector Index |
| **FXI** | China Large-Cap Index |
| **GLD** | Gold Trust |
| **XLE** | Energy Sector Index |
| **XLB** | Materials Sector Index |

When our trend-following rules are applied to this basket, the result is a remarkably stable **6.2% CAGR**. This becomes our "Systematic Growth Engine"—a reliable, inflation-beating core free from the risk of any single component going to zero.

#### The Quest for Stability and The New Challenge

For many investors, the next logical step is to increase stability even further. We can do this by blending our strategy with a "boring," non-correlated asset. Let's create a classic 50/50 portfolio:
*   **50%** allocated to our **Systematic ETF Strategy**.
*   **50%** allocated to a **Fixed Asset earning 3% annually**.

This blended portfolio is incredibly stable. However, this safety comes at a cost. The resulting **Compound Annual Growth Rate is 4.9%**. While still a positive real return, this has now dropped **below our hypothetical goal of achieving at least a 6% long-term return** to comfortably outpace inflation and build wealth.

This presents a new challenge: how can we add back a measure of high growth without sacrificing the stability we just created?

#### The Enhancement: Adding a "High-Flyer" Satellite Sleeve

This motivates our final step. Since 95% of our capital is now in a highly stable core, we can afford to take small, calculated risks with the remaining 5% to boost the overall return. We create a "core-satellite" portfolio:

*   **The Stable Core (95% of Capital):**
    *   **Fixed Income (47.5%):** The 3% annual return anchor.
    *   **Systematic ETF Strategy (47.5%):** Our diversified ETF workhorse.

*   **The High-Growth Satellite (5% of Capital):**
    *   **TQQQ Strategy (2.5%):** The raw strategy applied to a high-volatility, leveraged ETF.
    *   **Bitcoin (2.5%):** A small allocation to a completely different asset class with asymmetric upside potential.

The true test of this model is to simulate a catastrophic failure. In a stress test where the **entire Bitcoin allocation went to zero**, the portfolio still achieved a **Compound Annual Growth Rate of 7.1%**.

This final result is profound. By first building a safe foundation and then thoughtfully adding a small, diversified sleeve of high-growth assets, we successfully lifted our return back above our 6% target. The final portfolio is resilient, survives a catastrophic failure in its riskiest component, and still meets its long-term performance objectives.

##Pinescript Code.  


### Pine Script: Breakout Strategy w/ Controlled Pyramiding

*This script is written to allow for both long and short trading, although as noted, the shorting feature has not been investigated as thoroughly as the long-only strategy.*

```pinescript
//@version=5
strategy("Breakout Strategy w/ Controlled Pyramiding",
     overlay=true,
     default_qty_type=strategy.percent_of_equity,
     default_qty_value=100)

// --- INPUTS ---
// Date Range
string date_range_group = "Date Range"
start_date = input.time(timestamp("2023-01-01T00:00"), title="Start Date", group=date_range_group)
end_date = input.time(timestamp("2025-01-01T00:00"), title="End Date", group=date_range_group)

// Strategy Parameters
string params_group = "Strategy Parameters"
int breakout_period = input.int(20, title="Breakout Period", group=params_group)
bool enableShorts = input.bool(false, title="Enable Short Selling?", group=params_group)
bool enablePyramiding = input.bool(true, title="Enable Pyramiding?", group=params_group)
int pyramidCount = input.int(3, title="Max Pyramid Entries", minval=1, group=params_group)
float pyramidProfitPerc = input.float(20.0, title="Min Profit % to Pyramid", minval=0.0, step=1.0, group=params_group) / 100

// Profit & Loss
string pnl_group = "Profit & Loss"
float tp_long_perc = input.float(100.0, title="Long Take Profit %", group=pnl_group) / 100
float sl_long_perc = input.float(5.0, title="Long Stop Loss %", group=pnl_group) / 100
float tp_short_perc = input.float(10.0, title="Short Take Profit %", group=pnl_group) / 100
float sl_short_perc = input.float(5.0, title="Short Stop Loss %", group=pnl_group) / 100

// Trailing Stop Loss
bool useTrailingStop = input.bool(true, title="Use Trailing Stop Loss?", group=pnl_group)
float trailingStopPercent = input.float(5.0, title="Trailing Stop %", group=pnl_group) / 100


// --- DATE FILTER ---
bool inDateRange = time >= start_date and time < end_date


// --- STRATEGY LOGIC ---
float highest_high = ta.highest(high, breakout_period)[1]
float lowest_low = ta.lowest(low, breakout_period)[1]

var float longStopPrice = na
var float shortStopPrice = na


// --- POSITION MANAGEMENT ---
// Determine entry signals
bool longCondition = inDateRange and (close > highest_high)
bool shortCondition = inDateRange and enableShorts and (close < lowest_low)

// Check if the current position is profitable enough to add to
var float profit_perc = 0.0
bool isProfitableToPyramid = false

if (strategy.position_size > 0)
    profit_perc := (close - strategy.position_avg_price) / strategy.position_avg_price
    isProfitableToPyramid := profit_perc >= pyramidProfitPerc

if (strategy.position_size < 0)
    profit_perc := (strategy.position_avg_price - close) / strategy.position_avg_price
    isProfitableToPyramid := profit_perc >= pyramidProfitPerc

// Determine if a long entry is allowed
bool allowLongEntry = longCondition and (strategy.position_size == 0 or (enablePyramiding and isProfitableToPyramid))

// Determine if a short entry is allowed
bool allowShortEntry = shortCondition and (strategy.position_size == 0 or (enablePyramiding and isProfitableToPyramid))


// Enter a trade if conditions are met
if (allowLongEntry)
    strategy.entry("Long", strategy.long)

if (allowShortEntry)
    strategy.entry("Short", strategy.short)


// --- EXIT LOGIC ---
if (strategy.position_size > 0)
    // On any new entry (initial or pyramid), update the stop loss
    if (strategy.position_size > strategy.position_size[1])
        // A fixed SL would be reset based on the new average price. A trailing SL continues from its last highest point.
        longStopPrice := useTrailingStop ? math.max(longStopPrice, high * (1 - trailingStopPercent)) : strategy.position_avg_price * (1 - sl_long_perc)

    // Update trailing stop on every bar
    if useTrailingStop
        newLongStop = high * (1 - trailingStopPercent)
        longStopPrice := math.max(longStopPrice, newLongStop)

    longTakeProfit = strategy.position_avg_price * (1 + tp_long_perc)
    strategy.exit("Long Exit", from_entry="Long", limit=longTakeProfit, stop=longStopPrice)

if (strategy.position_size < 0)
    // On any new entry (initial or pyramid), update the stop loss
    if (strategy.position_size < strategy.position_size[1])
        shortStopPrice := useTrailingStop ? math.min(shortStopPrice, low * (1 + trailingStopPercent)) : strategy.position_avg_price * (1 + sl_short_perc)

    // Update trailing stop on every bar
    if useTrailingStop
        newShortStop = low * (1 + trailingStopPercent)
        shortStopPrice := math.min(shortStopPrice, newShortStop)

    shortTakeProfit = strategy.position_avg_price * (1 - tp_short_perc)
    strategy.exit("Short Exit", from_entry="Short", limit=shortTakeProfit, stop=shortStopPrice)

// Force exit at the end of the date range
if (time >= end_date and strategy.position_size != 0)
    strategy.close_all(comment = "End of Date Range Exit")


// --- PLOTTING ---
plot(highest_high, "Breakout High", color=color.new(color.green, 0), style=plot.style_linebr)
plot(lowest_low, "Breakout Low", color=color.new(color.red, 0), style=plot.style_linebr)
plot(strategy.position_size > 0 ? longStopPrice : na, "Long SL", color=color.new(color.orange, 0), style=plot.style_cross, linewidth = 2)
plot(strategy.position_size < 0 ? shortStopPrice : na, "Short SL", color=color.new(color.orange, 0), style=plot.style_cross, linewidth = 2)

```