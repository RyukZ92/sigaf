function mover()
	{
	if(document.getElementById("l").style.display=="block")
		{
		document.getElementById("l").style.display="none";
		document.getElementById("n").style.display="none";
		document.getElementById("m").style.display="none";
		}
	else
		{
		document.getElementById("l").style.display="block";
		document.getElementById("m").style.display="block";
		document.getElementById("n").style.display="block";
		}
	}