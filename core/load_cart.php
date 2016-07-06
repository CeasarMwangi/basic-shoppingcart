<?php

if(count($_SESSION['cart']) > 0 ){ 
	try{
		$in_array = array();
		foreach ($_SESSION['cart'] as $product_key => $product) {
			array_push($in_array, $product_key);
		}
		$in = str_repeat('?,', count($in_array) - 1) . '?';
		$sql = "SELECT * FROM products WHERE id IN ($in)";
		$stmt = $conn->prepare($sql);
		$stmt->execute($in_array);

		$stmt->setFetchMode(PDO::FETCH_OBJ);

		$products = $stmt->fetchAll();
		
		


	}catch(PDOException $e){

	}
}


