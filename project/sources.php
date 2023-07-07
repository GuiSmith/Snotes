<?php

  //Class options

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

  $note = new Option("note", "Criar anotação", "yes", 145231415205, false);
  $origin = new Option("origin", "Origem", "both", 151897914, true);
  $home = new Option("home", "Snotes", "both", 815135, true);
  $stories = new Option("stories", "Histórias", "both", 192015189519, true);
  $users = new Option("users", "Usuários", "yes", 211951819, true);
  $notes = new Option("notes", "Anotações", "yes", 141520519, true);
  $password = new Option("password", "Trocar Senha", "no", 16119192315184, false);
  $profile = new Option("profile", "Perfil", "yes", 16181569125, true);
  $register = new Option("register", "Registrar", "no", 185791920518, true);
  $login = new Option("login", "Entrar", "no", 12157914, true);
  $log_out = new Option("log_out", "Sair", "yes", 12157152120, true);

  $objects = Option::getAllObjects();

  // Functions

  //Validation

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

  //Header content

  function createHeader($title, $content){

    echo "<header class = 'text-center mt-4'>";
    echo "<h3>" . $title . "</h3>";
    echo "<h5>" . $content . "</h5>";
    echo "</header>";

  }

  //Link button

  function createLinkButton($text, $href){

    echo "<a class = 'link-button btn btn-info' href = '" . $href . "' >";
    echo $text;
    echo "</a>";

  }

  //List item link creator

  function createItemLink($href, $text){

    echo "<li class = 'option' >";
    echo "<a href ='?page=" . $href . "'>";
    echo $text;
    echo "</a>";
    echo "</li>";

  }

?>