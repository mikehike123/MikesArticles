<?php
function get_all_articles() {
    $articles = [];
    $categories = array_filter(glob('articles/*'), 'is_dir');

    foreach ($categories as $category) {
        $categoryName = basename($category);
        $files = glob("$category/*.md");

        foreach ($files as $file) {
            $content = file_get_contents($file);
            // Standardize line endings
            $content = str_replace(array("\r\n", "\r"), "\n", $content);
            $parts = explode('---', $content, 3);

            if (count($parts) < 3) continue; // Skip files without metadata

            $metadata = [];
            $lines = explode("\n", trim($parts[1]));
            foreach ($lines as $line) {
                list($key, $value) = explode(':', $line, 2);
                $metadata[trim($key)] = trim($value);
            }

            $metadata['slug'] = basename($file, '.md');
            $metadata['category'] = $categoryName;

            // Find the first paragraph that is not a Markdown directive (e.g., image or header)
            $paragraphs = explode("\n\n", trim($parts[2]));
            $first_text_paragraph = '';
            foreach ($paragraphs as $paragraph) {
                $trimmed_paragraph = trim($paragraph);
                if (
                    !empty($trimmed_paragraph) &&
                    strpos($trimmed_paragraph, '![') !== 0 &&
                    strpos($trimmed_paragraph, '#') !== 0
                ) {
                    $first_text_paragraph = $trimmed_paragraph;
                    break;
                }
            }
            $metadata['excerpt'] = substr($first_text_paragraph, 0, 150) . '...';

            $articles[] = $metadata;
        }
    }

    // Sort articles by date (newest first)
    usort($articles, function($a, $b) {
        return strtotime($b['date']) - strtotime($a['date']);
    });

    return $articles;
}

function get_categories() {
    return array_map('basename', array_filter(glob('articles/*'), 'is_dir'));
}

$all_articles = get_all_articles();
$categories = get_categories();

// Filter articles by category if a category is selected
$current_category = isset($_GET['category']) ? $_GET['category'] : 'All Articles';
$article_list = $all_articles;

