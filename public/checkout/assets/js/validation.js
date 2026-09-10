function validate() {
    'use strict';

    function markValid(el, errorEl) {
        el.classList.remove('invalid');
        el.classList.add('valid');
        if (errorEl) errorEl.classList.remove('visible');
    }

    function markInvalid(el, errorEl, msg) {
        el.classList.remove('valid');
        el.classList.add('invalid');
        if (errorEl && msg) {
            errorEl.textContent = msg;
            errorEl.classList.add('visible');
        }
    }

    function isNotEmpty(v) { return v.trim().length > 0; }

    function isValidEmail(v) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim());
    }

    function isValidPhone(v) {
        var digits = v.replace(/\D/g, '');
        return digits.length >= 6 && digits.length <= 15;
    }

    function isValidCardNumber(v) {
        var digits = v.replace(/\s/g, '');
        return /^\d{13,19}$/.test(digits);
    }

    function isValidExpiry(v) {
        if (!/^\d{2}\/\d{2}$/.test(v.trim())) return false;
        var parts = v.split('/');
        var month = parseInt(parts[0], 10);
        var year  = parseInt('20' + parts[1], 10);
        var now   = new Date();
        if (month < 1 || month > 12) return false;
        if (year < now.getFullYear()) return false;
        if (year === now.getFullYear() && month < (now.getMonth() + 1)) return false;
        return true;
    }

    function isValidCVV(v) { return /^\d{3,4}$/.test(v.trim()); }

    function getErrorEl(input) {
        var parent = input.closest('.form-group') || input.parentElement;
        return parent ? parent.querySelector('.form-error-msg') : null;
    }

    function validateField(input) {
        var errorEl = getErrorEl(input);
        var type    = input.dataset.validate || input.type;
        var value   = input.value;
        var valid   = false;
        var msg     = 'This field is required.';

        if (type === 'email') {
            if (!isNotEmpty(value))       msg = 'Email address is required.';
            else if (!isValidEmail(value)) msg = 'Please enter a valid email address.';
            else valid = true;
        } else if (type === 'tel' || type === 'phone') {
            if (!isNotEmpty(value))       msg = 'Phone number is required.';
            else if (!isValidPhone(value)) msg = 'Please enter a valid phone number.';
            else valid = true;
        } else if (type === 'card-number') {
            if (!isNotEmpty(value))            msg = 'Card number is required.';
            else if (!isValidCardNumber(value)) msg = 'Please enter a valid card number.';
            else valid = true;
        } else if (type === 'expiry') {
            if (!isNotEmpty(value))         msg = 'Expiry date is required.';
            else if (!isValidExpiry(value)) msg = 'Enter a valid expiry date (MM/YY).';
            else valid = true;
        } else if (type === 'cvv') {
            if (!isNotEmpty(value))       msg = 'CVV is required.';
            else if (!isValidCVV(value)) msg = 'Enter a valid CVV (3-4 digits).';
            else valid = true;
        } else if (input.required) {
            valid = isNotEmpty(value);
            if (!valid) msg = 'This field is required.';
        } else {
            valid = true;
        }

        valid ? markValid(input, errorEl) : markInvalid(input, errorEl, msg);
        return valid;
    }

    function validatePhoneWrapper(wrapper) {
        var input   = wrapper.querySelector('input[type="tel"]');
        var errorEl = null;
        var parent  = wrapper.closest('.form-group');
        if (parent) errorEl = parent.querySelector('.form-error-msg');
        if (!input || !isNotEmpty(input.value)) {
            markInvalid(wrapper, errorEl, 'Phone number is required.');
            return false;
        }
        if (!isValidPhone(input.value)) {
            markInvalid(wrapper, errorEl, 'Please enter a valid phone number.');
            return false;
        }
        markValid(wrapper, errorEl);
        return true;
    }

    function validateCheckbox(checkbox) {
        var parent  = checkbox.closest('.terms-box');
        var errorEl = parent ? parent.querySelector('.form-error-msg') : null;
        if (!checkbox.checked) {
            checkbox.classList.add('invalid');
            if (errorEl) { errorEl.textContent = 'You must agree to the Terms & Conditions.'; errorEl.classList.add('visible'); }
            return false;
        }
        checkbox.classList.remove('invalid');
        if (errorEl) errorEl.classList.remove('visible');
        return true;
    }

    function attachLiveValidation() {
        var inputs = document.querySelectorAll('input[required], input[data-validate], textarea[data-validate]');
        inputs.forEach(function (input) {
            if (input.type === 'checkbox') return;
            var onBlur = function () {
                var pw = input.closest('.phone-wrapper');
                pw ? validatePhoneWrapper(pw) : validateField(input);
            };
            var onInput = function () {
                if (input.classList.contains('invalid') || input.classList.contains('valid')) onBlur();
            };
            input.addEventListener('blur', onBlur);
            input.addEventListener('input', onInput);
        });


        var cardEl = document.querySelector('[data-validate="card-number"]');
        if (cardEl) {
            cardEl.addEventListener('input', function () {
                var raw = cardEl.value.replace(/\D/g, '').substring(0, 16);
                var groups = raw.match(/.{1,4}/g);
                cardEl.value = groups ? groups.join(' ') : raw;
            });
        }

        // Expiry auto-format
        var expEl = document.querySelector('[data-validate="expiry"]');
        if (expEl) {
            expEl.addEventListener('input', function () {
                var raw = expEl.value.replace(/\D/g, '').substring(0, 4);
                expEl.value = raw.length >= 3 ? raw.substring(0, 2) + '/' + raw.substring(2) : raw;
            });
        }

        var terms = document.querySelector('.terms-checkbox');
        if (terms) terms.addEventListener('change', function () { validateCheckbox(terms); });
    }

    function validateForm(form) {
        var ok = true;
        var inputs = form.querySelectorAll('input[required], input[data-validate], textarea[data-validate]');
        inputs.forEach(function (input) {
            if (input.type === 'checkbox') return;
            var pw = input.closest('.phone-wrapper');
            if (pw) { if (!validatePhoneWrapper(pw)) ok = false; }
            else    { if (!validateField(input))     ok = false; }
        });
        var terms = form.querySelector('.terms-checkbox');
        if (terms && !validateCheckbox(terms)) ok = false;
        if (!ok) {
            var first = form.querySelector('.invalid');
            if (first) first.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
        return ok;
    }

    function init() {
        attachLiveValidation();
        var forms = document.querySelectorAll('.checkout-form');
        forms.forEach(function (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                if (validateForm(form)) {
                    var next = form.dataset.next;
                    if (next) window.location.href = next;
                }
            });
        });
    }

    document.readyState === 'loading'
        ? document.addEventListener('DOMContentLoaded', init)
        : init();
};

validate();
