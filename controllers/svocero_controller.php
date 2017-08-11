<?php
//LLamada del model
if(is_readable('models/voceria_model.php'))
	{
	require_once('models/vocero_model.php');
	require_once('models/historial_model.php');
	$vocero=new Vocero();
	}
//Llamada de la vista	
if(is_readable('views/svocero_view.phtml'))	
	require_once('views/svocero_view.phtml');
?>