<!DOCTYPE html>
<html lang="ar">
<head>
    <title>اعمالنا</title>
</head>
<body>
    <div class="content-container">
    <div class="container mt-5">        
        <?php
            $directory = 'static/works';
            $images = glob($directory . '/*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
            $chunks = array_chunk($images, 6);
            $chunk_counter = 0;

            foreach ($chunks as $chunk) {
                echo '<div class="ourworks_grid m-0">';
                echo '<ul class="left">';
                for ($i = 0; $i < 3; $i++) {
                    if (isset($chunk[$i])) {
                        $image_url = base_url($chunk[$i]);
                        echo '<li><a href="' . $image_url . '" data-lightbox="our-works" data-title="Image ' . ($i + 1) . '">';
                        echo '<img src="' . $image_url . '" class="lazyload" alt="Image ' . ($i + 1) . '"></a></li>';
                    }
                }
                echo '</ul>';
                echo '<ul class="right">';
                for ($i = 3; $i < 6; $i++) {
                    if (isset($chunk[$i])) {
                        $image_url = base_url($chunk[$i]);
                        echo '<li><a href="' . $image_url . '" data-lightbox="our-works" data-title="Image ' . ($i + 1) . '">';
                        echo '<img src="' . $image_url . '" class="lazyload" alt="Image ' . ($i + 1) . '"></a></li>';
                    }
                }
                echo '</ul>';
                echo '</div>';

                // Add the button after every 3 chunks
                $chunk_counter++;
                if ($chunk_counter % 3 == 0) {
                    echo '<div class="button-container text-center mt-4">';
                    echo '<a href="' . base_url('/quote') . '" class="btn btn-primary">اطلب الآن</a>';
                    echo '</div>';
                }
            }
        ?>
    </div>
    </div>
</body>
</html>
