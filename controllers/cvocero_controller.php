<?php
//LLamada del modelo
if(is_readable('models/vocero_model.php'))
	{
	require_once('models/vocero_model.php');
	require_once('models/voceria_model.php');
	require_once('models/paginador_model.php');
	$vocero=new Vocero();
	$voceria=new Voceria();
	$paginador=new Paginador();
	}
//Llamada de la vista	
if(is_readable('views/cvocero_view.phtml'))	
	require_once('views/cvocero_view.phtml');
?>
