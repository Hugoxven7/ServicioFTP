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


/* FUNCIÓN DE CONEXIÓN CON PUERTO */
    function loginftpport()
    {
        $port=21;
        $host="127.0.0.1";
	    $user="Costanzo8Ds";
	    $password="C0st4nz08Ds"; 
    }
    
 
/* SE COMPRUEBA QUE SE ENVIE ARCHIVO DESDFE EL FORMULARIOS */
if(is_uploaded_file($_FILES["archivo"]["tmp_name"]))
{

    $CONX = loginftp();
    $CONX2 = conxftp();
    
    if($CONX)
    {
        echo "CONEXIÓN ESTABLECIDA <br>";

    $filenew = $_FILES["archivo"];
    // $filefl = $filenew["name"];
    $filename = $_FILES["archivo"]["tmp_name"];

    if(@ftp_put($CONX2,$filenew["name"],$filename,FTP_BINARY))
    {
        echo "FICHERO SUBIDO CORRECTAMENTE";

        $oldname = "SOAP_I.rar";
        $newname = "NUE oilkRE.rar";
        
        if(@ftp_rename($CONX2,$filenew["name"],$newname))
        {
            echo "<br> CAMBIO DE NOMBRE EXITOSO <br>";
        }else{
            echo "<br >ERROR AL CAMBIAR EL NOMBRE DEL ARCHIVO <br>";
        }

    }else{
        echo "<br> ERROR EN SUBIR ARCHIVO A FTP <br>"; 
    }
                    
    }
    else{
        echo "Errrorr";
    }                

    // /* DEFINICIÓN DE RUTA */
    // $port=21;
    // $host="127.0.0.1";
	// $user="Costanzo8Ds";
    // $password="C0st4nz08Ds";
    
    // /* ESTABLECER RUTA ESPECIFICA */
    // $ruta="Etapas8DS";

    // $filenew = $_FILES["archivo"];
    // $filefl = $filenew["name"];
    // $filename = $_FILES["archivo"]["tmp_name"];
	
 
	// # Realizamos la conexion con el servidor
    // $conn_id=@ftp_connect($host,$port);
    
	// if($conn_id)
	// {
	// 	# Realizamos el login con nuestro usuario y contraseña
	// 	if(@ftp_login($conn_id,$user,$password))
	// 	{
	// 		# Canviamos al directorio especificado
	// 		// if(@ftp_chdir($conn_id,$ruta))
	// 		// {
	// 			# Subimos el fichero
	// 			if(@ftp_put($conn_id,$filefl,$filename,FTP_BINARY))
	// 				echo "Fichero subido correctamente";
	// 			else
	// 				echo "No ha sido posible subir el fichero";
	// 		// }else
	// 		// 	echo "No existe el directorio especificado";
	// 	}else
	// 		echo "El usuario o la contraseña son incorrectos";
	// 	# Cerramos la conexion ftp
	// 	ftp_close($conn_id);
	// }else
    //     echo "No ha sido posible conectar con el servidor";
        

        
}else{
   echo "Selecciona un archivo...";
}
?>

<head>
	<title>Subir ficheros al servidor mediante FTP</title>
</head>
<body>
	<form method="post" enctype="multipart/form-data" action="FileFTP.php">
		<div>Fichero: <input type="file" name="archivo" id="image" maxlength="45"></div>
		<dif><input type="submit" name="enviar" value="enviar"/></div>
	</form>
</body>
</html>