<?php
include('../db/db.php');
include('../config/config.php');
include('../config/config_cc.php');
include('../models/familia_model.php');
include('../models/vivienda_model.php');
ob_start();
date_default_timezone_set("America/Caracas");
$familia=new Familia();
$vivienda=new Vivienda();
$persona=$familia->consultarGrupoFamiliar($_GET['id']);
$datosVivienda=$vivienda->consultarViviendaPorIdFamilia($_GET['id']);
?>
<style type='text/css'>
a{
	text-decoration:none;
	color:#000;
	}
*	{
	margin:0px;
	}
#titulo,#cuerpo,#cuerpo2,#firmantes,#firmante1,#firmante2,#firmante3,.firma,#atte{
	font-size:16px;
	line-height: 1.5;
}
#banner{
	width: 100%; 
	margin:0auto;
	margin-top:10px;
	text-align:center;
}
#banner img{
	height:70px;
}
#membrete{
	margin:auto;
	margin-top:30px;
	text-align:left;
	font-weight:bold;
	font-size: 14px;
	line-height: 1.2;
	font-family:arial;
}
#titulo{
	margin:auto;
	margin-top:30px;
	font-weight:bold;
	text-align:center;
	margin-bottom: 15px;
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
	margin-top:10px;		
	border:1px solid #585858;
	border-radius:1px;
	text-align:center;
	box-shadow:0 0px 1px rgba(0,0,0, .7) inset,0 0px 1px rgba(0,0,0, .7); 
	}
td
	{
	font-size: 11px;
	border:0px;
	border-color:none;
	padding:5px;
	padding-top:1px;
	height:20px;
	background:#FAFAFA;
	width:156px;
	}
