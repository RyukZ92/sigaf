<?php
//LLamada del modelo
if(is_readable('models/vivienda_model.php'))
	{
	require_once('models/vivienda_model.php');
	$vivienda=new Vivienda();
	}
//Llamada de la vista	
if(is_readable('views/evivienda_view.phtml'))
	require_once('views/evivienda_view.phtml');
?>
