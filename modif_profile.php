<?php
		session_start();
	require_once('connexion_bd_inc.php');
	$id_con=document_connexion(); 
	//error_reporting(0);
	   $user=$_POST['param_user'];
	   $email=$_POST['param_email'];
	   $mdp=$_POST['param_mdp'];
	   $mdp_conf=$_POST['param_mdp_conf'];
	   $nom=$_POST['param_nom'];
	   $prenoms=$_POST['param_prenoms'];
	   $ville=$_POST['param_ville'];
	   $pays=$_POST['param_pays'];
	   $telephone=$_POST['param_telephone'];
	   $adresse=$_POST['param_adresse'];  
	   
	/*   $lien='photo.jpg';
	   $user='awagbe';
	   $email='ola@gmial.com';
	   $mdp='pppppp';
	   $nom='Bio';
	   $prenoms='Ola';
	   $ville='Cotonou';
	   $pays='Benin';
	   $telephone='96138021';
	   $adresse='missebo'; */
	   
	   $ip = $_SERVER['REMOTE_ADDR'];
		
		$longueur = iconv_strlen($mdp);

$adr_exist = $id_con->query("SELECT id, user_name FROM internaute WHERE email = '$email' AND mdp = '$mdp'");
	  $row_adr = $adr_exist->fetch(PDO::FETCH_ASSOC);
	  $count_email =  $adr_exist->rowCount();

		
   	$test_nom = $id_con->query("SELECT nom, prenoms FROM internaute WHERE id = ".$_SESSION['id_auteur']."");
	$row_nom = $test_nom ->fetch(PDO::FETCH_ASSOC);
	
	if ($longueur >= 6 && $mdp == $mdp_conf)
	{
	if ($row_nom['nom'] != '' && $row_nom['prenoms'] !='') 
	{
	  $id_con->query("UPDATE internaute SET user_name = '$user', email = '$email', mdp = '$mdp', ville = '$ville', pays = '$pays', telephone = '$telephone', adresse = '$adresse', ip = '$ip' WHERE id = ".$_SESSION['id_auteur']."");
	  echo 1;
	} 
	if ($row_nom['nom'] == '' && $row_nom['prenoms'] == '') 
	{
	  $id_con->query("UPDATE internaute SET user_name = '$user', email = '$email', mdp = '$mdp', nom = '$nom', prenoms = '$prenoms', ville = '$ville', pays = '$pays', telephone = '$telephone', adresse = '$adresse', ip = '$ip' WHERE id = ".$_SESSION['id_auteur']."");
	  echo 2;
	}
	}else 
	{echo 3;
echo $user;



}
?>
