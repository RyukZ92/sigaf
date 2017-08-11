<?php
//LLamada del modelo
if(is_readable('models/vocero_model.php'))
	{
	require_once('models/vocero_model.php');
	require_once('models/voceria_model.php');
	$vocero=new Vocero();
	$voceria=new Voceria();
	}
//Llamada de la vista	
if(is_readable('views/librovocerospdf_view.php'))	
	require_once('views/librovocerospdf_view.php');
?>
