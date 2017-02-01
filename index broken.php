<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src ="civem.js"></script>
<style>


</style>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="design.css" />
<title>Index</title>
</head>
<script>    
    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", "index");
    }
</script>
<body>
<script>
<?php
if(isset($_GET['r'])){
	if($_GET['r']==1){
	echo "document.addEventListener('DOMContentLoaded', function() {
  regDown();
});";
}


}
if(isset($_GET['l'])){
	if($_GET['l']==1){
	echo "document.addEventListener('DOMContentLoaded', function() {
  logDown();
});";
}


}
?>

</script>


<script>
function regDown(){
		$(".registratie").fadeToggle(300);
        $(".venster").fadeToggle(300);
}
function logDown(){
		$(".logintje").fadeToggle(300);
        
}

</script>
<div class="venster">
</div>


<div class="mainpagina" onclick="closelogintje();">

</div>

<div class="menuvanboven">


<ul>
<a><img src="http://puu.sh/rWbc5/e2826e8a64.png" alt="logo"></a>


<?php
session_start();
if (isset($_SESSION['gebruiker']))
{
	echo '<li><a id="signoutknop" href="logout.php" style="cursor:pointer" value="play">Uitloggen</a></li>';
}
else
{
	echo '<li><a id="signupknop" style="cursor:pointer" value="play">Sign up</a></li>';
	echo '<li><a id="loginknop" style="cursor:pointer" value="play">Login</a></li>';
}
?>

</ul>

</div>

<div class="menuvanlinks"  onclick="closelogintje();">
<ul id="logo">
<li ><a id="settings"><img src="http://puu.sh/rWtYi/a8925b96c9.png" alt="logo" width="35px" height="25px"></a></li>
<li class="chosen"><a><img src="http://puu.sh/rWd4i/0d3e6da086.png" alt="logo" width="35px" height="35px"></a></li>
<li class="unchosen"><a href="favorieten.php"><img src="http://puu.sh/rWePO/c996637cbe.png" alt="logo" width="35px" height="35px"></a></li>
<li class="unchosen"><a href="browsen.php"><img src="http://puu.sh/rWeYR/693b8db04d.png" alt="logo" width="35px" height="35px"></a></li>
<li class="unchosen"><a href="fridgemode.php"><img src="http://puu.sh/rWf8v/424be36917.png" a 	lt="logo" width="35px" height="35px"></a></li>

</ul>

</div>



<div class="logintje" id="logindivetje">
<div class="errortjezz">
<a>
<?php
if(isset($_GET['lv'])){
	
	if($_GET['lv']=='p'){
		echo "Verkeerde wachtwoord of gebruikersnaam";
}}
?>
</a>
</div>
<div class="success">
<a>
<?php	
if(isset($_GET['lv'])){
	if($_GET['lv']=='s'){
		echo "Je bent nu ingelogd!";
	}
}
?>
</a>
</div>
<form class="formlogin" action=""  method="Post">
	
		<div class="loginuser">
			<a class="usertekst">Gebruikersnaam</a></br>
			<input type="txtText" name="gebruiker" id="gebruiker">
		</div>
		<div class="loginpassje">
			<a class="passjetekst">Wachtwoord</a></br>
			<input type="password" name="passwoord" id="passwoord">
		</div>
		<div class="btn">
			<input type="submit" name="BUTNlogin" value="Login" class="btnlogin">
		</div>
</div>
</form>




<script>



$(document).ready(function(){
    $("#loginknop").click(function(){
        $("#logindivetje").fadeToggle("fast");
    });
});

function closelogintje(){
        $("#logindivetje").slideUp("fast");
    
}
$(document).ready(function(){
    $("#signupknop").click(function(){
		$(".registratie").fadeToggle(300);
        $(".venster").fadeToggle(300);
    });
});
$(document).ready(function(){
    $(".venster").click(function(){
		$(".registratie").slideToggle(300);
        $(".venster").fadeToggle(300);
    });
});

