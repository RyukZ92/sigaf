<?php
include('../db/db.php');
include('../config/config.php');
include('../config/config_cc.php');
include('../models/familia_model.php');
ob_start();
date_default_timezone_set("America/Caracas");
$familia=new Familia();
$persona=$familia->consultarPersonaVotante();
$la_poza=0;
$pta_brava=0;
$los_primos=0;

?>
<style type='text/css'>
a{
	text-decoration:none;
	color:#000;
	}
*	{
	margin:0px;
	}
#membrete,#titulo,#cuerpo,#cuerpo2,#firmantes,#firmante1,#firmante2,#firmante3,.firma,#atte{
	font-size:16px;
	font-family:arial;
	line-height: 1.5;
}
#banner{
	width: 100%; 
	margin:0 auto;
	margin-top:20px;
	text-align:center;
}
#banner img{
	width:600px;
	height:50px;
}
#membrete{
	margin:auto;
	margin-top:0px;
	text-align:center;
	font-weight:bold;
}
#titulo{
	margin:auto;
	margin-top:60px;
	font-weight:bold;
	text-align:center;
}
#cuerpo{
	margin:auto;
	margin-top:20px;
	text-align:justify;
}

#pagina{
	position:absolute;
	left:700px;
	top:992px;
	font-size:10px;
}
#footer{
	margin:0 auto;
	text-align:center;
	font-size:12px;
	margin-right:75px;
	margin-left:75px;
}
#msj{
	margin:0 auto; 
	text-align:center;
	margin-top:15px;
	color:red;
}
table
	{	
	margin:0px auto;		
	border:1px solid #585858;
	border-radius:1px;
	text-align:center;
	width:750px;
	box-shadow:0 0px 1px rgba(0,0,0, .7) inset,0 0px 1px rgba(0,0,0, .7); 
	}
td
	{
	height:35px;
	width: 93px;
	background:#FAFAFA;
	}
th
	{
	margin:0px;
	color:#000;
	border:0px;
	border-color:none;
	text-decoration:none;
	padding-left:4px;
	background:#9A121B;
	height:30px;
	
	}
tr
	{
	font-size:14px;
	background:#fff;
	text-align:left;
	}
.sector_t{
	font-weight:bold;
	font-size:14px;
	margin-bottom:15px;
	text-align:center;
}
.resumen{
	width:160px;
}
</style>
<page backtop='10%' backbottom='5%' backleft='10%' backright='10%'>
<page_header>
	<div id='banner'><img src='../layouts/default/imagen/banner.png'></div>
</page_header>
	<page_footer>
    <div id='pagina'>Pág. [[page_cu]]/[[page_nb]]</div>
 		<div id='footer'>SIGAF - Sistema de Gestión Administrativa y Financiera "<?php echo $config[0]['nombre_consejo_comunal']; ?>", <?php echo date('Y');?><!--<b>Dirección:</b> Cuarta Calle de Charallave, Sector "Punta Brava, La Poza y Los Primos", Municipio Bermúdez, Carúpano - Estado Sucre.--></div>
	</page_footer>
<div id='membrete'>
República Bolivaria de Venezuela<br>
Ministerio del Poder Popular Para Las Comunas y Movimientos Sociales<br>
Consejo Comunal "<?php echo $config[0]['nombre_consejo_comunal']; ?>"<!-- Debe ser dinámico el nombre para cualqueiro consejo comunal-->
</div>
<div id='titulo'>POBLACIÓN VOTANTE DE LA COMUNIDAD</div>
<br>
<br>
<div class='sector_t'>Sector Punta Brava</div>
	<table cellspacing='02' style='width:100%;' align="center">
	<tr style='text-align:center;'>
		<th>Identificación</th>
		<th>Nombre y apellido</th>
		<th>Sexo</th>
		<th>Edad</th>
		<th>Fima</th>
		<th>Huella</th>
	</tr>
<?php

//Mostrar información de los departamentos registrados.
for($i=0;$i<count($persona);$i++)
	{
	if($persona[$i]['edad']>14&&strtolower($persona[$i]['sector'])=='punta brava')
		{
		$pta_brava++;
		$fecha=$lista[$i]['fecha_nac'];
		$fecha_m=explode("-",$fecha);
		$nombre=explode(' ',$persona[$i]['nombre']);
		$apellido=explode(' ',$persona[$i]['apellido']);
?>
		<tr style='text-align:center;'>
			<td><?php echo $persona[$i]['tipo_dni']."-".$persona[$i]['dni']; ?></td>
			<td><?php echo $nombre[0]." ".$apellido[0]; ?></td>
			<td><?php echo $persona[$i]['sexo']; ?></td>
			<td><?php echo $persona[$i]['edad']. " años"; ?></td>
			<td><?php echo '' ?></td>
			<td><?php echo '' ?></td>
		</tr>

<?php
		}
	}
?>
</table>
</page>
<page backtop='10%' backbottom='5%' backleft='10%' backright='10%'>
<page_header>
	<div id='banner'><img src='../layouts/default/imagen/banner.png'></div>
</page_header>
	<page_footer>
    <div id='pagina'>Pág. [[page_cu]]/[[page_nb]]</div>
 		<div id='footer'>SIGAF - Sistema de Gestión Administrativa y Financiera "<?php echo $config[0]['nombre_consejo_comunal']; ?>", <?php echo date('Y');?><!--<b>Dirección:</b> Cuarta Calle de Charallave, Sector "Punta Brava, La Poza y Los Primos", Municipio Bermúdez, Carúpano - Estado Sucre.--></div>
	</page_footer>

