<?php
//LLamada del modelo
if(is_readable('models/usuario_model.php'))
	{
	require_once('models/usuario_model.php');
	$usuario=new usuario_model();
	}
//Llamada de la vista	
if(is_readable('views/idrecuperarclave_view.phtml'))	
	require_once('views/idrecuperarclave_view.phtml');
?>
