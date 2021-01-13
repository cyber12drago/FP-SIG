<?php
session_start();
//find user name
	include 'koneksi.php';
	$nama=$_POST["nama"];
	$lat=$_POST['latitude'];
	$long=$_POST['longtitude'];

	$result = $mysqli->query("INSERT INTO `tempat` (`nama`, `latitude`, `longtitude`) VALUES ('".$nama."', '".$lat."', '".$long."');");
	

	if(!$result){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		header('Location: index5.php');
	}
	
	
	
	
	

	
?>
<!DOCTYPE html>
