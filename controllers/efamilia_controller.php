<?php
//LLamada del modelo
if(is_readable('models/familia_model.php'))
	{
	require_once('models/familia_model.php');
	require_once('models/vivienda_model.php');
	require_once('models/direccion_model.php');
	require_once('models/historial_model.php');
	$familia=new Familia();
	$edad=new Familia();
	$datosFamilia=new Familia();
	$direccion=new Direccion();
	}
//Llamada de la vista	
if(is_readable('views/efamilia_view.phtml'))	
	require_once('views/efamilia_view.phtml');
?>