$(document).keyup(function(e) {
	if (e.which === 27){
		$(".registratie").slideUp(300);
        $(".venster").fadeOut(300);
		$("#logindivetje").slideUp("fast");
}});
$(document).ready(function(){
    $(".venster").click(function(){
		$(".logindivetje").slideUp("fast");
        $(".venster").fadeToggle(300);
    });
});	
    

</script>

<div class="registratie">
<div class="errortjezz">
<a>
<?php
if(isset($_GET['e'])){
	
	if($_GET['e']=='p'){
		echo "De wachtwoorden zijn niet gelijk aan elkaar";
	}
	if($_GET['e']=='m'){
		echo "De e-mail dat je ingegeven hebt is al geregistreerd";
	}
}
?>
</a>
</div>

	<form class="allesformreg" action="registratie.php?loc=index" method="Post">
		
			<div class="divvoornaam">
				<a class="voornaam">Voornaam</a></br>
				<input type="txtText" name="voor" id="VNT" required data-errormessage-value-missing="Vul dit veld in">

			</div>
			<div class="divachternaam">
				<a class="achternaam">Achternaam</a></br>
				<input type="txtText" name="achter" id="ANT" required="" >
			</div>
			<div class="divemail">
				<a class="emaillabel">E-mail adress</a></br>
				<input class="inputje" type="email" placeholder="example@email.com" name="email" required data-errormessage-value-missing="Vul dit veld in" data-errormessage-type-mismatch="Foute e-mail adress!">
			</div>
			<div class="divusername">
				<a class="usernamelabel">Gebruikersnaam</a></br>
				<input class="inputje" type="txtText" name="gebruiker"  required data-errormessage-value-missing="Vul dit veld in">
			</div>
			<div class="ww1">
				<a class="wachtwoordlabel">Wachtwoord</a></br>
				<input class="inputje" type="password" name="pass"  required data-errormessage-value-missing="Vul dit veld in" >
			</div>
			<div class="ww2">
				<a class="wachtwoordagainlabel">Wachtwoord opnieuw invoeren</a></br>
				<input class="inputje" type="password" name="opnieuw"  required data-errormessage-value-missing="Vul dit veld in" >
			</div>
			<div class="btn">
				<input type="submit" name="BUTN" value="Registreren" class="btnRegister">
			</div>


	</form>
	

</div>
<form class="allesformreg"  method="Post">
		
			<div class="divvoornaam">
				<a class="voornaam">Voornaam</a></br>
				<input type="txtText" name="voor" id="VNT" required data-errormessage-value-missing="Vul dit veld in">

			</div>
			<div class="divachternaam">
				<a class="achternaam">Achternaam</a></br>
				<input type="txtText" name="achter" id="ANT" required="" >
			</div>
			<div class="divemail">
				<a class="emaillabel">E-mail adress</a></br>
				<input class="inputje" type="email" placeholder="example@email.com" name="email" required data-errormessage-value-missing="Vul dit veld in" data-errormessage-type-mismatch="Foute e-mail adress!">
			</div>
			<div class="divusername">
				<a class="usernamelabel">Gebruikersnaam</a></br>
				<input class="inputje" type="txtText" name="gebruiker"  required data-errormessage-value-missing="Vul dit veld in">
			</div>
			<div class="ww1">
				<a class="wachtwoordlabel">Wachtwoord</a></br>
				<input class="inputje" type="password" name="pass"  required data-errormessage-value-missing="Vul dit veld in" >
			</div>
			<div class="ww2">
				<a class="wachtwoordagainlabel">Wachtwoord opnieuw invoeren</a></br>
				<input class="inputje" type="password" name="opnieuw"  required data-errormessage-value-missing="Vul dit veld in" >
			</div>
			<div class="btn">
				<input type="submit" name="BUTN" value="Registreren" class="btnRegister">
			</div>


	</form>


</body>
</html>
