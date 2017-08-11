<?php
//LLamada del modelo
if(is_readable('models/voceria_model.php'))
	{
	require_once('models/voceria_model.php');
	require_once('models/paginador_model.php');
	$paginador=new Paginador();
	$pagina=$_GET['pagina'];
	$lista=$paginador->paginar_p("SELECT * FROM voceria WHERE eliminado='0' ORDER BY estatus DESC, nombre ASC",$pagina);
	$params=$paginador->getPaginacion();
	}
//Llamada de la vista	
if(is_readable('views/cvoceria_view.phtml'))	
	require_once('views/cvoceria_view.phtml');
?>
