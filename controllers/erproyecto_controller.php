<?php
//LLamada del model
if(is_readable('models/proyecto_model.php'))
	{
	require_once('models/proyecto_model.php');
	require_once('models/voceria_model.php');
	require_once('models/historial_model.php');
	$proyecto=new Proyecto();
	$voceria=new voceria();
	}
//Llamada de la vista	
if(is_readable('views/erproyecto_view.phtml'))	
	require_once('views/erproyecto_view.phtml');
?>