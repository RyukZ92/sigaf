<?php
//LLamada del modelo
if(is_readable('models/proyecto_model.php'))
	{
	require_once('models/proyecto_model.php');
	require_once('models/voceria_model.php');
	require_once('models/historial_model.php');
	$voceria=new Voceria();
	$nuevoProyecto=new Proyecto();
	}
//Llamada de la vista	
if(is_readable('views/aproyecto_view.phtml'))	
	require_once('views/aproyecto_view.phtml');
?>
