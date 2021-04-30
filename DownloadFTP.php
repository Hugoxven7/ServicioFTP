
<?php 

    // DECLARACIÓN DE RUTA PRINCIPAL ALOJAMIENTO DE CARPETA DE PROYECTO
    $ruta = $_SERVER['DOCUMENT_ROOT'];
    // RUTA LOCAL, SE ALMACENA EL ARCHIVO A DESCARGAR
    $ruta_local = "C:/Users/Israel/Downloads/2_E#68DS_Nuevo6.pdf";
    // RUTA CONETIENE EL ARCHIVO A DESCARGAR
    $ruta_server = '/Etapas8DS/2_E#68DS_Nuevo6.pdf'; 

    // VARIABLES DE CONEXIÓN
    $serverFTP='127.0.0.1';
    $usernameFTP='Costanzo8Ds';
    $userpassFTP='C0st4nz08Ds';
    $conxDFTP = ftp_connect($serverFTP);

    // LOGUEO DE CONEXIÓN PRINCIPAL DIRECTO
    $loginDFTP = ftp_login($conxDFTP, $usernameFTP, $userpassFTP);

    // OBTENECIÓN DE CONEXIÓN PARA REALIZACIÓN DE DESCARGA
    if (ftp_get($conxDFTP, $ruta_local, $ruta_server, FTP_BINARY)) 
    {
        echo "<br> EL ARCHIVO SE HA DESCARGADO CON EXITO <br>";
    } else {
        echo "<br> ERROR AL DESCARGAR ARCHIVO <br>";
    }

    // CIERRE DE CONEXIÓN LOGIN PERMANECE ABIERTO
    ftp_close($conxDFTP);

?>