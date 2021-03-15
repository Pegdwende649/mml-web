<?php
		session_start();
	require_once('connexion_bd_inc.php');
	$id_con=document_connexion(); 
	error_reporting(0);
	   $user=$_POST['param_user'];
	   $email=$_POST['param_email'];
	   $mdp=$_POST['param_mdp'];
	   $mdp_conf=$_POST['param_mdp_conf'];
		
		$date_jour = date("d/m/Y");
		$heure = date("H:i");
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$longueur = iconv_strlen($mdp);
		
		$adr_exist = $id_con->query("SELECT * FROM internaute WHERE email = '$email'");
		$count_email =  $adr_exist->rowCount();
		
		$user_exist =  $id_con->query("SELECT * FROM internaute WHERE user_name = '$user'");
		$count_user = $user_exist->rowCount();
		
    if ($count_email != 0 || $count_user !=0 || $user == "" || $email == "" || $mdp == "" || !(filter_var($email, FILTER_VALIDATE_EMAIL)) || $longueur < 6)
	{
		echo 2;
	}	
?>
