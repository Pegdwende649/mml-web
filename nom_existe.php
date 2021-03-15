<?php 
	session_start();
	require_once('connexion_bd_inc.php');
	$id_con=document_connexion(); 
	error_reporting(0);
   $user=$_POST['param_user'];

	   $user_exist =  $id_con->query("SELECT * FROM internaute WHERE user_name = '$user'");
	   $count_user = $user_exist->rowCount();
	   if ($count_user == 0) echo 1; else echo 2;
	   
?>
