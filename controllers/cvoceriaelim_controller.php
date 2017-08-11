<?php
//LLamada del modelo
if(is_readable('models/voceria_model.php'))
	{
	require_once('models/voceria_model.php');
	require_once('models/paginador_model.php');
	$paginador=new Paginador();
	$pagina=$_GET['pagina'];
	$lista=$paginador->paginar_p("SELECT * FROM voceria WHERE eliminado='1' ORDER BY estatus DESC",$pagina);
	$params=$paginador->getPaginacion();
	$voceria=new Voceria();

}
//Llamada de la vista	
if(is_readable('views/cvoceriaelim_view.phtml'))	
	require_once('views/cvoceriaelim_view.phtml');
?>
