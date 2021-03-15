<?php
session_start();	
require_once('connexion_bd_inc.php'); 
$id_con=document_connexion();
$auteur = $_SESSION['id_auteur'];
$destinataire = $_SESSION['id_dest'];
// ...
// on se connecte à notre base de données


if(!empty($_GET['id'])){ // on vérifie que l'id est bien présent et pas vide
    $id = (int) $_GET['id']; // on s'assure que c'est un nombre entier
    // on récupère les messages ayant un id plus grand que celui donné
$count_email=0;
    $requete = $id_con->query("SELECT id,auteur,message FROM messages WHERE auteur = '$auteur' AND destinataire = '$destinataire' AND id > '$id' UNION ALL SELECT id,auteur,message FROM messages WHERE auteur = '$destinataire' AND destinataire = '$auteur' AND id > '$id' ORDER BY id DESC");
	$i = 1;
	$messages = null;
$count_email =  $requete->rowCount();
	//$donnees = mysql_fetch_assoc($requete);
	//$a=$auteur;
    // on inscrit tous les nouveaux messages dans une variable
	  if ($count_email != 0) 
	    {
   
 while($donnees = $requete->fetch(PDO::FETCH_ASSOC)){
	   if ($id_dest==$donnees['auteur'] ){
	     $messages="<li class=\"chat-left\" id= \"" . $donnees['id'] . "\">
                                        <div class=\"chat-avatar\">
                                            <img src=\"https://www.bootdey.com/img/Content/avatar/avatar3.png\" alt=\"Retail Admin\">
                                            <div class=\"chat-name\">".$row_inter['user_name']."</div>
                                        </div>
                                        <div class=\"chat-text\">".$donnees['message']."</div>
                                        <div class=\"chat-hour\">08:55 <span class=\"fa fa-check-circle\"></span></div>
                                    </li>";
}
 else 
	   { $messages = "<li class=\"chat-right\" id=  \"" . $donnees['id'] . "\">
                                        <div class=\"chat-hour\">08:59 <span class=\"fa fa-check-circle\"></span></div>
                                        <div class=\"chat-text\">" . $donnees['message'] . "</div>
                                        <div class=\"chat-avatar\">
                                            <img src=\"https://www.bootdey.com/img/Content/avatar/avatar4.png\" alt=\"Retail Admin\">
                                            <div class=\"chat-name\">moi</div>
                                        </div>
                                    </li>";
}
    }

    echo $messages; // enfin, on retourne les messages à notre script JS
    
} //else { echo "error"; }
}
?>
