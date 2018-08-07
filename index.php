<?php

 	if(session_status() !== PHP_SESSION_ACTIVE){
	   session_start();
	};


 	if(isset($_SESSION['logged']) && $_SESSION['logged']===true){
 		
		include('sw.php');
 	}else{

 		$_SESSION['logged'] = false;
		include('login_page.php');
 	};


?>