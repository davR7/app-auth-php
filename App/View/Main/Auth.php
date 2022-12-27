<div class="container">
  <div class="wrapper__left">
    <div class="header-auth flex-row">
      <div class="header-auth__login jsHeaderLogin">
        <div class="header-auth__title">Faça Login</div>
        <div class="header-auth__text">
          Seja bem-vindo, faça o login e saiba sobre as mais
          recentes novidades do meio tecnológico. Postagens
          atualizadas constantemente.
        </div>
      </div>
      <div class="header-auth__register">
        <div class="header-auth__title">Faça Cadastro</div>
        <div class="header-auth__text">
          Crie uma conta e entre para nossa comunidade. Se informe
          sobre tecnologia com quem é líder no mercado.
        </div>
      </div>
    </div>
    <img class="animate-img" src="/assets/img/authentication-animate.svg" alt="animate imagem">
  </div>
  <div class="wrapper__right">
    <div class="form-controls jsFormControls flex-row">
      <input type="radio" name="controls" id="radio-signin" checked>
      <input type="radio" name="controls" id="radio-signup">
      <label for="radio-signin" class="form-controls__label-signin jsLabelSignin">Login</label>
      <label for="radio-signup" class="form-controls__label-signup jsLabelSignup">Cadastro</label>
      <div class="control-tab"></div>
    </div>
    <div class="forms flex-row">
      <form class="signin-form jsSigninForm">
        <input type="text" name="email" class="signin-form__field-text" placeholder="*Email">
        <input type="password" name="password" class="signin-form__field-text" placeholder="*Senha">
        <button type="submit" class="signin-form__btn">Entrar</button>
      </form>
      <form class="signup-form">
        <input type="text" name="fullname" class="signup-form__field-text" placeholder="*Nome">
        <input type="email" name="email" class="signup-form__field-text" placeholder="*Email">
        <input type="password" name="password" class="signup-form__field-text" placeholder="*Senha">
        <input type="password" name="password-confirm" class="signup-form__field-text" placeholder="*Confirme Senha">
        <button type="submit" class="signup-form__btn">Cadastrar</button>
      </form>
    </div>
  </div>
</div>