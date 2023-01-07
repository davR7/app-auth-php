<?php

namespace App\Model;

use App\Dao\{
  UserDao,
  MixedDao
};
use app\Helpers\EmptyInput;

class RegisterModel {
  public $fullname, $email, $password, $passwordConfirm;

  public function save()
  {
    if (EmptyInput::test($this)) {
      $err = ['ok' => false, 'message' => EmptyInput::info($this)];
      echo json_encode($err);
      exit();
    }

    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      $res = ['ok' => false, 'message' => 'Email inválido.'];
      echo json_encode($res);
      exit();
    }

    $db = new MixedDao;

    if ($db->selectOne('loginlogs', ['email' => $this->email])) {
      $err = ['ok' => false, 'message' => 'Usuário já cadastrado.'];
      echo json_encode($err);
      exit();
    }

    if ($this->password !== $this->passwordConfirm) {
      $err = ['ok' => false, 'message' => 'As senhas não são iguais.'];
      echo json_encode($err);
      exit();
    }

    $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    $register = new UserDao();
    $register->insert($this);
    $success = ['ok' => true, 'message' => 'Usuário Cadastrado com Sucesso!'];
    echo json_encode($success);
  }
}