<?php
			session_start();
			include_once('connexion_bd_inc.php'); 
			$id_con=document_connexion();
?>
<?php 
	
	$extensions = array('.png', '.gif', '.jpg', '.jpeg', '.JPG', '.JPEG', '.PNG');
    $extension = strrchr($_FILES['lien']['name'], '.');
	
	if (isset($_POST['ajout']) && isset($_FILES['lien']) && in_array($extension, $extensions)) 
	{
	$email = $_SESSION['email'];
	$id_internaute = $_SESSION['id_auteur'];
      if(!is_dir('images/'))
	   {
         mkdir('images/', 0777);
	     $uploaddir = 'photo_profile/'.$email.'/';
         $uploadfile = $uploaddir . basename($_FILES['lien']['name']);
		 move_uploaded_file($_FILES['lien']['tmp_name'], $uploadfile);
	     $id_con->query("UPDATE internaute SET lien_photo = '$uploadfile' WHERE id = ".$_SESSION['id_auteur']."");
		 //$_SESSION['lien'] = $uploadfile;
		 $_SESSION['p'] = $uploadfile;
		 } else 
		{
		 $uploaddir = 'images/';
         $uploadfile = $uploaddir . basename($_FILES['lien']['name']);
		 move_uploaded_file($_FILES['lien']['tmp_name'], $uploadfile);
	     $id_con->query("UPDATE internaute SET lien_photo = '$uploadfile' WHERE id = ".$_SESSION['id_auteur']."");
		 
		 $_SESSION['p'] = $uploadfile;
		 }
		} //else { echo "images/images.png";  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BU Business</title>
<link rel="icon" type="image/png" href="images/b_u.png" />
<script src="jquery.min.js"></script>
<script src="funct_ind.js" type="text/javascript"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style_connect.css">
<script>
      $(function() {
        $('#actualiser').click(function() {
		  var param1 = $('#user_name').val();
		  var param2 = $('#email').val();
		  var param3 = $('#mdpp').val();
		  var param4 = $('#mdp_conf').val();
		  var param5 = $('#nom').val();
		  var param6 = $('#prenoms').val();
		  var param7 = $('#ville').val();
		  var param8 = $('#pays').val();
		  var param9 = $('#telephone').val();
		  var param10 = $('#adresse').val();
	  $.post('modif_profile.php', {param_user: param1, param_email: param2, param_mdp: param3, param_mdp_conf: param4, param_nom: param5, param_prenoms: param6, param_ville: param7, param_pays: param8, param_telephone: param9, param_adresse: param10},
  function(data) {
       
   if (data == 1 || data == 2) 
    {
      update.innerHTML = "<span class='correct'>Votre profile a été modifié avec succès</span>";
	  mdp.innerHTML = "<span class='error'>  </span>";
    } else 
	{
	  mdp.innerHTML = "<span class='error'>Vérifier votre mot de passe</span>";
	  update.innerHTML = "<span class='error'>Mise à jour non effectué</span>";
	}
    		}); 
        });  
      });  
</script>

<style type="text/css">
<!--

td#parametres a:hover { text-decoration:none; background-color:#66CCCC; }

td#parametres a { text-decoration:none;}

