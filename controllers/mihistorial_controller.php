<?php
//LLamada del model
if(is_readable('models/historial_model.php'))
	{
	require_once('models/historial_model.php');
	require_once('models/paginador_model.php');
	$historial=new historial();
	$paginador=new Paginador();
	$pagina=$_GET['pagina'];
	$lista=$paginador->paginar("SELECT * FROM historial WHERE id_usuario='".$_SESSION['codigo']."' ORDER BY fecha DESC, hora DESC",$pagina);
	$params=$paginador->getPaginacion();
	}
//Llamada de la vista	
if(is_readable('views/mihistorial_view.phtml'))
	require_once('views/mihistorial_view.phtml');
?>