<?php

//LLamada del modelo
if(is_readable('models/familia_model.php'))
	{
	include('models/familia_model.php');
	include('models/constancia_model.php');
	include('models/vocero_model.php');
	include('models/historial_model.php');
	$persona=new Familia();
	$firmante=new Vocero();
	$constancia=new Constancia();
	}
//Llamada de la vista	
if(is_readable('views/cresidenciapdf_view.php'))	
	require_once('views/cresidenciapdf_view.php');
?>
