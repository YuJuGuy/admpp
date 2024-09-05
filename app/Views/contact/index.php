<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تواصل معنا</title>

</head>
<body>
<div id="responseMessage" class="message" style="display:none;"></div>

<div class="locationbanner">
    <div class="contact-title">
        <h1>خلينا على تواصل</h1>
        <p>ابقَ على اتصال دائم معنا، وسنكون هنا لتلبية <br />جميع احتياجاتك بكل سرعة وسهولة.</p>
    </div>

    <img src="<?= base_url('/static/banner/location.png'); ?>" alt="contact us">
</div>
<div data-aos="zoom-out-up" class="contact-container">
        <div class="form-container">
            <div class="contact-form">
                <form id="contactForm">
                    <label for="name">الاسم:</label>
                    <input type="text" id="name" name="name" required>
                    <label for="contact_method">طريقة التواصل:</label>
                    <select id="contact_method" name="contact_method" required>
                        <option value="whatsapp">واتساب</option>
                        <option value="email">البريد الإلكتروني</option>
                    </select>
                    <label id="contact_info_label" for="contact_info">رقم الهاتف:</label>
                    <input style="direction: ltr;" id="contact_info" name="contact_info" type="tel" required>
                    <label for="message">الرسالة:</label>
                    <textarea id="message" name="message" required></textarea>
                    <input type="submit" value="إرسال" style="background-color: #067BAD;">
                </form>
            </div>
            <div class="method-container">
                <div class="title">
                    <h2>تواصل معنا</h2>
                </div>
                <div class="info">
                <i class="fa-solid fa-location-dot"></i>

                    <p>المملكة العربية السعودية | الرياض | حـي الفيـصلية</p>
                </div>
                <div class="info">
                    <i class="fa-solid fa-phone"></i>
                    <p>0562243082</p>
                </div>
                <div class="info">
                <i class="fa-solid fa-phone"></i>
                    <p>0506262962</p>
                </div>
                <div class="info">
                    <i class="fa-solid fa-envelope"></i>
                    <p><a href="mailto:info@admpp.com">info@admpp.com</a></p>
                    </div>
                <div class="social-icons-contact align-self-center">
                <a href="https://wa.me/966562243082" target="_blank">
                <img src="<?= base_url('/static/svgs/wa.svg'); ?>" alt="whatsapp">
                    </a>
                    <a href="https://www.facebook.com/Admpp22" target="_blank">
                    <img src="<?= base_url('/static/svgs/fb.svg'); ?>" alt="facebook">
                    </a>
                    <a href="https://x.com/admpp22" target="_blank">
                    <img src="<?= base_url('/static/svgs/x.svg'); ?>" alt="twitter">
                    </a>
                    <a href="https://www.instagram.com/admpp22" target="_blank">
                    <img src="<?= base_url('/static/svgs/ig.svg'); ?>" alt="instagram">
                    </a>
                </div>
            </div>
        </div>
    </div>
<div class="content-container">
</div>
<script>
    document.getElementById('contact_method').addEventListener('change', function() {
    var contactMethod = document.getElementById('contact_method').value;
    var contactInfoInput = document.getElementById('contact_info');
    var contactInfoLabel = document.getElementById('contact_info_label');
    if (contactMethod === 'email') {
        contactInfoInput.type = 'email';
        contactInfoLabel.textContent = 'البريد الإلكتروني:';
    } else if (contactMethod === 'whatsapp') {
        contactInfoInput.type = 'text'; // Use text type for more control
        contactInfoLabel.textContent = 'رقم الهاتف:';
    }
});

document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();

    var contactMethod = document.getElementById('contact_method').value;
    var contactInfo = document.getElementById('contact_info').value;
    var responseMessage = document.getElementById('responseMessage');

    // Validate phone number for WhatsApp contact method
    if (contactMethod === 'whatsapp') {
        if (contactInfo.length !== 10) {
            responseMessage.style.display = 'block';
            responseMessage.textContent = 'رقم الهاتف يجب أن يتكون من 10 أرقام.';
            responseMessage.className = 'message error';
            setTimeout(function() {
                responseMessage.style.display = 'none';
            }, 5000);
            return;
        }
        if (!contactInfo.startsWith('05')) {
            responseMessage.style.display = 'block';
            responseMessage.textContent = 'رقم الهاتف يجب أن يبدأ بـ 05.';
            responseMessage.className = 'message error';
            setTimeout(function() {
                responseMessage.style.display = 'none';
            }, 5000);
            return;
        }
        if (!/^\d+$/.test(contactInfo)) {
            responseMessage.style.display = 'block';
            responseMessage.textContent = 'رقم الهاتف يجب أن يحتوي على 10 أرقام فقط.';
            responseMessage.className = 'message error';
            setTimeout(function() {
                responseMessage.style.display = 'none';
            }, 5000);
            return;
        }
    }

            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo site_url('contact/submit'); ?>', true);
            xhr.onload = function() {
                var responseMessage = document.getElementById('responseMessage');
                responseMessage.style.display = 'block';
                if (xhr.status === 200) {
                    responseMessage.textContent = 'تم الإرسال بنجاح!';
                    responseMessage.className = 'message success';
                } else {
                    responseMessage.textContent = 'حدث خطأ. حاول مرة أخرى.';
                    responseMessage.className = 'message error';
                }

                setTimeout(function() {
                    responseMessage.style.display = 'none';
                }, 5000);
            };

            xhr.onerror = function() {
                var responseMessage = document.getElementById('responseMessage');
                responseMessage.style.display = 'block';
                responseMessage.textContent = 'حدث خطأ. حاول مرة أخرى.';
                responseMessage.className = 'message error';

                setTimeout(function() {
                    responseMessage.style.display = 'none';
                }, 5000);
            };

            xhr.send(formData);
        });

        AOS.init({
            duration: 1000,
        });

        if (document.querySelector('.message')) {
            setTimeout(function() {
                document.querySelector('.message').style.display = 'none';
            }, 5000);
        }
    </script>
</body>
</html>
