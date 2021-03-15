<?php

    //------------------------------------
    // Charge les paramètres de connexion
    // à la base de données.
    //------------------------------------
	error_reporting(0);
    require_once("parametres_srv_db_inc.php");


    /**
     * Fonction de connexion à une base de données
     * s'appuie sur les paramètres fournis
     * dans parametres_bd_inc.php.
     *
     * @return resource Identifiant de connexion
     */
    function document_connexion()
    {
        global $host, $base, $utilisateur, $motDePasse, $port;
 

	 try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=usa', 'root', '');
 			return  $bdd ;
                }
                catch (Exception $e)
                {
                    die('Erreur : ' . $e->getMessage());
                }

    }

    /**
     * Fonction de deconnexion.
     * (Ne fait rien sachant que la fonction
     * de connexion établit une connexion permanente)
     */
    function document_deconnexion($idConnexion)
    {
		return TRUE;
    }
	
	function correction($str)
	{
		$var=str_replace("'","&#039;",$str);
		return $var;
	}
	
	function coupe_mot($tre)
	{	
		$txt="";
		$let="";
		//$last_space = str_word_count($tre);
		$mot = explode(" ", $tre);
		//echo count($mot);
		//echo $mot[3];
		$compt=count($mot);
		$car=strrpos($tre, " ",0);
		//echo $car;
		if (($car-1)<200)
		{
			for ($i=0; $i<$compt; $i++)
			{
				$let=$mot[$i];
				print $let;
				print " ";
			}
		}
		else
		{
			for ($i=0; $i<$compt-1; $i++)
			{
				$let=$mot[$i];
				print $let;
				print " ";
			}
		}
		print "...";
	}
	
function car_spec($chaine) 
{
   $accents = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','Ý','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ò','ó','ô','õ','ö','ù','ú','û','ü','ý','ÿ','¢','£','€','¥','°','¼','Œ','½','œ','¾','«','»','¿','"','Ð','Ø','Þ','ß','ø','þ','’','‘','…','–',"'");
   $sans = array('&Agrave;','&Aacute;','&Acirc;','&Atilde;','&Auml;','&Aring;','&AElig;','&Ccedil;','&Egrave;','&Eacute;','&Ecirc;','&Euml;','&Igrave;','&Iacute;','&Icirc;','&Iuml;','&Ograve;','&Oacute;','&Ocirc;','&Otilde;','&Ouml;','&Ugrave;','&Uacute;','&Ucirc;','&Uuml;','&Yacute;','&agrave;','&aacute;','&acirc;','&atilde;','&auml;','&aring;','&aelig;','&ccedil;','&egrave;','&eacute;','&ecirc','&euml;','&igrave;','&iacute;','&icirc','&iuml;','&ograve;','&oacute;','&ocirc;','&otilde;','&ouml;','&ugrave;','&uacute;','&ucirc;','&uuml;','&yacute;','&yuml;','&cent;','&pound;','&euro;','&yen;','&deg;','&frac14;','&OElig;','&frac12;','&oelig;','&frac34;','&laquo;','&raquo;','&iquest;','&quot;','&ETH;','&Oslash;','&THORN;','&szlig;','&oslash;','&thorn;','&#039;','&#039;','&hellip;','&ndash;','&#039;');
  return  str_replace($accents, $sans, $chaine);
 }
 
 function redim($file,$modwidth,$modheight) 
 {
	if(file_exists("images/".$file))
	{
		list($width, $height) = getimagesize("images/".$file);
		$rl=$modwidth/$width;
		$rh=$modheight/$height;
		if ($rl<$rh) $taux=$rl;
		else $taux=$rh;  
		$newWidth=ceil($width * $taux);
		$newHeight=ceil($height * $taux);
	/*	print $width."___".$taux."___".$newWidth."\n";
		print $height."___".$taux."___".$newHeight;
		$tn = imagecreatetruecolor($newWidth, $newHeight);
		$image = imagecreatefromjpeg("images/".$file);
		imagecopyresampled($tn, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
		imagejpeg($tn, "images/redim/".$file, 80);
		imagedestroy($tn);*/
		print "<img src=\"images/".$file."\" width=\"".$newWidth."\" height=\"".$newHeight."\" />";
	}
	
}

