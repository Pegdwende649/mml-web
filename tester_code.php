<?php 
    session_start();
	require_once('connexion_bd_inc.php');
	$id_con=document_connexion(); 
	error_reporting(0);
	$code=$_POST['param_code'];
	//$id_int = $_SESSION['id_int'];
	
	//$code=46955;
	$id_int =12;
	
	$req_code = mysql_query ("SELECT * FROM code WHERE code = '$code' AND internaute_id = '$id_int'", $id_con);
	  $row_code = mysql_num_rows($req_code);
	  if ($row_code == 0) echo 2; else echo 3; 
 ?>
