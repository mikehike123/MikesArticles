## Session: 2025-07-22

### New Features:
- **Created a new trading strategy article**: Based on the user's request, a new article was created under `articles/trading models` that details an advanced trading strategy with a toggleable trailing stop-loss. The article includes a description of the strategy and the full Pine Script code.
- **Developed a new Pine Script strategy**: Created a new Pine Script file, `proposed-strategy.txt`, which includes a toggleable trailing stop-loss feature as requested by the user.
- **Provided a trading plan**: Analyzed a trading strategy and provided a detailed 5-year trading plan with a three-layer risk management approach.

### Bug Fixes:
- **Fix index.php to ignore markdown directives**: Updated `index.php` to ensure that article summaries do not display Markdown directives (such as images or headers). The code now finds the first paragraph of text for the excerpt.

### Files Modified:
- `index.php`
- `articles/trading models/analysis-STD strategy/results-different-timeframes.md`
- `articles/trading models/analysis-STD strategy/proposed-strategy.txt` (new file)
- `articles/trading models/2025-07-22-advanced-strategy-with-trailing-stop.md` (new file)

---

## Session: 2025-07-20

### New Features:
- None

### Bug Fixes:
- Corrected image display on `index.php`: Removed unwanted image below "All Articles" and ensured images only display when specified in article metadata.
- Fixed excerpt display for articles on `index.php`: Ensured excerpts correctly reflect the first paragraph and handle line breaks.
- Resolved a critical parsing issue where blank lines in Markdown files would prematurely terminate content rendering. This was caused by a limitation in `parsedown.php` and was resolved by implementing custom parsing logic.

### Files Modified:
- `index.php`
- `articles/trading models/2025-07-22-first-article.md`
- `article.php`