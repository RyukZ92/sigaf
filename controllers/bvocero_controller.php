<?php
//LLamada del modelo
if(is_readable('models/vocero_model.php'))
	{
	require_once('models/vocero_model.php');
	require_once('models/voceria_model.php');
	$bvocero=new Vocero();
	$voceria=new voceria();
	}
//Llamada de la vista	
if(is_readable('views/bvocero_view.phtml'))	
	require_once('views/bvocero_view.phtml');
?>
