<?php
class Account
  {
      public $email;
      public $password;
      public $name;
      public $consent;
      public $checkProf;
      
      function SetAccountValueReg()
      {
          $this->email = trim($_POST['email']);
          $this->password = trim($_POST['password']);
          $this->name = trim($_POST['inputName3']);
          $this->checkProf=false;
      }
    }
?>