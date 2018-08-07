<?php
	Class MySql_DB{
		public $ip;
		public $user;
		public $password;
		public $charset;
		public $database;
		public $host;
		public $showerror;

		private $conection;
		private $id_conection;
		private $transaction;
		private $externalTransaction;
		private $canLogError;


		function __construct() {
		    $this->host = 'localhost';
		    $this->database = 'db_star_wars';
		    $this->user = 'root';
		    $this->password = '';
		    $this->charset = 'UTF-8';
		    $this->transaction = false;
		    $this->externalTransaction = false;
		    $this->canLogError = true;
		    $this->showerror = true;
		}


		function __destruct(){
	  		$this->unConnect();
	    }


	   	public function setShowError($v){
	   		$this->showerror = $v;
	   	}

	   	
	    public function unConnect(){
	    	
	    }


	    public function close(){
	    	if($this->conection){
	    		mysqli_close($this->conection);
	    		$this->conection = false;
	    	};
	    }


	    private function logError($id, $msg){
	    	if($this->canLogError)
	    		logError($id, $msg);
	    }


	    public function setLogError($v){
	    	$this->conection = $v;
	    }


	    public function connect($set = false){
	    	if($set){
	    		$this->charset = $set;
	    	};

	    	$this->conection = mysqli_connect($this->host,$this->user,$this->password, $this->database);
		    if(!$this->conection){
		    	if($this->showerror)
		    		$this->logError('DB1111',mysqli_error().' : '.$this->database);
		    	return false;
		    };

		   // $this->conection = mysqli_select_db($this->database,$this->id_conection);
			
			//if(!$this->conection){
		    //	if($this->showerror)
		    //		$this->logError('DB1111',mysqli_error().' : '.$this->database);
		    //	return false;
		    //};

		    return true;
	    }


	    public function sqlExecInMirror($DB_Obj, $SQL) {
			$doCommit = false;
			if($this->externalTransaction == false){
				$doCommit = true;
				$this->setTransaction($this->createTransaction());
			}
			if($this->sqlExec($SQL)){
				if($DB_Obj->sqlExec($SQL)){
					if($doCommit)
						$this->commit();
					return true;
				}else{
					if($doCommit)
						$this->rollback();
					return false;
				}
			}else{
				if($doCommit)
					$this->rollback();
				return false;
			}
	    }

	    public function setTransaction($trs){
	    	$this->externalTransaction = true;
	    	$this->transaction = $trs;
	    }

	    public function sqlExec($SQL) {
	    	$this->query = $SQL;
	    	if($this->conection){
	    		if(!$this->transaction)
	    			$this->createTransaction();

	    		if($this->transaction){
	    			if(mysqli_query($this->conection,$SQL)){
			            if(!$this->externalTransaction)
			            	$this->commit();
			            return true;
			        }else{
			           if($this->showerror)
			           		$this->logError('DB1114',mysqli_error().' : ['.$this->database.']'.$this->query);
			           if($this->externalTransaction)
			           		$this->rollback();
			           return false;
			        }  
	    		}else{
		    		if($this->showerror)
		    			$this->logError('DB1115','');
	    			return false;
		    	}
	    	}else{
	    		if($this->showerror)
	    			$this->logError('DB1113','');
	    		return false;
	    	}

	    }

		public function sqlExecNoCommit($SQL) {
	    	$this->query = $SQL;
	    	if($this->conection){
	    		if(!$this->transaction){
	    			$this->createTransaction();
	    		}

	    		if($this->transaction){
	    			if(mysqli_query($this->conection,$SQL)){
			            return true;
			        }else{
			           if($this->showerror)
			           		$this->logError('DB1114',mysqli_error().' : ['.$this->database.']'.$this->query);
			           throw new Exception();
			           return false;
			        }  
	    		}else{
		    		if($this->showerror)
		    			$this->logError('DB1115','');
	    			throw new Exception();
			        return false;		    	}
	    	}else{
	    		if($this->showerror)
	    			$this->logError('DB1113','');
	    		throw new Exception();
			    return false;
	    	}

	    }


	    public function sqlQuery($SQL) {
	    	$this->query = $SQL;

	    	if($this->conection){
	    		if($this->transaction){
		    		$query = mysqli_query($this->conection, $this->query);
		    		if($query){
		    			return @$query;
		    		}else{
		    			$this->logError('DB1114',mysqli_error($this->conection).' : '.$this->query);
		    			return false;
		    		}
		    	}else{
		    		$this->logError('DB1115','');
	    			return false;
		    	}
	    	}else{
	    		$this->logError('DB1113','');
	    		return false;
	    	}
	    }

	    public function sqlQueryArray($SQL) {
	    	/*
				- Executa a consulta no firebird e retorna um ARRAY
				@SQL - query de CONSULTA
	    	*/

			$this->createTransaction();
	    	$query = $this->sqlQuery($SQL);

	    	if($query){
		        $fields = [];
		        while ($property = mysqli_fetch_field($query)) {
		          	$fields[] = $property->name;
		        };

		        $dataSet = [];
		        while($rowFetch = mysqli_fetch_array($query)){
		          	$row = [];
		          	foreach($fields as $key => $field) {
		            	$row[$field] = removeEnter($rowFetch[$field]);
		            	$row[$field] = removeExtrangerCaracter($row[$field]); 
		            };

		            $dataSet[] = parseArrayToObj($row);
		        };

		        if(!$this->externalTransaction)
		        	$this->commit();
		        $this->createTransaction();
		        $this->commit();
		        return $dataSet;
		    }else{
		    	if(!$this->externalTransaction)
		    		$this->rollback();
		    	$this->createTransaction();
		       $this->rollback();
		    	return false;
		    }
	    }

	    public function sqlQueryJSON($SQL) {
	    	/*
				- Executa a consulta no firebird e retorna um JSON
				@SQL - query de CONSULTA
	    	*/
			$this->createTransaction();
	        $dataSet = $this->sqlQueryArray($SQL);
	        if($query){
	        	if(!$this->externalTransaction)
	        		$this->commit();
	        	return json_encode($dataSet,JSON_HEX_APOS|JSON_HEX_QUOT);
	       	}else{
	       		if(!$this->externalTransaction)
	       			$this->rollback();
	       		return false;
	       	};
	    }

	    public function createTransaction(){
	    	if(!$this->transaction){
	    		$this->transaction = mysqli_begin_transaction($this->conection, MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
	    	};

	    	return $this->transaction;
	    }

	    public function commit(){
	      	if ($this->transaction){
	        	mysqli_commit($this->conection);
	        	$this->transaction = false;
	        	$this->externalTransaction = false;
	      	}
	      	return true;   
	    }

		public function rollback() {
	      	if ($this->transaction){
	        	mysqli_rollback($this->conection);
	        	$this->transaction = false;
	        	$this->externalTransaction = false;
	      	}
	      	return true;   
	    }
    
	}
?>