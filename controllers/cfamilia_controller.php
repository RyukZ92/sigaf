<?php
//LLamada del modelo
if(is_readable('models/familia_model.php'))
	{
	require_once('models/familia_model.php');
	require_once('models/paginador_model.php');
	$familia=new Familia();
	$paginador=new Paginador();
	$pagina=$_GET['pagina'];
	$lista=$paginador->paginar("SELECT persona.id, dni, tipo_dni,id_rep,
	CURDATE(),(YEAR( CURDATE())-YEAR(fecha_nac))-(RIGHT(CURDATE(),5)<RIGHT(fecha_nac,5)) AS edad, 
	nombre, apellido, sexo, sector, empleo
	FROM persona, familia, direccion
	WHERE persona.id_rep = familia.id
	AND familia.id = id_rep_familia
	AND persona.dni = familia.dni_rep
	AND persona.mudado='0'
	AND persona.fallecido='0'
	ORDER BY dni ASC",$pagina);
	$params=$paginador->getPaginacion();
	}
//Llamada de la vista	
if(is_readable('views/cfamilia_view.phtml'))	
	require_once('views/cfamilia_view.phtml');
?>
