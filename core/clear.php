<?php
session_start();
if (isset($_SESSION)) {
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
}

if(!isset($_SESSION['cart'])){
	header("Location: ../index.php");
}
else{
	echo "You are still logged in";
}