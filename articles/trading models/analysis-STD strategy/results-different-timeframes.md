### Introduction: Finding the Optimal Trend-Following Strategy

This report details the backtesting of a versatile trading model called the **"2 Standard Deviation Buy Strategy"** applied to the SPDR S&P 500 ETF (SPY). The core objective was to identify the most profitable and risk-averse configuration by systematically testing different timeframes and entry conditions while keeping the core strategy parameters consistent.

**Core Strategy & Constants:**
Across all tests, the strategy maintained the same foundational properties:

*   **Initial Capital:** All backtests started with an initial capital of **$100,000**.
*   **Order Size:** Each trade was sized at **20% of the account's current equity**.
*   **Pyramiding:** The strategy was allowed to **pyramid**, adding to a winning position up to a maximum of **5 orders**.
*   **Indicators:** The primary indicator was Bollinger Bands, set to a standard deviation of 2.

**Variables Tested:**
The analysis was structured around four distinct market trends, each represented by a specific chart timeframe and a corresponding Simple Moving Average (SMA) length:

1.  **Daily Trend:** A **5-minute chart** with a **78-period SMA**.
2.  **Weekly Trend:** A **15-minute chart** with a **130-period SMA**.
3.  **Monthly Trend:** A **65-minute chart** with a **120-period SMA**.
4.  **Yearly Trend:** A **Weekly chart** with a **52-period SMA**.

Within each of these four trend-based setups, three different buy conditions were tested to determine the most effective entry signal:
*   **Buy when price crosses above the SMA** (the middle Bollinger Band).
*   **Buy when price crosses above the Upper Bollinger Band**.
*   **Buy when price crosses above the Lower Bollinger Band**.

By comparing the performance metrics—such as Total P&L, Max Equity Drawdown, and Profit Factor—across these twelve unique scenarios (4 timeframes x 3 entry rules), we can determine which combination yielded the most robust and profitable trading results.

### 5-min Chart
### ===============================================

### Trading Strategy Results Comparison

This table summarizes the performance of the three different buy conditions tested for the "2 Standard Deviation Buy Strategy." The results remain the same as before.

| Performance Metric | Buy Condition: SMA - Cross Above | Buy Condition: Upper Band | Buy Condition: Lower Band |
| :--- | :--- | :--- | :--- |
| **Total P&L** | **+$7,190.00** | +$3,956.71 | +$4,101.57 |
| **Max Equity Drawdown** | **$13,315.59 (13.32%)** | $15,945.77 (15.95%) | $15,841.54 (15.84%) |
| **Profit Factor** | **1.681** | 1.337 | 1.356 |
| **Total Trades** | 10 | 10 | 11 |
| **% Profitable Trades** | **50.00%** | **50.00%** | 45.45% |

### Strategy and Data Explained

*   **Strategy:** The model being tested is the "2 Standard Deviation Buy Strategy," which operates on the SPDR S&P 500 ETF (SPY). The key elements are:
    *   **Timeframe:** A 5-minute (5m) chart.
    *   **Indicator:** Bollinger Bands with a length of 78 periods and a standard deviation of 2.
    *   **Daily Trend Proxy:** The 78-period Simple Moving Average (SMA) on the 5-minute chart is used to represent the daily trend, as there are 78 five-minute periods in a standard trading day (6.5 hours).
*   **Backtest Period:** The strategy was tested on historical data from February 29, 2008, to July 20, 2025.
*   **Risk Management:** All trades used a fixed Take Profit of $1,000 and a Stop Loss of 10%.

### Best Performing Strategy

Based on the backtest results, the **"SMA - Cross Above" buy condition is the best-performing strategy.**

Here's why:
*   **Highest Profitability:** It generated the greatest Total P&L (+$7,190.00), significantly outperforming the other two conditions.
*   **Lower Risk:** It had the smallest maximum equity drawdown (13.32%), indicating better capital preservation during losing streaks.
*   **Superior Efficiency:** Its Profit Factor of 1.681 shows it was much more efficient at generating profit for every dollar risked compared to the other variations.

