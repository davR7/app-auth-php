<?php

  namespace app\Helpers;

  class EmptyInput {
    /**
   * info: informs if any field of the form is empty.
   * @access public
   * @param object $obj
   * @return string
   */
    public static function info($obj)
    {
      $fields = [
        'fullname' => 'nome',
        'email' => 'email',
        'password' => 'senha',
        'passwordConfirm' => 'confirme senha'
      ];

      foreach ($obj as $input => $value){
        if (empty($value))
          return "O campo $fields[$input] é obrigatório.";
      }
    }
     /**
   * test: returns true if any form field is empty, but false if none is found.
   * @access public
   * @param object $obj
   * @return string
   */
    public static function test($obj)
    {
      foreach ($obj as $input => $value){
        if (empty($value))
          return true;
      }
      return false;
    }
  }