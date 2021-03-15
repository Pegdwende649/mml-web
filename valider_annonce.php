<?php
			session_start();
			include_once('connexion_bd_inc.php'); 
			$id_con=document_connexion();
?>
<?php 
	
	$extensions = array('.png', '.gif', '.jpg', '.jpeg', '.JPG', '.JPEG', '.PNG');
    $extension = strrchr($_FILES['lien']['name'], '.');
	
	if (isset($_POST['poster']) && isset($_POST['description']) && isset($_POST['choix']) && isset($_FILES['lien']) && in_array($extension, $extensions)) 
	{
	$description = $_POST['description'];
	$choix = $_POST['choix'];
	$email = $_SESSION['email'];
	$id_internaute = $_SESSION['id_auteur'];
      if(!is_dir('annonce/'.$id_internaute.''))
	   {
         mkdir('annonce/'.$id_internaute.'', 0777);
	     $uploaddir = 'annonce/'.$id_internaute.'/';
         $uploadfile = $uploaddir . basename($_FILES['lien']['name']);
		 move_uploaded_file($_FILES['lien']['tmp_name'], $uploadfile);
	     $id_con->query("UPDATE annonce SET lien_image = '$uploadfile', description = '$description', choix = '$choix' WHERE id = ".$_SESSION['id_annonce']."");
		 header("Location: Accueil.php");
		 } else 
		{
		 $uploaddir = 'annonce/'.$id_internaute.'/';
         $uploadfile = $uploaddir . basename($_FILES['lien']['name']);
		 move_uploaded_file($_FILES['lien']['tmp_name'], $uploadfile);
	     $id_con->query("UPDATE annonce SET lien_image = '$uploadfile', description = '$description', choix = '$choix' WHERE id = ".$_SESSION['id_annonce']."");
		 header("Location: Accueil.php");
		 }
		} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BU Business</title>
<link rel="icon" type="image/png" href="images/deep2.png" />
<script src="jquery.min.js"></script>
<script src="funct_ind.js" type="text/javascript"></script>

