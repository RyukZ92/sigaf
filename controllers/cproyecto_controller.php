<?php
//LLamada del model
if(is_readable('models/usuario_model.php'))
	{
	require_once('models/proyecto_model.php');
	require_once('models/paginador_model.php');
	$paginador=new Paginador();
	$pagina=$_GET['pagina'];
	$lista=$paginador->paginar_p("SELECT proyecto.*,proyecto.id as id_p, voceria.id,voceria.nombre 
	FROM proyecto,voceria 
	WHERE autor_voceria=voceria.id
	ORDER BY proyecto.estatus ASC",$pagina);
	$params=$paginador->getPaginacion();
	$proyecto=new Proyecto();
	$listaProyecto=$proyecto->consultarProyecto();
	}
//Llamada de la vista	
if(is_readable('views/cproyecto_view.phtml'))	
	require_once('views/cproyecto_view.phtml');
?>