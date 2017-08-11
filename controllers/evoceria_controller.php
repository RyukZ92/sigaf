<?php
//LLamada del modelo
if(is_readable('models/voceria_model.php'))
	{
	require_once('models/voceria_model.php');
	require_once('models/historial_model.php');
	$modificaVoceria=new Voceria();
	}
//Llamada de la vista	
if(is_readable('views/evoceria_view.phtml'))	
	require_once('views/evoceria_view.phtml');
?>
