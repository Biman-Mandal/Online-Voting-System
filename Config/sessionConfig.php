<?php 
	session_start();
	if($_SESSION['is_login']==' ' || empty($_SESSION['is_login']) && $_SESSION['Email']==' ' || empty($_SESSION['Email'])){
	header('location:../index.php');
	}
 
 ?>