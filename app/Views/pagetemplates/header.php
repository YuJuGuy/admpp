<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Hotjar Tracking Code for https://admpp.com/ -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:5152399,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    <!-- Google tag (gtag.js) --> 
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PLCJ50X7HM"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-PLCJ50X7HM'); </script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('/static/styles/style.css'); ?>">
    <link href="<?= base_url('/static/lightbox/css/lightbox.css'); ?>" rel="stylesheet" />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="navbar-background"></div>
            <div class="container-fluid">
                <a class="svg-container" href=<?= base_url('/'); ?>>
                    <img src=<?= base_url('/static/svgs/logo.svg'); ?> class="navbar-brand">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="navbar-nav-container">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href=<?= base_url('/'); ?>>الصفحة الرئيسية</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href=<?= base_url('/products?category=all');?>>منتجاتنا</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href=<?= base_url('/works');?>>أعمالنا</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href=<?= base_url('/about'); ?>>عن الشركة</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href=<?= base_url('/blogs'); ?>>المدونة</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href=<?= base_url('/quote');?>>طلب تسعير</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href=<?= base_url('/faq');?>>الاسئلة الشائعة</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href=<?= base_url('/contact');?>>تواصل معنا</a>
                            </li>
                        </ul>
                    </div>
                    <div class="social-icons ms-auto">
                        <a href="https://wa.me/966562243082" target="_blank">
                            <img src=<?= base_url('/static/svgs/wa.svg'); ?> alt="whatsapp">
                        </a>
                        <a href="https://www.facebook.com/Admpp22" target="_blank">
                        <img src=<?= base_url('/static/svgs/fb.svg'); ?> alt="whatsapp">
                        <a href="https://x.com/admpp22" target="_blank">
                            <img src=<?= base_url('/static/svgs/x.svg'); ?> alt="whatsapp">
                        </a>
                        <a href="https://www.instagram.com/admpp22" target="_blank">
                            <img src=<?= base_url('/static/svgs/ig.svg'); ?> alt="whatsapp">
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Offcanvas menu -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex align-items-center justify-content-center flex-column">
            <div class="nav flex-column">
                <a class="nav-link" href=<?= base_url('/'); ?>>الصفحة الرئيسية</a>
                <a class="nav-link" href=<?= base_url('/products?category=all');?>>منتجاتنا</a>
                <a class="nav-link" href=<?= base_url('/works');?>>أعمالنا</a>
                <a class="nav-link" href=<?= base_url('/about'); ?>>عن الشركة</a>
                <a class="nav-link" href=<?= base_url('/blogs'); ?>>المدونة</a>
                <a class="nav-link"  href=<?= base_url('/quote');?>>طلب تسعير</a>
                <a class="nav-link"  href=<?= base_url('/faq');?>>الاسئلة الشائعة</a>
                <a class="nav-link" href=<?= base_url('/contact');?>>تواصل معنا</a>

            </div>

            <div class="social-media-phone">
                <a href="https://wa.me/966562243082" target="_blank">
                    <img src=<?= base_url('/static/svgs/wa.svg'); ?> alt="whatsapp">
                </a>
                <a href="https://www.facebook.com/Admpp22" target="_blank">
                    <img src=<?= base_url('/static/svgs/fb.svg'); ?> alt="whatsapp">
                </a>
                <a href="https://x.com/admpp22" target="_blank">
                    <img src=<?= base_url('/static/svgs/x.svg'); ?> alt="whatsapp">
                </a>
                <a href="https://www.instagram.com/admpp22" target="_blank">
                    <img src=<?= base_url('/static/svgs/ig.svg'); ?> alt="whatsapp">
                </a>
            </div>
        </div>
    </div>
    
    <script src="<?= base_url('/static/lightbox/js/lightbox-plus-jquery.js'); ?>"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
            var baseUrl = '<?= base_url(); ?>';

            window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        lightbox.option({
            'maxHeight': 720,
        })


    </script>
