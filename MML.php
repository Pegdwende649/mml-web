</html>
<!DOCTYPE html>
<html lang="pt-br">
   <head>




      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" type="image/png" href="images/deep1.png" />
      <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
      <meta charset="utf-8">
      <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">

      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="//netdna.bootstrapcdn.com/bootstrap/4.1.1-beta/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

      <title> Deep </title>
      <link rel="stylesheet" href="style_pg.css">


      <style> 

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
            font-size: 40px;
          }
          .select-algo-class h1 span {
            color: #00fecb;
          }


          nav ul li a {color: #FFFFFF;
          font-weight: lighter;
            font-family: 'Poppins', san}

          nav ul li a:hover {color: #000000;
            background: #fff;}
          }

      </style>
   </head>

   <body>
 


         <header>
   <?php
      include('entete.php');
      ?>
</header>


  <div class="carousel-item active" style="background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),  url('https://www.getsmarter.com/disk/public/sBBGDTboLgihDAZHFNC7aFHj/mit_sloan_csail_machine_learning_course_page_large_header_banner.jpg')">

    <div class="select-algo-class">
      <h1> Select a class of  <span>algorithm</span></h1>
      


      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href='algos_classification.php'>Classification</a>
            <a class="dropdown-item" href="algos_regression.php">Regression</a>
  </div>
</div>




     
    </div>



  </div>

   </body>
</html>
