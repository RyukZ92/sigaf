<?php

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
	<title>Consulta de movimientos</title>
<link rel='stylesheet' type='text/css' href='css/consultar.css'/>
<script type='text/javascript' src='js/funciones.js'></script>
</head>
<body>
<div class='titulo'>
<label class='titulo'>Historial de usuarios</label>
</div>
<?php


// $movimiento=$mov->UltimosMovimientos();
//Mostrar todos los movimientos registrados
?>
	<table cellspacing='0' class='principal'>
	<tr style='text-align:center;' >
		<th><a href='#'>N°</a></th>
		<th><a href='#'>Usuario</a></th>
		<th><a href='#'>Acción realizada</a></th>
		<th><a href='#'>Fecha</a></th>
		<th class='ultima'><a href='#'>Hora</a></th>
		<!--<th>Detalles</th>-->
	</tr>
<?php
//Mostrar información de los departamentos registrados.
for($i=0;$i<count($lista);$i++)
	{
	$user=$usuario->ConsultarUsuarioPorId($lista[$i]['id_usuario']);
	//Convertir fecha YY-MM-DD a DD-MM-YY.
	$fecha=$lista[$i]['fecha'];
	$fecha_m=explode("-",$fecha);
	$dia_m=$fecha_m[2];
	$mes_m=$fecha_m[1];
	$anio_m=$fecha_m[0];
	$fecha_reg=$dia_m.'-'.$mes_m.'-'.$anio_m;
//	$nombre=$inst->ConsultarNombreInst($movimiento[$i]['id_departamento']);
?>
	<tr style='text-align:center;'  id="<?php echo "id_$i"; ?>" onMouseMove="cambiarColor('<?php echo "id_$i"; ?>','#FAFAFA url(imagenes/background.png) repeat-x 0 -10px');" onMouseOut="cambiarColor('<?php echo "id_$i"; ?>','#fff');" >
	
		<td><?php echo $i+1; ?></td>
		<td><?php echo $user[$i]['nombre_usuario']; ?></td>
	
		<td style='text-align:left;'><?php echo $lista[$i]['accion']; ?></td>
		<td><?php echo $fecha_reg; ?></td>
		<td class='ultima'><?php echo $lista[$i]['hora']; ?></td>
<!--	<td><?php //  ?>Detalles</td>-->
	</tr>
<?php
	}
?>
	</table>
<!-- FUENTE: www.CesarCancino.com -->
<div class='paginador' align='center' >
<ul>
	<li style="display:inline; margin-right:6px;">
	<?php if($params['primero']):	?>
		<a  class='parametro'  href="?pagina=<?php echo $params['primero']; ?>">
		Primero
		</a>
	<?php	else: ?>
		Primero
	<?php	endif; ?>
	
	</li>
	<li style="display:inline; margin-right:6px;">
	<?php if($params['anterior']):	?>
		<a  class='parametro'  href="?pagina=<?php echo $params['anterior']; ?>">
		Anterior
		</a>
	<?php	else: ?>
		Anterior
	<?php	endif; ?>
	</li>
	<!--<li style="display:inline; margin-right:6px;">
	<?php for($i=1;$i<=$params['total'];$i++) {?>
	<?php if($params['actual']!=$i):	?>
		<a  class='parametro'  href="?pagina=<?php echo $i; ?>">
		<?php echo $i; ?>
		</a>
	<?php	else: ?>
		<?php echo $i; ?>
	<?php	endif; ?>
	<?php } ?>
	</li>-->
	<li style="display:inline; margin-right:6px;">
	<?php if($params['siguiente']):	?>
		<a  class='parametro'  href="?pagina=<?php echo $params['siguiente']; ?>">
		Siguiente
		</a>	
	<?php	else: ?>
		Siguiente
	<?php	endif; ?>
	</li>
	</li>
	<li style="display:inline; margin-right:5px;">
	<?php if($params['ultimo']):	?>
		<a  class='parametro'  class='parametro' href="?pagina=<?php echo $params['ultimo']; ?>">
		Último
		</a>
	<?php	else: ?>
		Último
	<?php	endif; ?>
	</li>
</ul>
</div>
</body>
</html>
