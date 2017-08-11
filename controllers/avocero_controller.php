<?php
//LLamada del model
if(is_readable('models/vocero_model.php'))
	{
	require_once("models/vocero_model.php");
	require_once("models/voceria_model.php");
	require_once("models/familia_model.php");
	require_once("models/historial_model.php");
	$nuevoVocero=new Vocero();
	$voceria=new Voceria();
	$persona=new Familia();
	}
//Llamada de la vista principal	
if(is_readable('views/avocero_view.phtml'))	
	require_once("views/avocero_view.phtml");
?>