<?php
include('../db/db.php');
include('../config/config.php');
include('../config/config_cc.php');
include('../models/proyecto_model.php');
ob_start();
date_default_timezone_set("America/Caracas");
$objProyecto=new Proyecto();
$proyecto=$objProyecto->consultarProyectoDetallePorId($_GET['id']);
$fecha_i_e=explode('-',$proyecto[0]['fecha_inicial_estimada']);
$fecha_f_e=explode('-',$proyecto[0]['fecha_final_estimada']);
$fecha_i=explode('-',$proyecto[0]['fecha_inicio']);
$fecha_f=explode('-',$proyecto[0]['fecha_final']);
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
	width:100%;
	box-shadow:0 0px 1px rgba(0,0,0, .7) inset,0 0px 1px rgba(0,0,0, .7); 
	}
td
	{
	width:400px;
	background:#FAFAFA;
	padding:5px;
	}
th
	{
	width: 200px;
	margin:0px;
	color:#fff;
	border:0px;
	border-color:none;
	text-decoration:none;
	padding-left:5px;
	background:#9A121B;
	height:45px;

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
<div id='titulo'>DESCRICIÓN DEL PROYECTO</div>
<br>
<br>
	<table cellspacing='01' style='width:100%;' align="center">
	<tr>
		<th>Título</th>
		<td><?php echo $proyecto[0]['titulo']; ?></td>
	</tr>
	<tr>
		<th>Categoría</th>
		<td><?php echo $proyecto[0]['tipo']; ?></td>
	</tr>
	<tr>
		<th>Prosupuesto estimado</th>
		<td><?php echo number_format($proyecto[0]['presupuesto_estimado'], 2, ",", ".").'Bs.'; ?></td>
	</tr>
	<?php
if($proyecto[0]['estatus']!='En espera')
	{
	?>
					<tr>
						<th>Prosupuesto aprobado</th>
						<td><?php echo number_format($proyecto[0]['presupuesto_aprobado'], 2, ",", ".").'Bs.'; ?></td>
					</tr>
					<tr>
						<th>Fecha estimada</th>
						<td><?php 
						//if(empty($fecha_i_e[0]))
							echo $fecha_i_e[2].'/'.$fecha_i_e[1].'/'.$fecha_i_e[0].' - '.$fecha_f_e[2].'/'.$fecha_f_e[1].'/'.$fecha_f_e[0] ; 
						//else
							{
						//	echo $fecha_i_e[2].'/'.$fecha_i_e[1].'/'.$fecha_i_e[0];
							//if()
							}

						?>

						</td>
					</tr>
	<?php
		if($proyecto[0]['estatus']!='Aprobado')
		{
	?>
					<tr>
						<th>Fecha de elaboración</th>
						<td><?php 
						if($proyecto[0]['estatus']=='En ejecución')
						echo $fecha_i[2].'/'.$fecha_i[1].'/'.$fecha_i[0].' - Fecha de culminación en espera';
						else
							echo $fecha_i[2].'/'.$fecha_i[1].'/'.$fecha_i[0].' - '.$fecha_f[2].'/'.$fecha_f[1].'/'.$fecha_f[0]; 
						?></td>
					</tr>
<?php
		}
	}
?>
	<tr>
		<th>Estatus</th>
		<td><?php echo $proyecto[0]['estatus']; ?></td>
	</tr>
	<tr>
		<th>Resumen</th>
		<td><?php echo $proyecto[0]['resumen']; ?></td>
	</tr>
	<tr>
		<th>Vocería autora</th>
		<td><?php echo ucwords(strtolower($proyecto[0]['nombre'])); ?></td>
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
