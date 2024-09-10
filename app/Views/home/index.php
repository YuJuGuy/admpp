<head>
    <title>الصفحة الرئيسية</title>
</head>
<body>


<div class = "slideshowpanel">
<div class="slideshow-container">

<div class="slides">
    <img src="<?= base_url('/static/banner/1.png'); ?>" data-src-phone="<?= base_url('/static/banner/1_phone.png'); ?>" alt="Slide 1">
</div>
<div class="slides">
    <img src="<?= base_url('/static/banner/2.png'); ?>" data-src-phone="<?= base_url('static/banner/2.png'); ?>" alt="Slide 2">
</div>
<div class="slides">
    <img src="<?= base_url('/static/banner/3.png'); ?>" data-src-phone="<?= base_url('static/banner/3.png'); ?>" alt="Slide 3">
</div>
<div class="slides">
    <img src="<?= base_url('/static/banner/4.png'); ?>" data-src-phone="<?= base_url('/static/banner/1_phone.png'); ?>" alt="Slide 4">
</div>

    <div class="progress-container">

        <div class="progress-bar-wrapper">
            <div class="progress-bar">
                <div class="progress-bar-fill" id="progressBar1"></div>
            </div>
            <div class="progress-bar-text">
                <p>الاعلانات</p>
            </div>
        </div>

        <div class="progress-bar-wrapper">
            <div class="progress-bar">
                <div class="progress-bar-fill" id="progressBar2"></div>
            </div>
            <div class="progress-bar-text">
                <p>الاكياس</p>
            </div>
        </div>

        <div class="progress-bar-wrapper">
            <div class="progress-bar">
                <div class="progress-bar-fill" id="progressBar3"></div>
            </div>
            <div class="progress-bar-text">
                <p>التخفيضات</p>
            </div>
        </div>

        <div class="progress-bar-wrapper">
            <div class="progress-bar">
                <div class="progress-bar-fill" id="progressBar4"></div>
            </div>
            <div class="progress-bar-text">
                <p>العروض</p>
            </div>
        </div>
    </div>


</div>
</div>

<div  data-aos="fade-right" class="sliderpanel">
    <div class="title pt-4">
        <h1>اختر منتجك</h1>
    </div>
    <div class="container py-4">  
    <div class="card-slider">
        <div class="card">
        <img data-src=<?= base_url('/static/categories/paperbox.png'); ?> class="card-img-top lazyload" alt="...">
        <div class="card-body mt-4">
            <h5 class="card-title">العلب الورقية</h5>
        </div>
        </div>
        <div class="card">
        <img data-src=<?= base_url('/static/categories/bag.png'); ?> class="card-img-top lazyload" alt="...">
        <div class="card-body mt-4">
            <h5 class="card-title">الاكياس</h5>
        </div>
        </div>
        <div class="card">
        <img data-src=<?= base_url('/static/categories/shipping-box.png'); ?> class="card-img-top lazyload" alt="...">
        <div class="card-body mt-4">
            <h5 class="card-title">كراتين الشحن</h5>
        </div>
        </div>
        <div class="card">
        <img data-src=<?= base_url('/static/categories/hardcover.png'); ?> class="card-img-top lazyload" alt="...">
        <div class="card-body mt-4">
            <h5 class="card-title">علب الهاردكفر</h5>
        </div>
        </div>
        <div class="card">
        <img data-src=<?= base_url('/static/categories/rollup.png'); ?> class="card-img-top lazyload" alt="...">
        <div class="card-body mt-4">
            <h5 class="card-title">رول اب</h5>
        </div>
        </div>
        <div class="card">
        <img data-src=<?= base_url('/static/categories/sticker.png'); ?> class="card-img-top lazyload" alt="...">
        <div class="card-body mt-4">
            <h5 class="card-title">ستيكرات</h5>
        </div>
        </div>
        <div class="card">
        <img data-src=<?= base_url('/static/categories/brochure.png'); ?> class="card-img-top lazyload" alt="...">
        <div class="card-body mt-4">
            <h5 class="card-title">بروشورات</h5>
        </div>
        </div>
        <div class="card">
        <img data-src=<?= base_url('/static/categories/books.png'); ?> class="card-img-top lazyload" alt="...">
        <div class="card-body mt-4">
            <h5 class="card-title">الكتب</h5>
        </div>
        </div>
    </div>
    </div>

    <div class="button-container">
        <a href="<?=base_url("/products?category=bag")?>" class="btn btn-primary">جميع المنتجات</a>
    </div>
