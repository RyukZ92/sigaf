<?php
//LLamada del model
if(is_readable('models/usuario_model.php'))
	{
	require_once('models/usuario_model.php');
	require_once ('models/historial_model.php');
	$sesion=new Usuario_model();
	}
//Llamada de la vista	
if(is_readable('views/iniciarsesion_view.phtml'))	
	require_once('views/iniciarsesion_view.phtml');
?>