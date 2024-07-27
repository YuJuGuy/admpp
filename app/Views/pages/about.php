<!DOCTYPE html>
<html lang="en">
<head>
    <title>من نحن</title>
    <style>
    @import url('https://fonts.cdnfonts.com/css/samudera');

        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            margin: 0;
            padding: 0;
            height: 200vh; /* Ensuring the page is scrollable */
        }

        .scroll-container {
            position: relative;
            width: 100%;
            display: flex;
            align-items: right;
            justify-content: right;
            overflow: hidden;
            height: 50vh; /* Making sure the container takes the full viewport height */
        }

        .scroll-text {
            
            transition: transform 100ms ease;
            will-change: transform;
            max-width: 80%;
            height: fit-content;
        }
        .scroll-text h2{
            font-size: 30px;
            color: #067BAD;
        }

        .introsection{
            background-color: #fff;
        }
        .about-container {
            min-height: 75vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }


        .about-text{
            display: flex;
            flex-direction: column;
            width: 75%;
        }

        .about-text h2{
            font-size: 40px !important;
        }
        @media screen and (max-width: 768px) {
            .about-text h2{
                font-size: 30px !important;
            }
            
        }

        .text-eng{
            font-family: 'Samudera', sans-serif;
            color: #067BAD;
        }
        .second-text{
            margin: 0px 50px 0px 0px;
        }

        .third-text, .fourth-text{
            margin: 0px 80px 0px 0px;
        }

        .about-text div {
            transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1), margin 0.5s cubic-bezier(0.25, 1, 0.5, 1);
        }


        @media screen and (max-width: 768px) {
            .who-we-are{
                flex-direction: column;
            }
            .who-we-are .who-we-are-img-container, .who-we-are .rich-text {
                width: 100% !important;
                padding: 0px !important;
            }
            
        }

        .who-we-are .who-we-are-img-container {
            transition: transform 0.5s ease;
            will-change: transform;
        }

        .who-we-are .rich-container{
            display: flex;
            align-items: center;
            background-image: url('<?php echo base_url('/static/about/color.png')?>');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            
        } 

        .rich-text{
            transition: transform 0.5s ease;
            will-change: transform;
        }


        .who-we-are .rich-text{
            align-self: center;
            padding: 0px 50px;
            font-size: 24px;   
        }

        .who-we-are-img-container {
            position: relative;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden; /* Keeps content within bounds */
            height: 600px;
            border-radius: 10px; /* Slightly rounded corners */
        }
        
 

        .who-we-are img {
            height: 100%;
            width: auto;
            border-radius: 10px; /* Slightly rounded corners */
        }

        .who-we-are {
            background-color: #fff;
            display: flex;
            flex-direction: row;
            min-height: 100vh;
            overflow: hidden;
            position: relative;
            padding: 100px 0px;
        }

        @media screen and (max-width: 768px) {
            .who-we-are {
                align-items: center;
                flex-direction: column;
                padding: 80px 1rem !important;

            }
            .who-we-are .who-we-are-img-container, .who-we-are .rich-text {
                width: 100% !important;
            }

            .who-we-are-img-container{
                transform: translateY(10%);
            }
        }

        .rich-text {
            color: #151515;
            font-size: 18px;
            line-height: 1.6;
        }

        .img-side, .rich-container {
            width: 50%; /* Ensure content containers fill the column width */
        }
        @media screen and (max-width: 768px) {
            .img-side, .rich-container {
                width: 100% !important;
            }
            
        }



        .who-we-are-text {
            position: absolute;
            text-align: center;
            right: 25%; /* Center horizontally */
            transform: translateX(-50%); /* Center horizontally */
            background-color: #fff; /* Optional: background color with transparency */
            padding: 10px 50px; /* Adjust padding as needed */
            border-radius: 5px; /* Slightly rounded corners */
            z-index: 999;
            width: auto; /* Change width to auto to adapt to content */
        }

        /* Ensure responsiveness and proper positioning on smaller screens */
        @media screen and (max-width: 768px) {
            .who-we-are-text {
                width: 300px;
                position: absolute;
                bottom: 50%;
                transform: none;
            }
        }
                    
                

        .who-we-are-text h2{
            font-size: 70px;
            font-weight: bold;
        }
        @media screen and (max-width: 768px) {
            .who-we-are-text h2{
                font-size: 40px;
            }
            
        }

        .numbers {
            padding: 5rem 1rem;
            background: #f8f9fa;
            text-align: center;
            background-color:#fff;

        }
        .numbers .number {
            font-size: 36px;
            font-weight: bold;
        }
        .numbers h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }


        .facts{
            width: 85%;
            background-color: #f7f7f7;
            padding: 2rem;
            border-radius: 10px;
            opacity: 0; /* Start hidden */
            transition: opacity 1s ease-in-out;
        }
        @media screen and (max-width: 768px) {
            .facts{
                width: 100%;
            }
            .accordion-container{
                width: 100% !important;
            }
            
        }
        

        .numcon{
            border-radius: 10px;
            padding: 20px;
            transition: background-color 0.5s ease;
        }

        .numcon:hover{
            background-color: #fff;
            
        }

        .facts h2{
            font-weight: bold;
        }

        .accordionsection{
            padding: 5rem 0;
            background-color: #fff;
        }

        .accordion {
            display: flex;
            background-color: #fff;
            border-radius: 10px;
            flex-direction: column;
            gap: 5px;

        }
        .accordion-container{
            width: 85%;
            padding: 1rem;

        }

        .impact-section {
    display: flex;
    min-height: 70vh;
    background-color: #fff;
}