function get_cont($id_cat,$type,$pos)
{
	$id_con=document_connexion();
	if ($type==0)
	{
		$q=$id_con->query("Select id_art,titre_art,chapeau,article from article inner join joindre on article.id_art=joindre.id_cont where joindre.id_cat=$id_cat and joindre.id_type_cont=0 order by joindre.date_join Desc limit 1");
		if ($q->rowCount()>0) {
			$data=$q->fetch();
			print $data[$pos];
		}	
	}
	else if ($type==1)
	{
		$q=$id_con->query("Select joindre.id_cont,nom_img,larg,haut from joindre inner join image on image.id_img=joindre.id_cont inner join categorie on categorie.id_cat=joindre.id_cat where joindre.id_cat=$id_cat and joindre.id_type_cont=1 order by joindre.date_join Desc limit 1");
		if ($q->rowCount()>0){ 
			$data=$q->fetch();
			if ($pos==1) redim($data[1],$data[2],$data[3]);
			else print $data[$pos];
			}		
	}
}

function gfu($id,$offre_id,$destination_code)
{
	$code_erreur=0;
	$id_con=document_connexion();
	if ($offre_id==78)
	{
		$pp=$id_con->query("Select gfu_id from numero_gfu where numero_id='".$id."' and date_fin is null");
		$count_pp=$pp->rowCount();
		if ($count_pp!=0)
		{
			$gfu_id=$id_con->query("Select gfu_id from numero_gfu where numero_id='".$id."' and date_fin is null")->fetch();
			$nb=$id_con->query("Select * from numero_gfu where gfu_id='".$gfu_id[0]."';")->rowCount();
			if ($nb<5) $code_erreur=10; 
		}
		else $code_erreur=9;
	}
	else
	{
		if ($destination_code==001010) $code_erreur=11;
	}	
	return $code_erreur;
}

function indicatif($num)
{ 	
	$ind=false; 
	$id_con=document_connexion();
	if (strlen($num)<=7) $re= $id_con->query("Select court,groupe_id from sms_plus where court='".$num."';");
	else
	{	
		$a0=substr($num,0,4);	
		$a=substr($num,0,3);
		$b=substr($num,0,2);
		$c=substr($num,0,1);
		$re= $id_con->query("Select indicatif_pays,groupe_id from pays where indicatif_pays='".$a0."' or indicatif_pays='".$a."' or  indicatif_pays='".$b."' or  indicatif_pays='".$c."' order by indicatif_pays desc limit 0,1;");
	}
//print $a."   ".$b."     "."$c";
	
	if (!is_resource($re))  
	{
		if (($desti=="000971") || ($desti=="000978") || ($desti=="000970") || ($desti=="MTC")) $ind=true;
		else $ind=false; 
	}
	elseif (is_resource($re)) $ind=true;
	return $ind;
}





function groupe($num,$desti)
{ 	
	$group_id=0;
	$id_con=document_connexion();
if (($desti=="000971") || ($desti=="000978") || ($desti=="000970") || ($desti=="MTC") || ($desti=="MOC")){ $group_id=1;}
else
{
	if (strlen($num)<=7) $re= $id_con->query("Select groupe_id from sms_plus where court='".$num."';");
	else
	{	
		$a0=substr($num,0,4);	
		$a=substr($num,0,3);
		$b=substr($num,0,2);
		$c=substr($num,0,1);
		$re= $id_con->query("Select groupe_id from pays where indicatif_pays='".$a0."' or indicatif_pays='".$a."' or  indicatif_pays='".$b."' or  indicatif_pays='".$c."' order by indicatif_pays desc limit 0,1;");
	}
//print $a."   ".$b."     "."$c";
	
	if (!is_resource($re))  
	{
		if (($desti=="000971") || ($desti=="000978") || ($desti=="000970") || ($desti=="MTC") || ($desti=="MOC")) $group_id=1;
	}
	else 
	{
		$cd=mysql_fetch_array($re);
		$group_id=$cd[0];
	}
}
return $group_id;
}




function log_action_modif($identite, $requete)
	{ 
		$date_jour=date('Y-m-d');
		$heure=date('H:i:s');
		$log=$identite.' ; '.$date_jour.' ; '.$heure.' ; '.$requete."\n";
		$file ="../log_action/$date_jour.txt";
		$fileopen=(fopen("$file",'a'));
		fwrite($fileopen, $log);
		fclose($fileopen);
	}


?>
