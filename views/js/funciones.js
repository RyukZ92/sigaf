//función par autoseleccionar
function autocheck_v() 
	{
	var form=document.form;
	form.opc[1].checked=true;
	}
//función par autoseleccionar
function autocheck_p() 
	{
	var form=document.form;
	form.opc[2].checked=true;
	}
//función par autoseleccionar
function autocheck_dni() 
	{
	var form=document.form;
	form.opc[0].checked=true;
	}
function validaCaracter(e)
	{
	key=e.keyCode||e.which;
	tecla=String.fromCharCode(key).toLowerCase();
	numero="1234567890abcdefghijklmnopqrstuvwqyzáéíóúñ";
	especial=[3,8,9,13,127]; //	especial=[2,3,8,9,13,39,46,127]; 39=punto; 46=comilla simple
	tecla_especial=false
	for(var i in especial)
		{
		if(key==especial[i])
			{
			tecla_especial=true;
			break;
			}
		}
	if(numero.indexOf(tecla)==-1 && !tecla_especial)
		{
		return false;
		}
	}
function validaCaracter2(e)
	{
	key=e.keyCode||e.which;
	tecla=String.fromCharCode(key).toLowerCase();
	numero=" 1234567890abcdefghijklmnopqrstuvwqyzáéíóúñ";
	especial=[3,8,9,13,127]; //	especial=[2,3,8,9,13,39,46,127]; 39=punto; 46=comilla simple
	tecla_especial=false
	for(var i in especial)
		{
		if(key==especial[i])
			{
			tecla_especial=true;
			break;
			}
		}
	if(numero.indexOf(tecla)==-1 && !tecla_especial)
		{
		return false;
		}
	}
//Función JS que le informa al usuario si realmente desea cambiar el status del usuario selecionado.
function preguntaEliminar()
	{
	if(confirm('¿Está seguro de eliminar este registro?'))
		return true;
	else
		return false;
	}
function preguntaRestaurar()
	{
	if(confirm('¿Está seguro de restaurar este registro?'))
		return true;
	else
		return false;
	}
function preguntaAccion()
	{
	if(confirm('¿Está seguro de continuar con esta operación?'))
		return true;
	else
		return false;
	}
function validaSoloNumero(e)
	{
	key=e.keyCode||e.which;
	tecla=String.fromCharCode(key).toLowerCase();
	numero="0123456789";
	especial=[2,3,8,9,13,127]; //	especial=[2,3,8,9,13,39,46,127]; 46 = PUNTO Y APARTE - 39 = COMILLA SIMPLE
	tecla_especial=false
	for(var i in especial)
		{
		if(key==especial[i])
			{
			tecla_especial=true;
			break;
			}
		}
	if(numero.indexOf(tecla)==-1 && !tecla_especial)
		{
		return false;
		}
	}
function validaNumero(e)
	{
	key=e.keyCode||e.which;
	tecla=String.fromCharCode(key).toLowerCase();
	numero="0123456789";
	especial=[2,3,8,9,13,46,127]; //	especial=[2,3,8,9,13,39,46,127];
	tecla_especial=false
	for(var i in especial)
		{
		if(key==especial[i])
			{
			tecla_especial=true;
			break;
			}
		}
	if(numero.indexOf(tecla)==-1 && !tecla_especial)
		{
		return false;
		}
	}
function validaLetra(e)
	{
	key=e.keyCode||e.which;
	tecla=String.fromCharCode(key).toLowerCase();
	letra=" áéíóúñabcdefghijklmnopqrstuvwqyz";
	especial=[2,3,8,9,13,127];
	tecla_especial=false
	for(var i in especial)
		{
		if(key==especial[i])
			{
			tecla_especial=true;
			break;
			}
		}
	if(letra.indexOf(tecla)==-1 && !tecla_especial)
		{
		return false;
		}
	}
function validaNumeroLetra(e)
	{
	key=e.keyCode||e.which;
	tecla=String.fromCharCode(key).toLowerCase();
	letra="abcdefghijklmnopqrstuvwqyz0123456789";
	especial=[2,3,8,9,13,127];
	tecla_especial=false
	for(var i in especial)
		{
		if(key==especial[i])
			{
			tecla_especial=true;
			break;
			}
		}
	if(letra.indexOf(tecla)==-1 && !tecla_especial)
		{
		return false;
		}
	}
//Función js que se utilia para acegurar que el usuario no introdusca acentos en un campos espcífico como las vocerías.
function validarLetrasSinAcentos(e)
	{
	key=e.keyCode||e.which;
	tecla=String.fromCharCode(key).toLowerCase();
	letra=" abcdefghijklmnopqrstuvwqyz";
	especial=[2,3,8,9,13,127];
	tecla_especial=false
	for(var i in especial)
		{
		if(key==especial[i])
			{
			tecla_especial=true;
			break;
			}
		}
	if(letra.indexOf(tecla)==-1 && !tecla_especial)
		{
		return false;
		}
	}
//Función que ofrece el efecto de cambio de color al pasar el mouse/ratón por las tablas de consultas, ya sea, equipos, usuario,dptos, instituciones, etc.
function cambiarColor(id,color)
	{
	document.getElementById(id).style.background=color;
	}
function abrir_nueva_ventana(pagina) 
	{
	var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=2400, height=200, top=250, left=15, right=15";
	window.open(pagina,"",opciones);
	}
function preguntar_n(id)
	{
	if(document.getElementById(id).style.display=="block")
		{
		document.getElementById(id).value='';
		document.getElementById(id).style.display="none";
		}
	}
function preguntar_m(id)
	{
	if(document.getElementById(id).style.display=="none")
		{
		document.getElementById(id).value='';
		document.getElementById(id).style.display="block";
		document.getElementById(id).focus();
		}
	}
function preguntar_n_e(id)
	{
	if(document.getElementById(id).style.display=="block")
		{
		document.getElementById(id).style.display="none";
		}
	}
function preguntar_m_e(id)
	{
	if(document.getElementById(id).style.display=="none")
		{
		document.getElementById(id).style.display="block";
		document.getElementById(id).focus();
		}
	}
function validarLetrasSinAcentos(e)
	{
	key=e.keyCode||e.which;
	tecla=String.fromCharCode(key).toLowerCase();
	letra=" abcdefghijklmnñopqrstuvwqyz";
	especial=[2,3,8,9,13,39,46,127];
	tecla_especial=false
	for(var i in especial)
		{
		if(key==especial[i])
			{
			tecla_especial=true;
			break;
			}
		}
	if(letra.indexOf(tecla)==-1 && !tecla_especial)
		return false;
	}
function ocultarCamposProyectoEspera(id1,f2,f3)
	{
	if(document.form.estatus_.value=='No aprobado')
		{
		document.getElementById(id1).disabled=true;
		document.getElementById(f2).disabled=true;
		document.getElementById(f3).disabled=true;
		}
	else
		{
		document.getElementById(id1).disabled=false;
		document.getElementById(f2).disabled=false;
		document.getElementById(f3).disabled=false;
		}
	}
function habilitarCampo(id)
	{
	if(document.getElementById(id).disabled==true)
		document.getElementById(id).disabled=false;
	}
function deshabilitarCampo(id)
	{
	if(document.getElementById(id).disabled==false)	
		document.getElementById(id).disabled=true;
	}	
