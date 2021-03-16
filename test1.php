<?php

$trackErrors = ini_get('track_errors');
ini_set('track_errors', 1);

$server="localhost";
$port=8890; 
echo "<LI>Connecting to $server:$port<BR>";
$conn_id = ftp_connect($server,$port,9999999) or die("<BR>Unable to connect to ".$server.":$port server.");
if ( !$conn_id ) {
    $errmsg = $php_errormsg;
    echo "<BR><LI>ERR:$errmsg";
}
else {
    $passive=false;
    echo "<LI>Setting Passive Mode=$passive";
    ftp_pasv($conn_id, $passive);

    $user="*********";
    $pass="*********";
    echo "<LI>Connecting as $user/*****";
    if (!ftp_login($conn_id, $user, $pass)) { 
        $msg = "Failed to login to $selected_server as $user; <BR>check logincredentials in the Settings";
        echo "<BR><LI>$msg";

        $errmsg = $php_errormsg;
        echo "<LI>ERR:$errmsg";
        return $msg;
    }

    ftp_set_option($conn_id, FTP_TIMEOUT_SEC, 10000);


    if (!@ftp_put($conn_id, "test.txt", "C:......test.txt", FTP_BINARY)) {
        echo "<BR><LI>ftp_put failed";

        $errmsg = $php_errormsg;
        echo "<LI>ERR:$errmsg";
    }
    echo "<HR>Done";
}
?>