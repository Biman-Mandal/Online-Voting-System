<?php 
	session_start();
	$_SESSION['is_login']='';
	$_SESSION['Email']='';
	session_destroy();
	header('location: ../index.php?msg=logout successfull');

 ?>