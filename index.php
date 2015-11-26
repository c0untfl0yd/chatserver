<?php
$formdata = $_POST['textdata'];
$myFile = "database.txt";
$current_time = date("j,  F Y, g:i a");
$fh = fopen($myFile, 'a') or die("can't open file"); // fopen append (add)

fwrite($fh, "[" . $_SERVER['REMOTE_ADDR'] . "] : " . $formdata . "</br><hr>");
fclose($fh);

$fh2 = fopen($myFile, 'r');
$theData = fread($fh2, filesize($myFile));
fclose($fh2);

if(filesize($myFile)>9000){ 
$fh3 = fopen($myFile, 'w');			
fwrite($fh3, "Chat Data was cleared!" . "</br>");
fclose($fh3);}
			

?>

<html>

<head>
<meta charset="UTF-8" />
<title>Chatsystem</title>

<style> 
div, input
{
border:2px solid #a1a1a1;
padding:10px 40px; 
background:#dddddd;
border-radius:25px;
font-family: Arial,Helvetica,sans-serif;
}
</style>

</head>
	
	<body bgcolor="#0F344C" style="size:cover;overflow:hidden">
	<center>

		<form method="POST" action="" autocomplete="off" style="position:absolute;top:87%;left:1%;">
			<input type="text" name="textdata" id="textbox" maxlength="75" style="background-color:#b0c4de;width:500;font-size: 22pt;"/>
			<input type="submit" name="submit" value="Press Enter" style="font-size: 22pt;" />		
		</form>
	</center>
		<div id="div1" style="overflow:auto;position:absolute;top:5%;left:1%;right:5%;bottom:15%;background-color:#b0c4de;font-size: 22pt;">
			
		</div>

<script>
setInterval(function(){
	var filePath = "database.txt";
    xmlhttp = new XMLHttpRequest();
	//xmlhttp.overrideMimeType('text/plain');
    xmlhttp.open("GET",filePath,false);
    xmlhttp.send(null); 
    var fileContent = xmlhttp.responseText;
	document.getElementById('div1').innerHTML=fileContent;
	//document.getElementById("div1").scrollTop = 100000000000000;
	},200);
	document.getElementById("textbox").focus();	
</script>	
	</body>
</html>