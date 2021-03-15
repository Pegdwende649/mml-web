<?php
		session_start();
		require_once('connexion_bd_inc.php');
	    $id_con=document_connexion(); 
	
	   $titre=$_POST['param_titre'];
	   $ville=$_POST['param_ville'];
	   $etat=$_POST['param_etat'];
	   $code_postal=$_POST['param_code_postal'];
	   $pays=$_POST['param_pays'];
	   $telephone=$_POST['param_telephone'];
	   $adresse=$_POST['param_adresse'];
	   $site_web=$_POST['param_site_web'];
	   $type_annonce=$_POST['param_type_annonce'];
   	   $categorie_annonce=$_POST['param_categorie_annonce'];
	   
	   $internaute_id = $_SESSION['id_auteur'];
	   
	   $date_annonce = date("d/m/Y");
		$heure_annonce = date("H:i");
		
    if ($titre != "" && $ville != "" && $etat != "" && $code_postal != "" && $pays != "" && $telephone != "" && $adresse != "" && $type_annonce != "" && $categorie_annonce != "")
	  {
	    $id_con->query("INSERT INTO annonce(id, titre, ville, etat, code_postal, pays, telephone, adresse, site_web, type_annonce, categorie_annonce, date_annonce, heure_annonce, internaute_id) VALUES('', '$titre', '$ville', '$etat', '$code_postal', '$pays', '$telephone', '$adresse', '$site_web', '$type_annonce', '$categorie_annonce', '$date_annonce', '$heure_annonce', '$internaute_id')");
		echo 1;
	  } else {echo 0;}
?>

