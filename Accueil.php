<?php
			session_start();
			include_once('connexion_bd_inc.php'); 
			$id_con=document_connexion();
?>
</html>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Deep</title>
      <link rel="stylesheet" href="style_pg.css">
<link rel="icon" type="image/png" href="images/deep1.png" />

<style>
.carousel-caption {
    position: relative;
    left: 0;
    top: 15%;
}

.carousel-item {
height: 100vh;
min-height: 350px;
background: no-repeat center center scroll;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}

</style>
   </head>
   <?php
	  	include('entete1.php');
      ?>
   <body>
<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
 <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),  url('https://www.getsmarter.com/disk/public/sBBGDTboLgihDAZHFNC7aFHj/mit_sloan_csail_machine_learning_course_page_large_header_banner.jpg')">
        <div class="carousel-caption d-none d-md-block">
<h2 class="display-4"> 	</h2>
          <p class="lead">	</p>
<div class="welcome-text">
        <h1>
We are <span>Creative</span></h1>
<a href="mailto:davidoubda@gmail.com">Contact US</a>
    </div>
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image:linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),  url('https://cdn.futura-sciences.com/buildsv6/images/wide1920/5/8/a/58adcd3cfe_125715_deep-learning-cc-vigeco-fotoliacom.jpg')">
        <div class="carousel-caption d-none d-md-block">
         <div class="welcome-text">
        <h1>
we make you <span>visible</span></h1>
<a href="mailto:calebcarloss@gmail.com">Contact US</a>
    </div>
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image:linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),  url('https://www.pandasecurity.com/fr/mediacenter/src/uploads/2019/07/Pandasecurity-Qu%E2%80%99est-ce-que-le-machine-learning-.jpg')">
        <div class="carousel-caption d-none d-md-block">
         <div class="welcome-text">
        <h1>
we're at your <span>service</span></h1>
<a href="mailto:calebcarloss@gmail.com">Contact US</a>
    </div>
        </div>
      </div>
<div class="carousel-item" style="background-image:linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),  url('https://epsilon-formation.fr/wp-content/uploads/sites/4/2015/12/Contact-e1564642757394.jpg')">
        <div class="carousel-caption d-none d-md-block">
         <div class="welcome-text">
        <h1>
Contact <span>us</span></h1>
    </div>
        </div>
      </div>
    </div>

    </div>

    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>
</header>
<div>
         <header>


         </header>
         <div class="content">
            <p>
               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            <p>
               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
         </div>
      </div>


   </body>
</html>
