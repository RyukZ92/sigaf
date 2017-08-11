<?php
//LLamada del modelo
if(is_readable('models/familia_model.php'))
	{
	require_once('models/familia_model.php');
	require_once('models/direccion_model.php');
	require_once('models/historial_model.php');
	$familia=new Familia();
	$cantidad=new Familia();
	}
//Llamada de la vista	
if(is_readable('views/epersonarep_view.phtml'))	
	require_once('views/epersonarep_view.phtml');
?>