In conclusion, for this specific setup, initiating a buy when the price crosses above the 78-period SMA (the proxy for the daily trend) proved to be the most robust and profitable approach.

### 15-min Chart
### ===============================================
Of course. Here is a similar analysis for the 15-minute chart strategy that uses the weekly trend.

### Trading Strategy Results Comparison (15-Minute Chart)

This table summarizes the performance of the three different buy conditions tested for the "2 Standard Deviation Buy Strategy" on the 15-minute timeframe.

| Performance Metric | Buy Condition: SMA - Cross Above | Buy Condition: Upper Band - Cross Above | Buy Condition: Lower Band - Cross Above |
| :--- | :--- | :--- | :--- |
| **Total P&L** | +$29,884.41 (+29.88%) | **+$32,122.12 (+32.12%)** | +$28,498.40 (+28.50%) |
| **Max Equity Drawdown** | **$677.30 (0.68%)** | $1,187.82 (1.19%) | $1,768.03 (1.77%) |
| **Profit Factor** | N/A (No Losses) | N/A (No Losses) | N/A (No Losses) |
| **Total Trades** | 5 | 5 | 5 |
| **% Profitable Trades** | **100.00%** | **100.00%** | **100.00%** |

### Strategy and Data Explained

*   **Strategy:** The model being tested is the "2 Standard Deviation Buy Strategy" on the SPDR S&P 500 ETF (SPY).
    *   **Timeframe:** A 15-minute (15m) chart.
    *   **Indicator:** Bollinger Bands with a length of 130 periods and a standard deviation of 2.
    *   **Weekly Trend Proxy:** The 130-period Simple Moving Average (SMA) on the 15-minute chart is used to represent the weekly trend (26 fifteen-minute periods per day x 5 days).
*   **Backtest Period:** The strategy was tested on historical data from January 2, 2024, to July 22, 2025.
*   **Risk Management:** All trades used a fixed Take Profit of $1,000 and a Stop Loss of 10%.

### Best Performing Strategy

Based on these results, the **"Upper Band - Cross Above" buy condition is the best-performing strategy.**

Here is the justification:
*   **Highest Profitability:** It produced the highest Total P&L of +$32,122.12.
*   **Exceptional Win Rate:** It is critical to note that all three variations achieved a perfect 100% win rate during this specific backtest period. This is highly unusual and is the reason the "Profit Factor" is zero or not applicable—there were no losing trades to factor in.
*   **Risk-Return Trade-off:** While the "SMA - Cross Above" strategy had the absolute lowest drawdown (0.68%), the drawdown for the "Upper Band" strategy was still exceptionally low at 1.19%. In this context, the minor increase in risk was well compensated by the significant gain in profit.

Given the perfect performance across all three tests in this recent, shorter time frame, the strategy that generated the most profit is the clear winner.

### 65-min Chart
### ===============================================
Of course. Here is an analysis of the 65-minute chart strategy that uses the monthly trend.

### Trading Strategy Results Comparison (65-Minute Chart)

This table summarizes the performance of the three different buy conditions tested for the "2 Standard Deviation Buy Strategy" on the 65-minute timeframe.

| Performance Metric | Buy Condition: SMA - Cross Above | Buy Condition: Upper Band - Cross Above | Buy Condition: Lower Band - Cross Above |
| :--- | :--- | :--- | :--- |
| **Total P&L** | +$71,491.02 (+71.49%) | **+$75,617.61 (+75.32%)** | +$62,845.53 (+62.85%) |
| **Max Equity Drawdown** | $22,116.81 (22.12%) | **$20,048.91 (20.05%)** | $24,126.00 (24.13%) |
| **Profit Factor** | 4.405 | **4.954** | 3.75 |
| **Total Trades** | 15 | 15 | 16 |
| **% Profitable Trades** | 33.33% | 33.33% | **37.50%** |

### Strategy and Data Explained

