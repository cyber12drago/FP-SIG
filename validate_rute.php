<?php
session_start();
//find user name

	$_SESSION["asal"]=$_POST["asal"];
	$_SESSION["tujuan"]=$_POST["tujuan"]; 

	header('location:final.php');



?>


<!DOCTYPE html>
