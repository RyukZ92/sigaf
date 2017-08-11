<?php
include('../db/db.php');
include('../config/config.php');
include('../config/config_cc.php');
include('../models/vocero_model.php');
ob_start();
date_default_timezone_set("America/Caracas");
$objVocero=new Vocero();
$lista=$objVocero->consultarVocero();

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
	width:80px;
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
<div id='titulo'>VOCEOS DEL CONSEJO COMUNAL</div>
	<table cellspacing='02' align="center">
	<tr>
		<th colspan="2"><div style='text-align:center;'>Unidad Administrativa y Financiera</div></th>
	</tr>
	<tr align="center">
		<td><b>Principal</b></td>
		<td><b>Suplente</b></td>
	</tr>

<?php

for($i=0;$i<count($lista);$i++)
	{
	if($lista[$i]['voceria']=='UNIDAD ADMINISTRATIVA Y FINANCIERA')
		{
?>
		<tr>
			<td align='center' ><?php if($lista[$i]['tipo_miembro']=='Vocero principal') { echo $lista[$i]['nombre']." ".$lista[$i]['apellido']; } ?></td>
			<?php
			for($j=$i+1;$j<count($lista);$j++)
				{

			?>
				<td align='center' ><?php if($lista[$j]['tipo_miembro']=='Vocero suplente') { echo $lista[$j]['nombre']." ".$lista[$j]['apellido']; $j=count($lista)+1; } ?></td>
			<?php
				}
			?>
		</tr>
		
<?php
		}	
	}
?>
</table>

</page>
<?php
$salidaD="Libro_de_vocero-".date('d').'-'.date('m').'-'.date('Y').'.pdf';
$contenido=ob_get_clean();
require_once '../libs/html2pdf_v4.03/html2pdf.class.php';
$pdf=new HTML2PDF('P','letter','es','true','UTF-8');
$pdf->writeHTML($contenido);
$pdf->Output($salidaD);
?>
