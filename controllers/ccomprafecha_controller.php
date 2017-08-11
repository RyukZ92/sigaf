<?php
//LLamada del modelo
if(is_readable('models/librocompra_model.php'))
	{
	require_once('models/librocompra_model.php');
	require_once('models/paginador_model.php');
	$paginador=new Paginador();
	$pagina=$_GET['pagina'];
	$lista=$paginador->paginar_p("SELECT * FROM libro_compra WHERE MONTH(fecha)='".$_REQUEST['mes']."' AND YEAR(fecha)='".$_REQUEST['anio']."'",$pagina);
	$params=$paginador->getPaginacion();
	$compra=new LibroCompra();
	}
//Llamada de la vista	
if(is_readable('views/ccomprafecha_view.phtml'))	
	require_once('views/ccomprafecha_view.phtml');
?>