if ($current_category !== 'All Articles') {
    $article_list = array_filter($all_articles, function($article) use ($current_category) {
        return $article['category'] === $current_category;
    });
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Epstein Articles</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar" id="mainNavbar">
        <a href="index.php" class="logo">Mike's Articles</a>
        <div class="nav-links" id="navLinks">
            <div class="nav-item" id="articlesDropdown">
                <a href="#" class="nav-link" id="articlesMenu">Articles <svg style="vertical-align:middle;width:1em;height:1em;" viewBox="0 0 20 20"><path d="M5.23 7.21a1 1 0 0 1 1.41.02L10 10.7l3.36-3.47a1 1 0 1 1 1.43 1.4l-4.07 4.2a1 1 0 0 1-1.43 0l-4.07-4.2a1 1 0 0 1 .01-1.42z"></path></svg></a>
                <div class="dropdown" id="articlesDropdownMenu">
                    <a class="dropdown-link" href="index.php">All Articles</a>
                    <?php foreach ($categories as $cat): ?>
                        <a class="dropdown-link" href="?category=<?php echo urlencode($cat); ?>"><?php echo ucfirst($cat); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="nav-item"><a href="#" class="nav-link">About</a></div>
            <div class="nav-item"><a href="#" class="nav-link">Contact</a></div>
        </div>
        <button class="theme-toggle" id="themeToggle" aria-label="Toggle dark mode">
            <svg id="themeIcon" viewBox="0 0 24 24"><path d="M12 3a9 9 0 0 0 0 18c4.97 0 9-4.03 9-9 0-4.97-4.03-9-9-9zm0 16a7 7 0 1 1 0-14 7 7 0 0 1 0 14z"></path></svg>
        </button>
        <div class="hamburger" id="hamburger" aria-label="Open menu" tabindex="0">
            <span></span><span></span><span></span>
        </div>
    </nav>
    <div class="main-container">
        <h1 class="category-title"><?php echo ($current_category !== 'All Articles') ? 'Category: ' . ucfirst($current_category) : 'All Articles'; ?></h1>
        <div class="articles-list">
            <?php foreach ($article_list as $article): ?>
                <div class="article-preview">
                    <?php if (!empty($article['image'])): ?>
                        <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="">
                    <?php endif; ?>
                    <h2><a href="article.php?file=<?php echo urlencode($article['category'] . '/' . $article['slug'] . '.md'); ?>"><?php echo htmlspecialchars($article['title']); ?></a></h2>
                    <p class="meta">By <?php echo htmlspecialchars($article['author']); ?> | <?php echo htmlspecialchars($article['date']); ?></p>
                    <p class="excerpt"><?php echo htmlspecialchars($article['excerpt']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
<script>
// Responsive Navbar Dropdown
const articlesDropdown = document.getElementById('articlesDropdown');
const articlesMenu = document.getElementById('articlesMenu');
const dropdownMenu = document.getElementById('articlesDropdownMenu');
const navLinks = document.getElementById('navLinks');
const hamburger = document.getElementById('hamburger');
const navbar = document.getElementById('mainNavbar');

// Dropdown for desktop
articlesMenu.addEventListener('mouseenter', () => {
  if (window.innerWidth > 700) articlesDropdown.classList.add('open');
});
articlesDropdown.addEventListener('mouseleave', () => {
  if (window.innerWidth > 700) articlesDropdown.classList.remove('open');
});
// Dropdown for mobile
articlesMenu.addEventListener('click', (e) => {
  if (window.innerWidth <= 700) {
    e.preventDefault();
    articlesDropdown.classList.toggle('open');
  }
});

// Hamburger menu
hamburger.addEventListener('click', () => {
  navLinks.classList.toggle('open');
});

// Hide navbar on scroll down, show on scroll up
let lastScroll = 0;
window.addEventListener('scroll', () => {
  const curr = window.scrollY;
  if (curr > lastScroll && curr > 80) {
    navbar.classList.add('hide');
  } else {
    navbar.classList.remove('hide');
  }
  lastScroll = curr;
});

// Theme toggle
const themeToggle = document.getElementById('themeToggle');
const themeIcon = document.getElementById('themeIcon');
function setTheme(theme) {
  document.documentElement.setAttribute('data-theme', theme);
  localStorage.setItem('theme', theme);
  themeIcon.innerHTML = theme === 'dark'
    ? '<path d="M12 3a9 9 0 0 0 0 18c4.97 0 9-4.03 9-9 0-4.97-4.03-9-9-9zm0 16a7 7 0 1 1 0-14 7 7 0 0 1 0 14z"/>'
    : '<path d="M6.76 4.84l-1.8-1.79-1.41 1.41 1.79 1.8a7.007 7.007 0 0 0-1.8 4.74H1v2h2.34a7.007 7.007 0 0 0 1.8 4.74l-1.79 1.8 1.41 1.41 1.8-1.79A7.007 7.007 0 0 0 12 19.93V22h2v-2.07a7.007 7.007 0 0 0 4.74-1.8l1.8 1.79 1.41-1.41-1.79-1.8A7.007 7.007 0 0 0 19.93 12H22v-2h-2.07a7.007 7.007 0 0 0-1.8-4.74l1.79-1.8-1.41-1.41-1.8 1.79A7.007 7.007 0 0 0 14 4.07V2h-2v2.07A7.007 7.007 0 0 0 7.26 5.86z"/>';
}
const savedTheme = localStorage.getItem('theme') || 'dark';
setTheme(savedTheme);
themeToggle.addEventListener('click', () => {
  setTheme(document.documentElement.getAttribute('data-theme') === 'dark' ? 'light' : 'dark');
});
</script>
</html>