<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تواصل معنا</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .contactbanner {
            width: 100%;
            position: relative;
            margin-bottom: 80px;
        }
        .contactbanner img {
            width: 100%;
            height: auto;
            display: block;
        }
        .content-container {
            padding: 20px;
            position: relative;
        }
        .contact-container {
            align-self: center;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            direction: rtl;
            margin: -300px auto 0;
            max-width: 1000px;
            position: relative;
            z-index: 10;
        }
        @media screen and (max-width: 824px) {
            .contact-container {
                position: relative;
                display: flex;
                margin-top: 40px;
                margin: -400px 15px 0 !important;
            }
            
        }
        .title {
            margin-bottom: 20px;
        }
        .contact-form {
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .contact-form label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        .contact-form input,
        .contact-form textarea,
        .contact-form select {
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-bottom: 1px solid #ccc !important;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }
        .contact-form input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .contact-form input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            z-index: 999;
            position: absolute;
            top: 40%;
        }
        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .form-container {
            display: flex;
            flex-direction: column;
        }
        .method-container {
            display: flex;
            background-color: #067BAD;
            color: white;
            padding: 20px;
            flex-direction: column;
        }
        @media screen and (max-width: 824px) {
            .method-container {
            }
            
        }
        .info {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 20px;
        }
        .info p{
            font-weight: bold;
            margin: 0 !important;
        }
        .social-icons-contact {
            display: flex;
            gap: 10px;
        }
        .social-icons-contact img {
            padding: 10px;
            filter: brightness(0) invert(1);
        }
        @media (min-width: 824px) {
            .form-container {
                flex-direction: row;
            }
            .contact-form {
                min-width: 600px;
                flex: 1;
            }
            .method-container {
                flex: 1;
                padding: 30px;
            }

        
        }
    </style>
</head>
<body>
<div id="responseMessage" class="message" style="display:none;"></div>

<div class="locationbanner">
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
                    <p>info@admpp.com</p>
                </div>
                <div class="social-icons-contact align-self-center">
                    <a href="https://wa.me/1234567890" target="_blank">
                        <img src="<?= base_url('/static/svgs/wa.svg'); ?>" alt="whatsapp">
                    </a>
                    <a href="https://www.facebook.com/yourpage" target="_blank">
                        <img src="<?= base_url('/static/svgs/fb.svg'); ?>" alt="facebook">
                    </a>
                    <a href="https://twitter.com/yourprofile" target="_blank">
                        <img src="<?= base_url('/static/svgs/x.svg'); ?>" alt="twitter">
                    </a>
                    <a href="https://www.instagram.com/yourprofile" target="_blank">
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
        if (!/^\d{10}$/.test(contactInfo)) {
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