*   **Strategy:** The model being tested is the "2 Standard Deviation Buy Strategy" on the SPDR S&P 500 ETF (SPY).
    *   **Timeframe:** A 65-minute chart.
    *   **Indicator:** Bollinger Bands with a length of 120 periods and a standard deviation of 2.
    *   **Monthly Trend Proxy:** The 120-period Simple Moving Average (SMA) on the 65-minute chart is used to approximate the monthly trend.
*   **Backtest Period:** The strategy was tested on historical data from January 2, 2018, to July 22, 2025.
*   **Risk Management:** All trades used a fixed Take Profit of $1,000 and a Stop Loss of 10%.

### Best Performing Strategy

Based on the results, the **"Upper Band - Cross Above" buy condition is the best-performing strategy.**

Here is the justification:
*   **Superior Profitability:** It delivered the highest Total P&L (+$75,617.61), generating the most overall profit.
*   **Best Risk Management:** It had the lowest maximum equity drawdown both in absolute dollars ($20,048.91) and percentage (20.05%), indicating the best capital preservation among the three.
*   **Highest Efficiency:** This strategy has the highest Profit Factor (4.954), meaning it generated $4.95 in profit for every $1 of loss, making it the most efficient.

Although the "Lower Band" strategy had a slightly higher win percentage, its overall profitability and risk profile were significantly worse. The "Upper Band - Cross Above" strategy provides the best combination of high returns, lower risk, and superior profit efficiency, making it the clear winner in this comparison.

### Weekly Chart
### ===============================================
Of course. Here is an analysis of the weekly chart strategy that uses the yearly trend.

### Trading Strategy Results Comparison (Weekly Chart)

This table summarizes the performance of the three different buy conditions tested for the "2 Standard Deviation Buy Strategy" on the weekly timeframe.

| Performance Metric | Buy Condition: SMA - Cross Above | Buy Condition: Upper Band - Cross Above | Buy Condition: Lower Band - Cross Above |
| :--- | :--- | :--- | :--- |
| **Total P&L** | **+$1,097,022.59 (+1,097.02%)**| +$964,047.45 (+964.05%) | +$72,613.27 (+72.61%) |
| **Max Equity Drawdown** | **$1,762.38 (1.76%)** | $1,968.24 (1.97%) | $27,463.71 (27.46%) |
| **Profit Factor** | N/A (No Losses) | N/A (No Losses) | 2.41 |
| **Total Trades** | 5 | 5 | 17 |
| **% Profitable Trades** | **100.00%** | **100.00%** | 41.18% |

### Strategy and Data Explained

*   **Strategy:** The model being tested is the "2 Standard Deviation Buy Strategy" on the SPDR S&P 500 ETF (SPY).
    *   **Timeframe:** A weekly (1W) chart.
    *   **Indicator:** Bollinger Bands with a length of 52 periods and a standard deviation of 2.
    *   **Yearly Trend Proxy:** The 52-period Simple Moving Average (SMA) on the weekly chart is used to represent the yearly trend (52 weeks in a year).
*   **Backtest Period:** The strategy was tested on historical data from January 25, 1993, to July 21, 2025.
*   **Risk Management:** All trades used a fixed Take Profit of $1,000 and a Stop Loss of 10%.

### Best Performing Strategy

Based on the backtest results, the **"SMA - Cross Above" buy condition is the best-performing strategy.**

Here is the justification:
*   **Massive Profitability:** It generated an exceptional Total P&L of over +$1,000,000, significantly higher than the other two variations.
*   **Extremely Low Risk:** This strategy had a remarkably low maximum equity drawdown of only 1.76% over a 30+ year period, demonstrating outstanding capital preservation.
*   **Perfect Performance:** It achieved a 100% win rate over five trades, meaning it had no losing trades. The "Upper Band" strategy also achieved this, but with lower overall profits and slightly higher risk.
*   **Superiority over Alternatives:** The "Lower Band" strategy is dramatically inferior, with far less profit, a much lower win rate, and a drawdown (27.46%) that is over 15 times higher than the "SMA - Cross Above" strategy.

