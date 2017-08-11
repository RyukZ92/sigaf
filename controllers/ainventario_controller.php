<?php
//LLamada del modelo
if(is_readable('models/proyecto_model.php'))
	{
	require_once('models/libroinventario_model.php');
	require_once('models/historial_model.php');
	$objLibroInventario=new LibroInventario();
	}
//Llamada de la vista	
if(is_readable('views/ainventario_view.phtml'))	
	require_once('views/ainventario_view.phtml');
?>
