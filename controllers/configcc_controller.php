<?php
//LLamada del modelo
if(is_readable('models/municipio_model.php'))
	{
	require_once('models/municipio_model.php');
	require_once('models/historial_model.php');
	require_once('models/select_dependiente_proceso.php');
	$objMunicipio=new Municipio();
	$objParroquia=new Municipio();
	}
//Llamada de la vista	
if(is_readable('views/configcc_view.phtml'))	
	require_once('views/configcc_view.phtml');
?>
