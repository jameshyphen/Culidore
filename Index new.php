<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script src="jQuery.js"></script>
<script src="jEscape.js"></script>
<script src="jEscape.min.js"></script>
<script src = "civem.js"></script>
<style>

</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="design.css" />
<title>Index</title>
</head>
<body>
<div class="venster">
</div>
<div class="mainpagina" onclick="closelogintje();">
</div>
<div class="menuvanboven">
<ul>

<a><img src="http://puu.sh/rWbc5/e2826e8a64.png" alt="logo"></a>


<li><a  id="signupknop" style="cursor:pointer" value='play'>Sign up</a></li>
<li><a id="loginknop" style="cursor:pointer" value='play'>Login</a></li>

</ul>

</div>
<div class="menuvanlinks"  onclick="closelogintje();">
<ul id="logo">
<li ><a id="settings"><img src="http://puu.sh/rWtYi/a8925b96c9.png" alt="logo" width="35px" height="25px"></a></li>
<li class="chosen"><a><img src="http://puu.sh/rWd4i/0d3e6da086.png" alt="logo" width="35px" height="35px"></a></li>
<li class="unchosen"><a href="favorieten.php"><img src="http://puu.sh/rWePO/c996637cbe.png" alt="logo" width="35px" height="35px"></a></li>
<li class="unchosen"><a href="browsen.php"><img src="http://puu.sh/rWeYR/693b8db04d.png" alt="logo" width="35px" height="35px"></a></li>
<li class="unchosen"><a href="fridgemode.php"><img src="http://puu.sh/rWf8v/424be36917.png" alt="logo" width="35px" height="35px"></a></li>

</ul>

</div>



<div class="logintje" id="logindivetje">
<form class="formlogin" action="login.php"  method="Post">
	
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


$(document).keyup(function(e) {
	if (e.which === 27){
		$(".registratie").slideUp(300);
        $(".venster").fadeOut(300);
		$("#logindivetje").slideUp("fast");
}});
	
    

</script>

<div class="registratie">

<?php
    if(isset($msg) & !empty($msg)){
        echo $msg;
    }
    ?>
    <?php
    if(isset($errormes))
    {
        echo $msg;
    }
    ?>

<form class="allesformreg" action="registratie.php" method="Post">
	
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
			<input class="inputje" type="email" placeholder="example@email.com" name="email" required data-errormessage-value-missing="Vul dit veld in" data-errormessage-type-mismatch="Fout email-adres!" >
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



</body>
</html>
