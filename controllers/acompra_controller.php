<?php
//LLamada del modelo
if(is_readable('models/librocompra_model.php'))
	{
	require_once('models/librocompra_model.php');
	require_once('models/historial_model.php');
	$nuevaCompra=new LibroCompra();
	}
//Llamada de la vista	
if(is_readable('views/acompra_view.phtml'))	
	require_once('views/acompra_view.phtml');
?>
