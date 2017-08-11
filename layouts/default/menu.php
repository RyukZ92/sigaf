<div id='cssmenu'>
<ul>
   <li class='active' align='center'><a href='?opcion=inicio'><span>Inicio</span></a></li>
<?php if ($config[0]['familia']) { 
   ?>
   <li class='has-sub'><a href='#'><span>Gestión de familias</span></a>
      <ul>
<?php
if($_SESSION['nivel_usuario']=='Administrador')
   {
?>
         <li><a href='?opcion=afamiliajef'><span><img class='ico' src='views/imagen/insertar.png'></img> Agregar</span></a></li>
<?php
   }
?>    
         <li class='last'><a href='?opcion=cfamilia&pagina='''><span><img class='ico' src='views/imagen/consultar.png'></img> Consultar</span></a></li>
         <li class='last'><a href='?opcion=bstacfamilia'><span><img class='' style='position:relative; top:2px;' src='views/imagen/statistics2_.png'></img> Datos de familias</span></a></li>
      </ul>   
   </li>   
  
<?php } 
if ($config[0]['voceria']) { 
   ?>
   <li class='has-sub'><a href='#'><span>Gestión de vocerias</span></a>
      <ul>

<?php
if($_SESSION['nivel_usuario']=='Administrador')
      {
?>       
         <li><a href='?opcion=avoceria'><span><img class='ico' src='views/imagen/insertar.png'></img> Agregar</span></a></li>
   
<?php
      }
?>               <li><a href='?opcion=cvoceria&pagina='''><span><img class='ico' src='views/imagen/consultar.png'></img> Consultar</span></a></li>
      </ul>
   </li>
  <?php } 
  if ($config[0]['vocero']) { 
   ?> 

   <li class='has-sub'><a href='#'><span>Gestión de voceros</span></a>
      <ul>
<?php
if($_SESSION['nivel_usuario']=='Administrador'||$_SESSION['nivel_usuario']=='provisional')
      {
?>  
         <li><a title='Agregar un vocero' href='?opcion=avocero'><span><img class='ico' src='views/imagen/insertar.png'></img> Agregar</span></a></li>
<?php
      }
?>
         <li><a href='?opcion=bvocero'><span><img class='ico' src='views/imagen/consultar.png'></img> Consultar</span></a></li>
<?php
if($_SESSION['nivel_usuario']=='Administrador')
      {
?> 
         <li><a href='?opcion=afirmante'><span><img class='ico' src='views/imagen/firmante.png'></img> Firmantes cuentadantes</span></a></li>
         <li><a href='?opcion=aotrofirmante'><span><img class='ico' src='views/imagen/firmante.png'></img> Otros firmantes </span></a></li>
<?php
      }
?>
		<!--<li><a href='?opcion=librovocero'><span> <img class='ico' src='views/imagen/document-pdf.png'></img> Libro de voceros</span></a></li>-->

      </ul>
   </li> 
   <?php }
   if ($config[0]['usuario']) { 
   ?>
 <?php
if($_SESSION['nivel_usuario']=='Administrador')
      {
?>    
 <li class='has-sub' ><a href='#'><span>Gestión de usuarios</span></a>
      <ul>

         <li><a href='?opcion=ausuario'><span><img class='ico' src='views/imagen/insertar.png'></img> Agregar</span></a></li>

         <li><a href='?opcion=cusuario&pagina='''><span><img class='ico' src='views/imagen/consultar.png'></img> Consultar</span></a></li>
      </ul>
   </li>
  <?php
      }
?>
  
   <?php }
   if ($config[0]['proyecto']) { 
   ?>
   <li class='has-sub'><a href='#'><span>Gestión de proyectos</span></a>
      <ul>
<?php
if($_SESSION['nivel_usuario']=='Administrador')
      {     
?> 
         <li><a href='?opcion=aproyecto'><span><img class='ico' src='views/imagen/insertar.png'></img> Agregar</span></a></li>
<?php
      }
?>
         <li class='last'><a href='?opcion=cproyecto&pagina='><span><img class='ico' src='views/imagen/consultar.png'></img> Consultar</span></a></li>
      </ul>	  
   </li>
 <?php }
   if ($config[0]['constancias']) {
   ?>
   <li class='has-sub'><a href='#'><span>Gestión de constancias</span></a>
      <ul>
         <li><a href='?opcion=bpersonadni'><span><img class='ico' src='views/imagen/page_white_text.png'></img> Emitir constancia</span></a></li>
         <li><a href='?opcion=cconstancia'><span><img class='ico' src='views/imagen/consultar.png'></img> Constancias emitidas</span></a></li>
       <li class='last'><a href='?opcion=bconstancia'><span><img class='' style='position:relative; top:2px;' src='views/imagen/statistics2_.png'></img> Datos de las constancias</span></a></li>
      </ul>   
   </li>
   <?php
         }
   /*   if ($config[0]['plan_cuenta']) {*/
   ?>
   <!--<li class='has-sub'><a href='#'><span>Plan de cuentas</span></a>
      <ul>
         <li><a href='#'><span><img class='ico' src='views/imagen/insertar.png'></img> Agregar</span></a></li>
         <li class='last'><a href='#'><span><img class='ico' src='views/imagen/consultar.png'></img> Consultar</span></a></li>
      </ul>   
   </li>--> 
   <?php //}
   if ($config[0]['libro_compra']) 

      {
   ?>
   <li class='has-sub'><a href='#'><span>Libro de inventario</span></a>
      <ul>
<?php
if($_SESSION['nivel_usuario']=='Administrador')
         {     
?>       
         <li><a href='?opcion=ainventario'><span><img class='ico' src='views/imagen/insertar.png'></img> Agregar</span></a></li>
<?php
         }
?>         
         <li class='last'><a href='?opcion=cinventario&pagina='><span><img class='ico' src='views/imagen/consultar.png'></img> Consultar</span></a></li>
      </ul>	  
   </li>
<?php } 
   if ($config[0]['libro_compra']) 

      {
   ?>
   <li class='has-sub'><a href='#'><span>Libro de compra</span></a>
      <ul>
<?php
if($_SESSION['nivel_usuario']=='Administrador')
         {     
?>       
         <li><a href='?opcion=acompra'><span><img class='ico' src='views/imagen/insertar.png'></img> Agregar</span></a></li>
<?php
         }
?>         
         <li class='last'><a href='?opcion=ccompra&pagina='><span><img class='ico' src='views/imagen/consultar.png'></img> Consultar</span></a></li>
      </ul>   
   </li>
<?php } 
   //if ($config[0]['libro_diario']) {
   ?>
   <!--<li class='has-sub'><a href='#'><span>Libro diario</span></a>
      <ul>
         <li><a href='#'><span><img class='ico' src='views/imagen/insertar.png'></img> Agregar</span></a></li>
         <li class='last'><a href='#'><span><img class='ico' src='views/imagen/consultar.png'></img> Consultar</span></a></li>
      </ul>	  
   </li>-->
   <?php //}
   if ($config[0]['libro_mayor']) 

      {
   ?>
   <li class='has-sub'><a href='#'><span>Libro de mayor</span></a>
      <ul>
<?php
if($_SESSION['nivel_usuario']=='Administrador')
         {     
?>       
         <li><a href='?opcion=aoperacionf'><span><img class='ico' src='views/imagen/insertar.png'></img> Agregar</span></a></li>
<?php
         }
?>         
         <li class='last'><a href='?opcion=coperacionf&pagina='><span><img class='ico' src='views/imagen/consultar.png'></img> Consultar</span></a></li>
      </ul>   
   </li>
<?php } 
if ($config[0]['historial_usuario']) {
   if($_SESSION['nivel_usuario']=='Administrador')
      {
?>    
   <li class='has-sub'><a href='#'><span>Historial de usuarios</span></a>
      <ul>
         <li><a href='?opcion=historial&pagina='><span><img class='ico' src='views/imagen/consultar.png'></img> Consultar</span></a></li>
      </ul>	  
   </li>
   <?php } }
    if($_SESSION['nivel_usuario']=='Administrador')
         {  
   ?>
   <li class='has-sub'><a href='#'><span>Configuración</span></a>
      <ul>
         <li><a href='?opcion=configcc'><span><img class='ico' src='views/imagen/config.png'></img> Consejo Comunal</span></a></li>
         <li><a href='?opcion=config'><span><img class='ico' src='views/imagen/config.png'></img> Sistema</span></a></li>
      </ul>   
   </li>
   <?php }
      if ($config[0]['ayuda']) { 
   ?> 
   <li class='last'><a href='#'><span>Ayuda</span></a>
      <ul>
         <li><a target='_blank' href='files/manual_usuario.pdf'><span><span style='width:16px; height:16px; background:#fff;'>?</span> Manual de usuario</span></a></li>
         <li><a href='?opcion=acercade'><span><span style='width:16px; height:16px; background:#fff;'>?</span> Acerca de</span></a></li>
      </ul> 
   </li>
   <?php } ?>
</ul>
</div>
