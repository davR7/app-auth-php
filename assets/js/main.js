/* JavaScript Global */
function showMessageSuccess(message) {
  $("input").val("");
  $(".message-box__error").css('display', 'none')
  $(".message-box__success").css('display', 'block');
  $(".message-box__success").html(message);
  setTimeout(() => {
    $(".message-box__success").css('display', 'none');
    $(".message-box__success").html('');
  }, 3000)
}
function showMessageError(message) {
  $(".message-box__error").css('display', 'block')
  $(".message-box__error")
    .html("<strong>Erro! </strong>" + message);
}

