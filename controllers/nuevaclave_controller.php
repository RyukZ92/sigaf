<?php
//LLamada del model
if(is_readable('models/usuario_model.php'))
	{
	require_once('models/usuario_model.php');
	require_once('models/historial_model.php');
	$usuario=new Usuario_model();
	}
//Llamada de la vista	
if(is_readable('views/nuevaclave_view.phtml'))	
	require_once('views/nuevaclave_view.phtml');
?>