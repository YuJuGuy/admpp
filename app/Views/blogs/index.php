<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المدونة</title>
</head>
<body>
<div class="blogbanner">
        <div class="scroll_down">
            اسحب للأسفل
        </div>
    </div>
    <div class="content-container">
        <?php if (!empty($blogs_list)): ?>
            <div class="blogscontainer">
                <div class="title p4 text-center mt-4">
                    <h1>المدونة</h1>
                </div>
                <div class="row row-cols-1 row-cols-lg-2 p-4 justify-content-center">
                    <?php 
                    $duration = 0; // Initial duration
                    foreach ($blogs_list as $blogs_item): 
                        // Format the date to 'Y-m-d'
                        $created_at = (new DateTime($blogs_item['created_at']))->format('Y-m-d');
                    ?>
                        <div class="col blog" data-aos="zoom-in" data-aos-duration="<?= $duration ?>">
                            <a href="<?= base_url('blogs/' . esc($blogs_item['id'])) ?>" class="blog-link">
                                <div class="img-container">
                                    <img src="<?= base_url('/static/blog_pics/') . esc($blogs_item['img']) ?>.jpg" alt="<?= esc($blogs_item['title']) ?>">
                                </div>
                            </a>
                            <div class="blog-text">
                                <div class="created-at pb-2">
                                    <p><?= esc($created_at) ?></p>
                                </div>
                                <div class="blog-title mt-2">
                                    <a href="<?= base_url('blogs/' . esc($blogs_item['id'])) ?>" class="blog-link">
                                        <h3><?= esc($blogs_item['title']) ?></h3>
                                    </a>
                                </div>
                                <div class="blog-body mb-4 pb-4">
                                    <?= esc($blogs_item['body']) ?>
                                </div>
                            </div>
                        </div>
                        <?php 
                        $duration += 350; // Increase duration by 350 for each blog
                    endforeach; 
                    ?>
                </div>
            </div>

            <div class="pagination">
                <?= $pager->links() ?>
            </div>
        <?php else: ?>
            <h3>No blogs</h3>
            <p>Unable to find any blogs for you.</p>
        <?php endif; ?>
    </div>

    <script>
        // Add the active class to the current page link
        const links = document.querySelectorAll('.pagination a');
        links.forEach(link => {
            if (link.href === window.location.href) {
                link.classList.add('active');
            }
        });
        AOS.init();
    </script>
</body>
</html>
