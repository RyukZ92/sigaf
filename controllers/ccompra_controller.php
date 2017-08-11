<?php
//LLamada del modelo
if(is_readable('models/librocompra_model.php'))
	{
	require_once('models/librocompra_model.php');
	require_once('models/paginador_model.php');
	$paginador=new Paginador();
	$paginador_t=new Paginador();
	$pagina=$_GET['pagina'];
	$lista=$paginador->paginar_p("SELECT * FROM libro_compra ORDER BY fecha DESC",$pagina);
	$params=(!empty($_POST['mes'])&&!empty($_POST['anio']))?$paginador_t->getPaginacion():$paginador->getPaginacion();
	$compra=new LibroCompra();
	}
//Llamada de la vista	
if(is_readable('views/ccompra_view.phtml'))	
	require_once('views/ccompra_view.phtml');
?>
