<?php 

	include_once('teste_eMiolo/vendor/Util.php');  

	$connect = new MySql_DB();
	$connect->connect();

    /*VERIFICAR SE O LOGIN JA EXISTE*/
    $SQL = "SELECT * 
			FROM USUARIO U
			ORDER BY U.NOME";

	$result = $connect->sqlQueryArray($SQL);

	if(count($result) <= 0){
		$resp = 'Não há dados.';
		include('erro.php');
		exit;

	}else{

		echo sqlJSONtoString($result);
		exit;
			
	};

   
?>