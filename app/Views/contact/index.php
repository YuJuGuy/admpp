<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تواصل معنا</title>
    <style>

        .contact-container {
            width: 600px;
            align-self: center;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            
        }
        .title {
            margin-bottom: 20px;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
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
            border: 1px solid #ccc;
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
    </style>
</head>
<body>
<div class="content-container">
<div class="container d-flex justify-content-center">
<div class="contact-container">
    <div class="title text-center mt-4">
        <h1>تواصل معنا</h1>
    </div>
    
    <?php if (isset($validation)) : ?>
        <div class="message error">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <?php if (isset($success)) : ?>
        <div class="message success">
            <?= $success ?>
        </div>
    <?php endif; ?>

    <?php if (isset($error)) : ?>
        <div class="message error">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <div class="contact-form">
        <form action="<?php echo site_url('contact/submit'); ?>" method="post">
            <label for="name">الاسم:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">البريد الإلكتروني:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="message">الرسالة:</label>
            <textarea id="message" name="message" required></textarea><br>

            <label for="contact_method">طريقة التواصل:</label>
            <select id="contact_method" name="contact_method" required>
                <option value="email">البريد الإلكتروني</option>
                <option value="whatsapp">واتساب</option>
            </select><br>

            <input type="submit" value="إرسال">
        </form>
    </div>
</div>
</div>
</div>
</body>
</html>
