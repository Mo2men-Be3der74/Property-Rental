const name = document.querySelector('form .name input');
const email = document.querySelector('form .email input');
const phone = document.querySelector('form .phone input');

const nameRegEx = /^[a-zA-Z\s]+$/;
const emailRegEx = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/;
const phoneRegEx = /^(010|011|012|015)[0-9]{8,}$/;

name.addEventListener('input', () => {
    if (nameRegEx.test(name.value)) {
        name.classList.remove('invalid');
        name.classList.add('valid');
    } else {
        name.classList.add('invalid');
        name.classList.remove('valid');
    }
});

email.addEventListener('input', () => {
    if (emailRegEx.test(email.value)) {
        email.classList.remove('invalid');
        email.classList.add('valid');
    } else {
        email.classList.add('invalid');
        email.classList.remove('valid');
    }
});

phone.addEventListener('input', () => {
    if (phoneRegEx.test(phone.value)) {
        phone.classList.remove('invalid');
        phone.classList.add('valid');
    } else {
        phone.classList.add('invalid');
        phone.classList.remove('valid');
    }
});
