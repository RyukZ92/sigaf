<?php

include 'parroquia_model.php';
$objParroquia=new Parroquia();
// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects=array(
"municipio"=>"municipio",
"parroquia"=>"parroquia"
);

function validaSelect($selectDestino)
	{
	// Se valida que el select enviado via GET exista
	global $listadoSelects;
	if(isset($listadoSelects[$selectDestino])) return true;
	else return false;
	}

function validaOpcion($opcionSeleccionada)
	{
	// Se valida que la opcion seleccionada por el usuario en el select tenga un valor numerico
	if(is_numeric($opcionSeleccionada)) return true;
	else return false;
	}

$selectDestino=$_GET["select"]; $opcionSeleccionada=$_GET["opcion"];

if(validaSelect($selectDestino) && validaOpcion($opcionSeleccionada))
	{
	$tabla=$listadoSelects[$selectDestino];
//	include 'conexion.php';
//	conectar();
	//$consulta=mysql_query("SELECT id, nombre_parroquia FROM $tabla WHERE municipio_id='$opcionSeleccionada'") or die(mysql_error());
	//desconectar();
	$parroquia=$objParroquia->consultarParroquiaPorMunicipio($tabla,$opcionSeleccionada);
	// Comienzo a imprimir el select
	echo "Parroquia<br><select name='".$selectDestino."' id='".$selectDestino."' onChange='cargaContenido(this.id)'>";
//	while($registro=mysql_fetch_row($consulta))
	for($i=0;$i<count($parroquia);$i++)
		{
	?>
	<!--	// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
		//$registro[1]=htmlentities($registro[1]);
		// Imprimo las opciones del select -->
		<option value='<?php echo $parroquia[$i]['id']; ?>'><?php echo $parroquia[$i]['nombre']; ?></option>
					
	<?php
		}
	echo "</select>";
	}
?>
