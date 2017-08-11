// creamos una variable donde vamos a almacenar los datos de la conexion
var myRequest = getXMLHTTPRequest();
// creamos la funcion que nos validara el navegador
function getXMLHTTPRequest(){
var request = false;
if(window.XMLHttpRequest)
{
  request = new XMLHttpRequest();
} else {
  if(window.ActiveXObject)
  {
    try
    {
      request = new ActiveXObject("Msml2.XMLHTTP");
    }
    catch(err1)
    {
      try
      {
        request = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch(err2)
      {
        request = false;
      }
   }
  }
}
return request;
}
// creamos la funcion que validara nuestro formulario
function validarDni() {
var dni=document.forms['form'].dni.value;
var rand=parseInt(Math.random()*99999999)+
new Date().getTime();
var url = "libs/chekear_dni.php?dni="+dni+"&rand="+rand;
myRequest.open("GET", url, true);
myRequest.onreadystatechange = respuestaDni;
myRequest.send(null);
}
function respuestaDni() {
    if(myRequest.readyState == 4) {
           if(myRequest.status == 200) {
             document.getElementById('img_dni').innerHTML= myRequest.responseText;
        } else {
            document.getElementById('img_dni').innerHTML= myRequest.status;
        }
    }else{
       document.getElementById('img_dni').innerHTML="<img src='views/imagen/cargando.png' />";
    }
  
}
