</html>
<!DOCTYPE html>
<html lang="pt-br">
   <head>


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
      <h1> Classification  <span> algorithms </span></h1>


        <form method="post" enctype="multipart/form-data">

          <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                          <div class="col-sm-20">
                            <div class="card " >
                              <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">

                                  <img src="https://miro.medium.com/max/2956/1*eRAF9Y5tCwb1uvpoEiMT9A.gif" width="150" height="150" /> 
                 
                                  <div class="mt-3">
                                    <h3 class="text-secondary mb-1">CART</h3>
                                    <p class="text-muted font-size-sm">Classication and Regression</p>
                                    <input type="button" onclick="location.href='datasets.php';" value="Go!" />

                                  </div> 

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>  

                        <div class="col-md-4 mb-3">
                          <div class="col-sm-20">
                            <div class="card " >
                              <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">

                                    <img src="https://miro.medium.com/max/2956/1*eRAF9Y5tCwb1uvpoEiMT9A.gif" width="150" height="150" /> 
               
                                    <div class="mt-3">
                                       <h3 class="text-secondary mb-1">CNN</h3>
                                       <p class="text-muted font-size-sm">Images Classification</p>
                                    <input type="button" onclick="location.href='datasets.php';" value="Go!" />
              
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>


                        <div class="col-md-4 mb-3">
                        <div class="col-sm-20">
                          <div class="card " >
                            <div class="card-body">
                              <div class="d-flex flex-column align-items-center text-center">

                                  <img src="https://miro.medium.com/max/2956/1*eRAF9Y5tCwb1uvpoEiMT9A.gif" width="150" height="150" /> 
             
                                  <div class="mt-3">
                                     <h3 class="text-secondary mb-1">SVM</h3>
                                     <p class="text-muted font-size-sm">Classification and Regression</p>
                                    <input type="button" onclick="location.href='datasets.php';" value="Go!" />

            
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

          </div>

        </form>

    </div>



  </div>


 </body>
</html>
