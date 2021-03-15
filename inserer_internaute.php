<?php
		session_start();
		//ini_set('display_errors', 1);
	require_once('connexion_bd_inc.php');
	$id_con=document_connexion(); 
	//error_reporting(0);
	   $user=$_POST['param_user'];
	   $email=$_POST['param_email'];
	   $mdp=$_POST['param_mdp'];
	   $mdp_conf=$_POST['param_mdp_conf'];
	   
	   $date_jour = date("d/m/Y");
		$heure = date("H:i");
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$longueur = iconv_strlen($mdp);
		
		$adr_exist = $id_con->query("SELECT id FROM internaute WHERE email = '$email'");
		$count_email = $adr_exist->rowCount();

		$user_exist = $id_con->query("SELECT id FROM internaute WHERE user_name = '$user'");
		$count_user = $user_exist->rowCount();
    if ($count_user == 0 && $count_email == 0 && $user != "" && $email != "" && $mdp != "" && $mdp == $mdp_conf && filter_var($email, FILTER_VALIDATE_EMAIL) && $longueur >= 6)
	  {
	    $id_con->query("INSERT INTO internaute(id, user_name, email, mdp, date_insc, heure_insc, ip) VALUES('', '$user', '$email', '$mdp', '$date_jour', '$heure', '$ip')");
	  } 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>

<link rel="icon" type="image/png" href="images/b_u.png" />
 <link rel="stylesheet" href="style_creer_compte.css">
<script src="jquery.min.js"></script>
<script src="funct_ind.js" type="text/javascript"></script>

<script>
$(function() {
        $('#connecter').click(function() {
		  var param1 = $('#email').val();
		  var param2 = $('#mdp').val();
		  $.post('connect_ut.php', {param_email: param1, param_mdp: param2},
  function(data) {
  if (data == 0) 
    {
	  echec_conx.innerHTML = "<span class='error'>Email ou mot de passe incorrect!</span>";
	  document.getElementById("email").value=param_email;
	  document.getElementById("mdp").value="";
	} else
	{
	  window.location.replace('Accueil.php');
	}
  			});
        });  
      });
</script>

<style type="text/css">
<!--
.Style1 {color: #FF0000}
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
   <?php
	  	include('entete.php');
      ?>
</div>
  <div class="signup-form">
      <form >
        <h1>Sign In</h1>
<input name="email" placeholder= "Email" type="email"  id="email" class="txtb">
<div id="echec_conx" align="center" style=" font-size:14px; color:#FF0000;"> </div>
<input name="mdp" placeholder= "Mot de passe " type="password"  id="mdp" class="txtb"> 
<input type="submit" id="connecter" class="signup-btn">
<h1>Votre compte a bien &eacute;t&eacute; cr&eacute;&eacute</h1>
</div>
</body>

</html>
