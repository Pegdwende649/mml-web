<?php 
	session_start();
	require_once('connexion_bd_inc.php');
	$id_con=document_connexion(); 
	error_reporting(0);
	   $email=$_POST['param_email'];
	   $email_exist = $id_con->query("SELECT * FROM internaute WHERE email = '$email'");
	   $count_email = $email_exist->rowCount();
	   if ($count_email == 0) echo 1; else echo 2;
	   
?>
