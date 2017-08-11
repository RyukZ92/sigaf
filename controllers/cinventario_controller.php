<?php
//LLamada del model
if(is_readable('models/libroinventario_model.php'))
	{
	require_once('models/libroinventario_model.php');
	require_once('models/paginador_model.php');
	$paginador=new Paginador();
	$pagina=$_GET['pagina'];
	$lista=$paginador->paginar("SELECT * 
	FROM libro_inventario
	ORDER BY descripcion ASC",$pagina);
	$params=$paginador->getPaginacion();
	}
//Llamada de la vista	
if(is_readable('views/cinventario_view.phtml'))	
	require_once('views/cinventario_view.phtml');
?>