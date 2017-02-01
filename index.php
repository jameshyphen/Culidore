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
<title>Culidore</title>
</head>
<script>    
    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", "index");
    }
</script>
<body>

<script>
<?php
session_start();
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
<?php
echo "Test voor github te zien wat er veranderd is";
for ($x = 0; $x<5; $x++){
	echo "Test";
}
echo "Test voor github te zien wat er veranderd is";
for ($x = 0; $x<5; $x++){
	echo "Test";
}
echo "Test voor github te zien wat er veranderd is";
for ($x = 0; $x<5; $x++){
	echo "Test";
}
echo "Test voor github te zien wat er veranderd is";
for ($x = 0; $x<5; $x++){
	echo "Test";
}

?>

<script>
function regDown(){
		$(".registratie").fadeToggle(300);
        $(".venster").fadeToggle(300);
}
function logDown(){
		$(".logintje").fadeToggle(300);
		$(".receptdiv").slideUp("fast");
        
}
function instellDown(){
		$(".gelogged").fadeToggle(300);
        
}
</script>




<?php
include('db.php');
if ($conn)
{
	$vraag = 'select naam, rating, prijs, soort, omschrijving, foto, bereiding, Username, Tijdgeplaatst from tblrecepten';
	if ($result = mysqli_query($conn, $vraag))
	{
		$xrec = 0;
		while ($row = mysqli_fetch_assoc($result))
		{	
			$xrec++;
			echo "<script> 
			$(document).ready(function(){
				$('#tabrec".$xrec."').click(function(){
					$('.logintje').slideUp('fast');
					$('.registratie').slideUp('fast');
					$('.venster').fadeIn('fast');
					$('.recepttoevoegen').slideUp('fast');
					$('.gelogged').fadeOut('fast');
					$('#rec".$xrec."').fadeToggle('fast');
					});
			
				$('.venster').click(function(){
					$('#rec".$xrec."').fadeOut('fast');
					});
				}); 
			</script>";
			
			if($xrec==1){
				echo "<div class='mainpagina' onclick='closelogintje();'><div class='venster'>
				</div>";
			}
			$test = "1234";
			?>
			
			<table class="receptentabellen"  style="cursor:pointer" id="tabrec<?=$xrec?>">
<?php			
			echo '<tr>';
			echo '<td colspan="2">'.$row['naam'].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td colspan="2">'.$row['Tijdgeplaatst'].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td colspan="2"><img width="200px" height="200px" src="'.$row['foto'].'"</td>';
			echo '<tr>';
			echo '<td colspan="2">Gepublished door: '.$row['Username'].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td colspan="2">'.$row['omschrijving'].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>';
			for($x=0;$x<$row['prijs'];$x++){
				echo '<div class="ratrat"><img width="20px" height="20px" src="http://www.freeiconspng.com/uploads/dollar-round-icon--18.png"></div>'; 
			}
			
			
			
			echo '</td>';
			echo '<td>';
			for($x=0;$x<$row['rating'];$x++){
				echo '<div class="ratrat"><img width="20px" height="20px" src="http://icons.iconarchive.com/icons/icons8/christmas-flat-color/256/star-icon.png"></div>'; 
			}
			
			echo '</td>';
			echo '</table>';
			
			
			echo "<div class='receptdiv' id='rec".$xrec."'>";
			echo '<table class="receptentabellen">';
			echo '<tr>';
			echo '<td colspan="2">'.$row['naam'].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td colspan="2">'.$row['Tijdgeplaatst'].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td colspan="2"><img width="200px" height="200px" src="'.$row['foto'].'"</td>';
			echo '<tr>';
			echo '<td colspan="2">Gepublished door: '.$row['Username'].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td colspan="2">'.$row['omschrijving'].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>';
			for($x=0;$x<$row['prijs'];$x++){
				echo '<div class="ratrat"><img width="20px" height="20px" src="http://www.freeiconspng.com/uploads/dollar-round-icon--18.png"></div>'; 
			}	
			echo '</td>';
			echo '<td>';
			for($x=0;$x<$row['rating'];$x++){
				echo '<div class="ratrat"><img width="20px" height="20px" src="http://icons.iconarchive.com/icons/icons8/christmas-flat-color/256/star-icon.png"></div>'; 
			}
			echo '</td>';
			echo '</table>';		
			echo "</div>";
		}
		
		
	}
	else
	{
		echo 'Geen resultaat';
	}
	mysqli_close($conn);
}
?>

</div>

<div class="menuvanboven">


<ul>
<a><img src="Finished.png" alt="logo"></a>

<?php

if (isset($_SESSION['gebruiker']))
{
	$gebruiker = $_SESSION['gebruiker'];
?>

	
	<li><a id="welkom" style="cursor:pointer" value="play"><?php echo $gebruiker; ?></a></li>
<?php
}
else
{
?>
	<li><a  id="signupknop" style="cursor:pointer" value="play">Sign up</a></li>
	<li><a id="loginknop" style="cursor:pointer" value="play">Login</a></li>
<?php	
}
?>
</ul>

</div>