</div>

<div data-aos="fade-right" class="howpanel">
    <div class="title pt-4">
        <h1>مكائننا</h1>
        <p>نقدم أحدث تقنيات الطباعة المتطورة التي تجمع بين الدقة والكفاءة العالية. من خلال استخدام معداتنا المتقدمة، نضمن لك جودة طباعة استثنائية وتفاصيل دقيقة في كل مشروع. </p>
    </div>
    <div class="video-container">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel"    >
        <div class="carousel-inner">
        <?php
        // Define the path to the 'machines' folder
        $machines_path = './static/machines/';

        // Use PHP's scandir to get the list of files in the directory
        $machine_images = scandir($machines_path);

        // Filter out "." and ".." from the file list
        $machine_images = array_diff($machine_images, array('.', '..'));

        // Loop through each image and create the carousel items
        $index = 0;
        foreach ($machine_images as $image) {
            // Check if the file is an image
            $image_path = $machines_path . $image;
            if (is_file($image_path)) {
                ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                    <img src="<?php echo base_url('static/machines/' . $image); ?>" class="d-block w-100" alt="Machine image <?= $index + 1 ?>">
                </div>
                <?php
                $index++;
            }
        }
        ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
</div>
</div>



<div class="iconspanel">
    <div class="title pt-4">
        <h1>أنت تستحق دائماً الأفضل مع مطابع أضواء</h1>
        <p>نحن في أضواء نوفر لك.</p>
    </div>
    <div class="row row-cols-2 row-cols-lg-4 features-container pt-4">
        <div data-aos="fade-up" data-aos-delay="150" class="card-feature" style="width: 250px; margin-top: 2rem;">
            <img src=<?= base_url('/static/svgs/usd.svg'); ?> alt="svg 1">
            <h3>أسعار مذهلة</h3>
            <p>أسعارنا دائماً تناسبك، بخصومات عديدة عند الزيادة في القطع</p>
        </div>
        <div data-aos="fade-up" data-aos-delay="300" class="card-feature" style="width: 250px; margin-top: 2rem; ">
            <img src=<?= base_url('/static/svgs/truck.svg'); ?> alt="svg 2">
            <h3>سرعة التوصيل</h3>
            <p>عند اتمام طلبك سيكون علينا توصيله لك في الوقت المناسب توفيرا لجهدك ووقتك</p>
        </div>
        <div data-aos="fade-up" data-aos-delay="450" class="card-feature" style="width: 250px; margin-top: 2rem;">
        <img src=<?= base_url('/static/svgs/box.svg'); ?> alt="svg 3">
        <h3>الجودة</h3>
        <p>نضمن لك توفير فريق يهتم بمنتجك ليظهر لك بأفضل صورة تنال إعجابك</p>
        </div>
    </div>
</div>




<div class="looppanel" data-aos="fade-down" >
<div class="loop-video">
    <video autoplay muted loop playsinline>
        <source src=<?= base_url('/static/video/video-loop.mp4'); ?> type="video/mp4">
    </video>
