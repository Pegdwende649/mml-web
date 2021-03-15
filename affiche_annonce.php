<?php
			session_start();
			include_once('connexion_bd_inc.php'); 
			$id_con=document_connexion();
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



<!--


.Style2 {
	font-size: 24px;
	color: #006600;
}

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


<div style="width:625px; height:700px; margin-left:375px; margin-top:30px;" align="center"> 
<table width="625" height="710" border="0">
  <tr style="background:#ADD8E6;">
    <th height="28" colspan="2" scope="col"><div align="left">
	<span class="Style2">
	<?php
		$req_annonce = $id_con->query("SELECT * FROM annonce WHERE id = ".$_GET['id_annonce']."");
		$rep_annonce = $req_annonce->fetch(PDO::FETCH_ASSOC);
		echo $rep_annonce['titre'];
?>
</span>
</div></th>
    </tr>
	<tr  style="background:#fff;">
    <td height="30" colspan="2"></td>
    </tr>
  <tr  style="background:#ADD8E6;">
    <td width="300" height="30"><span class="Style2">Spot</span></td>
	<td width="315"><span class="Style2">Description</span></td>
	</tr>
  <tr  style="background:#fff;">
    <td height="337" ><img src="images/ML.jpeg " width="300" height="300" /></td>
    <td><?php echo $rep_annonce['titre'];?></td>
  </tr>
  <tr  style="background:#ADD8E6;" >
    <td height="30"  colspan="2"><span class="Style2">D&eacute;tails</span></td>
   </tr>
  <tr  style="background:#fff;">
    <td height="20" ><span class="Style2">Cat&eacute;gorie</span></td>
    <td><?php $id_cat = $rep_annonce['categorie_annonce']; $req_cat =  $id_con->query("SELECT libelle FROM categorie_annonce WHERE id = '$id_cat'"); $row_cat = $req_cat->fetch(PDO::FETCH_ASSOC); echo $row_cat['libelle'];?></td>
  </tr>
  <tr  style="background:#fff;">
    <td height="25" ><span class="Style2">Ville</span></td>
    <td><?php echo $rep_annonce['ville'];?></td>
  </tr>
  <tr  style="background:#fff;">
    <td height="25" ><span class="Style2">Etat</span></td>
    <td><?php echo $rep_annonce['etat'];?></td>
  </tr>
  <tr  style="background:#fff;">
    <td height="25" ><span class="Style2">Code postal </span></td>
    <td><?php echo $rep_annonce['code_postal'];?></td>
  </tr>
  <tr  style="background:#fff;">
    <td height="25" ><span class="Style2">Pays</span></td>
    <td><?php echo $rep_annonce['pays'];?></td>
  </tr>
  <tr  style="background:#fff;">
    <td height="25" ><span class="Style2">T&eacute;l&eacute;phone</span></td>
    <td><?php echo $rep_annonce['telephone'];?></td>
  </tr>
  <tr  style="background:#fff;">
    <td height="25" ><span class="Style2">Adresse</span></td>
    <td><?php echo $rep_annonce['adresse'];?></td>
  </tr>
  <tr  style="background:#fff;">
    <td height="25" ><span class="Style2">Site web </span></td>
    <td><?php echo $rep_annonce['site_web'];?></td>
  </tr>
  <tr  style="background:#fff;">
    <td height="25" ><span class="Style2">Publication</span></td>
    <td><?php echo $rep_annonce['date_annonce'];?></td>
  </tr>
</table>
</div>

</div>
</body>
</html>
