

<?php


// Connect to FTP server 
$ftp_server = "localhost"; 

// Use correct ftp username 
$ftp_username="user"; 

// Use correct ftp password corresponding 
// to the ftp username 
$ftp_userpass="user"; 
// File name or path to upload to ftp server 
$file = "filetoupload.txt"; 
    
$trackErrors = ini_get('track_errors');
ini_set('track_errors', 1);
echo "no";
// Establishing ftp connection 
$ftp_connection = ftp_connect($ftp_server,21);
echo("yes");
echo $ftp_connection;
if (!$ftp_connection ){
    !$errmsg = $php_errormsg;
    echo "<BR><LI>ERR:$errmsg";
}

//    or die("Could not connect to $ftp_server"); 


if( $ftp_connection ) { 
    echo "Successfully connected to the ftp server!"; 
    
    // Logging in to established connection with 
    // ftp username password 
    $login = ftp_login($ftp_connection, $ftp_username, $ftp_userpass); 
    
    // Checking whether logged in successfully or not 
    if($login) { 
        echo "<br>logged in successfully!"; 
        
        if (ftp_put($ftp_connection, 
                "uploadedfile_name_in_server.txt", $file, FTP_ASCII)) 
        { 
        echo "<br>Uploaded successful $file."; 
        } 
        else { 
        echo "<br>Error while uploading $file."; 
        } 
            
    } 
    else { 
        echo "<br>login failed!"; 
    } 

    // Closeing the connection 
    if(ftp_close($ftp_connection)) { 
        echo "<br>Connection closed Successfully!"; 
    } 
} 


   /* // do FTP stuff
    $conn_id = ftp_connect(localhost);



echo $conn_id;
//----------------------------------------------------------------
//...

$src_dir = "./images";
$dst_dir = "./datasets";

ftp_copy($src_dir, $dst_dir);
//...
ftp_close($conn_id);

//Function: ftp_copy()
//----------------------------------------------------------------
function ftp_copy($src_dir, $dst_dir) {

global $conn_id;

$d = dir($src_dir);

    while($file = $d->read()) {

        if ($file != "." && $file != "..") {

            if (is_dir($src_dir."/".$file)) {

                if (!@ftp_chdir($conn_id, $dst_dir."/".$file)) {

                ftp_mkdir($conn_id, $dst_dir."/".$file);
                }

            ftp_copy($src_dir."/".$file, $dst_dir."/".$file);
            }
            else {

            $upload = ftp_put($conn_id, $dst_dir."/".$file, $src_dir."/".$file, FTP_BINARY);
            }
        }
    }

$d->close();
}
/*echo "<div>yes</div>";
 $File = "localhost:8890/Projet/Acceuil.php";

$Ftp = ftp_connect("localhost:8888");

ftp_login($Ftp,"ftpuser","ftppassword");

ftp_pasv($Ftp,true); // Join pasv which is always better

ftp_put($Ftp,".",$File,FTP_BINARY); 

ftp_close($Ftp);*/

?>