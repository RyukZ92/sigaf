<?php
//LLamada del model
if(is_readable('models/voceria_model.php'))
	{
	require_once('models/vocero_model.php');
	require_once('models/voceria_model.php');
	require_once('models/familia_model.php');
	require_once('models/historial_model.php');
	$modificaVocero=new Vocero();
	$voceria=new Voceria();
	$familia=new Familia();
	}
//Llamada de la vista	
if(is_readable('views/evocero_view.phtml'))	
	require_once('views/evocero_view.phtml');
?>