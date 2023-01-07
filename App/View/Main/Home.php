<h2 class="my-home">Home</h2>
<div class="info-user flex-column-x">
  <p class="info-user__name">Nome: <?= $_SESSION['fullname']; ?></p>
  <p class="info-user__email">Email: <?= $_SESSION['email']; ?></p>
  <a class="info-user__link" href="/logout">Sair</a>
</div>