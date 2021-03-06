<!doctype html>
<html>
<head>
<meta charset="utf-8" />
	<title><?php echo $tema; ?></title>
	<link rel='stylesheet' type='text/css' href='../views/css/consultar.css'/>
	<script type='text/javascript' src='../views/js/funciones.js'></script>
	<link rel='stylesheet' type='text/css' href='../views/css/mensajes_validacion.css'/>
</head>
<body>
<div class='tema'>
<label class='titulo'>Detalles del vocero</label>
</div>
<!-- Mostrar todos los datos del vocero -->
	<table cellspacing='02' style='width:80%; margin:auto; text-align:Center;'>
	<tr>
		<th title='Documento de Identidad' style='width:120px;'><a href='#'>Documento de Identidad</a></th>
		<th title='Nombre y apellido del usuario'><a href='#'>Nombre y apellido</a></th>
		<th title='Nombre y apellido del usuario'><a href='#'>Vocería</a></th>
		<th title='Nombre y apellido del usuario'><a href='#'>Tipo de vocero</a></th>
		<th title='Número de cédula de identidad del usuario'><a href='#'>Teléfono</a></th>
		<th title='Período' align="center"><a href='#'>Período</a></th>
		<th title='Estatus' align="center"><a href='#'>Estatus</a></th>
	</tr>
<?php
include('../db/db.php');
include('../models/vocero_model.php');
$vocero=new Vocero();
$lista=$vocero->consultarVoceroPorDni($_GET['dni']);

for($i=0;$i<count($lista);$i++)
	{
	$fecha=$lista[$i]['fecha_vigencia'];
	$fecha_m=explode("-",$fecha);
	$dia_m=$fecha_m[2];
	$mes_m=$fecha_m[1];
	$anio_m=$fecha_m[0];
	$p_inicio=$anio_m;
	$p_final=$anio_m+2;

	$f=$config[0]['periodo_actual'];
	$_f=explode("/",$f);
	$a=$_f[2];
	$m=$_f[1];
	$d=$_f[0];
	$periodo_actual=$a."-".$m."-".$d;
	//echo $periodo_actual;
	$segundos=strtotime($periodo_actual) - strtotime($lista[$i]['fecha_vigencia']);//Calculando las diferencias de fechas para medir el tiempo del vocero 
	$diferencia_dias=intval($segundos/60/60/24); //Se está probando si funciona la fecha
?>
	<tr>
		<td title='<?php echo $lista[$i]['tipo_dni']."-".$lista[$i]['dni_vocero']; ?>'><?php echo $lista[$i]['tipo_dni']."-".$lista[$i]['dni_vocero']; ?></td>
		<td title="<?php echo $lista[$i]['nombre']." ".$lista[$i]['apellido']; ?>"><?php echo $lista[$i]['nombre']." ".$lista[$i]['apellido']; ?></td>
		<td title='<?php echo $lista[$i]['telefono_vocero']; ?>'><?php echo ucwords(strtolower($lista[$i]['voceria'])); ?></td>
		<td title='<?php echo $lista[$i]['telefono_vocero']; ?>'><?php echo $lista[$i]['tipo_miembro']; ?></td>
		<td title='<?php echo $lista[$i]['telefono_vocero']; ?>'><?php echo $lista[$i]['telefono_vocero']; ?></td>
		<td style='text-align:center;'title='<?php echo $p_inicio."-".$p_final; ?>'><?php if($diferencia_dias>365) echo "Expirado"; else echo $p_inicio."-".$p_final; ?></td>

		<!--Verifica si el registro se encuenta habilitado o desabilitado y así muestra la imágen correspondiente -->
		<td align="center">
		<?php if($lista[$i]['estatus']==1) 
				{ ?>
				<input type='image' title='Habilitado' src='../views/imagen/habilitado.png'>
		<?php 	}
			else
				{
		?>
				<input type='image' title='Deshabilitado' src='../views/imagen/deshabilitado.png'>
		<?php	}
			
			?>

		</td>
	</tr>
	
<?php
		
	}

?>
</table>
</body>
</html>