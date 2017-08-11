<html lang="es">
	<meta charset="utf-8"/>
	<?php
	define('LANGUAGE', 'es');
	if(is_readable('db/db.php')) 
		require_once('db/db.php'); //llamado de la conexión ala base de datos.
	include('libs/notices.php'); //Llamado de la librería de notitificaciones o advertencias.
	include('config/config_cc.php'); //Configuración del consejo comunal.
	include('config/config.php'); //Configuración del sistema.
	include('config/root.php'); //Lamado al usuario temporal del sistema.
	include('layouts/default/index.php'); //Llamado al entorno gráfico del usuario. la palabra default se cambia por el nombre de la carpeta de la plantilla utilizada como entorno gráfico del sistema.
	?>
</html>