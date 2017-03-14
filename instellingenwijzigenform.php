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
	<td width="60%"><input type="password" name="huidigPasswoord" required data-errormessage-value-missing="Vul dit veld in" class="txtField"/><span id="huidigPasswoord"  class="required"></span></td>
	</tr>
	<tr>
	<td><label>Nieuw Passwoord</label></td>
	<td><input type="password" name="newPasswoord" required data-errormessage-value-missing="Vul dit veld in" class="txtField"/><span id="newPasswoord" class="required"></span></td>
	</tr>
	<td><label>Bevestig nieuwe Passwoord</label></td>
	<td><input type="password" name="confirmPasswoord" required data-errormessage-value-missing="Vul dit veld in" class="txtField"/><span id="confirmPasswoord" class="required"></span></td>
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
		$username = $_SESSION['gebruiker'];
        $passwoord = $_POST['huidigPasswoord'];
        $huidigpasswoord_encrypted = md5($passwoord);
        $newpasswoord = $_POST['newPasswoord'];
        $confirmnewpasswoord = $_POST['confirmPasswoord'];
        $newpasswoord_encrypted = md5($confirmnewpasswoord);

        $query="SELECT * FROM Gebruikers WHERE gebruiker='$username' and passwoord='$huidigpasswoord_encrypted'";
        $result=mysqli_query($conn, $query);
        $count=mysqli_num_rows($result);
        
        if ($count==1) 
        {
            if($newpasswoord==$confirmnewpasswoord)
            {
        		$sql=mysqli_query($conn, "UPDATE Gebruikers SET passwoord='$newpasswoord_encrypted' WHERE gebruiker='$username'");
        		header("location:index.php");
        	}
       		elseif($newpasswoord!=$confirmnewpasswoord)
	    	{
    	   		header("location:index.php");
    	    }
    	}
    	else
    	{
    		echo 'Huidige passwoord komt niet overeen met hetgene in de database';
    	}
}
       mysqli_close($conn);
?>
