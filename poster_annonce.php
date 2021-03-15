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

<script>
      $(function() {
        $('#enregistrer').click(function() {
		  var param1 = $('#titre').val();
		  var param2 = $('#ville').val();
		  var param3 = $('#etat').val();
		  var param4 = $('#code_postal').val();
		  var param5 = $('#pays').val();
		  var param6 = $('#telephone').val();
		  var param7 = $('#adresse').val();
		  var param8 = $('#site_web').val();
		  var param9 = $('input[name=type_annonce]:checked').val();
		  var param10 = $('#categorie_annonce').val();
	  $.post('ajout_annonce1.php', {param_titre: param1, param_ville: param2, param_etat: param3, param_code_postal: param4, param_pays: param5, param_telephone: param6, param_adresse: param7, param_site_web: param8, param_type_annonce: param9, param_categorie_annonce: param10},
  function(data) {
   if (data == 1)   
   {
    window.location.replace('valider_annonce.php');
    } 
   if (data == 0) 
   {
   
   if (param1 == '') 
    {
      div_titre.innerHTML = "<span class='error'>Donnez un titre à l'annonce</span>";
	}
	if (param2 == '') 
    {
      div_ville.innerHTML = "<span class='error'>Renseignez la ville</span>";
	}
	if (param3 == '') 
    {
      div_etat.innerHTML = "<span class='error'>Renseignez l'état</span>";
	} 
	if (param4 == '') 
    {
      div_code_postal.innerHTML = "<span class='error'>Renseignez le code postal</span>";
	}
	if (param5 == '') 
    {
      div_pays.innerHTML = "<span class='error'>Renseignez le pays</span>";
	}
	if (param6 == '') 
    {
      div_telephone.innerHTML = "<span class='error'>Renseignez le téléphone</span>";
	}
	if (param7 == '') 
    {
     div_adresse.innerHTML = "<span class='error'>Renseignez l'adresse</span>";
	}
	if($('input[type=radio][name=type_annonce]:checked').length != 1)
	{
      div_type_annonce.innerHTML = "<span class='error'>Sélectionnez une option !</span>";
	}
	if (param10 == '') 
    {
     div_categorie_annonce.innerHTML = "<span class='error'>Renseignez une catégorie</span>";
	}
	}
			}); 
        });  
      });  
</script>

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
.Style1 {color: #FF0000}

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

<div style="width:500px; height:700px; margin-left:375px; margin-top:30px;" align="center"> 
<table width="500" height="500" border="0">
  <tr style="background:#ADD8E6;">
    <th height="28" colspan="2" scope="col"><span class="Style2">Poster une nouvelle annonce </span></th>
    </tr>
  <tr  style="background:#fff;">
    <td height="30">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr  style="background:#ADD8E6;">
    <td height="30" colspan="2"><div align="center">Etape 1/2</div></td>
    </tr>
  
  <tr  style="background:#fff;">
    <td height="30" colspan="2"><div id="div_type_annonce">	  </div></td>
  </tr>
  <tr  style="background:#fff;">
    <td width="150" height="30">Type annonce</td>
	<td width="363">
	 <input type="radio" name="type_annonce" value="1"  id="achat"/>
	  Achat produit ou service
	  <input type="radio" name="type_annonce" value="2" id="vente"/>
	  Vente produit ou service	</td>
    </tr>
	<tr  style="background:#fff;">
	  <td height="30" colspan="2"><div id="div_categorie_annonce">	  </div></td>
	</tr>
	<tr  style="background:#fff;">
    <td height="30">Categorie</td>
	<td>
	<select name="categorie_annonce" id="categorie_annonce">
	<?php
            $req_cat="SELECT * FROM categorie_annonce ORDER BY libelle ASC";
            $roW_cat=$id_con->query($req_cat);
            while ($ligne=$roW_cat->fetch(PDO::FETCH_ASSOC))
            {
               echo '<OPTION VALUE="'.$ligne["id"].'">'.$ligne["libelle"].'</OPTION>';
            }
      ?>  
	</select>	</td>
	</tr>
	<tr  style="background:#fff;">
	  <td height="30" colspan="2"><div id="div_titre">	  </div></td>
	</tr>
	<tr  style="background:#fff;">
    <td height="30">Titre </td>
	<td><input name="titre" type="text" size="40"  id="titre"/></td>
    </tr>
	<tr  style="background:#fff;">
	  <td height="30" colspan="2"><div id="div_ville">	  </div></td>
	</tr>
	<tr  style="background:#fff;">
	  <td height="30">Ville</td>
	  <td><input name="ville" type="text" size="40"  id="ville"/></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" colspan="2"><div id="div_etat">	  </div></td>
	</tr>
	<tr  style="background:#fff;">
    <td height="30">Etat</td>
	<td><input name="etat" type="text" size="40"  id="etat"/></td>
    </tr>
	<tr  style="background:#fff;">
	  <td height="30" colspan="2"><div id="div_code_postal">	  </div></td>
	 </tr>
	<tr  style="background:#fff;">
	  <td height="30">Code postal </td>
	  <td><input name="code_postal" type="text" size="40"  id="code_postal"/></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" colspan="2"><div id="div_pays">	  </div></td>
	</tr>
	<tr  style="background:#fff;">
	  <td height="30">Pays</td>
	  <td><input name="pays" type="text" size="40"  id="pays"/></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" colspan="2"><div id="div_telephone">	  </div></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30">T&eacute;l&eacute;phone</td>
	  <td><input name="telephone" type="text" size="40"  id="telephone"/></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" colspan="2"><div id="div_adresse">	  </div></td>
	</tr>
	<tr  style="background:#fff;">
	  <td height="30">Adresse</td>
	  <td><input name="adresse" type="text" size="40"  id="adresse"/></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30">&nbsp;</td>
	  <td></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30">Site web (facultatif) </td>
	  <td><input name="site_web" type="text" size="40"  id="site_web"/></td>
	  </tr>
	<tr  style="background:#fff;">
	  <td height="30" colspan="2"><button id="enregistrer">Enregistrer Etape 1 </button></td>
	  </tr>
</table>
</div>


</body>
</html>
