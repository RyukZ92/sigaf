<?php

session_start();
include 'models/vocero_model.php';
include 'models/usuario_model.php';
$sesion=new Usuario_model();
$objVocero=new Vocero();
$vocero=$objVocero->consultarVocero();
for($i=0;$i<count($vocero);$i++)
	{
	$fecha_v=explode('-',$vocero[$i]['fecha_vigencia']);
	$fecha_fin=strtotime ('+2 year',strtotime ($fecha_v[2].'-'.$fecha_v[1].'-'.$fecha_v[0]));
	$fecha_fin=date ('Y-m-d',$fecha_fin);
	//echo date('Y-m-d').' >= '.$fecha_fin.': '.$vocero[$i]['nombre'].'<BR>';
	if(date('Y-m-d')>=$fecha_fin)
		$expirar=true;	
	}
//Actualización reciente del usuario
$usuario=$sesion->consultarUsuarioPorDni($_SESSION['dni_voc']);
if($usuario[0]['estatus']==1)
	{
	$_SESSION['codigo']=$usuario[0]['id'];
	$_SESSION['nombre_']=$usuario[0]['nombre'];
	$_SESSION['apellido_']=$usuario[0]['apellido'];
	$_SESSION['sex']=$usuario[0]['sexo'];
	$_SESSION["nivel_usuario"]=$usuario[0]['nivel_usuario'];
	}
?>
<div class='title'>
	<div class='logo'>
		<img src='layouts/default/imagen/logo.png'></img>
	</div>
		<div class='title_s'>Sistema de Gestión Administrativa y Financiera "<?php echo $config[0]['nombre_consejo_comunal']; ?>"</div>
<?php
if(isset($_SESSION['codigo']))
	{
	echo $msj=$expirar?"<span id='blink'><div style='text-align:right;margin-right:260px; margin-top:3px; font-size:12px;'><b>Advertencia</b>: Voceros expirados</div></span>":'';
	}
?>
</div>
<div id='menutop'>
<?php 
if(!session_id()) 
	session_start();
	if(isset($_SESSION['codigo']))
	{
?>
	<div style='float:left; margin-left:245px;' class='ubic_'>
	<a  href='?opcion=mision' class='user' >Misión</a>
	</div>
	<div style='float:left;' class='ubic_'>
	<a  href='?opcion=vision' class='user' >Visión</a>
	</div>
	<div style='float:left;' class='ubic_'>
	<a target='_blank' href='files/LeyOrganicaConsejosComunales.pdf' class='user' >LOCC</a>
	</div>
	<div id='m' style='float:right;' class='ubic_user'>
	<a href='?opcion=cerrar' class='user' >Salir</a>
	</div>
	<?php
if($_SESSION['nivel_usuario']!='provisional') 
	{
?>
	<div id='n' style='float:right;' class='ubic_user'>
	<a href='?opcion=mihistorial&pagina=' class='user' >Mi historial</a>
	</div>
	<?php
	}
?>
	<div id='l' style='float:right;' class='ubic_user'>
	<a href='?opcion=cambiarclave' class='user' >Cambiar clave</a>
	</div>
	<div onClick="return ocultar('config_ico');" class='ubic_user' id='c'> 
	<a onClick='return mover();' id='user' class='user' href='#'>
	<?php
	if($_SESSION['sex']=='F')
		if($_SESSION['nivel_usuario']=='Administrador')
			$img='user-business-female';
		else
			$img='user-white-female';
	else if($_SESSION['sex']=='M')
		if($_SESSION['nivel_usuario']=='Administrador')
			$img='user-business-male';
		else
			$img='user-black';
	else
		$img='user-unknow';

	if(!ctype_space($_SESSION['nombre_']))
		$nombre = explode(" ", $_SESSION['nombre_']);
	else
		$nombre[0]=$_SESSION['nombre_'];
	if(!ctype_space($_SESSION['apellido_']))
		$apellido = explode(" ", $_SESSION['apellido_']);
	else
		$nombre[0]=$_SESSION['apellido_'];
	?>
	<?php echo $nombre[0]." ".$apellido[0]; ?><img class='icon' src='layouts/default/imagen/<?php echo $img; ?>.png'></img>
	</a>
	</div>
<?php
	}
?>
