<?php

    $host="127.0.0.1";
    $port=21;
    $user="Costanzo8Ds";
    $password="C0st4nz08Ds";

    $FTPconn = ftp_connect($host);
    $FTPlogin = ftp_login($FTPconn, $user, $password);

    ftp_login($FTPconn, $user, $password);
    @ftp_chdir($FTPconn);
    @ftp_chdir($FTPconn,"Etapas8DS");

    $server = '/Etapas8DS/'.'2_E#68DS_Nuevo6.pdf';
    $server_file = "2_E#68DS_Nuevo6.pdf";   

    /* TEST IMPRESIÓN DE UBICACIÓ  DOCUMENTO RAIZ */
    $ruta = $_SERVER['DOCUMENT_ROOT'];
    echo "RUTA DE DOCUMENTO PRINCIPAL: ";
 
    if(ftp_get($FTPconn, $server_file, $server, FTP_BINARY))
    {

        echo "<script> alert('MENSAJE DE PRUEBA DE INTERFERENCIA'); </script>";
	    $file = $server_file;
        header("Content-disposition: attachment; filename=$file");
        header("Content-type: application/octet-stream");
        readfile($file);
    }
 
    ftp_close($FTPconn);

?>

