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
        $('#action').click(function() {
		if ($('#user_name').val() == '' || $('#email').val() == '' || $('#mdp_conf').val() == '' || $('#mdp').val() == '' || $('#mdp_conf').val().length < 6 || $('#mdp').val().length < 6)
		{
		   echec_insert.innerHTML = "<span>Compte non créé!</span>";
		} else {
		  var param1 = $('#user_name').val();
		  var param2 = $('#email').val();
		  var param3 = $('#mdp').val();
		  var param4 = $('#mdp_conf').val();
	  $.post('inserer_internaute.php', {param_user: param1, param_email: param2, param_mdp: param3, param_mdp_conf: param4},
  function(data) {
       
   if (data) 
    {
	  window.location.replace('inserer_internaute.php');	
      //$('#contenu').load('inserer_internaute.php #moov'); 
    } 
    		}); }
        });  
      });  
</script>

<script>
// Test sur l'ixistence du nom d'utilisateur
	$(function() {
        $('#user_name').blur(function() {
		  var param1 = $('#user_name').val();
		  $.post('nom_existe.php', {param_user: param1},
  function(data) {
  if (data == 2) 
    {
	  div_user.innerHTML = "<span class='error'>Ce nom d'utilisateur existe déjà!</span>";
	  document.getElementById("user_name").value="";
	}
  			});
        });  
      });
</script>

<script>
      $(function() {
        $('#action').click(function() {
		  var param1 = $('#user_name').val();
		  var param2 = $('#email').val();
		  var param3 = $('#mdp').val();
		  var param4 = $('#mdp_conf').val();
	  $.post('test_champs.php', {param_user: param1, param_email: param2, param_mdp: param3, param_mdp_conf: param4},
  function(data) {
      
   if (data == 2) 
  {
      
  if ($('#user_name').val() == ''){
     div_user.innerHTML = "<span class='error'>Entrez votre nom!</span>"; }
	 
  if(($('#mdp_conf').val() == '') || ($('#mdp').val() == '')){
	 div_mdp_conf.innerHTML = "<span class='error'>Vérifiez votre mot de passe!</span>";}
	 
  if($('#mdp').val() != $('#mdp_conf').val()){
	 div_mdp.innerHTML = "<span class='error'>Mots de passe non identiques</span>";}
	 
  if(($('#mdp_conf').val().length < 6) && ($('#mdp').val() !='') && ($('#mdp_conf').val() !='')  && ($('#mdp').val().length < 6)) {
	 div_mdp_conf.innerHTML = "<span class='error'>Six caractères au moins attendus!</span>";}
	 
  var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
  if (!reg.test($('#email').val()))
	{
	  div_email.innerHTML = "<span class='error'>E-mails incorrects</span>";
	}
	 
  }  		
  
          });
        });  
      });
</script>


<script>
// Test sur l'ixistence de l'email
	$(function() {
        $('#email').blur(function() {
		  var param1 = $('#email').val();
		  $.post('email_existe.php', {param_email: param1},
  function(data) {
  if (data == 2) 
    {
	  div_email.innerHTML = "<span class='error'>Cet e-mail existe déjà!</span>";
	  document.getElementById("email").value="";
	}
  			});
        });  
      });
</script>

<style type="text/css">
<!--
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

.Style1 {color: #FF0000}
.Style3 {color: #0000FF}
.Style4 {font-size: 24px}
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
        <h1>Sign Up</h1>
<div id="echec_insert" align="center">
<input name="user_name" placeholder= "Nom d'utilisateur" type="text" id="user_name" onblur="verifNom()"  class="txtb"> 
<div id="div_user"> </div>
<input name="email" placeholder= "Email" type="email"  id="email" onblur="checkEmail()"  class="txtb">
<div id="div_email"> </div>
<input name="mdp" placeholder= "Mot de passe " type="password"  id="mdp" onblur="checkPass()"  class="txtb">
<div id="div_mdp"></div>
<input name="mdp_conf" placeholder="Confirmer Mot de passe" type="password"  id="mdp_conf" onblur="checkPass()"  class="txtb">
<div id="div_mdp_conf"></div>
<input type="submit" id="action" class="signup-btn">
<a href="se_connecter.php">Already Have one ?</a>
</form>
</div>

</body>
</html>
