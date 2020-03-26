const fname = document.querySelector('.fname-input');
const lname = document.querySelector('.lname-input');
const email = document.querySelector('.email-input');
const phone = document.querySelector('.phone-input');
const password = document.querySelector('.password-input');
const password2 = document.querySelector('.password2-input');

// event listeners
fname.addEventListener('input', removeClass);
lname.addEventListener('input', removeClass);
email.addEventListener('input', removeClass);
phone.addEventListener('input', removeClass);
password.addEventListener('input', removeClass);
password2.addEventListener('input', removeClass);

// function
function removeClass(e) {
    e.preventDefault()
    e.target.classList.remove('box-error');
    if(e.target.nextElementSibling.className == 'error-msg') {
        e.target.nextElementSibling.classList.add('domant-msg');
    }
    
}
