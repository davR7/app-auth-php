const btnSignIn = document.querySelector('.form-controls__label-signin');
const btnSignUp = document.querySelector('.form-controls__label-signup');
const titleLogin = document.querySelector('.header-auth__login');
const formLogin = document.querySelector('.signin-form');
const formControls = document.querySelector('.form-controls');

btnSignUp.addEventListener('click', function(){
  titleLogin.style.marginLeft = '-50%';
  formLogin.style.marginLeft = '-50%';
})

btnSignIn.addEventListener('click', function(){
  formLogin.style.marginLeft = '0%';
  titleLogin.style.marginLeft = '0%';
})