</div>
<div class="container-text">
    <div class="rich-text">
        <h1>من نحن؟</h1>
        <h3>وهي شركة متخصصة في مجال الطباعة والتغليف منذ عام 2001. كما توفر جزء من متطلبات ADMPP تأسست. السوق على المستوى الخليجي، و تقديمها تحت شعار الجودة والسرعة و تنافسية األسعار واإلنجاز اليقف واليزال مستمر.</h3>
        <div class="button-container">
            <a href="<?= base_url('/quote'); ?>" class="btn btn-primary">اطلب الآن</a>
        </div>
    </div>
</div>
</div>
</div>

<div data-aos="zoom-in-up" class="ourworkspanel" id="ourworks">
    <div class="wrapper">
        <div class="title pt-4">
            <h1>أعمـــالنا :</h1>
            <p>كيف لك أن تكون تجربتك مع مطابع أضواء مختلفة؟ نحن في مطابع أضواء نحرص على توفير لك سهولة الاختيار، الأفكار الجذابة، الأسعار المناسبة، المتانة، والحفاظ على المنتج.</p>
        </div>
        <div class="ourworks_grid">
            <ul class="left">
                <li>
                    <a href="<?= base_url('/static/our-works/1.jpg'); ?>" data-lightbox="our-works" data-title="Image 1">
                        <img src="<?= base_url('/static/our-works/1.jpg'); ?>" class="lazyload" alt="">
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('/static/our-works/2.png'); ?>" data-lightbox="our-works" data-title="Image 2">
                        <img src="<?= base_url('/static/our-works/2.png'); ?>" class="lazyload" alt="">
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('/static/our-works/3.jpg'); ?>" data-lightbox="our-works" data-title="Image 3">
                        <img src="<?= base_url('/static/our-works/3.jpg'); ?>" class="lazyload" alt="">
                    </a>
                </li>
            </ul>
            <ul class="right">
                <li>
                    <a href="<?= base_url('/static/our-works/4.jpg'); ?>" data-lightbox="our-works" data-title="Image 4">
                        <img src="<?= base_url('/static/our-works/4.jpg'); ?>" class="lazyload" alt="">
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('/static/our-works/5.jpg'); ?>" data-lightbox="our-works" data-title="Image 5">
                        <img src="<?= base_url('/static/our-works/5.jpg'); ?>" class="lazyload" alt="">
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('/static/our-works/6.jpg'); ?>" data-lightbox="our-works" data-title="Image 6">
                        <img src="<?= base_url('/static/our-works/6.jpg'); ?>" class="lazyload" alt="">
                    </a>
                </li>
            </ul>
        </div>
        <div class="button-container">
            <a href="<?= base_url('/works'); ?>" class="btn btn-primary">جميع الاعمال</a>
        </div>
    </div>
</div>





<div class="richtextpanel">
<div class="right-side-rich">

    <div class="richimg-container">
    <img src="<?= base_url('/static/banner/richimage.png'); ?>" class="lazyload" alt="">
    </div>
</div>
<div class="left-side-rich">
    <div class="title-rich">
        <h1>أكثر من مجرد تغليف</h1>
    </div>
    <div class="title-text">
        <p>تستحق منتجاتك أن تُقدم في صناديق مصنوعة من مواد مستدامة، تتميز بجودة طباعة ممتازة وتصميم مثالي. نحن نساعدك في ابتكار عبوات رائعة تتناسب مع جميع الاستخدامات، المجالات، والصناعات، لضمان تقديم تجربة استثنائية لمستلم المنتج.</p>
    </div>
    </div>

</div>

<div data-aos="fade-down" class="partnerpanel">
    <div class="title pt-4" style="text-align: center;">
        <h1>شركاؤنا</h1>
    </div>
    <ul class="partners">
    <?php
    $partners = [
        '/static/partners/1.png',
        '/static/partners/2.png',
        '/static/partners/3.png',
        '/static/partners/4.jpg',
        '/static/partners/5.png',
        '/static/partners/6.png',
        '/static/partners/7.png',
        '/static/partners/8.png',
        '/static/partners/9.jpg',
        '/static/partners/10.jpeg',
        '/static/partners/11.png',
        '/static/partners/12.png'
    ];
    ?>

    <ul class="partners">
        <?php foreach ($partners as $partner): ?>
            <li><img data-src="<?= base_url($partner); ?>" class="lazyload" alt=""></li>
        <?php endforeach; ?>
    </ul>
    </ul>
