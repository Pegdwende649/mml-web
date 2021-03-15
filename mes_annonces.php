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



.Style1 {color: #FF0000}

td#parametres a:hover { text-decoration:none; background-color:#66CCCC; }

td#parametres a { text-decoration:none;}

.Style2 {
	font-size: 24px;
	color: #006600;
}
.Style3 {color: #006600}
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


 <table class="table table-dark table-striped">
        <thead>
          <tr>
	<th width="222" height="30" colspan="2" >Libell&eacute;</th>
            <th>D&eacute;but</th>
            <th>Fin</th>
            <th>Cat&eacute;gorie</th>
	    <th>Option</th>
          </tr>
        </thead>
        <tbody>
	<?php 
	$annonce= $id_con->query("SELECT * FROM annonce WHERE internaute_id = ".$_SESSION['id_auteur']." ORDER BY id DESC");
   	$i=$annonce->rowCount();	      
	?>
	<?php while($row_annonce=$annonce->fetch(PDO::FETCH_ASSOC)) {?>
  <tr>
    <td width="50" height="100" id="parametres">
	<img src="images/ML.jpeg" width="47" height="47" /></td>
	<td width="170" id="parametres"><a href="affiche_annonce.php?id_annonce=<?php echo $row_annonce['id'];?>"><?php 
	   echo $row_annonce['titre'];
	?></a></td>
	<td width="88">
	<?php 
	   echo $row_annonce['date_annonce'];
	?>	</td>
	<td width="88">
	<?php 
	   
	?>	</td>
	<td width="135">
	<?php 
	   $id_cat = $row_annonce['categorie_annonce'];
	   $cat =  $id_con->query("SELECT libelle FROM categorie_annonce WHERE id = '$id_cat'");
	   $row_cat = $cat->fetch(PDO::FETCH_ASSOC);
	   echo $row_cat['libelle'];
	?>	</td>
	<td width="64">
	<?php 
	   if($row_annonce['choix'] == 'g') echo 'Gratuit'; else echo 'Payant';
	?>	</td>
    </tr>
	<?php 
	  $i++; }
	?>

        </tbody>
      </table>
</div>

</body>
</html>
