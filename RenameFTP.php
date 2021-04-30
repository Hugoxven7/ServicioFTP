<?php

/* FUNCIÓN DE CONEXIÓN SIN PUERTO */
    function loginftp()
    {
        $FTPserver = '127.0.0.1';
        $FTPUsername = 'Costanzo8Ds';
        $FTPuserpass = 'C0st4nz08Ds';
        $FTPconn = ftp_connect($FTPserver);
        $FTPlogin = ftp_login($FTPconn, $FTPUsername, $FTPuserpass);

        return $FTPlogin;
    }

    function conxftp()
    {
        $FTPserver = '127.0.0.1';
        $FTPUsername = 'Costanzo8Ds';
        $FTPuserpass = 'C0st4nz08Ds';
        $FTPconn = ftp_connect($FTPserver);
        $FTPlogin = ftp_login($FTPconn, $FTPUsername, $FTPuserpass);

        return $FTPconn;
    }



    $CONX = loginftp();
    $CONX2 = conxftp();
    if($CONX)
    {
        echo "CONEXIÓN ESTABLECIDA <br>";

    $oldname = "SOAP_I.rar";
    $newname = "NUEVO NOMRE.rar";
    
    if(@ftp_rename($CONX2,$oldname,$newname))
    {

    }else{
        echo "ERROR AL CAMBIAR EL NOMBRE DEL ARCHIVO <br>";
    }
    }   
?>

