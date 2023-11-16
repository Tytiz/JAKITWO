const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
registerLink.addEventListener('click', ()=> {
    wrapper.classList.add('active');
});
loginLinkLink.addEventListener('click', ()=> {
    wrapper.classList.remove('active');
});
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');
btnPopup.addEventListener('click', ()=> {
    wrapper.classList.remove('active-popup');
});