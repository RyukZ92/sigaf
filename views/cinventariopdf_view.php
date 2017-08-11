<?php
include('../db/db.php');
include('../config/config.php');
include('../config/config_cc.php');
include('../models/libroinventario_model.php');
ob_start();
date_default_timezone_set("America/Caracas");
$objLibroInventario=new LibroInventario();
$lista=$objLibroInventario->consultarPatrimonio();
$total=0;
$subTotal=0;
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
	width:100px;
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
	margin-top: 0px;
	background:#f0f0f0;
	border:1px solid #000;
	border-top:0px solid #000
	}
.td_
	{
	padding: 2px;
	width:94px;
	font-size: 11px;	
	background:#FAFAFA;
	border-top:0px solid #000;
	border-right:0px;
	border-left:0px;
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
<div id='titulo'>INVENTARIO DEL CONSEJO COMUNAL</div>
	<table cellspacing='02' align="center">
	<tr>
		<th title='Descripción'>Descripción</th>
		<th align="center" title='Código'>Código</th>
		<th align="center" title='Cantidad'>Cantidad</th>
		<th align="center" title='Precio unitario Bs.'>Precio unitario (Bs.)</th>
		<th align="center" title='Total'>Sub-total (Bs.)</th>
	</tr>

<?php
$total=0;
for($i=0;$i<count($lista);$i++)
	{
	$subTotal=$lista[$i]['precio_unitario']*$lista[$i]['cantidad'];
	$total+=$subTotal;
?>
	<tr id="<?php echo "id_$i"; ?>" onMouseMove="cambiarColor('<?php echo "id_$i"; ?>','#D8D8D8 url(views/imagen/background.png) repeat-x 0 -10px');" onMouseOut="cambiarColor('<?php echo "id_$i"; ?>','#fff');">
		<td title='<?php echo $lista[$i]['descripcion']; ?>'><?php echo $lista[$i]['descripcion']; ?></td>
		<td align='center' title='<?php echo $lista[$i]['codigo']; ?>'><?php echo $lista[$i]['codigo']; ?></td>
		<td align='center' title='<?php echo $lista[$i]['cantidad']; ?>'><?php echo $lista[$i]['cantidad']; ?></td>
		<td align='center' title='<?php echo $lista[$i]['precio_unitario']; ?>'><?php echo number_format($lista[$i]['precio_unitario'], 2, ",", "."); ?></td>
		<td align='center' title='<?php echo $subTotal; ?>'><?php echo number_format($subTotal, 2, ",", "."); ?></td>
	</tr>

<?php	
	}
?>
	<tr>
		<td colspan="4" align="right"><b>Total:</b></td>
		<td colspan="2" align="center"><?php echo number_format($total, 2, ",", "."); ?></td>
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
