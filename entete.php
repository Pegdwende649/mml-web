<?php
			session_start();
			include_once('connexion_bd_inc.php'); 
			$id_con=document_connexion();
//transparent
// width="100" height="100"
?>

</html>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
<meta charset="utf-8">


<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="images/deep1.png" />
<link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<meta charset="utf-8">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $(window).scroll(function() {
    if ($(window).scrollTop() > 10) {
      $(".navbar").addClass("bg-dark");
    } else {
      $(".navbar").removeClass("bg-dark");
    }
  });
  // If Mobile, add background color when toggler is clicked
  $(".navbar-toggler").click(function() {
    if (!$(".navbar-collapse").hasClass("show")) {
      $(".navbar").addClass("bg-dark");
    } else {
      if ($(window).scrollTop() < 10) {
        $(".navbar").removeClass("bg-dark");
      } else {
      }
    }
  });
});

</script>

<link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
<style>
  nav ul li a {color: #FFFFFF;
font-weight: lighter;
	font-family: 'Poppins', san}
  nav ul li a:hover {color: #000000;
	background: #fff;}
}

</style>

   </head>
   <body>
<nav class="navbar navbar-expand-lg fixed-top navbar-light ">
  <a class="navbar-brand" href="#">
    <img src="images/deep.png" class="d-inline-block align-top" alt="" loading="lazy">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
<ul class="nav justify-content-end">
<li class="nav-item active">
        <a class="nav-link" href="Accueil.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Algorithme</a>
      </li>
    <form class="form-inline my-2 my-lg-0">
		<li>
<?php  
          if (!isset($_SESSION['id_auteur'])) {
            echo "<a  class='btn btn-outline-success' role='button' aria-pressed='true' href='se_connecter.php'>Login</a>";


          } else {
		$email = $_SESSION['email'];
		$req = $id_con->query("SELECT id,user_name FROM internaute WHERE email = '$email'");
		$rep = $req->fetch(PDO::FETCH_ASSOC);
		$_SESSION['nom'] = $rep['user_name'] ;
?>
<li class="nav-item active">
        <a class="nav-link" href="discussion2.php">Mes Messages <span class="sr-only">(current)</span></a>
      </li>

<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Mes Annonces
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href='mes_annonces.php'>Voir mes annonces</a>
          <a class="dropdown-item" href="poster_annonce.php">Poster une annonce</a>
        </div>
      </li>

<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Mon profil
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href='index_profile.php'>Modifier mon profil</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="essai_paypal.php">Mon abonnement</a>
        </div>
      </li>
<?php
		echo "<a  class='btn btn-outline-danger' role='button' aria-pressed='true' href='logout.php'>LOGOUT ".$rep['user_name']."</a>";            	
          }
      ?>
		</li>
    </form>
</ul>
  </div>
</nav>
   </body>
</html>
