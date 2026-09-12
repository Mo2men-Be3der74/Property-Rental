document.addEventListener('DOMContentLoaded', function() {
    let form = document.getElementById('addPropertyForm');
    if (!form) {
        form = document.getElementById('editPropertyForm');
    }
    if (!form) {
        return;
    }
    const categoryInput = document.getElementById('category');
    const locationInput = document.getElementById('location');
    const sizeInput = document.getElementById('size');
    const priceInput = document.getElementById('price_per_month');
    const imgInput = document.getElementById('img_file');
    const dropzoneContainer = document.getElementById('dropzoneContainer');
    const dropzoneText = document.getElementById('dropzoneText');
    const categoryError = document.getElementById('category_error');
    const locationError = document.getElementById('location_error');
    const sizeError = document.getElementById('size_error');
    const priceError = document.getElementById('price_per_month_error');
    const imgError = document.getElementById('img_error');
    function showError(input, errorElement, message) {
        if (input) {
            input.classList.add('is-invalid');
        }
        if (errorElement) {
            errorElement.textContent = message;
            errorElement.classList.add('active');
        }
    }
    function clearError(input, errorElement) {
        if (input) {
            input.classList.remove('is-invalid');
        }
        if (errorElement) {
            errorElement.textContent = '';
            errorElement.classList.remove('active');
        }
    }
    function validateCategory() {
        if (!categoryInput) {
            return true;
        }
        const val = categoryInput.value.trim();
        const regex = /^[a-zA-Z0-9\s,.'-]{3,100}$/;
        if (val.length === 0) {
            showError(categoryInput, categoryError, 'Category / Title is required.');
            return false;
        }
        if (val.length < 3 || val.length > 100 || !regex.test(val)) {
            showError(categoryInput, categoryError, 'Category must be between 3 and 100 characters.');
            return false;
        }
        clearError(categoryInput, categoryError);
        return true;
    }

    function validateLocation() {
        if (!locationInput) {
            return true;
        }
        const val = locationInput.value.trim();
        const regex = /^[a-zA-Z0-9\s,.'-]{3,100}$/;
        if (val.length === 0) {
            showError(locationInput, locationError, 'Location is required.');
            return false;
        }
        if (val.length < 3 || val.length > 100 || !regex.test(val)) {
            showError(locationInput, locationError, 'Location must be between 3 and 100 characters (e.g. Country, City).');
            return false;
        }
        clearError(locationInput, locationError);
        return true;
    }

    function validateSize() {
        if (!sizeInput) {
            return true;
        }
        const val = sizeInput.value.trim();
        const regex = /^[0-9]+(\.[0-9]+){0,1}$/;
        if (val.length === 0) {
            showError(sizeInput, sizeError, 'Size is required.');
            return false;
        }
        if (!regex.test(val) || parseFloat(val) <= 0) {
            showError(sizeInput, sizeError, 'Size must be a valid positive number greater than 0.');
            return false;
        }
        clearError(sizeInput, sizeError);
        return true;
    }

    function validatePrice() {
        if (!priceInput) {
            return true;
        }
        const val = priceInput.value.trim();
        const regex = /^[0-9]+(\.[0-9]+){0,1}$/;
        if (val.length === 0) {
            showError(priceInput, priceError, 'Monthly rate is required.');
            return false;
        }
        if (!regex.test(val) || parseFloat(val) < 0) {
            showError(priceInput, priceError, 'Monthly rate must be a valid non-negative number.');
            return false;
        }
        clearError(priceInput, priceError);
        return true;
    }

    function validateImage() {
        if (!imgInput) {
            return true;
        }
        if (imgInput.files.length === 0) {
            if (imgInput.hasAttribute('required')) {
                showError(dropzoneContainer, imgError, 'Please select a property photo.');
                return false;
            }
            clearError(dropzoneContainer, imgError);
            return true;
        }
        const file = imgInput.files[0];
        const extRegex = /\.(jpeg|jpg|png|webp)$/i;
        if (!extRegex.test(file.name)) {
            showError(dropzoneContainer, imgError, 'Image must be JPEG, PNG, JPG, or WEBP format.');
            return false;
        }
        if (file.size > 5242880) {
            showError(dropzoneContainer, imgError, 'Image size must be less than 5MB.');
            return false;
        }
        clearError(dropzoneContainer, imgError);
        return true;
    }

    if (categoryInput) {
        categoryInput.addEventListener('input', validateCategory);
    }
    if (locationInput) {
        locationInput.addEventListener('input', validateLocation);
    }
    if (sizeInput) {
        sizeInput.addEventListener('input', validateSize);
    }
    if (priceInput) {
        priceInput.addEventListener('input', validatePrice);
    }

    if (imgInput) {
        imgInput.addEventListener('change', function() {
            if (this.files.length > 0) {
                if (dropzoneText) {
                    dropzoneText.textContent = 'Selected: ' + this.files[0].name;
                }
                if (dropzoneContainer) {
                    dropzoneContainer.style.borderColor = '#16A34A';
                }
                validateImage();
            } else {
                if (dropzoneText) {
                    dropzoneText.textContent = 'Click to browse or drop property photo here';
                }
                if (dropzoneContainer) {
                    dropzoneContainer.style.borderColor = '#E7E5E4';
                }
                validateImage();
            }
        });
    }

    form.addEventListener('submit', function(e) {
        const isCategoryValid = validateCategory();
        const isLocationValid = validateLocation();
        const isSizeValid = validateSize();
        const isPriceValid = validatePrice();
        const isImageValid = validateImage();

        if (!isCategoryValid || !isLocationValid || !isSizeValid || !isPriceValid || !isImageValid) {
            e.preventDefault();
        }
    });
});