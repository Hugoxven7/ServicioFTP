<?php

    require 'conexionFTP.php';

    /* VARIABLES PREDEFINIDAS FORMAR CADENA */
    $username = 'Israel7Kernel';
    $password = 'P3og3amado3@';
    $server = '127.0.0.1';
    $conex = ftp_connect($server);
    $login = ftp_login($conex, $username, $password);


    $original = "Original";
    $copiado = "Copiado";
    $direc1 = "ftp://$username:$password@$server/$original/";
    $direc2 = "ftp://$username:$password@$server/$copiado/";

    /* LLAMAR FUNCIÓN DE CONEXIÓN FTP DESDE ARCHIVO PHP EXTERNO */
    $ConexionFTP = conxFTP();

    /* CONDICIONAL CONEXIÓN EXITOSA FTP */
    if(!$ConexionFTP)
    {
        echo "<script> alert('FAILED CONECTION'); </script>";
    }else{
        echo "<script> alert('SUCCESSFUL CONECTION'); </script>";

        /* ENTRA A NUEVA RUTA */
        // $nuevoDir = @ftp_chdir($ConexionFTP, $original);
        // echo "<br> UBICACIÓN ACTUAL: ".@ftp_pwd($ConexionFTP)."<br>";

        /* VERIFICACIÓN DE DIRECTORIO */
        if(is_dir($direc1))
        {
            echo "<br> DIRECTORIO VALIDADO <br>";
            /* ABRIR DIRECTORIO */
            if($openDir = opendir($direc1))
            {   
                echo "<br> DIRECTORIO ABIERTO. <br>";
                /* CICLO LEER CONTEIDO DE DIRECTORIO */
                while(($file = readdir($openDir)) !== false)
                {
                    /* OMITIR ARCHIVOS PRINCIPALES DEL DIRECTORIO RAÍZ */
                    if($file != '.'  && $file != '..')
                    {
                        /* CREACIÓN DE NUEVA RUTA INTEGRANDO PODIBLE ARCHIVO O DIRECTORIO */
                        $newruta = $direc1.$file.'/';

                        /* VAERIFICAR NUEVAMENTE SI LA RUTA ES UN DIRECTORIO O UN ARCHIVO */
                        if(is_dir($newruta)){
                            echo "<br> LA SEGUNDA VERIFICACIÓN ENCONTRO UN DIRECTORIO. <br>";
                        }else{
                            /* RECREACIÓN DE VARIABLE DIRECTORIO */
                            $ruta = $direc1.$file;
                            $otraruta = $direc2.$file;

                            /* OBTENER EXTENSIÓN DE ARCHIVO */
                            $extension = pathinfo($file, PATHINFO_EXTENSION);

                            /* VERIFICAR LA EXTENSIÓN DEL ARCHIVO */
                            if($extension != 'xml')
                            {
                                echo "<br> LA EXTENSIÓN ES DISTINTA DE XML <br>";

                                /* VERIFICA SI EL ARCHIVO YA FUE COPIADO AL NUEVO DIRECTORIO ANTERIORMENTE */
                                if(file_exists($otraruta))
                                {
                                    echo "<br> EL DIRECTORIO YA EXISTE, NO SE PUEDE COPIAR <br>";
                                }else{
                                    echo "<br> EL DIRECTORIO NO EXISTE Y SE COPIARA <br>";
                                    
                                    echo "<br> UBICACIÓN ACTUAL: ".@ftp_pwd($ConexionFTP)."<br>";
                                    /* PRUEBA CON COPY */
                                    $copear = copy($ruta, $otraruta);
                                    if($copear)
                                    {
                                        echo "<br> EL ARCHIVO SE COPIO EXITOSAMENTE. <br>";
                                        echo "<br>  RUTA $file <br>";

                                        /* ENTRAR EN CARPETA ESPECIFICA*/
                                        $entrada = @ftp_chdir($conex, $original);
                                        echo "<br> UBICACIÓN ACTUAL: ".@ftp_pwd($conex)."<br>";
                                        
                                        /* DEFINICIÓN ELIMINAR ARCHIVO */
                                        $delete = ftp_delete($conex, $file);
                                        if($delete)
                                        {
                                            
                                            echo "<br> EL ARCHIVO FUE ELIMINADO CORRECTAMENTE. <br>";
                                            // ftp_close($conex);
                                        }else{
                                            echo "<br> EL ARCHIVO NO PUDO SER ELIMINADO CORRECTAMENTE. <br>";
                                        }

                                    }else{
                                        echo "<br> EL ARCHIVO NO PUDO COPIARSE CORRECTAMENTE. <br>";
                                    }
                                }                                
                            }else{
                                echo "<br> LA EXTENSIÓN ES XML <br>";
                            }
                        }
                    }else{
                        echo "<br> LOS ARCHIVOS PRINCIPALES NO PUDIERON SER OMITIDOS <br>";
                    }
                }
            }else{
                echo "<br> FALLA ABRIR DIRECTORIO <br>";
            }
        }else{
            echo "<br> DIRECTORIO NO VALIDO <br>";
        }
    }
    ftp_close($ConexionFTP);
    
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title> Directory Change </title>
    </head>
    
    <body>
        <section>
            <div>
                <input type="text" id="text1" class="text1" value="Test Text" readonly>
            </div>
        </section>
    </body>
</html>