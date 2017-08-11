<?php
//LLamada del model
if(is_readable('models/usuario_model.php'))
	{
	require_once('models/usuario_model.php');
	require_once('models/vocero_model.php');
	require_once('models/historial_model.php');
	//Se instancia la clase usuario para poder hacer la busqueda del usaurio por su código y obtener los datos que se van a editar.
	$modificaUsuario=new Usuario_model();
	$vocero=new Vocero();
	}
//Llamada de la vista	
if(is_readable('views/eusuario_view.phtml'))	
	require_once('views/eusuario_view.phtml');
?>