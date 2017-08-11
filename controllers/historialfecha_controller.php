<?php
//LLamada del model
if(is_readable('models/historial_model.php'))
	{
	require_once('models/historial_model.php');
	require_once('models/usuario_model.php');
	require_once('models/paginador_model.php');
	$mov=new Historial();
	$usuario=new Usuario_model();
	$paginador=new Paginador();
	$pagina=$_GET['pagina'];
	$lista=$paginador->paginar_p("SELECT historial. * , usuario.nombre_usuario,persona.nombre, persona.apellido
	FROM historial, usuario, vocero, persona
	WHERE historial.id_usuario = usuario.id
	AND usuario.dni_vocero = vocero.dni_vocero
	AND vocero.dni_vocero = persona.dni
	AND MONTH(fecha)='".$_REQUEST['mes']."' AND YEAR(fecha)='".$_REQUEST['anio']."'
	ORDER BY fecha DESC, hora DESC",$pagina);
	$params=$paginador->getPaginacion();	

	}
//Llamada de la vista	
if(is_readable('views/historialfecha_view.phtml'))	
	require_once('views/historialfecha_view.phtml');
?>
