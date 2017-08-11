<?php
//LLamada del model
if(is_readable('models/proyecto_model.php'))
	{
	require_once('models/proyecto_model.php');
	$proyecto=new Proyecto();
	$listaProyecto=$proyecto->consultarProyecto();
	}
//Llamada de la vista	
if(is_readable('views/cgproyecto_view.phtml'))	
	require_once('views/cgproyecto_view.phtml');
?>