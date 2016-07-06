<?php
define("HOST","localhost");
define("DB","cart");
define("USERNAME","root");
define("PASS","");

try{
	$conn = new PDO("mysql:host=localhost;dbname=cart",USERNAME,PASS);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

}catch(PDOException $e){
	echo $e->getMessage();
}
