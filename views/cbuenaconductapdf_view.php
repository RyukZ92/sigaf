<?php
include('../db/db.php');
include('../config/config.php');
include('../models/familia_model.php');
include('../models/constancia_model.php');
include('../models/vocero_model.php');
include('../models/historial_model.php');
ob_start();
date_default_timezone_set("America/Caracas");
$persona=new Familia();
$firmante=new Vocero();
$constancia=new Constancia();
$ciudadano=$persona->consultarPersonaDni($_REQUEST['dni']);
$vocero=$firmante->consultarFirmanteVocero();
$nuevaConstancia=$constancia->agregarConstancia('Buena conducta',$ciudadano[0]['dni']);
Historial::Movimiento($_SESSION['codigo'],"Generó constancia de buena conducta al ciudadano del Documento de Identidad: ".$ciudadano[0]['dni']);
if(date('m')==1)
	$mes='Enero';
else if(date('m')==2)
	$mes='Febrero';
else if(date('m')==3)
	$mes='Marzo';
else if(date('m')==4)
	$mes='Abril';
else if(date('m')==5)
	$mes='Mayo';
else if(date('m')==6)
	$mes='Junio';
else if(date('m')==7)
	$mes='Julio';
else if(date('m')==8)
	$mes='Agosto';
else if(date('m')==9)
	$mes='Septiembre';
else if(date('m')==10)
	$mes='Octubre';
else if(date('m')==11)
	$mes='Nomviembre';
else if(date('m')==12)
	$mes='Diciembre';

$fecha_taq=explode('/',$config[0]['fecha_taq_unica']);
if($fecha_taq[1])
	$mes_taq='Enero';
else if($fecha_taq[1]==2)
	$mes_taq='Febrero';
else if($fecha_taq[1]==3)
	$mes_taq='Marzo';
else if($fecha_taq[1]==4)
	$mes_taq='Abril';
else if($fecha_taq[1]==5)
	$mes_taq='Mayo';
else if($fecha_taq[1]==6)
	$mes_taq='Junio';
else if($fecha_taq[1]==7)
	$mes_taq='Julio';
else if($fecha_taq[1]==8)
	$mes_taq='Agosto';
else if($fecha_taq[1]==9)
	$mes_taq='Septiembre';
else if($fecha_taq[1]==10)
	$mes_taq='Octubre';
else if($fecha_taq[1]==11)
	$mes_taq='Nomviembre';
else if($fecha_taq[1]==12)
	$mes_taq='Diciembre';

$fecha_seniat=explode('/',$config[0]['fecha_reg_seniat']);
if($fecha_seniat[1])
	$mes_seniat='Enero';
else if($fecha_seniat[1]==2)
	$mes_seniat='Febrero';
else if($fecha_seniat[1]==3)
	$mes_seniat='Marzo';
else if($fecha_seniat[1]==4)
	$mes_seniat='Abril';
else if($fecha_seniat[1]==5)
	$mes_seniat='Mayo';
else if($fecha_seniat[1]==6)
	$mes_seniat='Junio';
else if($fecha_seniat[1]==7)
	$mes_seniat='Julio';
else if($fecha_seniat[1]==8)
	$mes_seniat='Agosto';
else if($fecha_seniat[1]==9)
	$mes_seniat='Septiembre';
else if($fecha_seniat[1]==10)
	$mes_seniat='Octubre';
else if($fecha_seniat[1]==11)
	$mes_seniat='Nomviembre';
else if($fecha_seniat[1]==12)
	$mes_seniat='Diciembre';
?>
<style type='text/css'>
#membrete,#titulo,#cuerpo,#cuerpo2,#firmantes,#firmante1,#firmante2,#firmante3,.firma,#atte{
	font-size:16px;
	font-family:arial;
	line-height: 1.5;
}
#banner{
	position:absolute;
	margin:0 auto;
	margin-top:35px;
	text-align: center;
	width:600px;
	right:70px;
}
#membrete{
	margin:auto;
	margin-top:120px;
	text-align:center;
	font-weight:bold;
}
#titulo{
	margin:auto;
	margin-top:50px;
	font-weight:bold;
	text-align:center;
}
#cuerpo{
	margin:auto;
	margin-top:35px;
	text-align:justify;
}
#cuerpo2{
	margin:auto;
	margin-top:35px;
	text-align:justify;	
}
#firmantes{
}
#firmante1{
	position:absolute;
	margin:0 auto;
	margin-right:80%;
	border:0px solid #000;
	width:40%;
	height:50px;
	text-align:center;
	top:740px;
}
#firmante2{
	position:absolute;
	margin:0 auto;
	width:40%;
	border:0px solid #000;
	height:40px;
	text-align:center;
	/*margin-left: 60%;*/
	top:740px;
	left:365px;

}
#firmante3{
	position:absolute;
	margin:0 auto;
	border:0px solid #000;
	width:40%;
	height:50px;
	text-align:center;
	top:870px;
	left:180px;	
}
.firma{
	width:70%;
	border:0.7px solid #000;
}
#atte{
	margin:0 auto;
	margin-top:40px;
	text-align:center;
}
#pagina{
	position:absolute;
	left:650px;
	top:990px;
	font-size:10px;
}
#footer{
	margin:0 auto;
	text-align:justify;
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
</style>
<page backtop='0%' backbottom='0%' backleft='10%' backright='10%'>
<page_header>
	<div id='banner'><img src='../views/imagen/banner_.png'></div>
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
<div id='titulo'>CONSTANCIA DE BUENA CONDUCTA</div>
<div>
<div id='cuerpo'>
<?php ?>Quien suscribe, Consejo Comunal "<?php echo $config[0]['nombre_consejo_comunal']. ", ubicado en ".$config[0]['direccion'].", Parroquia ".$config[0]['parroquia'].", Municipio ".$config[0]['municipio'].", ".$config[0]['ciudad']." Estado ".$config[0]['estado']; ?>"
,debidamente registrado ante el Sistema de Taquilla Única de Registro, el día <?php echo $fecha_taq[0]." de ".$mes_taq." de ".$fecha_taq[2]; ?> bajo el N° <?php echo $config[0]['nro_reg_taq_unica']; ?> 
e inscrito ante el Servicio Nacional Integrado de Administración Tributaria (SENIAT), en la fecha del día <?php echo $fecha_seniat[0]." de ".$mes_seniat." de ".$fecha_seniat[2]; ?> en el Registro de Información Fiscal,
bajo el N° <b><?php echo $config[0]['rif']; ?>,</b> por medío de ésta se hace constar que
<?php 
if($ciudadano[0]['sexo']=='M') 
	{
	echo "el ciudadano: "; 
	$port='portador';
	}
