---
title: 126 sma TQQQ Strategy
author: Mike Clark
date: July 20, 2025
image: images/TQQQ.png
---
![Alt text](images/TQQQ_strategy.png)

A very simple strategy on a 65 min chart.  Place a 126-sma through the data (represents the monthly average).  Buy when price crosses above the sma, take profit at 12% and place a stop loss at 6%.  
Lets see what happens.

From Jan 2, 2018 - Jul 14, 2025, starting with $100K , Profit $936,808
I tweaked the sma from 126-sma down to 80-sma resulted in an improved Profit of $2,154,003.

Haven't played around with changing the profit target or stop loss. I doubt if I optimize the strategy to its potential but over-fitting might be bad too. I don't know why 80 would do better than 126.  I'm guessing as you increase the profit target, the profit  would go up and your % profitable would go down and then both would plummet. Most impressively it beat the pants off of buy and hold (light blue line). Its profitable trades were a mere 51%. Pretty much a coin flip.  Also has years of floundering with a draw down of 43%.  But in times we are in now the P&L rips your face off.

I asked Gemini to create a table showing the odds of having X number of losing trades in a row with 50/50 odds. I only need to look at the first two rows to tell it was smoking crack.  Zero losing trade in a row should have the same probability as 1; 50% .  The odds of having 5 losing trades in a row I'm pretty sure should be much higher.  Also, the market trends both up and down so it's not really a coin flip; leading to more winning or losing trades in a row.

It's always possible I did something wrong in the code but the buy and sells on the graphs look reasonable and sampling the trades look reasonable as well.  Haven't spent much time verifying it.  Ink is still wet but looks promising.
I would suggest doing your own analysis prior to using the method.