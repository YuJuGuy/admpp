<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب تسعيرة</title>
</head>
<body>
    <div class="content-container">

        <div class="qcontainer">
            <h1 class="product-title" id="product-title">اختر منتجًا</h1>

            <div class="split-container">
                <div class="product-image-container">
                    <img id="product-image" src="" alt="Product Image">
                </div>

                <div class="quote-container">
                    <form method="post" action="<?= site_url('quote/submit') ?>" id="quote-form" enctype="multipart/form-data">
                    <select name="product" id="product-select"></select>
                    <button type="submit" class="submit-button">إرسال</button>
                    </form>
                    <div id="responseMessage" class="Quotemessage" style="display:none;"></div>
                    <?php if (isset($validation) && $validation->getErrors()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($validation->getErrors() as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

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



document.addEventListener('DOMContentLoaded', function() {
    fetch('product-config.json')
        .then(response => response.json())
        .then(data => {
            const productSelect = document.getElementById('product-select');
            const productImage = document.getElementById('product-image');
            const productTitle = document.getElementById('product-title');
            const quoteForm = document.getElementById('quote-form');

            let selectedProduct = data.products[0]; // Default selected product

            // Populate the select with product options
            data.products.forEach(product => {
                const option = document.createElement('option');
                option.value = product.id;
                option.textContent = product.name;
                option.dataset.image = product.image;
                productSelect.appendChild(option);
            });

            // Load the first product as default
            loadProductForm(selectedProduct);


            // Update form on product change
            productSelect.addEventListener('change', function () {
                selectedProduct = data.products.find(product => product.id === this.value); // Save selected product
                loadProductForm(selectedProduct);
            });

            function loadProductForm(product) {
                // Update the image and title
                productTitle.textContent = product.name;
                productImage.src = product.image;

                // Clear the existing form except the product select
                while (quoteForm.children.length > 1) {
                    quoteForm.removeChild(quoteForm.lastChild);
                }
                

                // Create a container for dimension fields
                let dimensionsRow = document.createElement('div');
                dimensionsRow.className = 'dimensions-row';

                // Generate the form fields
                product.fields.forEach(field => {
                    const fieldWrapper = document.createElement('div');
                    fieldWrapper.id = field.id;
                    fieldWrapper.style.marginBottom = '30px';

                    if (field.name === 'length' || field.name === 'width' || field.name === 'height') {
                        fieldWrapper.classList.add('dimension-field');
                    }

                    if (field.type !== 'button_select') {
                        const label = document.createElement('label');
                        label.textContent = field.label;
                        fieldWrapper.appendChild(label);
                    }

                    if (field.type === 'text' || field.type === 'number' || field.type === 'textarea') {
                        const input = document.createElement(field.type === 'textarea' ? 'textarea' : 'input');
                        input.type = field.type;
                        input.name = field.name;
                        fieldWrapper.appendChild(input);
                    } else if (field.type === 'button_select') {
                        // Create a container for the button options and check if there is a multiple true field
                        
                        const optionsContainer = document.createElement('div');
                        const optionLabel = document.createElement('label');
                        optionLabel.textContent = field.label;
                        fieldWrapper.appendChild(optionLabel);
                        optionsContainer.classList.add('options-container');

                        field.options.forEach(optionText => {
                            const button = document.createElement('div');
                            button.classList.add('option-button');
                            button.dataset.value = optionText;
                            button.textContent = optionText;
                            optionsContainer.appendChild(button);
                            
                            
                        
                        });

                        fieldWrapper.appendChild(optionsContainer);

                        // Add click event listener to the options container
                        optionsContainer.addEventListener('click', function(event) {
        const selectedButton = event.target.closest('.option-button');
        if (selectedButton) {
            if (field.multiple === 'true') {
                // Toggle the selected state for multiple selection
                selectedButton.classList.toggle('selected');
                const existingInput = quoteForm.querySelector(`input[name="${field.name}"][value="${selectedButton.dataset.value}"]`);
                if (selectedButton.classList.contains('selected')) {
                    // Add a hidden input if selected
                    if (!existingInput) {
                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = field.name;
                        hiddenInput.value = selectedButton.dataset.value;
                        quoteForm.appendChild(hiddenInput);
                    }
                } else {
                    // Remove the hidden input if deselected
                    if (existingInput) {
                        existingInput.remove();
                    }
                }
            } else {
                // Single selection logic
                optionsContainer.querySelectorAll('.option-button').forEach(button => {
                    button.classList.remove('selected');
                });

                selectedButton.classList.add('selected');

                // Remove existing hidden input and create a new one for single selection
                const existingInput = quoteForm.querySelector(`input[name="${field.name}"]`);
                if (existingInput) {
                    existingInput.remove();
                }
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = field.name;
                hiddenInput.value = selectedButton.dataset.value;
                quoteForm.appendChild(hiddenInput);
            }
        }
    });
                        if (field.name === 'lamination') {
                            optionsContainer.addEventListener('click', function(event) {
                                const selectedButton = event.target.closest('.option-button');
                                if (selectedButton) {
                                    // get the lamination faces field by id
                                    const laminationFacesField = document.getElementById('lamination-faces-field');
                                    // check if the selected button is 'بدون سلوفان'
                                    if (selectedButton.dataset.value === 'بدون سلوفان') {
                                        laminationFacesField.style.display = 'none';
                                        // Remove the lamination faces field value
                                        const laminationFacesInput = document.querySelector('input[name="lamination_faces"]');
                                        if (laminationFacesInput) {
                                            laminationFacesInput.remove();
                                            // remove selected class from the lamination faces buttons
                                            laminationFacesField.querySelectorAll('.option-button').forEach(button => {
                                                button.classList.remove('selected');
                                            });
                                        }
                                    } else {
                                        laminationFacesField.style.display = 'block';
                                    }
                                }
                            });
                        }


                    } else if (field.type === 'select') {
                        // Standard select dropdown handling
                        const select = document.createElement('select');
                        select.name = field.name;

                        field.options.forEach(optionText => {
                            const option = document.createElement('option');
                            option.value = optionText;
                            option.textContent = optionText;
                            select.appendChild(option);
                        });

                        // Handle visibility of 'lamination_faces' based on 'lamination' select value
            

                        fieldWrapper.appendChild(select);
                        // if it's file limit the upload to 5MB
                    }  else if (field.type === 'file') {
                        const input = document.createElement('input');
                        input.type = 'file';
                        input.name = field.name;

                        // Add a change event listener to check file size
                        input.addEventListener('change', function(event) {
                            const file = event.target.files[0];
                            if (file && file.size > 5 * 1024 * 1024) { // 5MB in bytes
                                alert('حجم الملف يتجاوز الحد المسموح به 5 ميجابايت. الرجاء تحميل ملف أصغر.');
                                event.target.value = ''; // Clear the file input
                            }
                        });

                        fieldWrapper.appendChild(input);
                    }



                    // Add dimension field class if applicable
                    if (field.name === 'length' || field.name === 'width' || field.name === 'height') {
                        // Ensure dimensions-row exists
                        let dimensionsRow = quoteForm.querySelector('.dimensions-row');
                        if (!dimensionsRow) {
                            dimensionsRow = document.createElement('div');
                            dimensionsRow.className = 'dimensions-row';
                            quoteForm.appendChild(dimensionsRow);
                        }
                        dimensionsRow.appendChild(fieldWrapper);
                    } else {
                        quoteForm.appendChild(fieldWrapper);
                    }
                });

                // Append the dimensions row if it exists

                const submitButton = document.createElement('button');
                    submitButton.type = 'submit';
                    submitButton.className = 'submit-button';
                    submitButton.textContent = 'إرسال';
                    quoteForm.appendChild(submitButton);
                }

                // Handle form submission with the prodcut data
                quoteForm.addEventListener('submit', function(event) {
                    event.preventDefault(); // Prevent default form submission
                    const product = productSelect.options[productSelect.selectedIndex];
                    const formData = new FormData(quoteForm);
                    const formDataObj = {};

                    formData.forEach((value, key) => {
                    if (!formDataObj[key]) {
                        formDataObj[key] = value;
                    } else {
                        if (Array.isArray(formDataObj[key])) {
                            formDataObj[key].push(value);
                        } else {
                            formDataObj[key] = [formDataObj[key], value];
                        }
                    }
                });


                    // Add the product name to the form data
                    formDataObj.product = selectedProduct.name;

                    const requiredFields = selectedProduct.fields.filter(field => field.required === 'YES');
                    let validationFailed = false;

                    // find the number field and its wrapper

                    const numberField = document.querySelector('input[name="number"]');
                    const numberFieldWrapper = numberField.parentElement;
                    numberFieldWrapper.querySelectorAll('.error-message').forEach(el => el.remove());


                    // Remove any existing error message
                    const existingErrorMessage = numberFieldWrapper.querySelector('.error-message');
                    if (existingErrorMessage) {
                        existingErrorMessage.remove();
                    }

                    // Check if the number field has 10 digits
                    if (formDataObj.number.length !== 10) {
                        const errorMessage = document.createElement('div');
                        errorMessage.className = 'error-message';
                        errorMessage.style.color = 'red';
                        errorMessage.style.marginTop = '5px';
                        errorMessage.textContent = 'رقم الهاتف يجب أن يتكون من 10 أرقام.';
                        numberFieldWrapper.appendChild(errorMessage);

                        numberField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        validationFailed = true;
                    }

                    // Check if the number field starts with '05'
                    if (!formDataObj.number.startsWith('05')) {
                        const errorMessage = document.createElement('div');
                        errorMessage.className = 'error-message';
                        errorMessage.style.color = 'red';
                        errorMessage.style.marginTop = '5px';
                        errorMessage.textContent = 'رقم الهاتف يجب أن يبدأ بـ 05.';
                        numberFieldWrapper.appendChild(errorMessage);

                        numberField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        validationFailed = true;
                    }

                    // Check if the number field contains exactly 10 digits
                    if (!/^\d+$/.test(formDataObj.number)) {
                    const errorMessage = document.createElement('div');
                    errorMessage.className = 'error-message';
                    errorMessage.style.color = 'red';
                    errorMessage.style.marginTop = '5px';
                    errorMessage.textContent = 'رقم الهاتف يجب أن يحتوي على أرقام فقط.';
                    numberFieldWrapper.appendChild(errorMessage);

                    numberField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    validationFailed = true;
                }

                    // Check all required fields
                    for (const field of requiredFields) {
                        // Find the field wrapper
                        const fieldWrapper = document.getElementById(field.id);
                        // Remove any existing error message
                        const existingErrorMessage = fieldWrapper?.querySelector('.error-message');
                        if (existingErrorMessage) {
                            existingErrorMessage.remove();
                        }
                        // Check if the field is empty
                        if (!formDataObj[field.name]) {
                            // Create an error message
                            const errorMessage = document.createElement('div');
                            errorMessage.className = 'error-message';
                            errorMessage.style.color = 'red';
                            errorMessage.style.marginTop = '5px';
                            errorMessage.textContent = 'هذا الحقل مطلوب.';
                            // Append the error message to the field wrapper
                            fieldWrapper.appendChild(errorMessage);
                            // Scroll to the field
                            fieldWrapper.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            validationFailed = true;
                        }
                    }

                    if (validationFailed) {
                        return;
                    }

                    // Send the form data
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', '<?= site_url('quote/submit'); ?>', true);
                    xhr.onload = function() {
                    const responseMessage = document.getElementById('responseMessage');
                    responseMessage.style.display = 'block';

                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);

                        if (response.status === 'success') {
                            responseMessage.textContent = response.message;
                            responseMessage.className = 'Quotemessage success';
                        } else {
                            responseMessage.textContent = response.message || 'حدث خطأ. حاول مرة أخرى.';
                            responseMessage.className = 'Quotemessage error';
                        }
                    } else {
                        responseMessage.textContent = 'حدث خطأ. حاول مرة أخرى.';
                        responseMessage.className = 'Quotemessage error';
                    }

                    setTimeout(function() {
                        responseMessage.style.display = 'none';
                    }, 5000);
                };

                    xhr.onerror = function() {
                        const responseMessage = document.getElementById('responseMessage');
                        responseMessage.style.display = 'block';
                        responseMessage.textContent = 'حدث خطأ. حاول مرة أخرى.';
                        responseMessage.className = 'Quotemessage error';

                        setTimeout(function() {
                            responseMessage.style.display = 'none';
                        }, 5000);
                    };

                    console.log(formDataObj);
                    xhr.send(formData);  // Make sure formData is correctly populated


                    // Continue with form submission (e.g., send data to the server)
                });
                        });
                });


            




</script>
</body>
</html>