.impact {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: row;
    width: 100%;
}
@media screen and (max-width: 768px) {
    .impact {
        flex-direction: column;
        text-align: center;
    }
    .tdlogo-container, .impact-text {
        width: 100% !important;
        padding: 2rem !important;
    }
    
    
    
}

.tdlogo-container {
    width: 20%;
    perspective: 1000px; /* Needed for 3D effect */
    display: flex;
    justify-content: center;
    align-items: center;
}


.tdlogo-container img {
    border-radius: 10px;

    width: 100%;
    transition: transform 0.2s ease-out; /* Smooth transformation */
    transform-style: preserve-3d;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Initial shadow */
    transform: translateX(var(--translateX)) translateY(var(--translateY)) rotateX(var(--rotateX)) rotateY(var(--rotateY));
}

.impact-text{
    width: 40%;
    padding: 0px 60px
}

.impact-text h2{
    text-align: center;
    font-size:35px;
    font-weight: bold;
}

.impact-text p{
    font-size: 20px;
    font-weight: bold;
}

.text-section{
    background-color: #fff;
    padding: 250px 0px 100px 0px;
}

.gallery-section{
    background-color: #fff;
    padding: 100px 0px;
}
.gallery-container{
    display: flex;
    flex-direction: row;
    direction: rtl;
    overflow: hidden;
    padding: 100px 0px;
}

.right-gallery{
    width: 30%;
    display: flex;
    flex-direction: column;
    
}

.left-gallery{
    width: 40%;
    display: flex;
    flex-direction: column;
}

@media screen and (max-width: 768px) {
    .gallery-container{
        flex-direction: column;
    }
    .right-gallery, .left-gallery{
        width: 100% !important;
    }
    .gallery-item{
        padding: 1rem !important;
    }
    
}

.right-gallery, .left-gallery{
    transition: transform 0.5s ease;
    will-change: transform;
    overflow: hidden;
}

.gallery-item{
    padding: 0 20px 20px 0;
    width: 100%;
}
.gallery-item img{
    width: 100%;
    border-radius: 10px;
}
.partnerlogo{
    padding: 15px;
    margin-bottom: 40px !important;
    
}

.partnerlogo img{
    width: 100%;
    filter: grayscale(100%);    
    transition: filter 0.5s ease;
}

.partnerlogo:hover img{
    filter: grayscale(0%);
}
.partners-section{
    padding: 100px 0px;
    direction: ltr;
}

.partners-container{
    width: 85%;
    padding: 0 4rem;
}
@media screen and (max-width: 768px) {
    .partners-container{
        width: 100%;
        padding: 0 1rem;
    }
    
}

.partners-title{
    direction: rtl;
    margin-bottom: 50px;
}

