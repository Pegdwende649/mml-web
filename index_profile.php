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
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" href="style_profile.css">
<link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
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

</style>
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
<div>
         <header>
   <?php
	  	include('entete.php');
      ?>
</header>
         <div class="content">

<div class="container">
    <div class="main-body">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card " >
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">

  <img src="<?php if (isset($_SESSION['p'])) echo $_SESSION['p']; else echo "https://bootdey.com/img/Content/avatar/avatar7.png"?>" width="150" height="150" /> 
   
                 <div class="mt-3">
         <?php 
		echo "<h4>".$_SESSION['nom']."</h4>";            	
      ?>    
                      <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
	<form method="post" enctype="multipart/form-data">
  	<input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
	<input name="lien" type="file" size="30" id="lien"/>
	    <input type="submit" name="ajout" value="Actualiser Photo" />
	  </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                    <span class="text-secondary">calebaguida.com</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                    <span class="text-secondary">Carloss</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                    <span class="text-secondary">@aguida</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                    <span class="text-secondary">caleb</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                    <span class="text-secondary">calrlossaguida</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nom Utilisateur</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <input name="user_name" type="text" size="40"  id="user_name" value="<?php $req_user = $id_con->query("SELECT user_name FROM internaute WHERE id = ".$_SESSION['id_auteur'].""); $row_user = $req_user->fetch(PDO::FETCH_ASSOC); echo $row_user['user_name']; ?>"/>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                 <input name="email" type="text" size="40"  id="email" value="<?php $req_email = $id_con->query("SELECT email FROM internaute WHERE id = ".$_SESSION['id_auteur'].""); $row_email = $req_email->fetch(PDO::FETCH_ASSOC); echo $row_email['email']; ?>"/>
                    </div>
                  </div>
                  <hr>
		<div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mot de passe</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                 <input name="mdp" type="password" size="40"  id="mdpp" value="<?php $req_mdp = $id_con->query("SELECT mdp FROM internaute WHERE id = ".$_SESSION['id_auteur'].""); $row_mdp = $req_mdp->fetch(PDO::FETCH_ASSOC); echo $row_mdp['mdp']; ?>"/>
                    </div>
                  </div>
                  <hr>

		<div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Confirmer mot de passe</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
               <input name="mdp_conf" type="password" size="40"  id="mdp_conf" value="<?php $req_mdp = $id_con->query("SELECT mdp FROM internaute WHERE id = ".$_SESSION['id_auteur'].""); $row_mdp = $req_mdp->fetch(PDO::FETCH_ASSOC); echo $row_mdp['mdp']; ?>"/>
                    </div>
                  </div>
                  <hr>

		<div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nom</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                 <input name="nom" type="text" size="40"  id="nom" value="<?php $req_nom = $id_con->query("SELECT nom FROM internaute WHERE id = ".$_SESSION['id_auteur'].""); $row_nom = $req_nom->fetch(PDO::FETCH_ASSOC); echo $row_nom['nom']; ?>"/>
                    </div>
                  </div>
                  <hr>

		<div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Pr&eacute;noms</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
              <input name="prenoms" type="text" size="40"  id="prenoms" value="<?php $req_prenoms = $id_con->query("SELECT prenoms FROM internaute WHERE id = ".$_SESSION['id_auteur'].""); $row_prenoms = $req_prenoms->fetch(PDO::FETCH_ASSOC); echo $row_prenoms['prenoms']; ?>"/>
                    </div>
                  </div>
                  <hr>



		<div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Ville</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
<input name="ville" type="text" size="40"  id="ville" value="<?php $req_ville = $id_con->query("SELECT ville FROM internaute WHERE id = ".$_SESSION['id_auteur'].""); $row_ville = $req_ville->fetch(PDO::FETCH_ASSOC); echo $row_ville['ville']; ?>"/>
                    </div>
                  </div>
                  <hr>


		<div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Pays</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
              <input name="prenoms" type="text" size="40"  id="prenoms" value="<?php $req_prenoms = $id_con->query("SELECT prenoms FROM internaute WHERE id = ".$_SESSION['id_auteur'].""); $row_prenoms = $req_prenoms->fetch(PDO::FETCH_ASSOC); echo $row_prenoms['prenoms']; ?>"/>
                    </div>
                  </div>
                  <hr>


		<div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
       <input name="telephone" type="text" size="40"  id="telephone" value="<?php $req_tel = $id_con->query("SELECT telephone FROM internaute WHERE id = ".$_SESSION['id_auteur'].""); $row_tel = $req_tel->fetch(PDO::FETCH_ASSOC); echo $row_tel['telephone']; ?>"/>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
         <input name="adresse" type="text" size="40"  id="adresse" value="<?php $req_adresse = $id_con->query("SELECT adresse FROM internaute WHERE id = ".$_SESSION['id_auteur'].""); $row_adresse = $req_adresse->fetch(PDO::FETCH_ASSOC); echo $row_adresse['adresse']; ?>"/>
                    </div>
                  </div>
<button  class="btn btn-primary"  id="actualiser">Actualiser mon profile</button>
                </div>
              </div>
              
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
  </body>
</html>

