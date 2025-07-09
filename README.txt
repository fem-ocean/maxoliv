=== Documentation Index ===
1. Required Files
2. Installation
3. Loading Animation (see below)
4. Theme Customization
5. Core Features
6. Custom components
7. Troubleshooting
8. Credits
[...add the rest later...]




=== Required Files ===
1. assets/js/animations.js - Handles the loading animation sequence
   - Must be enqueued in functions.php
   - Do not modify timing values without CSS adjustments







== Loading Animation System ==

1. **Files Involved**
- CSS: Compiled into style.css (source in src/input.css)
- JS: assets/js/animations.js
- HTML: header.php (loading-overlay div)

2. **Timing Sequence**
| Phase       | Duration | Start Time | Description               |
|-------------|----------|------------|---------------------------|
| Appear      | 0.1s     | 1s         | Fade in the line          |
| Grow        | 2.5s     | 1.1s       | Line expands vertically   |
| Reveal      | 0.8s     | 3.6s       | Page reveal animation     |

3. **Customization**
To modify timings:
1. Edit both files:
- CSS keyframes (src/input.css)
- JavaScript delays (animations.js)
2. Keep the 0.1s buffer between phases

4. **Theme Compatibility**
Works with all color themes via:
- var(--theme-secondary) for background
- White loading line (contrasts with all themes)
