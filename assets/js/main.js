/* JavaScript Global */
function showMessageSuccess(message) {
  $("input").val("");
  $(".info-message__error").css('display', 'none')
  $(".info-message__success").css('display', 'block');
  $(".info-message__success").html(message);
  setTimeout(() => {
    $(".info-message__success").css('display', 'none');
    $("#mensagem").html('');
  }, 3000)
}
function showMessageError(message) {
  $(".info-message__error").css('display', 'block')
  $(".info-message__error").html('<strong>Erro! </strong>' + message);
}