.ptitle{
    width: 35%;
    text-align: center;

}
@media screen and (max-width: 768px) {
    .ptitle{
        width: 100% !important;
    }
    
}

.ptitle h2{
    font-size: 55px;
    font-weight: bold;
}
    </style>


    </style>
</head>
<body>
<div class="content-container">
        <section class="introsection">
            <div class="about-container">
                <div class="about-text">
                    <div class="first-text">
                        <h2>ماذا يعني؟</h2>
                    </div>
                    <div class="second-text">
                        <h2 class="text-eng">ADMPP—</h2>
                    </div>
                    <div class="third-text">
                        <h2>الافــــضل بالطباعة والتغليف</h2>
                    </div>
                    <div class="fourth-text">
                        <h2 class="text-eng">—JUST PRINT</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="who-we-are">
            <div class="img-side">

            <div class="who-we-are-img-container">
 
            <img src="<?php echo base_url('/static/about/1.png')?>" alt="Test Image">
            </div>
            <div class="who-we-are-text rounded">
                <h2>من نحن</h2>
            </div>
            </div>
            <div class="rich-container">
            <div class="rich-text">
                <h3>نحن شركة ADMPP، مطبعة سعودية رائدة في تقديم حلول الطباعة والتغليف المبتكرة. نلتزم بتقديم أعلى معايير الجودة والإبداع لتلبية احتياجات عملائنا وتجاوز توقعاتهم، من خلال توفير خدمات متكاملة تضمن رضى كامل وتحقيق قيمة مضافة لكل مشروع.</h3>
            </div>
            </div>
        </section>
        <section class = "accordionsection">
            <div class="accordion-container"> 
            <div class="accordion">
                    <div style="background-color: #f7f7f7;" class="accordion-item rounded ">
                        <button  class="accordion-about rounded" id="accordion-button" aria-expanded="false">
                            <span style="font-size: 35px;" class="accordion-title">رسالتنا</span>
                            <span style="left: 1em; top:30px;"class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p style="font-size: 20px; ">لأن نجاح العميل يُعد نجاح لنا ، وضعنا الاحترافية أمام أعيننا من خلال الكفاءات و المكائن المتخصصة , الجودة والسعر المناسب مع الالتزام بالوقت ، وخدمات ما بعد التنفيذ.</p>
                        </div>
                    </div>
                    <div style="background-color: #f7f7f7;" class="accordion-item rounded">
                        <button  class="accordion-about rounded" id="accordion-button" aria-expanded="false">
                            <span style="font-size: 35px;" class="accordion-title">أهدافنا</span>
                            <span style="left: 1em; top:30px;"class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p style="font-size: 20px; ">الحرص على تحقيق أنظمة الجودة المحلية والعالمية في العمل ، و توثيق علاقتنا مع العملاء ومحاولة الظهور بنتيجة تفوق توقعاتهم لنيل رضاهم ونجاحهم.</p>
                        </div>
                    </div>
                    <div style="background-color: #f7f7f7;"  class="accordion-item rounded">
                        <button  class="accordion-about rounded" id="accordion-button" aria-expanded="false">
                            <span style="font-size: 35px;" class="accordion-title">رؤيتنا</span>
                            <span style="left: 1em; top:30px;"class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p style="font-size: 20px; ">أن نكون الخيار الأفضل والرائد في تقديم منتجات طباعة وتغليف مبتكرة وعالية الجودة، تتجاوز توقعات العميل من خلال الالتزام بالتميز، والإبداع المستمر، والخدمة الفائقة التي تلبي جميع احتياجاتهم.</p>
                        </div>
                    </div>
            </div>
            </div>

        </section>


        <section class="numbers" >
            <div class="facts" id="numbers">
            <div class="title">
                <h2>الأرقام و الإحصائيات</h2>
            </div>
            <div class="facts-container row">
                <div class="numcon col-md-3">
                    <div class="number" data-target="450">0</div>
                    <div>العملاء</div>
                </div>
                <div class="numcon col-md-3">
                    <div class="number" data-target="120000">0</div>
                    <div>المطبوعات اليومية</div>
                </div>
                <div class="numcon col-md-3">
                    <div class="number" data-target="1200">0</div>
                    <div>المشاريع</div>
                </div>
                <div class="numcon col-md-3">
                    <div class="number" data-target="17">0</div>
                    <div>سنوات الخبرة</div>
                </div>
            </div>
        </section>


        <section class="impact-section">
            <div class="impact">
            <div class ="impact-text">
                <h2>تأثير التغليف بالتسويق</h2>
            </div>
            <div class="tdlogo-container">
                <img src="<?php echo base_url('/static/about/logo.png')?>" alt="Test Image">
            </div>
            <div class ="impact-text">
                <p>يعتبر التغليف أحد العناصر الأساسية في استراتيجية التسويق لأي منتج، حيث يلعب دورًا كبيرًا في جذب انتباه المستهلكين وإبراز هوية العلامة التجارية. تصميم التغليف المبتكر والجذاب يمكن أن يحفز العملاء على اختيار المنتج من بين العديد من المنتجات المنافسة. كما أن  التغليف ليس مجرد وسيلة لحماية المنتج، بل هو أداة تسويقية قوية تسهم في نجاح المنتج وجذب المزيد من العملاء.
                </p>
            </div>
            </div>
        </section>

        <section class = "gallery-section">
            <div class="gallery-container">
                <div class="right-gallery">
                    <div class="gallery-item">
                    <img src="<?php echo base_url('/static/about/g1.png')?>" alt="Test Image">
                    </div>
                    <div class="gallery-item">
                    <img src="<?php echo base_url('/static/about/g2.png')?>" alt="Test Image">
                    </div>
                </div>
                <div class="left-gallery">
                    <div class="gallery-item">
                    <img src="<?php echo base_url('/static/about/g3.png')?>" alt="Test Image">
                    </div>
                    <div class="gallery-item">
                    <img src="<?php echo base_url('/static/about/g4.png')?>" alt="Test Image">
                    </div>
                </div>
                
            </div>
        </section>

        <section class="text-section">
            <div class="scroll-container">
                <div class="scroll-text">
                    <h2>نحن نستمر بالابتكار والإبداع في مجال الطباعة والتغليف، ونعكس ذلك من خلال تقديم حلول مبتكرة واستراتيجيات متقدمة. نعمل على تمكين العلامات التجارية من التواصل بفعالية مع السوق والجمهور المستهدف، مما يعزز تواجدهم ويساهم في تحقيق أهدافهم التسويقية والترويجية.</h2>
                </div>
            </div>

        </section>

        <section class="partners-section">
        <div class ="partners-title">
            <div class="ptitle">
                <h2>شركاؤنا</h2>
            </div>
            </div>
        <div class="partners-container">
            <div class="row row-cols-2 row-cols-lg-5">
                <?php
                // Base URL for SVGs
                $base_url = base_url('/static/partners-svg/');
                
                // Loop through SVG files
                for ($i = 1; $i <= 35; $i++) {
                    $svg_file = $base_url . $i . '.svg';
                    echo '<div class="partnerlogo col-6 col-md-2 mb-4">';
                    echo '<img src="' . $svg_file . '" alt="Partner Logo" class="partner-logo">';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>



        </div>



        <script>
document.addEventListener('DOMContentLoaded', () => {
    // Logo tilt effect
    const logoContainer = document.querySelector('.tdlogo-container img');
    let isMouseMoving = false;

    let targetTranslateX = 0;
    let targetTranslateY = 0;
    let targetRotateX = 0;
    let targetRotateY = 0;

    document.addEventListener('mousemove', (e) => {
        const { clientX, clientY } = e;
        const { width, height, top, left } = logoContainer.getBoundingClientRect();

        const centerX = left + width / 2;
        const centerY = top + height / 2;

        const deltaX = clientX - centerX;
        const deltaY = clientY - centerY;

        targetRotateX = Math.min(Math.max((deltaY / height) * -20, -20), 20);
        targetRotateY = Math.min(Math.max((deltaX / width) * 20, -20), 20);
        targetTranslateX = Math.min(Math.max((deltaX / width) * 15, -15), 15);
        targetTranslateY = Math.min(Math.max((deltaY / height) * 15, -15), 15);

        if (!isMouseMoving) {
            isMouseMoving = true;
            updateLogoTransform();
        }
    });

    function updateLogoTransform() {
        if (!isMouseMoving) return;

        let currentTranslateX = parseFloat(getComputedStyle(logoContainer).getPropertyValue('--translateX')) || 0;
        let currentTranslateY = parseFloat(getComputedStyle(logoContainer).getPropertyValue('--translateY')) || 0;
        let currentRotateX = parseFloat(getComputedStyle(logoContainer).getPropertyValue('--rotateX')) || 0;
        let currentRotateY = parseFloat(getComputedStyle(logoContainer).getPropertyValue('--rotateY')) || 0;

        const easingFactor = 0.1;

        currentTranslateX += (targetTranslateX - currentTranslateX) * easingFactor;
        currentTranslateY += (targetTranslateY - currentTranslateY) * easingFactor;
        currentRotateX += (targetRotateX - currentRotateX) * easingFactor;
        currentRotateY += (targetRotateY - currentRotateY) * easingFactor;

        logoContainer.style.setProperty('--translateX', `${currentTranslateX}px`);
        logoContainer.style.setProperty('--translateY', `${currentTranslateY}px`);
        logoContainer.style.setProperty('--rotateX', `${currentRotateX}deg`);
        logoContainer.style.setProperty('--rotateY', `${currentRotateY}deg`);

        if (Math.abs(targetTranslateX - currentTranslateX) > 0.1 ||
            Math.abs(targetTranslateY - currentTranslateY) > 0.1 ||
            Math.abs(targetRotateX - currentRotateX) > 0.1 ||
            Math.abs(targetRotateY - currentRotateY) > 0.1) {
            requestAnimationFrame(updateLogoTransform);
        } else {
            isMouseMoving = false;
        }
    }

    logoContainer.parentElement.addEventListener('mouseleave', () => {
        targetTranslateX = 0;
        targetTranslateY = 0;
        targetRotateX = 0;
        targetRotateY = 0;
        if (!isMouseMoving) {
            isMouseMoving = true;
            updateLogoTransform();
        }
    });

    // Accordion effect
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

    // Number counting effect
    const numbersSection = document.getElementById('numbers');
    const numbers = document.querySelectorAll('.number');

    function isElementInViewport(el) {
        const rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    function formatNumber(number) {
        if (number >= 1000) {
            return `+${Math.floor(number / 1000)} الف`; // Format large numbers with "k"
        }
        return `+${Math.floor(number)}`; // Format smaller numbers
    }

    function startCounting() {
        numbers.forEach(number => {
            let target = +number.getAttribute('data-target');
            let count = 0;

            function updateNumber() {
                if (count < target) {
                    count += target / 100; // Increment value, adjust for smooth animation
                    if (count > target) count = target; // Avoid overshooting
                    number.textContent = formatNumber(count);
                    requestAnimationFrame(updateNumber); // Smooth animation frame
                } else {
                    number.textContent = formatNumber(target); // Ensure target value is set
                }
            }

            updateNumber();
        });
    }

    function handleScroll() {
        if (isElementInViewport(numbersSection)) {
            numbersSection.style.opacity = 1;
            window.removeEventListener('scroll', handleScroll); // Stop checking after animation starts
            startCounting();
        }
    }

    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Check on initial load if already in viewport

    // About text movement effect
    const aboutText = document.querySelector('.about-text');
    const textElements = document.querySelectorAll('.about-text > div');

    aboutText.addEventListener('mouseenter', () => {
        document.addEventListener('mousemove', moveHandler);
    });

    aboutText.addEventListener('mouseleave', () => {
        document.removeEventListener('mousemove', moveHandler);
        textElements.forEach((textElement, index) => {
            setTimeout(() => {
                textElement.style.transform = 'translate(0, 0)';
                textElement.style.marginTop = '0';
            }, index * 100); // Adding offset delay for return
        });
    });

    function moveHandler(e) {
        const rect = aboutText.getBoundingClientRect();
        const offsetX = (e.clientX - rect.left - rect.width / 2) / 10;
        const offsetY = (e.clientY - rect.top - rect.height / 2) / 10;

        textElements.forEach((textElement, index) => {
            setTimeout(() => {
                textElement.style.transform = `translate(${offsetX}px, ${offsetY}px)`;
                if (offsetY > 0) {
                    textElement.style.marginTop = `${index * 5}px`; // Adding margin when moving down
                } else {
                    textElement.style.marginTop = '0';
                }
            }, index * 100); // Adding offset delay for movement
        });
    }

    // Scroll handler for the who-we-are section
    const whoWeAreSection = document.querySelector('.who-we-are');
    const imageElement = document.querySelector('.who-we-are-img-container');
    const richTextElement = whoWeAreSection.querySelector('.rich-text');
    const whoWeAreTop = whoWeAreSection.getBoundingClientRect().top + window.scrollY;
    const whoWeAreTuningOffset = 600;

    function whoWeAreScrollHandler() {
        const scrollTop = window.scrollY;
        const containerHeight = whoWeAreSection.offsetHeight;
        const windowHeight = window.innerHeight;

        const scrollStart = whoWeAreTop - windowHeight + whoWeAreTuningOffset;
        const scrollEnd = whoWeAreTop + containerHeight;
        const maxScroll = scrollEnd - scrollStart;

        if (scrollTop >= scrollStart && scrollTop <= scrollEnd) {
            const scrollProgress = (scrollTop - scrollStart) / maxScroll;
            const translateYValue = Math.min(scrollProgress * 50);
            if (window.innerWidth <= 768) {
                imageElement.style.transform = `translateY(-${translateYValue}%)`;
                richTextElement.style.transform = `translateY(-${translateYValue}%)`;
            } else {
                imageElement.style.transform = `translateY(${translateYValue}%)`;
                richTextElement.style.transform = `translateY(-${translateYValue}%)`;
            }
        }
    }

    document.addEventListener('scroll', whoWeAreScrollHandler);

    // Scroll handler for the gallery
    const gallerySection = document.querySelector('.gallery-section');
    const rightGallery = document.querySelector('.right-gallery');
    const leftGallery = gallerySection.querySelector('.left-gallery');
    const galleryTop = gallerySection.getBoundingClientRect().top + window.scrollY;
    const galleryTuningOffset = 600;

    function galleryScrollHandler() {
        const scrollTop = window.scrollY;
        const containerHeight = gallerySection.offsetHeight;
        const windowHeight = window.innerHeight;

        const scrollStart = galleryTop - windowHeight + galleryTuningOffset;
        const scrollEnd = galleryTop + containerHeight;
        const maxScroll = scrollEnd - scrollStart;

        if (scrollTop >= scrollStart && scrollTop <= scrollEnd) {
            const scrollProgress = (scrollTop - scrollStart) / maxScroll;
            const translateYValue = Math.min(scrollProgress * 50);
            if (window.innerWidth <= 768) {
                rightGallery.style.transform = `translateY(-${translateYValue}%)`;
                leftGallery.style.transform = `translateY(-${translateYValue}%)`;
            } else {
                rightGallery.style.transform = `translateY(${translateYValue}%)`;
                leftGallery.style.transform = `translateY(-${translateYValue}%)`;
            }
        }
    }

    document.addEventListener('scroll', galleryScrollHandler);

    // Scroll handler for the scroll text
    const scrollText = document.querySelector('.scroll-text');
    const scrollContainer = document.querySelector('.scroll-container');
    const scrollContainerTop = scrollContainer.getBoundingClientRect().top + window.scrollY;
    const scrollTextTuningOffset = 300;

    function scrollTextHandler() {
        const scrollTop = window.scrollY;
        const containerHeight = scrollContainer.offsetHeight;
        const windowHeight = window.innerHeight;

        const scrollStart = scrollContainerTop - windowHeight + scrollTextTuningOffset;
        const scrollEnd = scrollContainerTop + containerHeight;
        const maxScroll = scrollEnd - scrollStart;

        if (scrollTop >= scrollStart && scrollTop <= scrollEnd) {
            const translateXValue = ((scrollTop - scrollStart) / maxScroll) * 75;
            scrollText.style.transform = `translateX(-${translateXValue}%)`;
        }
    }

    document.addEventListener('scroll', scrollTextHandler);
});
</script>
</body>
</html>