</div>
<div data-aos="fade-up" class="faqpanel">
    <div class="questions-rich">
        <h2>نعرف بأن كل سؤال مهم, لكن هذي الأسئلة هي الأكثر شيوعاً.</h2>
        <div class="button-container">
        <a href="<?= base_url("faq")?>" class="btn btn-primary">جميع الاسئلة</a>
        </div>
    </div>
    <div class="question-accordion">
            <div class="accordion">
                    <div class="accordion-item" style="border-bottom: 1px solid #e5e5e5 !important;">
                        <button id="accordion-button" aria-expanded="false">
                            <span class="accordion-title">ماهي اقل الكمية للطلب؟</span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>تبدا الكمية من  500 حبة .</p>
                        </div>
                    </div>
                    <div class="accordion-item" style="border-bottom: 1px solid #e5e5e5 !important;">
                        <button id="accordion-button" aria-expanded="false">
                            <span class="accordion-title">كم تستغرق مدة الطلب للعمل؟</span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>مدة الطلب تستغرق من 15 الى 25 يوم  - ويعتمد على حسب نوع  العمل .</p>
                        </div>
                    </div>
                    <div class="accordion-item" style="border-bottom: 1px solid #e5e5e5 !important;">
                        <button id="accordion-button" aria-expanded="false">
                            <span class="accordion-title">ما هي طرق الدفع؟</span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>التحويل , الدفع النقدي , الدفع عبر البطاقات الإئتمانية</p>
                        </div>
                    </div>
                    <div class="accordion-item" style="border-bottom: 1px solid #e5e5e5 !important;">
                        <button id="accordion-button" aria-expanded="false">
                            <span class="accordion-title">هل يوجد خدمات الشحن والتوصيل؟</span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>نعم متوفر ، التوصيل داخل الرياض متوفر ومجاني للعملاء
                            اما خارج الرياض يكون عن طريق شركات الشحن يتم احتسابها التكلفة على العميل</p>
                        </div>
                    </div>
                    <div class="accordion-item" style="border-bottom: 1px solid #e5e5e5 !important;">
                        <button id="accordion-button" aria-expanded="false">
                            <span class="accordion-title">هل يمكنكم توفير عينة ( مقاس ) قبل الطباعة؟</span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p>نعم ، يتم توفير عينة مقاس تكون باللون ( الأبيض ) للعميل بحسب الخامة والمقاس المطلوب من العميل</p>
                        </div>
                    </div>
            </div>
       


    </div>

    </div>

    <div class="reviews-section">
    <h2 style="font-weight:bold;">آراء العملاء</h2>
    <div class="reviews">
        <?php foreach ($reviews as $index => $review): ?>
            <div class="review-container <?= $index >= 4 ? 'hidden' : ''; ?>">
                <div class="reviewer">
                    <div class="reviewer-image">
                        <img src="<?= esc($review['author_image']); ?>" 
                            alt="<?= esc($review['author_title']); ?>" 
                            onerror="this.src='<?= base_url('/static/fallback/profile.png'); ?>';">
                    </div>
                    <div class="reviewer-name">
                        <?= esc($review['author_title']); ?>
                        <div class="verified">
                            <img src="<?= base_url('/static/svgs/verified.svg') ?>" alt="Verified Review">
                        </div>
                    </div>
                </div>
                <div class="review-content">
                    <div class="rating">
                        <?php for ($i = 0; $i < $review['review_rating']; $i++): ?>
                            <img src="<?= base_url('/static/svgs/star.svg') ?>" alt="Star">
                        <?php endfor; ?>
                    </div>
                    <div class="review-text">
                        <?= esc($review['review_text']); ?>
                    </div>
                    <div class="google-svg">
                        <img src="<?= base_url('/static/svgs/google.svg') ?>" alt="Google Review">
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="load-more">عرض المزيد</div>
</div>

