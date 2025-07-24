<?php

require_once 'Parsedown.php';

if (!isset($_GET['file'])) {
    die('Article not found.');
}

$file = urldecode($_GET['file']);
$filepath = __DIR__ . '/articles/' . $file;

if (!file_exists($filepath)) {
    die('Article not found. Checked path: ' . $filepath);
}

if (!file_exists($filepath)) {
    die('Article not found.');
}

$content = file_get_contents($filepath);
$parts = explode('---', $content, 3);

if (count($parts) < 3) {
    // Fallback for articles without metadata
    $body = $content;
    $metadata = [
        'title' => ucfirst(str_replace('-', ' ', basename($file, '.md'))),
        'author' => 'Unknown',
        'date' => date("F j, Y"),
        'image' => 'images/TQQQ.png' // Default image
    ];
} else {
    $metadata = [];
    $lines = explode("\n", trim($parts[1]));
    foreach ($lines as $line) {
        list($key, $value) = explode(':', $line, 2);
        $metadata[trim($key)] = trim($value);
    }
    $body = trim($parts[2]);
}

// Ensure image metadata is set, default to empty string if not present
if (!isset($metadata['image'])) {
    $metadata['image'] = '';
}

$Parsedown = new Parsedown();
$article_body = $Parsedown->text($body);

$title = $metadata['title'];
$author = $metadata['author'];
$date = $metadata['date'];
$image = $metadata['image'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main-container">
        <div class="full-article">
            <h1><?php echo htmlspecialchars($title); ?></h1>
            <p class="meta">By <?php echo htmlspecialchars($author); ?> | <?php echo htmlspecialchars($date); ?></p>
            <img src="<?php echo htmlspecialchars($image); ?>" alt="" class="featured-image">
            <div class="article-content">
                <?php echo $article_body; ?>
            </div>
            <a href="index.php" class="back-link">← Back to articles</a>
        </div>
    </div>
</body>
</html>