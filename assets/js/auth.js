/*============ Form Navigation ============*/
const btnSignIn = document.querySelector('.form-controls__label-signin');
const btnSignUp = document.querySelector('.form-controls__label-signup');
const titleLogin = document.querySelector('.header-auth__login');
const formLogin = document.querySelector('.signin-form');
const formControls = document.querySelector('.form-controls');

btnSignUp.addEventListener('click', function () {
  titleLogin.style.marginLeft = '-50%';
  formLogin.style.marginLeft = '-50%';
})

btnSignIn.addEventListener('click', function () {
  formLogin.style.marginLeft = '0%';
  titleLogin.style.marginLeft = '0%';
})
/*============ Ajax - Form Register ============*/
$(document).ready(function () {
  $(".signup-form").on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      url: '/auth/register',
      method: 'POST',
      data: $('.signup-form').serialize() + '&action=register',
      dataType: 'json',
      success(res) {
        if (res.ok) {
          showMessageSuccess(res.message);
        } else {
          showMessageError(res.message);
        }
      }
    })
  })
})