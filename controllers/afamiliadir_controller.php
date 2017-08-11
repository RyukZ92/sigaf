<?php
//LLamada del modelo
if(is_readable('models/parroquia_model.php'))
	{
	require_once('models/parroquia_model.php');
	$objParroquia=new Parroquia();
	}
//Llamada de la vista	
if(is_readable('views/afamiliadir_view.phtml'))	
	require_once('views/afamiliadir_view.phtml');
?>
