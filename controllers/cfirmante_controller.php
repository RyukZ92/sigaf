<?php
//LLamada del model
if(is_readable('models/vocero_model.php'))
	{
	require_once("models/vocero_model.php");
	require_once("models/historial_model.php");
	$firmante=new Vocero();
	}
//Llamada de la vista principal	
if(is_readable('views/cfirmante_view.phtml'))	
	require_once("views/cfirmante_view.phtml");
?>