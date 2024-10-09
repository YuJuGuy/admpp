<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المدونة</title>

</head>
<body>
<div id="blogbanner" class="blogbanner">
    <img data-aos="flip-up" data-aos-duration="1000" class="blogtext" src="<?= base_url('/static/banner/blogtext.png'); ?>" alt="blog">
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
                    foreach ($blogs_list as $index => $blogs_item): 
                        // Format the date to 'Y-m-d'
                        $created_at = (new DateTime($blogs_item['created_at']))->format('Y-m-d');

                        // Alternate between 1:1 and 4:3 aspect ratios
                        $aspect_ratio_class = ($index % 2 == 0) ? 'aspect-ratio-1-1' : 'aspect-ratio-4-3';
                    ?>
                        <div class="col blog" data-aos="zoom-in" data-aos-duration="<?= $duration ?>">
                            <a href="<?= base_url('blogs/' . esc($blogs_item['id'])) ?>" class="blog-link">
                                <div class="img-container <?= $aspect_ratio_class ?>">
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
    document.addEventListener('DOMContentLoaded', function() {
        // Preload the image for the banner
        const banner = document.getElementById('blogbanner');
        const img = new Image();
        img.src = "/static/banner/blog.png";
        img.onload = function() {
            banner.style.backgroundImage = `url('${img.src}')`;
            banner.classList.add('show-banner'); // Show the banner with transition
        };

        const items = document.querySelectorAll('.accordion button');

        function toggleAccordion() {
            const itemToggle = this.getAttribute('aria-expanded');

            items.forEach(item => {
                item.setAttribute('aria-expanded', 'false');
                item.nextElementSibling.classList.remove('show');
            });

            if (itemToggle == 'false') {
                this.setAttribute('aria-expanded', 'true');
                this.nextElementSibling.classList.add('show');
            }
        }

        items.forEach(item => item.addEventListener('click', toggleAccordion));

        // Add the active class to the current page link
        const links = document.querySelectorAll('.pagination a');
        const currentURL = window.location.href;
        const currentPath = window.location.pathname;
        
        links.forEach(link => {
            // Check if link is the first page, considering both '/blogs' and '/blogs?page=1'
            if ((currentPath === '/blogs' && !currentURL.includes('?page=')) || link.href === currentURL) {
                link.classList.add('active');
            }
        });

        AOS.init();
    });
</script>

</body>
</html>
