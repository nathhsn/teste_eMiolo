<?php 

	/*CONEXÃO COM O BANCO DE DADOS*/
   
   include_once('teste_eMiolo/vendor/Util.php');  

   if(session_status() !== PHP_SESSION_ACTIVE){
      session_start();
   };


   $connect = new MySql_DB();
   $connect->connect();

	/*RECEBENDO AS VARIAVEIS VIA POST*/
	$login =  isset($_POST['login']) ? $_POST['login'] : ''; 
	$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
	$nome = isset($_POST['nome']) ? $_POST['nome'] : '';

	if($login == "" || $login == null){
      echo 'O campo login deve ser preenchido';
      exit;
   };

   if($senha == "" || $senha == null){
      echo 'O campo senha deve ser preenchido';
      exit;
   };

   if($nome == "" || $nome == null){
      echo 'O campo nome deve ser preenchido';
      exit;
   };

   /*VERIFICAR SE O LOGIN JA EXISTE*/
	$SQL = "SELECT login 
				FROM usuario 
				WHERE login = '{$login}'
				OR senha = '{$senha}'";

 $senha = md5($senha);

	$select = $connect->sqlQueryArray($SQL);

   if(count($select) > 0){
     $resp = 'O login ou senha informado já existe.';
     $_SESSION['cad'] = false;

     include('erro.html');
     exit;
   };

   $SQL = "INSERT INTO USUARIO (LOGIN,SENHA,NOME,DATA_CAD) VALUES ('$login','$senha','$nome', current_timestamp)";

   $insert = $connect->sqlExec($SQL);     
  
   if($insert){
      $_SESSION['cad'] = true;
      header('Location: index.php');
      exit;

   }else{
      $_SESSION['cad'] = false;
      $resp = 'Não foi possível cadastrar esse usuário.';
      header('Location: erro.php');
      exit;

   };
   
?>