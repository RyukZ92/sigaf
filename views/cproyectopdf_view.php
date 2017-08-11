<?php
include('../db/db.php');
include('../config/config.php');
include('../config/config_cc.php');
include('../models/proyecto_model.php');
include('../models/vocero_model.php');
ob_start();
date_default_timezone_set("America/Caracas");
$proyecto=new Proyecto();
$listaProyecto=$proyecto->consultarProyecto();

$en_espera=0;
$aprobados=0;
$no_aprobados=0;
$en_elaboracion=0;
$finalizados=0;
for($i=0;$i<count($listaProyecto);$i++)
	{
	if($listaProyecto[$i]['estatus']=='En espera')
		$en_espera++;
	else if($listaProyecto[$i]['estatus']=='Aprobado')
		$aprobados++;
	else if($listaProyecto[$i]['estatus']=='No aprobado')
		$no_aprobados++;
	else if($listaProyecto[$i]['estatus']=='En ejecución')
		$en_elaboracion++;	
	else if($listaProyecto[$i]['estatus']=='Finalizado')
		$finalizados++;
	}
$total=$en_espera+$en_elaboracion+$finalizados+$aprobados+$no_aprobados;
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
	border:0px;
	border-color:none;
	height:20px;
	padding:5px;
	padding-bottom:7px;
	padding-top:2px;
	background:#FAFAFA;
	width:178px;
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
.resumen_
	{
	text-align:center;
	width:750px;
	margin-top: 0px;
	background:#f0f0f0;
	border:1px solid #585858;
	border-top:0px solid #000
	}
.td_
	{
	padding: 2px;
	width:92px;
	font-size: 11px;	
	background:#FAFAFA;
	border-top:0px solid #000;
	border-right:0px;
	border-left:0px;
	}

</style>
<page backtop='10%' backbottom='5%' backleft='5%' backright='5%'>
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
<div id='titulo'>Resumen de proyectos de la comunidad</div>
<div id='cuerpo'>
</div>
	<table cellspacing='02' align="center">
	<tr>
		<th title=''><a href='#'>Título del proyecto</a></th>
		<th title='Título del proyecto'><a href='#'>Categoría del proyecto</a></th>

		<th title='Estatus del usuario' class='accion' style='width:100px;'><a href='#'>Estatus</a></th>
		

	</tr>
<?php
for($i=0;$i<count($listaProyecto);$i++)
	{
?>
	<tr>
		<td ><?php echo $listaProyecto[$i]['titulo']; ?></td>
		<td title='<?php echo $lista[$i]['titulo']; ?>'><?php echo $listaProyecto[$i]['tipo']; ?></td>
		<td class='accion'><?php echo "<b>".$listaProyecto[$i]['estatus']."</b>"; ?></td>	
	</tr>
<?php
	}
?>
	</table>

	<table class='resumen_' cellspacing='0' align="center">
		<tr style='margin:auto; text-align:justify;'>
			<td class='td_'><?php echo "<b>En espera: </b> $en_espera"; ?></td>
			<td class='td_'><?php echo "<b>Aprobados: </b> $aprobados"; ?></td>
			<td class='td_'><?php echo "<b>No aprobados: </b> $no_aprobados"; ?></td>	
			<td class='td_'><?php echo "<b>En ejecución: </b> $en_elaboracion"; ?></td>			
			<td class='td_'><?php echo "<b>Finalizados: </b> $finalizados"; ?></td>
			<td class='td_'><?php echo " <b>TOTAL: </b> $total"; ?></td></tr>
	</table>
</page>
<?php
$salidaD="Proyecto_".date('d').'-'.date('m').'-'.date('Y').'.pdf';
$contenido=ob_get_clean();
require_once '../libs/html2pdf_v4.03/html2pdf.class.php';
$pdf=new HTML2PDF('P','letter','es','true','UTF-8');
$pdf->writeHTML($contenido);
$pdf->Output($salidaD);
?>
