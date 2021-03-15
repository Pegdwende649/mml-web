</html>
<!DOCTYPE html>
<html lang="pt-br">
   <head>


      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" type="image/png" href="images/deep1.png" />
      <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
      <meta charset="utf-8">
      <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
      <script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">


      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title> Deep </title>
      <link rel="stylesheet" href="style_pg.css">


      <style> 



          .select-algo-class {
            position: r;
            width: 600px;
            height: 100px;
            margin: 20% 30%;
            text-align: center;
          }
          .select-algo-class h1 {
            text-align: center;
            color: #fff;
            text-transform: uppercase;
            font-size: 20px;
          }
          .select-algo-class h1 span {
            color: #00fecb;
          } 

          .carousel-caption {
              position: relative;
              left: 0;
              top: 15%;}

          .carousel-item {
          height: 100vh;
          min-height: 350px;
          background: no-repeat center center scroll;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;}

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
      
  <ul class="nav justify-content-end">
        <li class="nav-item active">
          <a class="nav-link" href="Accueil.php">Home</span></a>
        </li>
        <!-- Slide One - Set the background image for this slide in the line below -->
  </ul>

</nav>

  <div class="carousel-item active" style="background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),  url('https://www.getsmarter.com/disk/public/sBBGDTboLgihDAZHFNC7aFHj/mit_sloan_csail_machine_learning_course_page_large_header_banner.jpg')">

    <div class="select-algo-class">
      
      <form method="post" enctype="multipart/form-data">

          <div class="row gutters-sm">  

            <div class="col-md-4 mb-3">
            <div class="col-sm-20">

            <div><h1> Select a <span>dataset</span></h1></div>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Click to select
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href='index_profile.php'>Modifier mon profil</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="essai_paypal.php">Mon abonnement</a>
                </div>
              </li>
            </div>
          </div>

            <div class="col-md-4 mb-3">
            <div class="col-sm-20">
                      <div><h1> Import a <span>dataset</span></h1></div>
          <form method="post" enctype="multipart/form-data">
             <input name="lien" type="file" size="30" id="lien"/>
          </form>
            
            </div>
          </div>


          </div>

      </form>
      
          



     </div>



  </div>

</body>
</html>
