<?php
//LLamada del modelo
if(is_readable('models/familia_model.php'))
	{
	require_once('models/familia_model.php');
	$persona=new Familia();
	}
//Llamada de la vista	
if(is_readable('views/cartaresPDF_view.php'))	
	require_once('views/cartaresPDF_view.php');
?>
