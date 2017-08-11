<?php
//LLamada del modelo
if(is_readable('models/vivienda_model.php'))
	{
	require_once('models/vivienda_model.php');
	require_once('models/familia_model.php');
	$vivienda=new Vivienda();
	$familia=new Familia();
	}
//Llamada de la vista	
if(is_readable('views/cviviendafamilia_view.phtml'))	
	require_once('views/cviviendafamilia_view.phtml');
?>
