<?php
//LLamada del model
if(is_readable('models/libroinventario_model.php'))
	{
	require_once('models/libromayor_model.php');
	require_once('models/paginador_model.php');
	$paginador=new Paginador();
	$pagina=$_GET['pagina'];
	$lista=$paginador->paginar_p("SELECT * FROM libro_mayor WHERE MONTH(fecha_comp)='".$_REQUEST['mes']."' AND YEAR(fecha_comp)='".$_REQUEST['anio']."'",$pagina);
	$params=$paginador->getPaginacion();
	$saldos=new LibroMayor();
	$objLibroMayor=new LibroMayor();
	}
//Llamada de la vista	
if(is_readable('views/coperacionfecha_view.phtml'))	
	require_once('views/coperacionfecha_view.phtml');
?>