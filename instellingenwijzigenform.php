<html>
<head>
<title>Instellingen veranderen</title>
</head>
<body>
<?php
	include('db.php');
	if ($conn) 
	{
		$vraag='select * from Gebruikers where gebruiker="'.$_SESSION['gebruiker'].'"';

		if ($result = mysqli_query($conn,$vraag)) 
		{
			echo '<table class="tablebugfixes2">';
			echo '<td colspan="2"><b>Account informatie</td>';
			while ($row = mysqli_fetch_assoc($result))
			{
				echo '<tr>';
				echo '<td>Voornaam:</td>';
				echo '<td>'.$row['voornaam'].'</td>';
				echo '</tr>';
				echo '<tr>';
				echo '<td>Achternaam:</td>';
				echo '<td>'.$row['achternaam'].'</td>';
				echo '</tr>';
				echo '<tr>';
				echo '<td>Email-adres:</td>';
				echo '<td>'.$row['email'].'</td>';
				echo '</tr>';
				echo '<tr>';
				echo '<td>Gebruikersnaam:</td>';
				echo '<td>'.$row['gebruiker'].'</td>';
			}
			echo '</table>';
			echo '<br>';
		}
		else
		{
			echo '<br> geen resultaat van de query';
		}
	}
	else
	{
		echo "Failed to connect: ".mysql_connect_error();
	}
	mysqli_close($conn);
?>

<form method="post" action="">

	<table class="tablebugfixes">
	<tr class="tableheader">
	<td colspan="2"><b>Passwoord wijzigen</td>
	</tr>
	<tr>
	<td width="40%"><label>Huidig passwoord</label></td>
	<td width="60%"><input type="password" name="huidigPasswoord" class="txtField"/><span id="huidigPassword"  class="required"></span></td>
	</tr>
	<tr>
	<td><label>Nieuw Passwoord</label></td>
	<td><input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></td>
	</tr>
	<td><label>Bevestig nieuwe Passwoord</label></td>
	<td><input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"></span></td>
	</tr>
	<tr>
	<td colspan="2"><input class="zoekenreceptinput" type="submit" name="wijzigen" value="Wijzigen" class="btnSubmit"></td>
	</tr>
	</table>

</form>



</form>
</body></html>
<?php
include('db.php');
if (isset($_POST['wijzigen']))
{
$password1 = mysqli_real_escape_string($conn, $_POST['newPassword']);
$passwordencrypted = md5($password1);
$password2 = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
$username = mysqli_real_escape_string($conn, $_SESSION['gebruiker']);

$query = mysqli_query("select gebruiker, passwoord from Gebruikers where gebruiker='".$_SESSION['gebruiker']."'",$conn);

if ($password1 != $password2)
{
    echo "Passwoorden zijn niet gelijk";
}
else if (mysqli_query($conn, "UPDATE Gebruikers SET passwoord='$passwordencrypted' WHERE gebruiker='$username'"))
{
    echo "Instellingen zijn gewijzigd.";
}
else
{
    mysqli_error($conn);
}
}
mysqli_close($conn);

?>