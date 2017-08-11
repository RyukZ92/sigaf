<?php
//LLamada del modelo
if(is_readable('models/voceria_model.php'))
	{
	require_once('models/voceria_model.php');
	require_once('models/historial_model.php');
	require_once('models/paginador_model.php');
	$nuevaVoceria=new Voceria();
	}
//Llamada de la vista	
if(is_readable('views/avoceria_view.phtml'))	
	require_once('views/avoceria_view.phtml');
?>
