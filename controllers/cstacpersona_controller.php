<?php
//LLamada del modelo
if(is_readable('models/familia_model.php'))
	{
	require_once('models/familia_model.php');
	$persona=new Familia();
	}
//Llamada de la vista	
if(is_readable('views/cstacpersona_view.phtml'))	
	require_once('views/cstacpersona_view.phtml');
?>