<script>

document.addEventListener('DOMContentLoaded', () => {
    const loadMoreButton = document.querySelector('.load-more');
    const hiddenReviews = Array.from(document.querySelectorAll('.review-container.hidden'));

    let reviewsLoaded = 8; // Initial number of reviews loaded

    // Function to load more reviews
    function loadMoreReviews() {
        // Get the next 4 hidden reviews
        const reviewsToShow = hiddenReviews.splice(0, 4);
        
        // Remove the 'hidden' class to display them
        reviewsToShow.forEach(review => review.classList.remove('hidden'));
        
        // If there are no more hidden reviews, hide the button
        if (hiddenReviews.length === 0) {
            loadMoreButton.style.display = 'none';
        }
    }

    // Load more reviews on button click
    loadMoreButton.addEventListener('click', loadMoreReviews);

    // Initially load the first set of reviews
    loadMoreReviews();
});



    const slides = document.querySelectorAll('.slides');
    const progressBars = document.querySelectorAll('.progress-bar-fill');
    const interval = 6000; // Interval between slide changes

    let currentSlide = 0; // Index of the current slide

    function showSlide(index) {
        // Hide all slides
        slides.forEach(slide => slide.style.display = 'none');
        // Display the selected slide
        slides[index].style.display = 'block';
        // Animate progress bar for this slide
        animateProgressBar(index);
    }

    function animateProgressBar(index) {
        // Reset all progress bars to 0%
        progressBars.forEach(bar => {
            bar.style.transition = 'none'; // Disable transition for initial setting
            bar.style.width = '0%'; // Set width to 0%
        });

        // Enable transition for animation
        setTimeout(() => {
            progressBars[index].style.transition = `width ${interval}ms linear`;
            progressBars[index].style.width = '100%'; // Animate width to 100%
        }, 10); // Delay to ensure transition starts smoothly

        // Reset back to 0% after the interval
        setTimeout(() => {
            progressBars[index].style.transition = ''; // Reset transition
            progressBars[index].style.width = '0%'; // Set width back to 0%
            // Move to the next slide
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }, interval);
    }

    // Start the slideshow
    showSlide(currentSlide);

    $(document).ready(function(){
    $('.card-slider').slick({
      infinite: true,
      slidesToShow: 4, // Number of cards to show at once
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

  AOS.init({
            duration: 800, // Animation duration in milliseconds
            easing: 'ease-in-out', // Easing function
            once: true // Whether animation should happen only once - while scrolling down
            });

document.addEventListener("DOMContentLoaded", function() {
    const slides = document.querySelectorAll('.slides img');
    const isPhone = window.matchMedia("(max-width: 768px)").matches;

    slides.forEach(img => {
        const phoneSrc = img.getAttribute('data-src-phone');
        if (isPhone && phoneSrc) {
            img.setAttribute('src', phoneSrc);
        }
    });
});  

const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
    const itemToggle = this.getAttribute('aria-expanded');
    
    for (let i = 0; i < items.length; i++) {
        items[i].setAttribute('aria-expanded', 'false');
        const contentParagraph = items[i].nextElementSibling.querySelector('p');
        contentParagraph.style.animation = ''; // Reset animation
    }
    
    if (itemToggle == 'false') {
        this.setAttribute('aria-expanded', 'true');
        const contentParagraph = this.nextElementSibling.querySelector('p');
        contentParagraph.style.animation = 'slideInUp .75s'; // Add animation
        
        // Force reflow to restart animation
        void contentParagraph.offsetWidth;
    }
}

items.forEach(item => item.addEventListener('click', toggleAccordion));

</script>


</body>
</html>
