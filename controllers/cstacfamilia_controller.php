<?php
//LLamada del modelo
if(is_readable('models/familia_model.php'))
	{
	require_once('models/familia_model.php');
	$familia=new Familia();
	$persona=new Familia();
	}
//Llamada de la vista	
if(is_readable('views/cstacfamilia_view.phtml'))	
	require_once('views/cstacfamilia_view.phtml');
?>
