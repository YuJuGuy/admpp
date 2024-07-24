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
            height: 100vh; /* Making sure the container takes the full viewport height */
        }

        .scroll-text {
            font-size: 24px;
            transition: transform 100ms ease;
            will-change: transform;
            max-width: 80%;
        }
        .scroll-text h3{
            color: #067BAD;
        }

        .introsection{
            height: 100vh;
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

        .who-we-are .who-we-are-img-container, .who-we-are .rich-text {
            transition: transform 0.5s ease;
            will-change: transform;
            width: 45%;
        }


        .who-we-are .rich-text{
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
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 130vh;
            overflow: hidden;
            position: relative;
            padding: 100px 0px;
        }

        @media screen and (max-width: 768px) {
            .who-we-are {
                flex-direction: column;
            }
            .who-we-are .who-we-are-img-container, .who-we-are .rich-text {
                width: 100% !important;
                padding: 0px !important;
            }
        }

        .rich-text {
            font-size: 18px;
            line-height: 1.6;
        }
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
            <div class="who-we-are-img-container">
            <img src="<?php echo base_url('/static/about/1.png')?>" alt="Test Image">
            </div>
            <div class="rich-text">
                <h3>نحن شركة ADMPP، مطبعة سعودية رائدة في تقديم حلول الطباعة والتغليف المبتكرة. نلتزم بتقديم أعلى معايير الجودة والإبداع لتلبية احتياجات عملائنا وتجاوز توقعاتهم، من خلال توفير خدمات متكاملة تضمن رضى كامل وتحقيق قيمة مضافة لكل مشروع.</h3>
            </div>
        </section>
    
        <div class="scroll-container">
            <div class="scroll-text">
                <h3>نحن نستمر بالابتكار والإبداع في مجال الطباعة والتغليف، ونعكس ذلك من خلال تقديم حلول مبتكرة واستراتيجيات متقدمة. نعمل على تمكين العلامات التجارية من التواصل بفعالية مع السوق والجمهور المستهدف، مما يعزز تواجدهم ويساهم في تحقيق أهدافهم التسويكية والترويجية.</h3>
            </div>
        </div>
    </div>

    <script>
        
        document.addEventListener('DOMContentLoaded', () => {
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
        });

        const whoWeAreSection = document.querySelector('.who-we-are');
            const imageElement = document.querySelector('.who-we-are-img-container');
            const richTextElement = whoWeAreSection.querySelector('.rich-text');
            const whoWeAreTop = whoWeAreSection.getBoundingClientRect().top + window.scrollY;
            const tuningOffset = 600; // Adjust this value to start the scrolling slightly earlier or later

            function scrollHandler() {
                const scrollTop = window.scrollY;
                const containerHeight = whoWeAreSection.offsetHeight;
                const windowHeight = window.innerHeight;

                const scrollStart = whoWeAreTop - windowHeight + tuningOffset;
                const scrollEnd = whoWeAreTop + containerHeight;
                const maxScroll = scrollEnd - scrollStart;

                if (scrollTop >= scrollStart && scrollTop <= scrollEnd) {
                    const scrollProgress = (scrollTop - scrollStart) / maxScroll;
                    const translateYValue = scrollProgress * 50;
                    if (window.innerWidth <= 768) {
                        imageElement.style.transform = `translateY(-${translateYValue}%)`;
                        richTextElement.style.transform = `translateY(-${translateYValue}%)`;
                    }
                    else{
                        imageElement.style.transform = `translateY(${translateYValue}%)`;
                        richTextElement.style.transform = `translateY(-${translateYValue}%)`;
                    }
                    
                }
                

            }

        document.addEventListener('scroll', scrollHandler);
        document.addEventListener('DOMContentLoaded', () => {
            const scrollText = document.querySelector('.scroll-text');
            const scrollContainer = document.querySelector('.scroll-container');
            const scrollContainerTop = scrollContainer.getBoundingClientRect().top + window.scrollY;
            
            const tuningOffset = 300; // Adjust this value to start the scrolling slightly earlier or later
            
            function scrollHandler() {
                const scrollTop = window.scrollY;
                const containerHeight = scrollContainer.offsetHeight;
                const windowHeight = window.innerHeight;

                const scrollStart = scrollContainerTop - windowHeight + tuningOffset;
                const scrollEnd = scrollContainerTop + containerHeight;
                const maxScroll = scrollEnd - scrollStart;

                if (scrollTop >= scrollStart && scrollTop <= scrollEnd) {
                    const translateXValue = ((scrollTop - scrollStart) / maxScroll) * 100;
                    scrollText.style.transform = `translateX(-${translateXValue}%)`;
                }
            }

            document.addEventListener('scroll', scrollHandler);
        });
    </script>
</body>
</html>
