<?php 

  include_once('teste_eMiolo/vendor/Util.php');  

  if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
  };

  $connect = new MySql_DB();
  $connect->connect();

  $login =  isset($_POST['login']) ? $_POST['login'] : ''; 
  $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

  $senha = md5($senha);

  $SQL = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'";

  $result = $connect->sqlQueryArray($SQL);

  if(count($result) <= 0){
    echo 'Login e/ou senha incorretos';
    $_SESSION['logged'] = false;
    exit;

  }else{
    $_SESSION['logged'] = true;
    $_SESSION['user'] = $login;
    header('Location: index.php');
    exit;
  };  

?>