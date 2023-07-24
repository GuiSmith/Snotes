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

  //Screens
  
  $origin = new Option("origin", "Origem", "both", 151897914, true);
  $home = new Option("home", "Snotes", "both", 815135, true);
  $password = new Option("password", "Trocar Senha", "no", 16119192315184, false);

  //Notes

  $notes = new Option("notes", "Anotações", "yes", 141520519, true);
  $edit_note = new Option("notes/edit", "Editar Anotação", "yes", 141520554920, false);
  $see_note = new Option("notes/see", "Anotação", "yes", 19551415205, false);
  $new_note = new Option("notes/new", "Criar anotação", "yes", 145231415205, false);

  //Options
  $users = new Option("users", "Usuários", "yes", 211951819, true);
  $profile = new Option("profile", "Perfil", "yes", 16181569125, true);
  $register = new Option("register", "Registrar", "no", 185791920518, true);
  $login = new Option("login", "Entrar", "no", 12157914, true);
  $log_out = new Option("log_out", "Sair", "yes", 12157152120, true);

  //Objects

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
    echo "<a class = 'link-button btn btn-success' href = '" . $href . "' >";
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

  //Table Header Line creator
  function createTHeader($array){
    //for associative array
    $index = 0;
    foreach ($array as $key => $value) {
      echo "<th id = '{$key}' onclick = 'sortColumn({$index})' >";
      echo $value;
      echo "</th>";
      $index++;
    }
  }

  //Table Line creator

  function createTLine($array, $left_position = 1000){
    for ($i=0; $i < count($array); $i++) {
      if ($left_position - 1 == $i) {
        echo "<td class = 'text-left' >";
      }else{
        echo "<td class = 'text-center' >";
      }
      echo $array[$i];
      echo "</td>";
    }
  }

  //Dropdown option creator
  function createOption($array, $option, $not_option = [null]){
    foreach ($array as $key => $value) {
      if (in_array($key, $not_option)) {
        break;
      }
      echo "<option class = 'text-left' value = '{$key}' ";
      if ($option == $key) {
        echo "selected";
      }
      echo ">";
      echo $value;
      echo "</option>";
    }
  }

  //Datetime-local (HTML) to datetime (SQL)
  function datetimeSQL($dateTimeLocalValue) {
    // Create a DateTime object based on the datetime-local value
    $dateTime = DateTime::createFromFormat('Y-m-d\TH:i', $dateTimeLocalValue, new DateTimeZone('UTC'));
    // Convert the DateTime object to the SQL standard format: Y-m-d H:i:s
    $formattedDateTime = $dateTime->format('Y-m-d H:i:s');
    return $formattedDateTime;
  }

  //Create filter button
  function createFilterButton($option, $value, $text){
    echo "<button type = 'button' id = '{$option}{$value}' class = 'btn btn-info' ";
    echo "onclick = 'filter(\"{$option}\",\"{$value}\")'>";
    echo $text;
    echo "</button>";
  }
?>