<?php
//LLamada del modelo
if(is_readable('models/vocero_model.php'))
	{
	require_once('models/vocero_model.php');
	require_once('models/voceria_model.php');
	require_once('models/familia_model.php');
	require_once('models/paginador_model.php');
		$voceria=new Voceria();
	$vocero=new Vocero();
	$paginador=new Paginador();
	$paginador=new Paginador();
	$familia=new Familia();
	$pagina=$_GET['pagina'];
	$lista=$paginador->paginar("SELECT vocero.id,vocero.eliminado,tipo_dni,dni_vocero,fecha_vigencia,nombre,apellido,telefono_vocero, vocero.estatus,vocero.id_voceria
		FROM vocero,persona
		WHERE vocero.eliminado='1'
		AND dni_vocero=dni
		ORDER BY estatus DESC",$pagina);
	$params=$paginador->getPaginacion();
	}
//Llamada de la vista	
if(is_readable('views/cvoceroelim_view.phtml'))	
	require_once('views/cvoceroelim_view.phtml');
?>
