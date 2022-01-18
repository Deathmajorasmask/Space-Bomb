<?php
	$action = $_POST['action'];

	if ($action == "addProduct") 
		addProduct();
	else if ($action == "getProducts")
		getProducts();

	function connect() {
		$databasehost = "";
		$databasename = "";
		$databaseuser = "";
		$databasepass = "";

		$mysqli = new mysqli($databasehost, $databaseuser, $databasepass, $databasename);
		if ($mysqli->connect_errno) {
			echo "Problema con la conexion a la base de datos";
		}
		return $mysqli;
	}

	function addProduct() {
		$id = $_POST["id"];
		$nickname = $_POST["nickname"];
		$description = $_POST["description"];
		$score = $_POST["score"];
		$mysqli = connect();
		
		$result = $mysqli->query("INSERT INTO tblscores(id, nickname, description, score ) values('".$id."','".$nickname."','".$description."',".$score.")");
		
		if (!$result) {
			echo "Problema al hacer un query: " . $mysqli->error;								
		} else {
			echo "Todo salio bien";		
		}
		
		mysqli_close($mysqli);
	}

	function getProducts() {
		$mysqli = connect();

		$result = $mysqli->query("SELECT * FROM tblscores");	
		
		if (!$result) {
			echo "Problema al hacer un query: " . $mysqli->error;								
		} else {
			// Recorremos los resultados devueltos
			$rows = array();
			while( $r = $result->fetch_assoc()) {
				$rows[] = $r;
			}			
			// Codificamos los resultados a formato JSON y lo enviamos al HTML (Client-Side)
			echo json_encode($rows);
		}
		
		mysqli_close($mysqli);
	}
?>