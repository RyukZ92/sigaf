<?php
//LLamada del modelo
if(is_readable('models/familia_model.php'))
	{
	require_once('models/familia_model.php');
	$familia=new Familia();
	}
//Llamada de la vista	
if(is_readable('views/moverafamiliaexistente_view.phtml'))	
	require_once('views/moverafamiliaexistente_view.phtml');
?>
