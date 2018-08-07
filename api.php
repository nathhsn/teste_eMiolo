<?php
	
	include_once('teste_eMiolo/vendor/Util.php');  

	$tipo = isset($_REQUEST['TYPE']) ? $_REQUEST['TYPE'] : '-1';


	$dados = file_get_contents('https://swapi.co/api/'.$tipo); // buscar dados na API
	$obj = json_decode($dados); // converter para objeto
	$array = (array) $obj; // converter para array

	
	$tipo2 = explode('/', $tipo);

    $array_dados = []; // array para armazenar os dados selecionados para mostrar na tela

	if($tipo2[0] == 'planets'){ // se for planeta

		foreach ($array as $key => $value) {

			
			if($key == 'name'){
				$name = str_replace(',', '/', $value);
				array_push($array_dados, $name);
			};
			
			if($key == 'rotation_period'){
				$rotation = str_replace(',', '/', $value);
				array_push($array_dados, $rotation);
			};

			if($key == 'orbital_period'){
				$orbital = str_replace(',', '/', $value);
				array_push($array_dados, $orbital);
			};

			if($key == 'diameter'){
				$diameter = str_replace(',', '/', $value);
				array_push($array_dados, $diameter);
			};

			if($key == 'climate'){
				$climate = str_replace(',', '/', $value);
				array_push($array_dados, $climate);
			};

			if($key == 'gravity'){
				$gravity = str_replace(',', '/', $value);
				array_push($array_dados, $gravity);
			};

			if($key == 'terrain'){
				$terrain = str_replace(',', '/', $value);
				array_push($array_dados, $terrain);
			};

			if($key == 'population'){
				$population = str_replace(',', '/', $value);
				array_push($array_dados, $population);
			};			
		};

	}else if($tipo2[0] == 'starships'){
		foreach ($array as $key => $value) {
				

			if($key == 'name'){
				$name = str_replace(',', '/', $value);
				array_push($array_dados, $name);
			};

			if($key == 'model'){
				$model = str_replace(',', '/', $value);
				array_push($array_dados, $model);
			};

			if($key == 'manufacturer'){
				$manufacturer = str_replace(',', '/', $value);
				array_push($array_dados, $manufacturer);
			};

			if($key == 'cost_in_credits'){
				$cost_in_credits = str_replace(',', '/', $value);
				array_push($array_dados, $cost_in_credits);
			};

			if($key == 'length'){
				$length = str_replace(',', '/', $value);
				array_push($array_dados, $length);
			};

			if($key == 'max_atmosphering_speed'){
				$max_atmosphering_speed = str_replace(',', '/', $value);
				array_push($array_dados, $max_atmosphering_speed);
			};

			if($key == 'crew'){
				$crew = str_replace(',', '/', $value);
				array_push($array_dados, $crew);
			};

			if($key == 'cargo_capacity'){
				$cargo_capacity = str_replace(',', '/', $value);
				array_push($array_dados, $cargo_capacity);
			};

			if($key == 'hyperdrive_rating'){
				$hyperdrive_rating = str_replace(',', '/', $value);
				array_push($array_dados, $hyperdrive_rating);
			};

			if($key == 'starship_class'){
				$starship_class = str_replace(',', '/', $value);
				array_push($array_dados, $starship_class);
			};

		};
	};


	echo implode(',',$array_dados);
	exit;

?>	