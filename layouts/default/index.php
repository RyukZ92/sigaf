<!dotype html>
<html>
   <head>
      <title>SIGAF</title>
      <meta charset='utf8'>
      <link rel="stylesheet" href="layouts/default/css/header.css">
      <link rel="stylesheet" href="layouts/default/css/cuerpo.css">
      <link rel="stylesheet" href="layouts/default/css/menu.css">
      <link rel="stylesheet" href="layouts/default/css/menutop.css">
      <link rel="stylesheet" href="layouts/default/css/footer.css">
      <link rel="icon" type="image/png" href="layouts/default/imagen/icon.png" />
      <script src="layouts/default/js/jquery_menu.js" type="text/javascript"></script>
      <script src="layouts/default/js/menu_mover.js" type="text/javascript"></script>
      <script src="layouts/default/js/menutop.js" type="text/javascript"></script>
      <script src="layouts/default/js/menu.js"></script>
      <script type="text/javascript">
           window.setInterval (parpadear,700);
           var color = "red"; //color del blink
           function parpadear () {
               var blink = document.getElementById ("blink");
               color = (color == "red")? "#f7f7f7" : "red";// podés reemplazar el #00000 para igualar al color de fondo de la página
               blink.style.color = color;
           }
      </script>  
   </head>
<body>
<div class="cuerpo">
<?php
include('layouts/default/header.php'); //LLamado de la cabecera o banner de la página.
include('layouts/default/menutop.php'); //Llamado del menú superior horizantal.
?>
</div>
<div class='pagina'>
<?php
include('layouts/default/load.php'); //Inclusión del fichero donde se cargan las vistas.
?>
</div>
<?php
if(isset($_SESSION['codigo']))
   include('layouts/default/menu.php'); //Se muestra el menú principal (acordeón).
else
   {
   //header('location:index.php?opcion=ausuario');
   }
?> 
</div>
<?php
include('layouts/default/footer.php'); //Pie de página de la interfaz.
?>
</body>
</html>
