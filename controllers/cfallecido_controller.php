<?php
//LLamada del modelo
if(is_readable('models/familia_model.php'))
	{
	require_once('models/familia_model.php');
	require_once('models/paginador_model.php');
	$familia=new Familia();
	$paginador=new Paginador();
	$pagina=$_GET['pagina'];
	$lista=$paginador->paginar("SELECT persona.*,direccion.sector
	FROM persona,direccion,familia
	WHERE familia.id=persona.id_rep
	AND familia.id=direccion.id_rep_familia
	AND persona.fallecido='1'
	ORDER BY dni ASC",$pagina);
	$params=$paginador->getPaginacion();	
	}
//Llamada de la vista	
if(is_readable('views/cfallecido_view.phtml'))	
	require_once('views/cfallecido_view.phtml');
?>
