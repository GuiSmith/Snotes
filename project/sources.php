<?php

  class Option {

    public static $objects = array();

    public $fileName;
    public $displayName;
    public $logged;
    public $pageCode;
    public $displayState;

    public function __construct($fileName, $displayName, $logged, $pageCode, $displayState){

      $this->fileName = $fileName;
      $this->displayName = $displayName;
      $this->logged = $logged;
      $this->pageCode = $pageCode;
      $this->displayState = $displayState;
      self::$objects[] = $this;

    }

    public static function getAllObjects(){

      return self::$objects;

    }

  }

  $origin = new Option("origin", "Origem", "both", 151897914, true);
  $home = new Option("home", "Snotes", "both", 815135, true);
  $stories = new Option("stories", "Histórias", "both", 192015189519, true);
  $users = new Option("users", "Usuários", "yes", 211951819, true);
  $notes = new Option("notes", "Anotações", "both", 141520519, true);
  $password = new Option("password", "Trocar Senha", "no", 16119192315184, false);
  $profile = new Option("profile", "Perfil", "yes", 19181569125, true);
  $register = new Option("register", "Registrar", "no", 185791920518, true);
  $login = new Option("login", "Entrar", "no", 12157914, true);
  $log_out = new Option("log_out", "Sair", "yes", 12157152120, true);

  $objects = Option::getAllObjects();

  // Functions

  function validate($data, $type){

    switch ($type) {
      
      case "name":
        
        if (preg_match('/^[a-zA-Z]+$/', $data)) {

          return true;

        }else{

         return false;

        }

        break;

      case "password":

        if (preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!@#$%^&*()_+\-=[\]{};:"\\|,.<>\/?]{8,}$/', $data)) {

          return true;

        }else{

          return false;

        }

        break;
      
      default:
        // code...
        break;
    }

  }



?>