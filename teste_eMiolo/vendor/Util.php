<?php

	include_once('MySql.class.php');


	function console_log($log){
		if(DEBUG_MODE == 1){
			if(is_array($log)){
				$text = json_encode($log);
			}else{
				$text = $log;
			}
			echo "<CONSOLE_LOG>".base64_encode($text)."</CONSOLE_LOG>";
		}
	}

	function encryptPassword($senha){
        if(getConfig('SYSTEM','PASSWORDMODE','md5') == 'base64_encode'){
            return base64_encode($senha);
        }else{
            return md5($senha);
        }
    }

    function removeExtrangerCaracter($str){
		$str = str_replace('Ã§','ç',$str);
		$str = str_replace('Ã‡','Ç',$str);

		$str = str_replace('Ã¡','á',$str);
		$str = str_replace('Ã£','ã',$str);
		$str = str_replace('Ã¢','â',$str);

		$str = str_replace('Ã´','ô',$str);
		$str = str_replace('Ã”','Ô',$str);
		$str = str_replace('Ã³','ó',$str);
		$str = str_replace('Ã“','Ó',$str);
		$str = str_replace('Ãµ','õ',$str);
		$str = str_replace('Ã•','Ô',$str);
		
		$str = str_replace('Ã©','é',$str);
		$str = str_replace('Ã‰','É',$str);
		$str = str_replace('Ãª','ê',$str);
		$str = str_replace('Ãª','Ê',$str);

		$str = str_replace('Ãº','ú',$str);
		$str = str_replace('Ãš','Ú',$str);

		$str = str_replace('Ã­','Í',$str);
		$str = str_replace('Ã*','í',$str);

		return $str;
	}

	function htmlEncode($str){
		$str = str_replace('\"', '"', $str);
		$str = str_replace("\'", "'", $str);
		$str = str_replace("\\", "{#BI#}", $str);
		$str = str_replace("'", "&#92;&#39;", $str); //ajusta aspas duplas
		$str = str_replace('"', "&#92;&#34;", $str);
		$str = str_replace('<', "&#60;", $str);
		$str = str_replace('>', "&#62;", $str);
		$str = str_replace(chr(9),"   ", $str); //tab
		return $str;
	}


	function encript($text){
	    $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(getConfig('SYSTEM', 'ENCRIPTKEY', 'xxxkkkuuuzzz1925')), $text, MCRYPT_MODE_CBC, md5(md5(getConfig('SYSTEM', 'ENCRIPTKEY', 'xxxkkkuuuzzz1925')))));
	    $qEncoded = str_replace('+','mremr',$qEncoded);
	    $qEncoded = str_replace('/','bbbrbr',$qEncoded);
	    $qEncoded = str_replace('=','eqleql',$qEncoded);
	   
	    return $qEncoded;
	}

	function decript($text) {
		$text = str_replace('mremr','+',$text);
		$text = str_replace('bbbrbr','/',$text);
		$text = str_replace('eqleql','=',$text);
	    $qDecoded = rtrim( mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(getConfig('SYSTEM', 'ENCRIPTKEY', 'xxxkkkuuuzzz1925')), base64_decode($text), MCRYPT_MODE_CBC, md5(md5(getConfig('SYSTEM', 'ENCRIPTKEY', 'xxxkkkuuuzzz1925')))), "\0");
	   	
	    return $qDecoded;
	}
	
	function parseArrayToObj($array){
		$object = new stdClass();

     	foreach ($array as $key => $value){
			$object->$key = $value;
		}
		return $object;
	}

	function removeEnter($str){
		$str = str_replace( array("\r\n", "\r", "\n"), '{#BR#}', $str); //tira os \n e coloca <br>
		return $str;
	}

   

	function sqlJSONtoString($dados, $scape = false){
		$data = '[]';
		
		if(count($dados) > 0 && ($dados != '')){
			$arrayObjetos = array();
			foreach($dados as $key => $val){
				$arrayValores = array();
				foreach($val as $valKey => $valVal){
					$valVal = htmlEncode($valVal);

					if($scape){
						array_push($arrayValores, '\"'.$valKey.'\": \"'.$valVal.'\"');
					}else{
						array_push($arrayValores, '"'.$valKey.'": "'.$valVal.'"');
					}
				}
				array_push($arrayObjetos,'{'.join(',',$arrayValores).'}');
			}
			$data = '['.join(',',$arrayObjetos).']';
		}

		return $data;
	}

	function sqlJSONtoStringOption($dados, $scape = false){
		
		if(sizeof($dados) > 0 && ($dados != '')){
			$arrayObjetos = array();
			foreach($dados as $key => $val){
				$arrayValores = array();
				foreach($val as $valKey => $valVal){
					$valVal = htmlEncode($valVal);
					array_push($arrayObjetos,'<option value="'.$valKey.'">'.$valVal.'</option>');
				}
				
			}
		}

		return join('',$arrayObjetos);
	}



	function logError($codigo, $param = ''){
		
	}

	function logWarning($message){
		
	}

	

 
?>