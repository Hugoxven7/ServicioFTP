<?php
	
	/*
	 	ESTE CODIGO AUN NO SE REALIZA TEST CORRECTAMENTE - UNICAMENTE ES USADO COMO REFERECIA
	 	A CONEXIÓN SFTP (LIBRERIAS AÚN DESCONOCIDAS)
	*/


	/**
	 * Class conexionSFTP
	 * ==================
	 * Autor: ALCales
	 * Permite establecer conexión con otro servidor va SFTP y subir archivos en el
	 *
	 * Ejemplo    $sftp = new \SFTPConnection("127.0.0.0");
	 *          	$sftp->login("usuario", "password");*
	 *          	$sftp->subirFichero("rutaAbsolutaServidor/ficheroOriginal", "rutaAbsoultaServidorDestino/ficheroNuevo");
	 *
	 */

	class conexionSFTP {
		
		private $conexion;
		private $sftp;
		
		/**
		 * SFTPConnection constructor.
		 *
		 * @param     $host
		 * @param int $puerto
		 *
		 * @throws Exception
		 */

        //  $host ='access866287113.webspace-data.io';

		public function __construct($host, $puerto = 22) {
			$this->conexion = @ssh2_connect($host, $puerto);
			if (!$this->conexion) {
				throw new Exception("No se ha podido conectar al host $host por el puerto $puerto.");
			}
		}
		
		/**
		 * Establece conexin va sftp con el servidor
		 *
		 * @param $usuario
		 * @param $password
		 */
      
		public function login($usuario, $password) {
			if (!@ssh2_auth_password($this->conexion, $usuario, $password)) {
				throw new Exception("No se ha podido autenticar con el usuario $usuario " . "y la contrasea $password.");
			}
			
			$this->sftp = @ssh2_sftp($this->conexion);
			if (!$this->sftp) {
				throw new Exception("No se ha podido inicializar el subsistema SFTP.");
			}
		}
		
		/**
		 * Copia el fichero local en el servidor remoto en la ruta destino dada
		 *
		 * @param $ficheroLocal
		 * @param $ficheroRemoto
		 */
		public function subirFichero($ficheroLocal, $ficheroRemoto) {
			$sftp = intval($this->sftp);
			$stream = @fopen("ssh2.sftp://$sftp$ficheroRemoto", 'w');
			
			if (!$stream) {
				throw new Exception("No se ha podido abrir el fichero remoto: $ficheroRemoto");
			}
			
			$datosFicheroLocal = @file_get_contents($ficheroLocal);
			if ($datosFicheroLocal === false) {
				throw new Exception("No se ha podido leer el fichero local: $ficheroLocal.");
			}
			
			if (@fwrite($stream, $datosFicheroLocal) === false) {
				throw new Exception("No se han podido enviar los datos desde el fichero local: $ficheroLocal.");
			}
			
			@fclose($stream);
		}
	}
?>