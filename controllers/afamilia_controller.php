<?php
//LLamada del modelo
if(is_readable('models/familia_model.php'))
	{
	require_once('models/familia_model.php');
	require_once('models/vivienda_model.php');
	require_once('models/direccion_model.php');
	require_once('models/historial_model.php');
	$nuevaFamilia=new Familia();
	$nuevaVivienda=new Vivienda();
	$nuevaDireccion=new Direccion();
	}
//Llamada de la vista	
if(is_readable('views/afamilia_view.phtml'))	
	require_once('views/afamilia_view.phtml');
?>
