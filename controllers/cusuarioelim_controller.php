<?php
//LLamada del model
if(is_readable('models/usuario_model.php'))
	{
	require_once('models/usuario_model.php');
	require_once('models/vocero_model.php');
	require_once('models/familia_model.php');
	require_once('models/paginador_model.php');
	$vocero=new Vocero();
	$listarUsuario=new Usuario_model();
	$paginador=new Paginador();
	$familia=new Familia();
	$pagina=$_GET['pagina'];
	$lista=$paginador->paginar("SELECT usuario.*,persona.dni,persona.tipo_dni,persona.nombre,persona.apellido 
	FROM usuario,persona,vocero 
	WHERE usuario.eliminado=1
	AND usuario.dni_vocero = vocero.dni_vocero
	AND vocero.dni_vocero = persona.dni",$pagina);
	$params=$paginador->getPaginacion();
	}
//Llamada de la vista	
if(is_readable('views/cusuarioelim_view.phtml'))	
	require_once('views/cusuarioelim_view.phtml');
?>