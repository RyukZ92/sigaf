<?php
//LLamada del modelo
if(is_readable('models/proyecto_model.php'))
	{
	require_once('models/libromayor_model.php');
	require_once('models/historial_model.php');
	$objLibroMayor=new LibroMayor();
	}
//Llamada de la vista	
if(is_readable('views/aoperacionf_view.phtml'))	
	require_once('views/aoperacionf_view.phtml');
?>