<style type="text/css">
<!--
body{margin-top:20px;}
header {
	background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url(https://www.getsmarter.com/disk/public/sBBGDTboLgihDAZHFNC7aFHj/mit_sloan_csail_machine_learning_course_page_large_header_banner.jpg);
	height: 10vh;
	background-size: 30%;
	background-position: center center;
	position: relative;
}

.content {
      width: 94%;
      margin: 4em auto;
      font-size: 20px;
      line-height: 30px;
      text-align: justify;
}

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
.Style4 {color: #CC0000}
-->
</style>


</head>

<body>


<div>
         <header>
   <?php
	  	include('entete.php');
      ?>
</header>
         <div class="content">

<div style="width:500px; height:1000px; margin-left:375px; margin-top:30px;" align="center"> 
<table width="500" height="939" border="0">
  <tr style="background:#ADD8E6;">
    <th height="28" colspan="2" scope="col"><span class="Style2">Poster une nouvelle annonce </span></th>
    </tr>
  <tr  style="background:#fff;">
    <td width="141" height="30">&nbsp;</td>
    <td width="349">&nbsp;</td>
  </tr>
  <tr  style="background:#fff;">
	  <td height="30" colspan="2" style="background:#ADD8E6; color:#006600;">R&eacute;capitulatif de l'&eacute;tape 1</td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" style="color:#006600;">Type annonce </td>
	  <td><?php 
	       $req_annonce = $id_con->query("SELECT * FROM annonce WHERE internaute_id = ".$_SESSION['id_auteur']." ORDER BY id DESC");
		   $row_annonce = $req_annonce->fetch(PDO::FETCH_ASSOC);
		   $_SESSION['id_annonce'] = $row_annonce['id']; 
		   $typ = $row_annonce['type_annonce']; $req_type =  $id_con->query("SELECT libelle FROM type_annonce WHERE id = '$typ'"); 
		   $row_type = $req_type->fetch(PDO::FETCH_ASSOC); 
		   echo $row_type['libelle']; 
		    ?>		</td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" style="color:#006600;">Cat&eacute;gorie</td>
	  <td>
	    <?php $cat = $row_annonce['categorie_annonce']; $req_cat =  $id_con->query("SELECT libelle FROM categorie_annonce WHERE id = '$cat'"); $row_cat = $req_cat->fetch(PDO::FETCH_ASSOC); echo $row_cat['libelle']; ?>	  </td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" style="color:#006600;">Titre</td>
	  <td><?php echo $row_annonce['titre']; ?></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" style="color:#006600;">Ville </td>
	  <td><?php echo $row_annonce['ville']; ?></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" style="color:#006600;">Etat</td>
	  <td><?php echo $row_annonce['etat']; ?></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" style="color:#006600;">Code Postal </td>
	  <td><?php echo $row_annonce['code_postal']; ?></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" style="color:#006600;">Pays</td>
	  <td><?php echo $row_annonce['pays']; ?></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" style="color:#006600;">T&eacute;l&eacute;phone</td>
	  <td><?php echo $row_annonce['telephone']; ?></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" style="color:#006600;">Adresse</td>
	  <td><?php echo $row_annonce['adresse']; ?></td>
	</tr>
	<tr  >
	  <td height="30" colspan="2" style="background:#fff;">&nbsp;</td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" colspan="2" style="background:#ADD8E6; color:#006600;">Etapa 2/2 Valider l'annonce</td>
	</tr>
	<form method="post" enctype="multipart/form-data">
	  <tr  style="background:#fff;">
	    <td height="30" style="color:#CC0000;" colspan="2">
		<?php
	   if (isset($_POST['poster']))
	   {
	   if ($_POST['choix'] == '' && $_POST['description'] == '')
	   {
	   ?>
	  <div id="div_image">Vérifiez l'image </div>
	  <?php } }?>
		</td>
	    </tr>
	  <tr  style="background:#fff;">
	  <td height="30" style="color:#006600;">Spot (Image)</td>
	  <td>
	  <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
	  <input type="file" name="lien" /></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" style="color:#CC0000;" colspan="2">
	  <?php
	   if (isset($_POST['poster']))
	   {
	   if ($_POST['choix'] == '')
	   {
	   ?>
	  <div id="div_description">Faites une description de l'annonce</div>
	  <?php } }?>	  </td>
	</tr>
	<tr  style="background:#fff;">
	  <td height="212" style="color:#006600;">Description</td>
	  <td><textarea name="description" style="height:200px; width:350px;" id="description"></textarea></td>
	  </tr>
	 <tr  style="background:#fff;">
	  <td height="30" style="color:#CC0000;" colspan="2">
	  <?php
	   if (isset($_POST['poster']))
	   {
	   if ($_POST['choix'] == '')
	   {
	   ?>
	  <div id="div_option">Sélectionnez une option </div>
	  <?php } }?>	  </td>
	 </tr>
	  <tr  style="background:#fff;">
	  <td height="30" style="color:#006600;">Option</td>
	  <td><p align="justify">
	        <input type="radio" name="choix" value="g"  id="gratuit"/>
	        <span class="Style4">Gratuite</span> (Votre annonce apparaitra &agrave; la une de la page d'accueil) </p>
	    <p align="justify">
	      <input type="radio" name="choix" value="P"  id="payant"/>
	      <span class="Style4">Payante</span> (Votre annonce apparaitra &agrave; la une de la page d'accueil - Votre annonce apparaitra &agrave; intervalle de temps dans notre bani&egrave;re - Votre annonce apparaitra sur la page de profile de chaque business member de ce site) </p>	    </td>
	  </tr>
	<tr  style="background:#fff;">
	  <td colspan="2"><input type="submit" name="poster" value="Terminer de poster" /></td>
	  </form>
	  </tr>
	<tr  style="background:#fff;">
	  <td colspan="2"><div id="div_terminer"></div></td>
	  </tr>
</table>
</div>



</body>
</html>
