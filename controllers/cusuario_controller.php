<?php
//LLamada del model
if(is_readable('models/usuario_model.php'))
	{
	require_once('models/usuario_model.php');
	require_once('models/paginador_model.php');
	$listarUsuario=new Usuario_model();
	$paginador=new Paginador();
	$pagina=$_GET['pagina'];
	$lista=$paginador->paginar("SELECT usuario.*,persona.dni,persona.tipo_dni,persona.nombre,persona.apellido 
	FROM usuario,persona,vocero 
	WHERE usuario.eliminado=0
	AND usuario.dni_vocero = vocero.dni_vocero
	AND vocero.dni_vocero = persona.dni",$pagina);
	$params=$paginador->getPaginacion();
	}
//Llamada de la vista	
if(is_readable('views/cusuario_view.phtml'))	
	require_once('views/cusuario_view.phtml');
?>