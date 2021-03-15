<?php
//ini_set('display_errors','On');
session_start();
require_once('connexion_bd_inc.php');
$id_con=document_connexion(); 
error_reporting(0);
	   $email = $_POST['param_email'];
	   $mdp = $_POST['param_mdp'];
	   //$email="olymp@yahoo.fr";
	   //$mdp="mabrebis";
	   $_SESSION['email'] = $email;
	   
	  $adr_exist = $id_con->query("SELECT id, user_name FROM internaute WHERE email = '$email' AND mdp = '$mdp'");
	  $row_adr = $adr_exist->fetch(PDO::FETCH_ASSOC);
	  $count_email =  $adr_exist->rowCount();
	  if ($count_email == 0) 
	    {echo 0;} 
		else 
		{
		$_SESSION['id_auteur'] = $row_adr['id'];
		$_SESSION['user_name'] = $row_adr['user_name'];
		 echo 1;
		}
?>
