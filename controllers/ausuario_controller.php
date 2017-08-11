<?php
//LLamada del modelo
if(is_readable('models/usuario_model.php'))
	{
	require_once('models/usuario_model.php');
	require_once('models/vocero_model.php');
	require_once ('models/historial_model.php');
	$nuevoUsuario=new Usuario_model();
	$objVocero=new Vocero();
	}
//Llamada de la vista	
if(is_readable('views/ausuario_view.phtml'))	
	require_once('views/ausuario_view.phtml');

?>