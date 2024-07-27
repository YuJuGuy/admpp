<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الاسئلة الشائعة</title>
</head>
<body>
<div class="content-container">
    <div class="title">
        <h1>الاسئلة الشائعة</h1>
    </div>
    <div class="containerFAQ">
        <?php foreach ($faqData as $category => $faqs): ?>
            <div class = "categorytitle">
            <?php if (!empty($faqs[0]['icon'])): ?>
            <?php echo $faqs[0]['icon']; ?>
            <?php endif; ?>
            <h2><?php echo htmlspecialchars($category); ?></h2>

        </div>
            <div class="accordion">
                <?php foreach ($faqs as $index => $faq): ?>
                    <div class="accordion-item" style="border-bottom: 1px solid #e5e5e5 !important;">
                        <button id="accordion-button-<?php echo $index; ?>" aria-expanded="false">
                            <span class="accordion-title"><?php echo htmlspecialchars($faq['question']); ?></span>
                            <span class="icon" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                            <p><?php echo htmlspecialchars($faq['answer']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="contact-us">
        <div class="title" style="text-align: center;">
            <h1>هل لديك سؤال آخر؟</h1>
        </div>
        <div class="button-container">
            <a href=<?= base_url('/contact');?> class="btn btn-primary" >تواصل معنا</a>
        </div>
    </div>
</div>
<script>
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
