<?php
//LLamada del modelo
if(is_readable('models/constancia_model.php'))
	{
	require_once('models/constancia_model.php');
	require_once('models/paginador_model.php');
	$paginador=new Paginador();
	$pagina=$_GET['pagina'];
	$lista=$paginador->paginar("SELECT constancia.* ,nombre,apellido
	FROM constancia,persona
	WHERE dni_persona = dni
	ORDER BY fecha_imp DESC",$pagina);
	$params=$paginador->getPaginacion();	
	}
//Llamada de la vista	
if(is_readable('views/cconstancia_view.phtml'))	
	{
	require_once('views/cconstancia_view.phtml');
	}
?>