else if($ciudadano[0]['sexo']=='F')
	{
	echo "la ciudadana: ";
	$port='portadora';
	}
echo "<b>".$ciudadano[0]['nombre']." ".$ciudadano[0]['apellido'].",</b> $port ";	
	?>
del Documento Nacional de Identidad:<b>
<?php echo $ciudadano[0]['tipo_dni']."-".$ciudadano[0]['dni'].","; ?></b>
<?php echo "está actualmente docimiciliado en la comunidad de:<b> ".$ciudadano[0]['direccion'].", sector \"".$ciudadano[0]['sector']."\"";
if(empty($ciudadano[0]['numero_casa']))
	echo " casa S/N";
else
	echo " casa N° ".$ciudadano[0]['numero_casa'];
echo ", parroquia ".$ciudadano[0]['nombre_parroquia'].", municipio ".$ciudadano[0]['nombre_municipio'].", Carúpano Estado ".$ciudadano[0]['nombre_estado']."</b> desde hace aproximadamente<b> ";
if(date('Y')-$ciudadano[0]['ano_residencia']==0 ||date('Y')-$ciudadano[0]['ano_residencia']==1|| $ciudadano[0]['ano_residencia']=='')
	echo " 1 año.";
else 
	echo date('Y')-$ciudadano[0]['ano_residencia']." años."; 
?></b>
</div>
<div id='cuerpo2'>
Constancia que se expide de parte interesada en la ciudad de <?php echo $config[0]['ciudad']; ?> Estado <?php echo $config[0]['estado']; ?> el día <?php echo date('d')." de ".$mes." de ".date('Y')."."; ?> 
</div>
</div>

<div id='atte'>Atentamente,</div>

<div id='firmantes'>
	<div id='firmante1'>
<hr class='firma'>	<?php 
	if(count($vocero)==3)
	{
	echo $vocero[0]['nombre']." ".$vocero[0]['apellido']."<br>".$vocero[0]['tipo_dni']."-".$vocero[0]['dni_vocero']."<br>".$vocero[0]['telefono']."<BR>".ucwords(strtolower($vocero[0]['nombre_voceria'])); 
	?>


	</div>
	<div id='firmante2'>
<hr class='firma'>
	<?php echo $vocero[1]['nombre']." ".$vocero[1]['apellido']."<br>".$vocero[1]['tipo_dni']."-".$vocero[1]['dni_vocero']."<br>".$vocero[1]['telefono']."<BR>".ucwords(strtolower($vocero[1]['nombre_voceria']));  ?>
	</div>
	<div id='firmante3'>
<hr class='firma'>	
	<?php echo $vocero[2]['nombre']." ".$vocero[2]['apellido']."<br>".$vocero[2]['tipo_dni']."-".$vocero[2]['dni_vocero']."<br>".$vocero[2]['telefono']."<BR>".ucwords(strtolower($vocero[2]['nombre_voceria'])); 

	} 
	else
		echo "<div id='msj'>DISCULE, no se ha asigando a los tres firmantes.<br>Para realizarlo valle al menú principal en \"Gestión de voceros\", la opción Firmantes, allí puede asignar y ver a los firmantes del consejo comunal.</div>";
	?>
	</div>

</div>
</page>
<?php
$salidaD=$ciudadano[0]['nombre']."_".$ciudadano[0]['apellido']."_".date('d').'-'.date('m').'-'.date('Y').'.pdf';
$contenido=ob_get_clean();
require_once '../libs/html2pdf_v4.03/html2pdf.class.php';
$pdf=new HTML2PDF('P','letter','es','true','UTF-8');
$pdf->writeHTML($contenido);
$pdf->Output($salidaD);
?>
