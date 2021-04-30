<?php

function conxFTP()
{
    $username = 'Israel7Kernel';
    $password = 'P3og3amado3@';
    $server = '127.0.0.1';
    $conex = ftp_connect($server);
    $login = ftp_login($conex, $username, $password);

    return $conex;
}


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

/* FUNCIÓN DE CONEXIÓN CON PUERTO */
function loginftpport()
{
    $port=21;
    $host="127.0.0.1";
    $user="Costanzo8Ds";
    $password="C0st4nz08Ds"; 
}
?>