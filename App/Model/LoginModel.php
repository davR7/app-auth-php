<?php

namespace App\Model;

use App\Dao\{
  LoginLogsDao,
  MixedDao
};
use app\Helpers\{
  BaseUrl,
  EmptyInput,
  Session
};

class LoginModel {
  public $email, $password;

  public function login()
  {
    Session::init();
    define('ATTEMPTS_AGAIN', 5);
    define('TIME_MIN', 30);
    
    if (EmptyInput::test($this)) {
      $res = ['ok' => false, 'message' => EmptyInput::info($this)];
      echo json_encode($res);
      exit();
    }

    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      $res = ['ok' => false, 'message' => 'O e-mail é inválido.'];
      echo json_encode($res);
      exit();
    }

    $db = new MixedDao();
    $user = $db->selectOne('users', ['email' => $this->email]);
    
    if (!$user) {
      $error = ['ok' => false, 'message' => 'O e-mail não está cadastrado.'];
      echo json_encode($error);
      exit();
    }

    $loginlogs = new LoginLogsDao;
    $logs = $loginlogs->select();

    if (!empty($logs['blocked']) && intval($logs['time_min']) <= TIME_MIN):
      $error = array('ok' => false, 'message' => 'Você excedeu o limite de '.ATTEMPTS_AGAIN.' tentativas, login bloqueado por '.TIME_MIN.' minutos.');
      echo json_encode($error);
      exit();
    endif;
    
    if (!empty($user) && password_verify($this->password, $user['password'])) {
      Session::set('fullname', $user['fullname']);
      Session::set('email', $user['email']);
      Session::set('attempts', 0);
      Session::set('logged', 1);
    } else {
      Session::set('logged', 0);
      $_SESSION['attempts'] = (isset($_SESSION['attempts'])) ? 
          $_SESSION['attempts'] += 1 : 1;
      if (Session::get('attempts') < 3) {
        $error = ['ok' => false, 'message' => "A senha está incorreta"];
        echo json_encode($error);
        exit();
      }
    }

    if (Session::get('attempts') === 5) {
      $blocked = ($_SESSION['attempts'] == ATTEMPTS_AGAIN) ? 1 : 0;
      $loginlogs->insert($this, $blocked);
    }

    if (Session::get('logged')){
      $success = ['ok' => true, 'redirect' => BaseUrl::expose()];
      echo json_encode($success);
    } else {
      if (Session::get('attempts') == ATTEMPTS_AGAIN){
        $error = array('ok' => false, 'message' => 'Você excedeu o limite de '.ATTEMPTS_AGAIN.' tentativas, login bloqueado por '.TIME_MIN.' minutos.');
        Session::del('attempts');
        echo json_encode($error);
      } else {
        $error = array('ok' => false, 'message' => 'A senha está incorreta, você tem mais '. (ATTEMPTS_AGAIN - Session::get('attempts')) .' tentativa(s) antes do bloqueio.');
        echo json_encode($error);
      }
    }
  }
}