<?php
//LLamada del model
if(is_readable('models/usuario_model.php'))
	{
	require_once('models/usuario_model.php');
	require_once('models/historial_model.php');
	//Se instancia la clase usuario para poder hacer la busqueda del usaurio por su código y obtener los datos que se van a editar.
	$usuario=new Usuario_model();
	$modificaUsuario=new Usuario_model();
	}
else "No leíble susuario";
//Llamada de la vista	
if(is_readable('views/susuario_view.phtml'))	
	{
	require_once('views/susuario_view.phtml');
	}
else "No leíble susuario";
?>