For this long-term, trend-following strategy on the weekly chart, waiting for the price to cross above the 52-week moving average proved to be the most robust and profitable entry signal by a very wide margin.

---

### Summary of Findings

This analysis reveals a classic trading dilemma: a conflict between profitability, risk, and trade frequency. The clarification that the strategy **does not have a take-profit signal** and only exits at a 10% stop-loss is a critical piece of information that heavily influences the interpretation of the results.

- The **Weekly Chart strategy** (yearly trend) shows phenomenal, life-changing returns with incredibly low risk (1.76% drawdown) over a 30-year period. The "let your winners run" nature of the exit strategy is what allows for such massive gains. However, with only 5 trades in three decades, it remains an impractical strategy for generating regular income.
- The **5-Minute Chart strategy** (daily trend) is highly risky. The lack of a take-profit mechanism, combined with high trade frequency, makes the 13-15% drawdown a significant concern. Its profitability is likely inflated by a short backtest in a bull market.
- The **15-Minute and 65-Minute strategies** offer a middle ground. The 15-minute chart's perfect win rate and low drawdown are attractive, but the short backtest period is a major caveat. The 65-minute chart's 20%+ drawdown is too high for a conservative investor.

Given your age (63), desire to outperform CPI without taking on excessive risk, and a starting capital of $60,000, a strategy that strictly preserves capital while capturing steady gains is paramount.

### Recommended 5-Year Trading Plan (Revised)

**The Core Principle: A Three-Layer Approach for Maximum Safety**

The clarification about the exit strategy makes a simple two-layer approach insufficient. We need to add a third layer to actively manage trades and protect profits, creating a more robust plan.

**The Three-Layer Strategy:**

1.  **Layer 1: The Long-Term Trend Filter (Weekly Chart) - Unchanged**: Use the **Weekly Chart with the 52-period SMA** as your primary guide. If the SPY price is **above** its 52-week moving average, the market is in a confirmed long-term uptrend. If the price is **below** this average, you should not initiate any new trades.

2.  **Layer 2: The Trading Signal (15-Minute Chart) - Unchanged**: **Only when** the weekly trend is positive (Layer 1 is "on"), use the **15-minute chart strategy with the "SMA - Cross Above" buy condition**. This remains the most conservative entry point.

3.  **Layer 3: The Exit Strategy (Trailing Stop-Loss) - CRITICAL ADDITION**: Since the system has no sell signal, you must create one to protect profits. Implement a **trailing stop-loss**.
    *   **How it Works**: Instead of a fixed stop-loss, your stop will move up as the trade becomes profitable.
    *   **Specific Rule**: Once you enter a trade, place an initial stop-loss at 10% below your entry price. If the trade moves in your favor, you will adjust your stop-loss to be **15% below the highest price the stock has reached since you entered the trade.**

**Step-by-Step Implementation:**

1.  **Check the Weekly Chart First**: At the start of each week, is SPY above its 52-week SMA? 
    - If **YES**, you are authorized to look for trades.
    - If **NO**, you do nothing.

2.  **Execute on the 15-Minute Chart**: If the weekly chart is positive, enter a trade when the price crosses above the 130-period SMA.

3.  **Manage the Trade with a Trailing Stop**: Immediately after entry, set your stop-loss. As the price rises, manually update your stop-loss to trail the peak price by 15%. This allows you to lock in gains while giving the trade room to grow.

4.  **Position Sizing for Capital Preservation**: Start with a **5% to 10% position size** ($3,000 to $6,000 on a $60,000 account). This is non-negotiable for risk management.

**Managing Expectations and Risk:**

This revised, three-layer approach is designed for maximum safety. It will keep you out of bear markets, use a conservative entry signal, and, most importantly, protect your profits from sudden reversals. You will not capture the absolute top of every move, but you will secure the majority of the trend while sleeping well at night. This is the most prudent way to achieve your goal of steady, inflation-beating returns without taking on undue risk.