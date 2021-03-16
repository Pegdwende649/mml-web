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
      <link rel="icon" type="image/png" href="images/deep1.png" />
      <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
      <meta charset="utf-8">
      <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">

      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="//netdna.bootstrapcdn.com/bootstrap/4.1.1-beta/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

<style>


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
              <li class="breadcrumb-item"><a href="index.html">CNN for Classification</a></li>
              
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card " >
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">

  <img src="images/data-set-icon-3.jpg" width="350" height="200"/> 
   
                 <div class="mt-3">
                      <h3>Dataset :

<?php
if(isset($_POST['send']))
{
$val = $_POST["dataset"];
echo $val;
}
?>
                      <?php
$dir    = './datasets';
$files1 = scandir($dir,1);
?>
                      </h3>
                             <div class="form-group">
<hr>
      <h4 class="text-secondary">SEPARATOR</h4>


<form action="mml_form.php" method="post">
<div class="radios" >

<div class="form-check">
  <input value  = "coma" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    <h5 class="mb-0">Coma
</h5>
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    <h5 class="mb-0">Semi colon
</h5>
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
   <h5 class="mb-0">Tabulation
</h5> 
  </label>
</div>
<hr>
<div>
    <button type="submit">Envoyer</button>
  </div>
</div>  
        </div>
                      
	
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        


            <div class="nb_rows">
            <h5 class="mb-0">Number of rows : </h5>
            
            </div>
          </li>
       
 <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        


            <div class="nb_vars">
            <h5 class="mb-0">Number of variables : 


<?php
                            if(isset($_POST['send']))
                            {
                            $val = $_POST["dataset"];
                            $dataset = $val;
                            $sep = $_POST["radios"];
                            }

                            if (($handle = fopen("datasets/".$dataset, "r")) !== FALSE) {
                                $data = fgetcsv($handle, 100, ",");
                                $num = count($data);
                                echo $num;

                                 fclose($handle);
                            }
                          ?>


            </h5>


          
            
            </div>
          </li>
                  


            
                  
                </ul>
              </div>
            </div>


            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">


                  
                  <div class="row">  

                    <div class="col-sm-9">
                      <h6 class="mb-0"> Select target variable </h6>
                    </div>

                    <div class="col-sm-0 text-secondary">
                         <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Click to select
                        </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<?php
                            if(isset($_POST['send']))
                            {
                            $val = $_POST["dataset"];
                            $dataset = $val;
                            }

                            if (($handle = fopen("datasets/".$dataset, "r")) !== FALSE) {
                                $data = fgetcsv($handle, 100, ",");
                                    foreach ($data as $key => $value) {
                                        echo "<a class=\"dropdown-item\" href=\"essai_paypal.php\">$value</a>";

                                    }
                                 fclose($handle);
                            }
                          ?>
                          
                      </div>
  
                        
                     </div>
                   </div>

                   </div>
                   <hr>



                  <div class="row">  

                    <div class="col-sm-9">
                      <h6 class="mb-0"> Select predictive variables </h6>
                    </div>

                    <div class="col-sm-0 text-secondary">
                         <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Click to select
                        </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                           <?php
                            if(isset($_POST['send']))
                            {
                            $val = $_POST["dataset"];
                            $dataset = $val;
                            }

                            if (($handle = fopen("datasets/".$dataset, "r")) !== FALSE) {
                                $data = fgetcsv($handle, 100, ",");
                                    foreach ($data as $key => $value) {
                                        echo "<a class=\"dropdown-item\" href=\"essai_paypal.php\">$value</a>";

                                    }
                                 fclose($handle);
                            }
                          ?>
                          
                      </div>
                      </div>
  
                        
                     </div>
                   </div>

                   </div>
                   <hr>


                  <div class="row">
    

                      <div class="col-sm-9">
                         <h6 class="mb-0">Target Language</h6>
                      </div>
                         <div class="col-sm-0 text-secondary">

                         <div class="dropdown">
                           <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Click to select
                           </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">PYTHON</a>
                            <a class="dropdown-item" href="#">R</a>
                            <a class="dropdown-item" href="#">JULIA</a>
                          </div>

                         </div>

                         </div>

                      </div>
                      <hr>
                  
                  
                  <div class="row">  

                    <div class="col-sm-9">
                      <h6 class="mb-0">Metrics</h6>
                    </div>

                    <div class="col-sm-0 text-secondary">
                         <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Click to select
                        </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="essai_paypal.php">ACCURACY</a>
                          <a class="dropdown-item" href='index_profile.php'>PRECISION</a>
                          <a class="dropdown-item" href='index_profile.php'>RECALL</a>
                          <a class="dropdown-item" href='index_profile.php'>F1-SCORE</a>

                      </div>
  
                        
                     </div>
                   </div>

                   </div>
                   <hr>


                    <div class="row">
                    <div class="col-sm-9">
                      <h6 class="mb-0">Train size</h6>
                    </div>
                  <div class="col-sm-0 text-secondary">

                    <div class="input-group">
                      <input type="text" class="form-control" placeholder=0.3>
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                      </span>
                    </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->
                     </div><!-- /.row -->
                   </div> 
              </div>
            </div>

              
                
  </body>
</html>

