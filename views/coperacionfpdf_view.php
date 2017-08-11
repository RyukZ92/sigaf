<?php
include('../db/db.php');
include('../config/config.php');
include('../config/config_cc.php');
include('../models/libromayor_model.php');
ob_start();
date_default_timezone_set("America/Caracas");
$objLibroMayor=new LibroMayor();
$total=0;
$subTotal=0;
if(($_GET['mes']&&$_GET['anio']))
	{
	$titulo="OPERACIONES FINANCIERAS DEL CONSEJO COMUNAL - FECHA: ".$_GET['mes']."/".$_GET['anio'];
	$lista=$objLibroMayor->consultarOperacionPorFecha($_GET['mes'],$_GET['anio']);
	}
else
	{
	$titulo="OPERACIONES FINANCIERAS DEL CONSEJO COMUNAL";
	$lista=$objLibroMayor->consultarOperacion();
	}
?>
<style type='text/css'>
a{
text-decoration:none;
color:#000;
}
*{
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
	margin-top:10px;
	text-align:center;
}
#banner img{
	height:70px;
}
#membrete{
	margin:auto;
	margin-top:05px;
	text-align:center;
	font-weight:bold;
}
#titulo{
	margin:auto;
	margin-top:55px;
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
	left:950px;
	top:750px;
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
	margin-top:20px;
	box-shadow:0 0px 1px rgba(0,0,0, .7) inset,0 0px 1px rgba(0,0,0, .7); 
	}
td
	{
	border:0px;
	border-color:none;
	height:20px;
	padding:5px;
	background:#FAFAFA;
	width:115px;
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

</style>
<page backtop='10%' backbottom='5%' backleft='10%' backright='10%'>
<page_header>
	<div id='banner' ><img src='../layouts/default/imagen/banner.png'></div>
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
<div id='titulo'><?php echo $titulo; ?></div>
	<table cellspacing='02' align="center">
	<tr>
		<th align="center">Comprobante</th>
		<th align="center">Tipo de operación</th>
		<th align="center" style='width:150px;'>Descripción</th>
		<th align="center">Monto (Bs.)</th>
		<th align="center">Fecha</th>
		<th align="center">Fecha de registro</th>
	</tr>
<?php
$LibroMayor=new LibroMayor();
$finanza=$LibroMayor->consultarOperacion();
$ingreso=0;
$egreso=0;
$total=0;
$subTotal=0;
for($i=0;$i<count($finanza);$i++)
	{
	if($finanza[$i]['tipo_op']=='Ingreso')
		$ingreso+=$finanza[$i]['monto'];
	else
		$egreso+=$finanza[$i]['monto'];
	$subTotal+=$finanza[$i]['monto'];
	$saldo=$ingreso-$egreso;
	
	}
for($i=0;$i<count($lista);$i++)
	{
	$color=($lista[$i]['tipo_op']=='Ingreso')?'green':'red';
	$fecha_comp=explode('-',$lista[$i]['fecha_comp']);
	$fecha_reg=explode('-',$lista[$i]['fecha_op']);
?>
	<tr>
		<td align='center'><?php echo $lista[$i]['comprobante']; ?></td>
		<td align='center'><?php echo "<label style='color:$color' >".$lista[$i]['tipo_op']."</label>"; ?></td>
		<td align='center'><?php echo $lista[$i]['descripcion']; ?></td>
		<td align='center'><?php echo number_format($lista[$i]['monto'], 2, ",", "."); ?></td>
		<td align='center'><?php echo $fecha_comp[2].'/'.$fecha_comp[1].'/'.$fecha_comp[0]; ?></td>
		<td align="center"><?php echo $fecha_reg[2].'/'.$fecha_reg[1].'/'.$fecha_reg[0]." ".$lista[$i]['hora_op']; ?></td>
	</tr>
<?php	
	}
?>
	<tr>
		<td colspan="4" align="right"><b>Saldo actual:</b></td>
		<td colspan="2" align="center"><b><?php echo number_format($saldo, 2, ",", "."); ?></b></td>
	</tr>
	</table>
</page>
<?php
$salidaD="Libro_de_compra-".date('d').'-'.date('m').'-'.date('Y').'.pdf';
$contenido=ob_get_clean();
require_once '../libs/html2pdf_v4.03/html2pdf.class.php';
$pdf=new HTML2PDF('L','letter','es','true','UTF-8');
$pdf->writeHTML($contenido);
$pdf->Output($salidaD);
?>
