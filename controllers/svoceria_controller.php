<?php
//LLamada del model
if(is_readable('models/voceria_model.php'))
	{
	require_once('models/voceria_model.php');
	require_once('models/historial_model.php');
	$voceria=new Voceria();
	}
//Llamada de la vista	
if(is_readable('views/svoceria_view.phtml'))	
	require_once('views/svoceria_view.phtml');

?>