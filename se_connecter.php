<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>

<link rel="icon" type="image/png" href="images/b_u.png" />
<script src="jquery.min.js"></script>
<script src="funct_ind.js" type="text/javascript"></script>
<link rel="stylesheet" href="style_creer_compte.css">
<link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">

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
.Style2 {font-size: 24px}
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
<div align ="center">ou</div>
<a href="creer_un_compte.php">Create one ?</a>
</div>
</body>
</html>


