<?php
//LLamada del modelo
if(is_readable('models/historial_model.php'))
	require_once('models/historial_model.php');
//Llamada de la vista	
if(is_readable('views/config_view.phtml'))	
	require_once('views/config_view.phtml');
?>