th
	{
	margin:0px;
	color:#fff;
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
.td_{
	width:59px;
}
.td_v{
	width:200px;
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
	<div id='titulo'>DATOS DE FAMILIA</div>
<?php
for($i=0;$i<count($persona);$i++)
	{
	if($persona[$i]['parentesco']=='Representante')
		{
		$fecha_nac_rep=explode('-',$persona[$i]['fecha_nac']);
		$nombre=explode(' ',$persona[$i]['nombre']);
		$apellido=explode(' ',$persona[$i]['apellido']);
		?>
		<table cellspacing='2' class='pag1' align="center">
			<tr align="center">
				<th colspan="6">Representante familiar</th>
			</tr>
			<tr>
				<td><b>Identificación:</b> <?php echo $persona[$i]['tipo_dni']."-".$persona[$i]['dni']; ?></td>
				<td><b>Nombre y apellido:</b> <?php echo $nombre[0]." ".$apellido[0]; ?></td>
				<td><b>Sexo:</b> <?php echo $persona[$i]['sexo']=$persona[$i]['sexo']=='F'?'Femenino':'Maculino'; ?></td>
				<td><b>Estado civil: </b> <?php echo $persona[$i]['estado_civil']; ?></td>
				<td><b>Edad:</b> <?php echo $persona[$i]['edad']." años"; ?></td>
			</tr>
			<tr>
				<td><b>E-mail:</b> <?php echo $persona[$i]['email']; ?></td>
				<td><b>Teléfono:</b> <?php echo $persona[$i]['telefono']; ?></td>
				<td><b>Nivel de instrucción:</b> <?php echo $persona[$i]['nivel_instruccion']; ?></td>
				<td><b>Años de residencia:</b> <?php echo date('Y')-$persona[$i]['anio_residencia']; ?></td>
				<td><b>Situación conyugal:</b> <?php echo $persona[$i]['situacion_conyugal']; ?></td>
			</tr>
			<tr>
				<td><b>Empleo:</b> <?php echo $persona[$i]['empleo']; ?></td>
				<td><b>Profesión:</b> <?php echo $persona[$i]['profesion']; ?></td>
				<td><b>Habilidad para trabajar: </b><?php echo $habilidad=$persona[$i]['habilidad_trabajo']?$persona[$i]['enfermedad']:'Ninguna'; ?></td>
				<td><b>Enfermedad:</b> <?php echo $enfermedad=$persona[$i]['enfermedad']?$persona[$i]['enfermedad']:'Ninguna'; ?></td>
				<td><b>Discapacidad:</b> <?php echo $discapacidad=$persona[$i]['discapacidad']?$persona[$i]['discapacidad']:'Ninguna'; ?></td>
			</tr>
			<tr>
				<td colspan='5'><b>Dirección:</b> <?php echo $persona[$i]['direccion'].", sector \"".$persona[$i]['sector']."\", casa ".$persona[$i]['numero_casa']=(empty($persona[$i]['numero_casa']))?'S/N':'N° '.$persona[$i]['numero_casa'];  ?></td>
			</tr>
		</table>
		<?php
		}
	}

if(count($persona)>=2)
	{
	echo "<table cellspacing='02' align='center'>";
?>
				<tr align="center">
					<th colspan="12">Integrantes de la familia</th>
				</tr>
				<tr align="center">
					<td class='td_'><b>Identificación</b></td>
					<td class='td_'><b>Nombre y apellido</b></td>
					<td class='td_'><b>Sexo</b></td>
					<td class='td_'><b>Edad</b></td>
					<td class='td_'><b>Años de residencia</b></td>
					<td class='td_'><b>Parentesco</b></td>
					<td class='td_'><b>Nivel de instrucción</b></td>
					<td class='td_'><b>Profesión</b></td>
					<td class='td_'><b>Habilidad para trabajar</b></td>
					<td class='td_'><b>Enfermedad</b></td>
					<td class='td_'><b>Discapacidad</b></td>
				</tr>
<?php

	for($i=0;$i<count($persona);$i++)
		{
		if($persona[$i]['parentesco']!='Representante')
			{
			if($persona[$i]['parentesco']!='Padre'&&$persona[$i]['parentesco']!='Madre')
				$sex=($persona[$i]['sexo']=='F')?'a':'o';
			$fecha_nac=explode('-',$persona[$i]['fecha_nac']);
			$nombre=explode(' ',$persona[$i]['nombre']);
			$apellido=explode(' ',$persona[$i]['apellido']);
			?>
				<tr align="center">
					<td class='td_'><?php echo $persona[$i]['tipo_dni']."-".$persona[$i]['dni']; ?></td>
					<td class='td_'><?php echo $nombre[0]." ".$apellido[0]; ?></td>
					<td class='td_'><?php echo $persona[$i]['sexo']=$persona[$i]['sexo']=='F'?'Femenino':'Maculino'; ?></td>
					<td class='td_'><?php echo $persona[$i]['edad']." ".$a=$persona[$i]['edad']>1?'años':'año'; ?></td>
					<td class='td_'><?php echo date('Y')-$persona[$i]['anio_residencia']; ?></td>	
					<td class='td_'><?php echo $persona[$i]['parentesco'].$sex; ?></td>
					<td class='td_'><?php echo $persona[$i]['nivel_instruccion']; ?></td>
					<td class='td_'><?php echo $persona[$i]['profesion']=!empty($persona[$i]['profesion'])?$persona[$i]['profesion']:'Ninguna'; ?></td>
					<td class='td_'><?php echo $persona[$i]['habilidad_trabajo']=!empty($persona[$i]['habilidad_trabajo'])?$persona[$i]['habilidad_trabajo']:'Ninguna'; ?></td>
					<td class='td_'><?php echo $persona[$i]['enfermedad']=!empty($persona[$i]['enfermedad'])?$persona[$i]['enfermedad']:'Ninguna'; ?></td>
					<td class='td_'><?php echo $persona[$i]['discapacidad']=!empty($persona[$i]['discapacidad'])?$persona[$i]['discapacidad']:'Ninguna'; ?></td>
				</tr>
			<?php
			}
		}
echo '</table>';		
	}
?>
			
</page>


<page backtop='10%' backbottom='5%' backleft='5%' backright='5%'>
<page_header>
	<div id='banner'><img src='../layouts/default/imagen/banner.png'></div>
</page_header>
	<page_footer>
    <div id='pagina'>Pág. [[page_cu]]/[[page_nb]]</div>
 		<div id='footer'>SIGAF - Sistema de Gestión Administrativa y Financiera "<?php echo $config[0]['nombre_consejo_comunal']; ?>", <?php echo date('Y');?><!--<b>Dirección:</b> Cuarta Calle de Charallave, Sector "Punta Brava, La Poza y Los Primos", Municipio Bermúdez, Carúpano - Estado Sucre.--></div>
	</page_footer>
<div id='titulo'>DATOS DE VIVIENDA Y SEVICIOS</div>
<table  cellspacing='02' align="center">
		<tr>
			<th align=center colspan='4'>Descripción de la vivienda de familiar</th>
		</tr>
		<tr>
			<td class='td_v'><b>Tipo de vivienda: </b><?php echo $datosVivienda[0]['tipo_vivienda']; ?></td>
			<td class='td_v'><b>Ocupación de la vivienda: </b><?php echo $datosVivienda[0]['ocupacion_vivienda']; ?></td>
			<td class='td_v'><b>Uso de la vivienda: </b><?php echo $datosVivienda[0]['uso_vivienda'];  ?></td>
			<td class='td_v'><b>Tipo de techo: </b><?php echo $datosVivienda[0]['tipo_techo']; ?></td>
		</tr>
		<tr>
			<td class='td_v'><b>Tipo de paredes: </b><?php echo $datosVivienda[0]['tipo_paredes']; ?></td>
			<td class='td_v'><b>Tipo de piso: </b><?php echo $datosVivienda[0]['tipo_piso']; ?></td>
			<td class='td_v'><b>Nivel de la vivienda: </b><?php echo $datosVivienda[0]['nivel_vivienda'];  ?></td>
			<td class='td_v'><b>Propieda de la vivienda: </b><?php echo $datosVivienda[0]['propiedad_vivienda']; ?></td>
		</tr>
		<tr>
			<td class='td_v'><b>Baños: </b><?php echo $datosVivienda[0]['banio']=(empty($datosVivienda[0]['banio']))?'No':$datosVivienda[0]['banio']; ?></td>
			<td class='td_v'><b>Dormitorios: </b><?php echo $datosVivienda[0]['dormitorio']=(empty($datosVivienda[0]['dormitorio']))?'No':$datosVivienda[0]['dormitorio']; ?></td>
			<td class='td_v'><b>Cocinas: </b><?php echo $datosVivienda[0]['cocina']=(empty($datosVivienda[0]['cocina']))?'No':$datosVivienda[0]['cocina'];  ?></td>
			<td class='td_v'><b>Neveras: </b><?php echo $datosVivienda[0]['nevera']=(empty($datosVivienda[0]['nevera']))?'No ':$datosVivienda[0]['nevera']; ?></td>
		</tr>
		<tr>
			<td class='td_v'><b>Aguas blancas: </b><?php echo $datosVivienda[0]['aguas_blancas']=$datosVivienda[0]['aguas_blancas']?'Si':'No'; ?></td>
			<td class='td_v'><b>Gas: </b><?php echo $datosVivienda[0]['gas']=$datosVivienda[0]['gas']?'Si':'No'; ?></td>
			<td class='td_v'><b>Electricidad: </b><?php echo $datosVivienda[0]['electricidad']=$datosVivienda[0]['electricidad']?'Si':'No';  ?></td>
			<td class='td_v'><b>TV o Radio: </b><?php echo $datosVivienda[0]['tv_radio']=$datosVivienda[0]['tv_radio']?'Si':'No'; ?></td>
		</tr>
		<tr>
			<td class='td_v' colspan='4'><b>Observaciones: </b><?php echo $datosVivienda[0]['observacion']; ?></td>
		</tr>
</table>
</page>
<?php
$salidaD="Familia_".date('d').'-'.date('m').'-'.date('Y').'.pdf';
$contenido=ob_get_clean();
require_once '../libs/html2pdf_v4.03/html2pdf.class.php';
$pdf=new HTML2PDF('L','letter','es','true','UTF-8');
$pdf->writeHTML($contenido);
$pdf->Output($salidaD);
?>
