<?php
        session_start(); 
        $auteur = $_SESSION['id_auteur'];
		$destinataire = $_SESSION['id_dest'];
		
		
// ...
// on se connecte � notre base de donn�es
 require_once('connexion_bd_inc.php');
	$id_con=document_connexion();
	
if(!empty($_GET['id'])){ // on v�rifie que l'id est bien pr�sent et pas vide

    $id = (int) $_GET['id']; // on s'assure que c'est un nombre entier
	
    // on r�cup�re les messages ayant un id plus grand que celui donn�
    $requete = $id_con->query("SELECT id,auteur,message FROM messages WHERE auteur = '$auteur' AND destinataire = '$destinataire' AND id > '$id' UNION ALL SELECT id,auteur,message FROM messages WHERE auteur = '$destinataire' AND destinataire = '$auteur' AND id > '$id' ORDER BY id DESC LIMIT 0,10");
    
	$i = 1;
	$messages = null;
	
	//$donnees = mysql_fetch_assoc($requete);
	//$a=$auteur;
    // on inscrit tous les nouveaux messages dans une variable
    while($donnees = $requete->fetch(PDO::FETCH_ASSOC)){
	   if (($i%2)==0)
	    $messages = "<p style=\"color:#3333FF\" id=\"" . $donnees['id'] . "\">". $donnees['message'] . "</p>"; else 
	    $messages = "<p style=\"color:#ffffFF\" id=\"" . $donnees['id'] . "\">". $donnees['message'] . "</p>";
	   $i++;
    }

    echo $messages; // enfin, on retourne les messages � notre script JS
    
} //else { echo "error"; }

?>
