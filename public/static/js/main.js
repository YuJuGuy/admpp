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
    const whoWeAreText = document.querySelector('.who-we-are-text');
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
                whoWeAreText.style.transform = `translateY(-${translateYValue * 5}%)`;
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
    const windowHeight = window.innerHeight;
    function getScrollTextTuningOffset() {
        return window.innerWidth <= 768 ? 400 : 300; // Adjust values as needed
    }
    let scrollTextTuningOffset = getScrollTextTuningOffset();


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