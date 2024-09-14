<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المنتجات</title>
</head>
<body>

<div class="content-container">

    <div class="banner">
    <img src="<?= base_url('static/banner/productsbanner.png') ?>" alt="Banner">
    <img src="<?= base_url('static/banner/quality.png') ?>" alt="Banner">
    <img src="<?= base_url('static/banner/productsbanner2.png') ?>" alt="Banner">


</div>


<?php
// Define the preferred order of categories
$preferred_order = [
    'all', 
    'sticker', // 7th in original order
    'paperbox', 
    'cards', 
    'shipping-box', 
    'magazine', 
    'bag', 
    'letterhead', 
    'hardcover', 
    'cupholder', 
    'books', 
    'envelopes',
    'vacuum',
    'brochure',
    'butterpaper',
    'rollup',
    
];

// Array mapping category names to their Arabic equivalents
$category_names_in_arabic = [
    'all' => 'الكل',
    'envelopes' => 'الظروف',
    'vacuum' => 'الفاكيوم',
    'books' => 'الكتب',
    'bag' => 'الاكياس',
    'brochure' => 'البروشورات',
    'paperbox' => 'علب ورقية',
    'butterpaper' => 'ورق الزبدة',
    'shipping-box' => 'كراتين الشحن',
    'cards' => 'كروت',
    'cupholder' => 'حامل الاكواب',
    'hardcover' => 'الهاردكوفر',
    'letterhead' => 'ورق رسمي',
    'magazine' => 'المجلات',
    'rollup' => 'الرول اب',
    'sticker' => 'الستيكرات',
];

?>

<div class="sliderpanel">
    <div class="container py-4">
        <div class="card-slider-6">
        <!-- Category for "All Products" -->
            <div class="category-slick">
                <div class="category-item" data-category="all" onclick="loadCategoryImages('all', this)">
                    <img src="<?php echo base_url('static/all.png'); ?>" alt="الكل">
                    <p>الكل</p>
                </div>
            </div>

        <?php
        // Iterate over the preferred categories in the specified order
        foreach ($preferred_order as $category_key):
            // Define the image path based on the category key
            $category_image = $category_key . '.png'; // Assuming the image follows this naming convention

            // Check if the category image exists in the categories array
            if (in_array($category_image, $categories)):
                // Get the Arabic name from the array, default to the English name if not found
                $category_name_arabic = $category_names_in_arabic[$category_key] ?? $category_key;
        ?>
                <!-- Category Items -->
                <div class="category-slick">
                    <div class="category-item" data-category="<?php echo $category_key; ?>" onclick="loadCategoryImages('<?php echo $category_key; ?>', this)">
                        <img src="<?php echo base_url('static/categories/' . $category_image); ?>" alt="<?php echo $category_name_arabic; ?>">
                        <p><?php echo $category_name_arabic; ?></p>
                    </div>
                </div>


            <?php
                endif;
            endforeach;
            ?>
        </div>
        <div class="categories-grid">
            <!-- Category for "All Products" -->
            <div class="category-item" data-category="all" onclick="loadCategoryImages('all', this)">
                <img src="<?php echo base_url('static/all.png'); ?>" alt="الكل">
                <p>الكل</p>
            </div>

            <?php
            // Iterate over the preferred categories in the specified order
            foreach ($preferred_order as $category_key):
                // Define the image path based on the category key
                $category_image = $category_key . '.png'; // Assuming the image follows this naming convention

                // Check if the category image exists in the categories array
                if (in_array($category_image, $categories)):
                    // Get the Arabic name from the array, default to the English name if not found
                    $category_name_arabic = $category_names_in_arabic[$category_key] ?? $category_key;
            ?>
                    <!-- Category Items -->
                    <div class="category-item" data-category="<?php echo $category_key; ?>" onclick="loadCategoryImages('<?php echo $category_key; ?>', this)">
                        <img src="<?php echo base_url('static/categories/' . $category_image); ?>" alt="<?php echo $category_name_arabic; ?>">
                        <p><?php echo $category_name_arabic; ?></p>
                    </div>
                <?php
                endif;
            endforeach;
            ?>
        
        </div> 
    </div>
</div>

<div class="container">
<div class="row row-cols-2 row-cols-lg-4 images-container" id="imagesContainer">
        <!-- Images will be loaded here dynamically -->
</div>
</div>



</div>


<script>
function loadCategoryImages(category, clickedElement = null) {
    const imagesContainer = document.getElementById('imagesContainer');
    const categoryItems = document.querySelectorAll('.category-item');

    // Clear previous images
    imagesContainer.innerHTML = '';

    // Remove active class from all categories
    categoryItems.forEach(item => item.classList.remove('active'));

    // Find the clickedElement if it's not provided (this happens on page load)
    if (!clickedElement) {
        clickedElement = Array.from(categoryItems).find(item => item.dataset.category === category);
    }

    // Apply the active class to the clicked element only
    if (clickedElement) {
        clickedElement.classList.add('active');
        // Smoothly scroll to the clicked element
        imagesContainer.scrollIntoView({ behavior: "smooth", block: "center", inline: "center" });
    }

    // Make an AJAX request to get images for the selected category
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `/list_images.php?category=${category}`, true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            const imageUrls = JSON.parse(xhr.responseText);

            // Display images in the container
            imageUrls.forEach(url => {
                const imageDiv = document.createElement('div');
                imageDiv.className = 'col image-item mb-4';
                const img = document.createElement('img');
                // save img in a variable with data-lightbox="our-works"
                const a = document.createElement('a');
                a.href = url;
                a.setAttribute('data-lightbox', 'our-works');
                a.target = '_blank';
                img.src = url;
                a.appendChild(img);
                imageDiv.appendChild(a);
                imagesContainer.appendChild(imageDiv);
            });
        } else {
            console.error('Failed to load images');
        }
    };

    xhr.send();

    // Update URL to include the category
    history.pushState(null, null, `?category=${category}`);
}

// On page load, check for category in URL and load corresponding images
window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const category = urlParams.get('category');

    if (category) {
        loadCategoryImages(category);
    }
};




  $(document).ready(function(){
    $('.card-slider-6').slick({
    
    
      infinite: true,
      slidesToShow: 6,// Number of cards to show
      rows: 2,
    // check if phone make it row 1 if pc make it 2


      slidesToScroll: 1, // Number of cards to scroll at a time
      prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
      responsive: [
        {
          breakpoint: 1024, // Below this breakpoint
          settings: {
            slidesToShow: 2, // Number of cards to show
            slidesToScroll: 1 // Number of cards to scroll
          }
        },
        {
          breakpoint: 600, // Below this breakpoint
          settings: {
            slidesToShow: 1, // Number of cards to show
            slidesToScroll: 1 // Number of cards to scroll
            
          }
        }
      ]
    });
  });
</script>

</body>
</html>
