<!-- Cargas de las vistas mediante via GET -->
<!-- Son peticiones que se realizan para cargar controladores mpas específicos-->
<?php
if($_REQUEST['opcion']=='recuperarclave')
		{
		$tema = "Recuperar contraseña";
		$opcion = "idrecuperarclave";
		include("controllers/recuperarclave_controller.php");
		}
else if($_REQUEST['opcion']=='idrecuperarclave')
		{
		$tema = "Recuperar contraseña";
		$opcion = "idrecuperarclave";
		include("controllers/idrecuperarclave_controller.php");
		}
else if($_REQUEST['opcion']=='nuevaclave')
		{
		$tema = "Recuperar contraseña";
		$opcion = "idrecuperarclave";
		include("controllers/nuevaclave_controller.php");
		}
if(empty($_REQUEST['opcion']))
	$_SESSION['logueo']=0;
if(empty($_REQUEST['opcion'])||$_REQUEST['opcion']=='iniciarsesion')
	{
	$tema='Iniciar sesión';
	include("controllers/iniciarsesion_controller.php");
	$_SESSION['cont']=0;
	}
if(!empty($_SESSION['codigo']))
{

if(empty($_REQUEST['opcion'])||$_REQUEST['opcion'] == 'inicio') 
	{
	$_REQUEST['opcion'] = 'inicio';
	$opcion = "inicio";
	include("views/bienvenido_view.phtml");
	}
//Contrador general de las funciones de lo módulos	
switch($_REQUEST['opcion']) 
	{
	case "mision":
		$tema = "Misión de la comunidad";
		$opcion = "mision";
		include("controllers/mision_controller.php");
	break;	
	case "vision":
		$tema = "Visión de la comunidad";
		$opcion = "vision";
		include("controllers/vision_controller.php");
	break;			
	case "ausuario":
		$tema = "Registro de usuario";
		$opcion = "ausuario";
		include("controllers/ausuario_controller.php");
	break;	
	case "cusuario";
		$tema = "Usuarios registrados";
		$opcion = "cusuario";
		include("controllers/cusuario_controller.php");
	break;
	case "cusuarioelim";
		$tema = "Usuarios eliminados";
		$opcion = "cusuario";
		include("controllers/cusuarioelim_controller.php");
	break;
	case "eusuario";
		$tema = "Editar usuario";
		$opcion = "cusuario";
		include("controllers/eusuario_controller.php");
	break;	
	case "susuario";
		$tema = "Cambiar estatus del usuario";
		$opcion = "susuario";
		include("controllers/susuario_controller.php");
	break;	
	case "cambiarclave";
		$tema = "Cambiar clave";
		$opcion = "susuario";
		include("controllers/cambiarclave_controller.php");
	break;	

	case "mihistorial";
		$tema = "Mi historial de usuario";
		$opcion = "mihistorial";
		include("controllers/mihistorial_controller.php");
	break;		
	case "avoceria";
		$tema = "Registro de vocería";
		$opcion = "avoceria";
		include("controllers/avoceria_controller.php");
	break;	
	case "cvoceria";
		$tema = "Vocerías registradas";
		$opcion = "cvoceria";
		include("controllers/cvoceria_controller.php");
	break;
	case "cvoceriaelim";
		$tema = "Vocerías eliminadas";
		$opcion = "cvoceriaelim";
		include("controllers/cvoceriaelim_controller.php");
	break;
	case "evoceria";
		$tema = "Editar vocería";
		$opcion = "cvoceria";
		include("controllers/evoceria_controller.php");
	break;
	case "svoceria";
		$tema = "Cambiar estatus de vocería";
		$opcion = "svoceria";
		include("controllers/svoceria_controller.php");
	break;
	case "avocero";
		$tema = "Registro de vocero";
		$opcion = "avocero";
		include("controllers/avocero_controller.php");
	break;		
	case "cvocero";
		$tema = "Voceros registrados";
		$opcion = "cvocero";
		include("controllers/cvocero_controller.php");
	break;
	case "cvoceroelim";
		$tema = "Voceros eliminados";
		$opcion = "cvoceroelim";
		include("controllers/cvoceroelim_controller.php");
	break;	
	case "evocero";
		$tema = "Voceros registrados";
		$opcion = "cvocero";
		include("controllers/evocero_controller.php");
	break;	
	case "bvocero";
		$tema = "Seleccionar opción";
		$opcion = "bvocero";
		include("controllers/bvocero_controller.php");
	break;	
	case "rvocero";
		$tema = "Renovar vocero";
		$opcion = "rvocero";
		include("controllers/rvocero_controller.php");
	break;	
	case "svocero";
		$tema = "Cambiar estatus del vocero";
		$opcion = "svocero";
		include("controllers/svocero_controller.php");
	break;	

	case "librovocero";
		$tema = "Libro de voceros";
		$opcion = "librovocero";
		include("controllers/librovocero_controller.php");
	break;	
	case "afirmante";
		$tema = "Asignar vocero cuentadante";
		$opcion = "afirmante";
		include("controllers/afirmante_controller.php");
	break;
	case "aotrofirmante";
		$tema = "Asignar firmante de constancia";
		$opcion = "aotrofirmante";
		include("controllers/aotrofirmante_controller.php");
	break;		
	case "cfirmante";
		$tema = "Firmantes cuentadantes del consejo comunal";
		$opcion = "cfirmante";
		include("controllers/cfirmante_controller.php");
	break;
	case "cotrofirmante";
		$tema = "Otros firmantes del consejo comunal";
		$opcion = "cotrofirmante";
		include("controllers/cotrofirmante_controller.php");
	break;
	case "eliminarf";
		$tema = "Eliminar firmantes";
		$opcion = "efirmante";
		include("controllers/eliminarf_controller.php");
	break;	
	case "acompra";
		$tema = "Registro de compras";
		$opcion = "acompra";
		include("controllers/acompra_controller.php");
	break;	
	case "ccompra";
		$tema = "Registro de compras";
		$opcion = "ccompra";
		include("controllers/ccompra_controller.php");
	break;	
	case "ccomprafecha";
		$tema = "Registro de compras";
		$opcion = "ccomprafecha";
		include("controllers/ccomprafecha_controller.php");
	break;			
	case "cvocero";
		$tema = "Voceros registrados";
		$opcion = "cvocero";
		include("controllers/cvocero_controller.php");
	break;		
	case "afamiliadir";
		$tema = "Dirección de la familia";
		$opcion = "afamiliadir";
		include("controllers/afamiliadir_controller.php");
	break;			
	case "afamiliajef";
		$tema = "Familias de la comunidad";
		$opcion = "afamiliajef";
		include("controllers/afamiliajef_controller.php");
	break;	
	case "afamiliamie";
		$tema = "Miembros de la familia";
		$opcion = "afamiliamie";
		include("controllers/afamiliamie_controller.php");
	break;	
	case "afamiliaviv":
		$tema = "Vivienda de la familia";
		$opcion = "afamiliaviv";
		include("controllers/afamiliaviv_controller.php");
	break;		
	case "afamilia":
		$tema = "Vivienda de la familia";
		$opcion = "afamilia";
		include("controllers/afamilia_controller.php");
	break;	
	case "cfamilia":
		$tema = "Representantes familiares";
		$opcion = "cfamilia";
		include("controllers/cfamilia_controller.php");
	break;
	case "cfallecido":
		$tema = "Personas fallecidas de la comunidad";
		$opcion = "cfallecido";
		include("controllers/cfallecido_controller.php");
	break;	
	case "bstacfamilia":
		$tema = "Seleccionar opción a consultar";
		$opcion = "bstacfamilia";
		include("controllers/bstacfamilia_controller.php");
	break;	
	case "cstacfamilia":
		$tema = "Censo demográfico de la comunidad";
		$opcion = "cstacfamilia";
		include("controllers/cstacfamilia_controller.php");
	break;	
	case "efamilia":
		$tema = "Editar familia";
		$opcion = "efamilia";
		include("controllers/efamilia_controller.php");
	break;
	case "anuevomiembro":
		$tema = "Nuevo miembro familiar";
		$opcion = "anuevomiembro";
		include("controllers/amiembrofamilia_controller.php");
	break;
	case "epersona":
		$tema = "Editar persona";
		$opcion = "epersona";
		include("controllers/epersona_controller.php");
	break;	
	case "epersonarep":
		$tema = "Editar representante";
		$opcion = "epersonarep";
		include("controllers/epersonarep_controller.php");
	break;	
	case "cstacpersona":
		$tema = "Habitantes por sexo y edad";
		$opcion = "cstacpersona";
		include("controllers/cstacpersona_controller.php");
	break;
	case "cgrupofamiliar":
		$tema = "Grupo familiar";
		$opcion = "cgrupofamiliar";
		include("controllers/cgrupofamiliar_controller.php");
	break;		
	case "bpersonadni":
		$tema = "Emisión de constancia";
		$opcion = "bpersonadni";
		include("controllers/bpersona_controller.php");
	break;	
	case "cpersonadni":
		//$tema = "Integrante de la comunidad";
		$opcion = "cpersonadni";
		include("controllers/cpersonadni_controller.php");
	break;
	case "moverfamilia":
		$tema = "Seleccionar opción";
		$opcion = "moverfamilia";
		include("controllers/moverfamilia_controller.php");
	break;	
	case "moverafamiliaexistente":
		$tema = "Moviendo a familia existente";
		$opcion = "moverafamiliaexistente";
		include("controllers/moverafamiliaexistente_controller.php");
	break;	
	case "cviviendafamilia":
		$tema = "Datos de la vivienda y servicios";
		$opcion = "cviviendafamilia";
		include("controllers/cviviendafamilia_controller.php");
	break;	
	case "evivienda":
		$tema = "Editar vivienda y servicios";
		$opcion = "evivienda";
		include("controllers/evivienda_controller.php");
	break;	
	case "bconstancia":
		$tema = "Buscar estadísticas de constancias";
		$opcion = "bstacconstancia";
		include("controllers/bconstancia_controller.php");
	break;
	case "cstacconstancia":
		$tema = "Seleccionar la constancia a consultar";
		$opcion = "bstacconstancia";
		include("controllers/cstacconstancia_controller.php");
	break;	
	case "cconstancia":
		$tema = "Constancias emitidas";
		$opcion = "cconstancia";
		include("controllers/cconstancia_controller.php");
	break;	
	case "cresidencia":
		$tema = "Constancia de residencia";
		$opcion = "cconstancia";
		include("controllers/cresidenciapdf_controller.php");
	break;	
	case "aproyecto":
		$tema = "Registro de proyecto";
		$opcion = "cproyecto";
		include("controllers/aproyecto_controller.php");
	break;	
	case "cproyecto":
		$tema = "Proyectos de la comunidad";
		$opcion = "cproyecto";
		include("controllers/cproyecto_controller.php");
	break;	
	case "cgproyecto":
		$tema = "Estadísticas de los proyectos";
		$opcion = "cproyecto";
		include("controllers/cgproyecto_controller.php");
	break;	
	case "eproyecto":
		$tema = "Editar proyecto";
		$opcion = "eproyecto";
		include("controllers/eproyecto_controller.php");
	break;		
	case "eeproyecto":
		$tema = "Editar proyecto";
		$opcion = "eeproyecto";
		include("controllers/eeproyecto_controller.php");
	break;
	case "eaproyecto":
		$tema = "Editar proyecto";
		$opcion = "earoyecto";
		include("controllers/eaproyecto_controller.php");
	break;	
	case "ejproyecto":
		$tema = "Editar proyecto";
		$opcion = "ejpoyecto";
		include("controllers/ejproyecto_controller.php");
	break;		
	case "erproyecto":
		$tema = "Editar proyecto";
		$opcion = "ejpoyecto";
		include("controllers/erproyecto_controller.php");
	break;
	case "ainventario":
		$tema = "Registrar patrimonio";
		$opcion = "ainventario";
		include("controllers/ainventario_controller.php");
	break;
	case "cinventario":
		$tema = "Patrimonios de la comunidad";
		$opcion = "cinventario";
		include("controllers/cinventario_controller.php");
	break;
	case "einventario":
		$tema = "Editar patrimonio";
		$opcion = "cinventario";
		include("controllers/einventario_controller.php");
	break;
	case "aoperacionf":
		$tema = "Registrar operación financiera";
		$opcion = "aoperacionf";
		include("controllers/aoperacionf_controller.php");
	break;
	case "coperacionf":
		$tema = "Consultar operaciones financieras";
		$opcion = "coperacionf";
		include("controllers/coperacionf_controller.php");
	break;
	case "coperacionfecha":
		$tema = "Consultar operaciones financieras";
		$opcion = "coperacionfecha";
		include("controllers/coperacionfecha_controller.php");
	break;
	case "historial":
		$tema = "Historial de usuarios";
		$opcion = "historial";
		include("controllers/historial_controller.php");
	break;	
	case "historialfecha":
		$tema = "Historial de usuarios";
		$opcion = "historialfecha";
		include("controllers/historialfecha_controller.php");
	break;
	case "configcc":
		$tema = "Configuración del consejo comunal";
		$opcion = "configcc";
		include("controllers/configcc_controller.php");
	break;
	case "config":
		$tema = "Configuración del sistema";
		$opcion = "config";
		include("controllers/config_controller.php");
	break;
	case "acercade":
		$tema = "Acerca de SIGAF";
		$opcion = "acercade";
		include("controllers/acercade_controller.php");
	break;
	case "cerrar";
		$tema = "Cerrar sesión";
		$opcion = "cerrar_sesion";
		include("controllers/cerrarsesion_controller.php");
	break;
	}	
}// Quitar comentarios de abajo si se desea que cuando entre en la página nuevamente (index) habiendo iniciado una sesión se quite la sesión del usuario
//else
//	include("controllers/iniciarsesion_controller.php");
?>
