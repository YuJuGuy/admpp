<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($blogs['title']) ?> - المدونة</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="blogcontent-container">
        <img class="blog-image" src="<?= base_url('/static/blog_pics/') . esc($blogs['img']) ?>.jpg" alt="<?= esc($blogs['title']) ?>">
        <h2 class="blog-title"><?= esc($blogs['title']) ?></h2>
        <p class="blog-date"><?= (new DateTime($blogs['created_at']))->format('Y-m-d'); ?></p>
        <div class="blog-body-page"><?= esc($blogs['body']) ?></div>
    </div>

</body>
</html>
