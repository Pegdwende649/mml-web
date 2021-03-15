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
<link rel="icon" type="image/png" href="images/b_u.png" />
<script src="jquery.min.js"></script>
<script src="funct_ind.js" type="text/javascript"></script>

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

<div style="width:1080px; height:1500px; display:block; background-color:#f4f9fd; margin-left:120px;">
<div style="width:1080px; height:70px; background-color:#ADD8E6;">
    <?php
	  	include('entete.php');
      ?>
</div>
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
<table width="500"  border="0">
  <tr style="background:#ADD8E6;">
    <th width="548" height="28" colspan="2" scope="col"><div align="left">Fin annonce </div></th>
    </tr>
  
	<form method="post" enctype="multipart/form-data">
	  </form>
</table>
</div>


</div>

</body>
</html>
