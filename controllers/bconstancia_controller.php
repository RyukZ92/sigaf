<?php
//LLamada del modelo
if(is_readable('models/familia_model.php'))
	{
	require_once('models/familia_model.php');
	require_once('models/constancia_model.php');
	$persona=new Familia();
	$constancia=new Constancia();
	}
//Llamada de la vista	
if(is_readable('views/bconstancia_view.phtml'))	
	require_once('views/bconstancia_view.phtml');
?>
