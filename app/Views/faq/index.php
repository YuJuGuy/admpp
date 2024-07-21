<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الاسئلة الشائعة</title>
    <style>
        .container {
            margin: 0 auto;
            padding: 4rem;
            direction: rtl;
            text-align: right;
        }
        .accordion-item {
            border: 0;
        }
        .accordion .accordion-item {
            border-bottom: 1px solid #e5e5e5;
        }
        .accordion .accordion-item button[aria-expanded='true'] {
            border-bottom: 1px solid #03b5d2;
        }
        .accordion button {
            position: relative;
            display: flex;
            flex-direction: row;
            text-align: right;
            width: 100%;
            padding: 1em 1.5em 1em 0;
            color: #7288a2;
            justify-content: space-between;
            font-size: 1.15rem;
            font-weight: 400;
            gap: 5px;
            border: none;
            background: none;
            outline: none;
        }
        .accordion button:hover,
        .accordion button:focus {
            cursor: pointer;
            color: #03b5d2;
        }
        .accordion button:hover::after,
        .accordion button:focus::after {
            cursor: pointer;
            color: #03b5d2;
            border: 1px solid #03b5d2;
        }
        .accordion button .icon {
            position: relative;
            display: block;
            width: 22px;
            height: 22px;
        }
        .accordion button .icon::before {
            display: block;
            position: absolute;
            content: '';
            top: 9px;
            left: 5px;
            width: 10px;
            height: 2px;
            background: currentColor;
        }
        .accordion button .icon::after {
            display: block;
            position: absolute;
            content: '';
            top: 5px;
            left: 9px;
            width: 2px;
            height: 10px;
            background: blue;
        }
        .accordion button[aria-expanded='true'] {
            color: #03b5d2;
        }
        .accordion button[aria-expanded='true'] .icon::after {
            width: 0;
        }
        .accordion button[aria-expanded='true'] + .accordion-content {
            opacity: 1;
            max-height: 14em;
            transition: all 200ms linear;
            will-change: opacity, max-height;
        }
        .accordion{
          margin-bottom: 4rem;  
        }

        .container h2{
          font-weight: bold;
        }
        .accordion .accordion-content {
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            transition: opacity 200ms linear, max-height 200ms linear;
            will-change: opacity, max-height;
        }
        .accordion .accordion-content p {
            font-size: 1rem;
            font-weight: 300;
            padding: 1em 1.5em 1em 0;
            margin: 2em 0;
        }
        .categorytitle{
          display: flex;
          flex-direction: row; 
          gap:10px;
          font-size: xx-large;
        }

        .contact-us{
            display: flex;
            justify-content: center;
            flex-direction: column;
            background-color: #f5f5f5;
            padding: 4rem;
        }
    </style>
</head>
<body>
<div class="content-container">
    <div class="title">
        <h1>الاسئلة الشائعة</h1>
    </div>
    <div class="container">
        <?php foreach ($faqData as $category => $faqs): ?>
            <div class = "categorytitle">
            <h2><?php echo htmlspecialchars($category); ?></h2>
            <?php if (!empty($faqs[0]['icon'])): ?>
            <?php echo $faqs[0]['icon']; ?>
            <?php endif; ?>
        </div>
            <div class="accordion">
                <?php foreach ($faqs as $index => $faq): ?>
                    <div class="accordion-item">
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
    document.addEventListener('DOMContentLoaded', function() {
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
    });
</script>
</body>
</html>
