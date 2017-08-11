<?php
//LLamada del modelo
if(is_readable('models/familia_model.php'))
	require_once('models/familia_model.php');
//Llamada de la vista	
if(is_readable('views/bstacfamilia_view.phtml'))	
	require_once('views/bstacfamilia_view.phtml');
?>
