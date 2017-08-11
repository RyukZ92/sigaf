<?php
include '../../db/db.php';
include 'municipio_model.php';
include 'parroquia_model.php';
$objMunicipio=new Municipio();
$objParroquia=new Parroquia();
$municipio=$objMunicipio->consultarMunicipio();
echo '<pre>';print_r($_REQUEST);echo '</pre>';
?>
<!doctype html>
<html>
	<head>
		<title>Selects dependietes</title>
		<meta charset='utf8'>
		<link rel="stylesheet" type="text/css" href="select_dependientes.css">
		<script type="text/javascript" src="select_dependientes.js"></script>
	</head>
<body>
<form method='POST' action=''>
<select name='municipio' id='municipio' onChange='cargaContenido(this.id)'>
	<option VALUE='0'>País</option>
<?php for($i=0;$i<count($municipio);$i++)
	{
?>
	<option value='<?php echo $municipio[$i]['id']; ?>'><?php echo $municipio[$i]['nombre']; ?></option>
<?php
	}
?>
</select>
		<div id="demo" style="width:600px;">
			<div id="demoDer">
				<select disabled="disabled" name="parroquia" id="parroquia">
					<option value="0">Parroquia</option>
					<div id="demoIzq"><?php $objMunicipio->consultarMunicipio() ?></div>
				</select>
			</div>
		</div>
	<INPUT TYPE=SUBMIt VALUE=ENVIAR>
</form>
</body>
</html>
