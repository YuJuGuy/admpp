<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($blogs['title']) ?> - المدونة</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>


.content-container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;

    animation: fadeIn 1s ease-in-out;
}

.blog-image {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    animation: zoomIn 1s ease-in-out;
}

.blog-title {
    font-size: 2em;
    margin: 20px 0 10px;
    font-weight: 600;
    color: #2c3e50;
}

.blog-date {
    font-size: 0.9em;
    color: #95a5a6;
    margin-bottom: 20px;
}

.blog-body-page {
    line-height: 1.6;
    font-size: 1.1em;
    direction: rtl;
    text-align: justify;
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes zoomIn {
    from { transform: scale(0.9); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

    </style>
</head>
<body>
    <div class="content-container">
        <img class="blog-image" src="<?= base_url('/static/blog_pics/') . esc($blogs['img']) ?>.jpg" alt="<?= esc($blogs['title']) ?>">
        <h2 class="blog-title"><?= esc($blogs['title']) ?></h2>
        <p class="blog-date"><?= (new DateTime($blogs['created_at']))->format('Y-m-d'); ?></p>
        <div class="blog-body-page"><?= esc($blogs['body']) ?></div>
    </div>

</body>
</html>
