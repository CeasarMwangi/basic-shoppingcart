<?php 

try{
	$sql = "SELECT * FROM products";
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	$stmt->setFetchMode(PDO::FETCH_OBJ);

	$products = $stmt->fetchAll();

}catch(PDOException $e){

}