<div class='sector_t'>Sector La Poza</div>
	<table cellspacing='02' style='width:100%;' align="center">
	<tr style='text-align:center;'>
		<th>Identificación</th>
		<th>Nombre y apellido</th>
		<th>Sexo</th>
		<th>Edad</th>
		<th>Fima</th>
		<th>Huella</th>
	</tr>
<?php

//Mostrar información de los departamentos registrados.
for($i=0;$i<count($persona);$i++)
	{
	if($persona[$i]['edad']>14&&strtolower($persona[$i]['sector'])=='la poza')
		{
		$la_poza++;
		$fecha=$lista[$i]['fecha_nac'];
		$fecha_m=explode("-",$fecha);
		$nombre=explode(' ',$persona[$i]['nombre']);
		$apellido=explode(' ',$persona[$i]['apellido']);
?>
		<tr style='text-align:center;'>
			<td><?php echo $persona[$i]['tipo_dni']."-".$persona[$i]['dni']; ?></td>
			<td><?php echo $nombre[0]." ".$apellido[0]; ?></td>
			<td><?php echo $persona[$i]['sexo']; ?></td>
			<td><?php echo $persona[$i]['edad']. " años"; ?></td>
			<td><?php echo '' ?></td>
			<td><?php echo '' ?></td>
		</tr>

<?php
		}
	}
?>
</table>
</page>
<page backtop='10%' backbottom='5%' backleft='10%' backright='10%'>
<page_header>
	<div id='banner'><img src='../layouts/default/imagen/banner.png'></div>
</page_header>
	<page_footer>
    <div id='pagina'>Pág. [[page_cu]]/[[page_nb]]</div>
 		<div id='footer'>SIGAF - Sistema de Gestión Administrativa y Financiera "<?php echo $config[0]['nombre_consejo_comunal']; ?>", <?php echo date('Y');?><!--<b>Dirección:</b> Cuarta Calle de Charallave, Sector "Punta Brava, La Poza y Los Primos", Municipio Bermúdez, Carúpano - Estado Sucre.--></div>
	</page_footer>

<div class='sector_t'>Sector Los Primos</div>
	<table cellspacing='02' style='width:100%;' align="center">
	<tr style='text-align:center;'>
		<th>Identificación</th>
		<th>Nombre y apellido</th>
		<th>Sexo</th>
		<th>Edad</th>
		<th>Fima</th>
		<th>Huella</th>
	</tr>
<?php

//Mostrar información de los departamentos registrados.
for($i=0;$i<count($persona);$i++)
	{
	if($persona[$i]['edad']>14&&strtolower($persona[$i]['sector'])=='los primos')
		{
		$los_primos++;
		$fecha=$lista[$i]['fecha_nac'];
		$fecha_m=explode("-",$fecha);
		$nombre=explode(' ',$persona[$i]['nombre']);
		$apellido=explode(' ',$persona[$i]['apellido']);
?>
		<tr style='text-align:center;'>
			<td><?php echo $persona[$i]['tipo_dni']."-".$persona[$i]['dni']; ?></td>
			<td><?php echo $nombre[0]." ".$apellido[0]; ?></td>
			<td><?php echo $persona[$i]['sexo']; ?></td>
			<td><?php echo $persona[$i]['edad']. " años"; ?></td>
			<td><?php echo '' ?></td>
			<td><?php echo '' ?></td>
		</tr>

<?php
		}
	}
?>
</table>
</page>
<page backtop='10%' backbottom='5%' backleft='10%' backright='10%'>
<page_header>
	<div id='banner'><img src='../layouts/default/imagen/banner.png'></div>
</page_header>

	<page_footer>
	<div id='pagina'>Pág. [[page_cu]]/[[page_nb]]</div>
 		<div id='footer'>SIGAF - Sistema de Gestión Administrativa y Financiera "<?php echo $config[0]['nombre_consejo_comunal']; ?>", <?php echo date('Y');?><!--<b>Dirección:</b> Cuarta Calle de Charallave, Sector "Punta Brava, La Poza y Los Primos", Municipio Bermúdez, Carúpano - Estado Sucre.--></div>
	</page_footer>

<?php
$total=$pta_brava+$la_poza+$los_primos;
?>	
<div class='sector_t'>Resumen</div>
	<table cellspacing='02' style='width:100%;' align="center">
	<tr style='text-align:center;'>
		<th  class='resumen'>Sector</th>
		<th  class='resumen'>Cantidad en personas</th>
		<th  class='resumen'>Porcentual %</th>
	</tr>
	<tr align="center">
		<td><?php echo 'Punta Brava'; ?></td>
		<td><?php echo $pta_brava.' personas'; ?></td>
		<td><?php echo ($pta_brava*100)/$total.'%'; ?></td>
	
	</tr>
	<tr align="center">
		<td><?php echo 'La Poza'; ?></td>
		<td><?php echo $la_poza.' personas'; ?></td>
		<td><?php echo ($la_poza*100)/$total.'%'; ?></td>

	</tr>
	<tr align="center">
		<td><?php echo 'Los Primos'; ?></td>
		<td><?php echo $los_primos.' personas'; ?></td>
		<td><?php echo ($los_primos*100)/$total.'%'; ?></td>
		
	</tr>
	<tr align="center">
		<td><b>Total:</b></td>
		<td><?php echo $total.' personas'; ?></td>
		<td><?php echo '100%'; ?></td>
	</tr>

	</table>
</page>
<?php
$salidaD="Libro_de_compra-".date('d').'-'.date('m').'-'.date('Y').'.pdf';
$contenido=ob_get_clean();
require_once '../libs/html2pdf_v4.03/html2pdf.class.php';
$pdf=new HTML2PDF('P','letter','es','true','UTF-8');
$pdf->writeHTML($contenido);
$pdf->Output($salidaD);
?>
