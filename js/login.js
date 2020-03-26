const email_input = document.querySelector('.email-input');
const password_input = document.querySelector('.password-input');

email_input.addEventListener('input', removeMsg);
password_input.addEventListener('input', removeMsg);

function removeMsg(e) {
    e.preventDefault();
    document.querySelector('#success-msg').classList.add('domant-msg');
    document.querySelector('#error-msg-login').classList.add('domant-msg');
    document.querySelector('#error-msg-login2').classList.add('domant-msg');
    document.querySelector('#error-msg-login3').classList.add('domant-msg');
}