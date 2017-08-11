<?php
//LLamada del model
if(is_readable('models/libroinventario_model.php'))
	{
	require_once('models/libromayor_model.php');
	require_once('models/paginador_model.php');
	$paginador=new Paginador();
	$pagina=$_GET['pagina'];
	$lista=$paginador->paginar_p("SELECT * 
	FROM libro_mayor
	ORDER BY fecha_op DESC, hora_op DESC",$pagina);
	$params=$paginador->getPaginacion();
	$saldos=new LibroMayor();
	$objLibroMayor=new LibroMayor();
	}
//Llamada de la vista	
if(is_readable('views/coperacionf_view.phtml'))	
	require_once('views/coperacionf_view.phtml');
?>