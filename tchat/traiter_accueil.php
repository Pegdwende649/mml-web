<?php
session_start();
// on se connecte � notre base de donn�es
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=usa', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
    if(!empty($_POST['param_message'])){ // si les variables ne sont pas vides
    
        //$pseudo = mysql_real_escape_string($_POST['param_pseudo']);
		$auteur = $_SESSION['id_auteur'];
		$destinataire = $_SESSION['id_dest'];
        $message = $_POST['param_message'];

        // puis on entre les donn�es en base de donn�es :
        $insertion = $bdd->prepare('INSERT INTO messages VALUES("", :auteur, :message, :destinataire)');
        $insertion->execute(array(
            'auteur' => $auteur,
            'message' => $message,
			'destinataire' => $destinataire
        ));
		//echo $pseudo. " dit : ".$message;
		echo $message;

    }
    else{
        echo "Vous avez oubli� de remplir un des champs !";
    }

?>
