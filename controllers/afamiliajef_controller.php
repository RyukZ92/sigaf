<?php
//LLamada del modelo
if(is_readable('models/familia_model.php'))
	{
	require_once('models/familia_model.php');
	$nuevaFamilia=new Familia();
	}
//Llamada de la vista	
if(is_readable('views/afamiliajef_view.phtml'))	
	require_once('views/afamiliajef_view.phtml');
?>