<div class="menuvanlinks"  onclick="closelogintje();">
<ul id="logo">
<li class="chosen"><a><img src="http://puu.sh/rWd4i/0d3e6da086.png" alt="logo" width="35px" height="35px"></a></li>
<li class="unchosen"><a href="favorieten.php"><img src="http://puu.sh/rWePO/c996637cbe.png" alt="logo" width="35px" height="35px"></a></li>
<li class="unchosen"><a href="browsen.php"><img src="http://puu.sh/rWeYR/693b8db04d.png" alt="logo" width="35px" height="35px"></a></li>
<li class="unchosen"><a href="fridgemode.php"><img src="http://puu.sh/rWf8v/424be36917.png" alt="logo" width="35px" height="35px"></a></li>
<a class="circle" href="#">+</a>
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
echo "</a>";
echo "</div>";
if(isset($_SESSION['gebruiker'])){
	echo "</div><div class='gelogged'>";
	echo "<div class='accountinstellingen'><ul>";
	echo "<li><a style='cursor:pointer' class='loginknop'>Instellingen</a></li>";
	echo "<li><a style='cursor:pointer' class='loginknop'>Probleem Aanmelden</a></li>";
	
	if(isset($_SESSION['admin'])){
		echo"<li><a style='cursor:pointer' class='loginknop'>Problemen bekijken</a></li>";
	}
	echo "<li><a style='cursor:pointer' class='loginknop' href='logout.php' style='cursor:pointer' value='play'>Uitloggen</a></li>";
	echo "</ul></div>";
	
}
else{
	
	echo "<form class='formlogin' action='login.php'  method='Post'>";
	echo "	<div class='loginuser'>";
	echo "		<a class='usertekst'>Gebruikersnaam</a></br>";
	echo "		<input type='txtText' name='gebruiker' id='gebruiker'>";
	echo "	</div>";
	echo "	<div class='loginpassje'>";
	echo "		<a class='passjetekst'>Wachtwoord</a></br>";
	echo "		<input type='password' name='passwoord' id='passwoord'>";
	echo "	</div>";
	echo "	<div class='btn'>";
	echo "		<input type='submit' name='BUTNlogin' value='Login' class='btnlogin'>";
	echo "	</div>";
}
?>

</div>
</form>




<script>



$(document).ready(function(){
    $("#loginknop").click(function(){
        $("#logindivetje").fadeToggle("fast");
		$(".registratie").slideUp("fast");
		$(".venster").fadeOut("fast");
		$(".recepttoevoegen").slideUp("fast");
		$(".gelogged").fadeOut("fast");
		$(".receptdiv").slideUp("fast");
    });
});

function closelogintje(){
        $("#logintje").slideUp("fast");
		
    
}
$(document).ready(function(){
    $("#signupknop").click(function(){
		$(".registratie").fadeIn(300);
		$(".logintje").slideUp("fast");
        $(".venster").fadeIn(300);
		$(".recepttoevoegen").slideUp("fast");
		$(".gelogged").fadeOut("fast");
		$(".receptdiv").slideUp("fast");
    });
});
$(document).ready(function(){
    $(".venster").click(function(){
		$(".registratie").slideUp(300);
		$(".logindivetje").slideUp("fast");
        $(".venster").fadeToggle(300);
		$(".recepttoevoegen").slideUp("fast");
		$(".gelogged").fadeOut("fast");
		
    });
});

$(document).keyup(function(e) {
	if (e.which === 27){
		$(".registratie").slideUp(300);
        $(".venster").fadeOut(300);
		$("#logindivetje").slideUp("fast");
		$(".recepttoevoegen").slideUp("fast");
		$(".gelogged").fadeOut("fast");
		$(".receptdiv").slideUp("fast");
}});
	
$(document).ready(function(){
    $(".mainpagina").click(function(){
		$(".logintje").slideUp("fast");
		$(".registratie").slideUp("fast");
		
		$(".recepttoevoegen").slideUp("fast");
		$(".gelogged").fadeOut("fast");
    });
}); 
$(document).ready(function(){
    $(".circle").click(function(){
		$(".logintje").slideUp("fast");
		$(".registratie").slideUp("fast");
		$(".venster").fadeIn("fast");
		$(".recepttoevoegen").slideDown("fast");
		$(".gelogged").fadeOut("fast");
		$(".receptdiv").slideUp("fast");
    });
});    
   
$(document).ready(function(){
    $("#welkom").click(function(){
		$(".logintje").slideUp("fast");
		$(".registratie").slideUp("fast");
		$(".venster").fadeOut("fast");
		$(".recepttoevoegen").slideUp("fast");
		$(".gelogged").fadeToggle("fast");
		$(".receptdiv").slideUp("fast");
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
	
			
			


	</form>
</div>
<div class="recepttoevoegen">
<form class="voegrecept" action="recept.php" method="Post">
		
			<div class="titelgerecht">
				<a class="titelgerecht">Titel gerecht</a></br>
				<input type="txtText" name="Titel" id="TGR" required data-errormessage-value-missing="Vul dit veld in">

			</div>
			<div class="divrating">
				<a class="rating">Omschrijving</br>
				<input type="txtText" name="Omschrijving" id="RAT" required="" >
			</div>
			<div class="divprijs">
				<a class="prijs">Prijs 1-5</a></br>
				<input type="txtText" name="Prijs" id="PRI" required data-errormessage-value-missing="Vul dit veld in">
			</div>
			<div class="divbereiding">
				<a class="bereiding">Bereiding</a></br>
				<textarea name="Bereiding" style="width:250px;height:150px;" required data-errormessage-value-missing="Vul dit veld in"></textarea>
			</div>
			<div class="divsoort">
				<a class="soort">Soort</a></br>
				<select required data-errormessage-value-missing="Vul dit veld in" name="Soort">
				<option>Ontbijt</option>
				<option>Middageten</option>
				<option>Avondeten</option>
				</select>
			</div>
			<div class="divfoto">
			<input type="file" name="Foto" id="fileToUpload" size=35>
			</div>
			<input type="submit" name="Toevoegen" value="Toevoegen">
</form>


</body>
</html>