.Style2 {
	font-size: 24px;
	color: #006600;
}
.Style3 {color: #006600}

.correct {
  color: green;
  font-size: 14px;
  font-weight:bold;
  border: 1px green;
  width:300px;
  height:10px;
}
.error {
  color: red;
  font-size: 14px;
  font-weight:bold;
  border: 1px red;
  width:300px;
  height:10px;
}
.Style4 {color: #006633}


-->
</style>


</head>

<body>
     <?php
	  	include('entete.php');
      ?>

<div style="width:900px; height:200px; margin-left:100px; margin-top:50px;" align="center"> 
<div style="width:750px; height:200px; float:right;"> 
<table width="500" height="150" border="0">
  <tr style="background:#ADD8E6;">
    <th colspan="2" scope="col" width="523"><span class="Style2">PARAMETRES </span></th>
    </tr>
  <tr  style="background:#fff;">
    <td height="30" colspan="2" id="parametres"><a href="mon_profile.php">Mon profile</a></td>
    </tr>
  <tr style="background:#fffccc;">
    <td height="30" colspan="2" id="parametres"><a href="poster_annonce.php">Poster une nouvelle annonce</a></td>
  </tr>
  <tr style="background:#fff;">
    <td height="30" colspan="2" id="parametres"><a href="mes_annonces.php">Mes annonces</a></td>
  </tr>
  <tr style="background:#fffccc;">
    <td colspan="2" height="30" id="parametres"><a href="boutique_bu.php">Boutique BU en ligne </a></td>
    </tr>
  <tr style="background:#fff;">
    <td colspan="2" height="30" id="parametres"><a href="discussion.php">Business Discussion </a></td>
    </tr>
</table>

</div>

<div style="width:150px; height:200px; background-color:; float:left;">
  <img src="<?php if (isset($_SESSION['p'])) echo $_SESSION['p']; else echo "images/images.png"?>" width="150" height="150" /> 
</div>

</div>

<div style="width:500px; height:700px; margin-left:375px; margin-top:30px;" align="center"> 
<table width="500" height="800" border="0">
  <tr style="background:#ADD8E6;">
    <th height="28" colspan="2" scope="col"><span class="Style2">Mon Profile </span></th>
    </tr>
  <tr  style="background:#fff;">
    <td height="30" id="parametres" colspan="2">
	<div id="update"></div>	</td>
    </tr>
	<form method="post" enctype="multipart/form-data">
  <tr  style="background:#fff;">
    <td width="239" height="30" id="parametres">Photo (facultatif)</td>
	<td width="274" height="30" id="parametres">
	<input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
	<input name="lien" type="file" size="30" id="lien"/>
		</td>
    </tr>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres">&nbsp;</td>
	  <td height="30" id="parametres"><div align="right">
	    <input type="submit" name="ajout" value="Actualiser Photo" />
	    </div></td>
	  </tr>
	  </form>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres">&nbsp;</td>
	  <td height="30" id="parametres">&nbsp;</td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres">Nom Utilisateur </td>
	  <td height="30" id="parametres"><input name="user_name" type="text" size="40"  id="user_name" value="<?php $req_user = $id_con->query("SELECT user_name FROM internaute WHERE id = ".$_SESSION['id_auteur'].""); $row_user = $req_user->fetch(PDO::FETCH_ASSOC); echo $row_user['user_name']; ?>"/></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres">&nbsp;</td>
	  <td height="30" id="parametres">&nbsp;</td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres">Email</td>
	  <td height="30" id="parametres"><input name="email" type="text" size="40"  id="email" value="<?php $req_email = $id_con->query("SELECT email FROM internaute WHERE id = ".$_SESSION['id_auteur'].""); $row_email = $req_email->fetch(PDO::FETCH_ASSOC); echo $row_email['email']; ?>"/></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres" colspan="2">
	  <div id="mdp"></div>	  </td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres">Mot de passe </td>
	  <td height="30" id="parametres"><input name="mdp" type="password" size="40"  id="mdpp" value="<?php $req_mdp = $id_con->query("SELECT mdp FROM internaute WHERE id = ".$_SESSION['id_auteur'].""); $row_mdp = $req_mdp->fetch(PDO::FETCH_ASSOC); echo $row_mdp['mdp']; ?>"/></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres">&nbsp;</td>
	  <td height="30" id="parametres">&nbsp;</td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres">Confirmer mot de passe </td>
	  <td height="30" id="parametres"><input name="mdp_conf" type="password" size="40"  id="mdp_conf" value="<?php $req_mdp = $id_con->query("SELECT mdp FROM internaute WHERE id = ".$_SESSION['id_auteur'].""); $row_mdp = $req_mdp->fetch(PDO::FETCH_ASSOC); echo $row_mdp['mdp']; ?>"/></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres" colspan="2"><span class="Style4">(Après l'ajout du nom et du prénom, ils ne peuvent être modifiés)</span></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres">Nom</td>
	  <td height="30" id="parametres"><input name="nom" type="text" size="40"  id="nom" value="<?php $req_nom = $id_con->query("SELECT nom FROM internaute WHERE id = ".$_SESSION['id_auteur'].""); $row_nom = $req_nom->fetch(PDO::FETCH_ASSOC); echo $row_nom['nom']; ?>"/></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres">&nbsp;</td>
	  <td height="30" id="parametres">&nbsp;</td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres">Pr&eacute;noms</td>
	  <td height="30" id="parametres"><input name="prenoms" type="text" size="40"  id="prenoms" value="<?php $req_prenoms = $id_con->query("SELECT prenoms FROM internaute WHERE id = ".$_SESSION['id_auteur'].""); $row_prenoms = $req_prenoms->fetch(PDO::FETCH_ASSOC); echo $row_prenoms['prenoms']; ?>"/></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres">&nbsp;</td>
	  <td height="30" id="parametres">&nbsp;</td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres">Ville</td>
	  <td height="30" id="parametres"><input name="ville" type="text" size="40"  id="ville" value="<?php $req_ville = $id_con->query("SELECT ville FROM internaute WHERE id = ".$_SESSION['id_auteur'].""); $row_ville = $req_ville->fetch(PDO::FETCH_ASSOC); echo $row_ville['ville']; ?>"/></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres">&nbsp;</td>
	  <td height="30" id="parametres">&nbsp;</td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres">Pays</td>
	  <td height="30" id="parametres"><input name="pays" type="text" size="40"  id="pays" value="<?php $req_pays = $id_con->query("SELECT pays FROM internaute WHERE id = ".$_SESSION['id_auteur'].""); $row_pays = $req_pays->fetch(PDO::FETCH_ASSOC); echo $row_pays['pays']; ?>"/></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres">&nbsp;</td>
	  <td height="30" id="parametres">&nbsp;</td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres">T&eacute;l&eacute;phone</td>
	  <td height="30" id="parametres"><input name="telephone" type="text" size="40"  id="telephone" value="<?php $req_tel = $id_con->query("SELECT telephone FROM internaute WHERE id = ".$_SESSION['id_auteur'].""); $row_tel = $req_tel->fetch(PDO::FETCH_ASSOC); echo $row_tel['telephone']; ?>"/></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres">&nbsp;</td>
	  <td height="30" id="parametres">&nbsp;</td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" id="parametres">Adresse</td>
	  <td height="30" id="parametres"><input name="adresse" type="text" size="40"  id="adresse" value="<?php $req_adresse = $id_con->query("SELECT adresse FROM internaute WHERE id = ".$_SESSION['id_auteur'].""); $row_adresse = $req_adresse->fetch(PDO::FETCH_ASSOC); echo $row_adresse['adresse']; ?>"/></td>
	</tr>
	<tr  style="background:#fff;" align="center">
    <td width="239" height="30" id="parametres" colspan="2">
      <button id="actualiser">Actualiser mon profile</button>    </td>
	</tr>
</table>
</div>


</div>

</body>
</html>
