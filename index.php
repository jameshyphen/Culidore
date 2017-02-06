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
    $admin = false;

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
    if(isset($_SESSION['gebruiker'])){
        $vraag = "select admin from Gebruikers where gebruiker='".$_SESSION['gebruiker']."'";
        if ($result = mysqli_query($conn, $vraag)) {
            while ($row = mysqli_fetch_assoc($result)){
                if($row['admin']==1){
                    $admin = true;
                }
            }}}}
if ($conn)
{
    $vraag = 'select naam, rating, prijs, soort, omschrijving, foto, bereiding, Username, Tijdgeplaatst from tblrecepten';
    if ($result = mysqli_query($conn, $vraag)) {
        $xrec = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $xrec++;
            echo "<script> 
			$(document).ready(function(){
				$('#tabrec" . $xrec . "').click(function(){
					$('.logintje').slideUp('fast');
					$('.registratie').slideUp('fast');
					$('.venster').fadeIn('fast');
					$('.recepttoevoegen').slideUp('fast');
					$('.gelogged').fadeOut('fast');
					$('#rec" . $xrec . "').fadeToggle('fast');
					});

        $('.venster').click(function(){
            $('#rec" . $xrec . "').fadeOut('fast');
        });
        });
        </script>";

            if ($xrec == 1) {
                echo "<div class='mainpagina' onclick='closelogintje();'>
        <div class='venster'>
        </div>";
            }
            $time = strtotime($row['Tijdgeplaatst']);

            $newformat = date('d-F-Y',$time);


            ?>

            <table class="receptentabellen" style="cursor:pointer" id="tabrec<?= $xrec ?>">

                <tr>
                    <td colspan="2"><?= $row['naam'] ?></td>
                </tr>
                <tr>
                    <td colspan="2"><?= $newformat ?></td>
                </tr>
                <tr>
                    <td colspan="2"><img id="fotosss" width="150px"   height="150px" src="<?= $row['foto'] ?>"</td>
                </tr>
                <tr>
                    <td colspan="2">Gepublished door: <?= $row['Username'] ?></td>
                </tr>
                <tr>
                    <td colspan="2"><?= $row['omschrijving'] ?></td>
                </tr>
                <tr>
                    <td>
                        <?php
                        for ($x = 0; $x < $row['prijs']; $x++) {
                            echo '<div class="ratrat"><img width="20px" height="20px" src="http://www.freeiconspng.com/uploads/dollar-round-icon--18.png"></div>';
                        }
                        ?>


                    </td>
                    <td>
                        <?php

                        for ($x = 0; $x < $row['rating']; $x++) {
                            echo '<div class="ratrat"><img width="20px" height="20px" src="http://icons.iconarchive.com/icons/icons8/christmas-flat-color/256/star-icon.png"></div>';
                        }
                        ?>
                    </td>
            </table>
            <div style="overflow-y: scroll;" class="receptdiv" id="rec<?= $xrec ?>"><!--dit is waar wij divs genereren bij het clicken op recepten-->
                <b><a id="titelreceptdiv"><?=$row['naam']?></a></b>
                <?php

                for($x=0;$x<5;$x++){
                    echo '<div onclick="ster'.$x.$xrec.'();" id="'.$x.$xrec.'ster" class="ratezelf">
                    <img onclick="ster'.$x.'();" width="30px" height="30px"		
	src="http://icons.iconarchive.com/icons/icons8/christmas-flat-color/256/star-icon.png"></div>';
                    echo '<script>function ster'.$x.$xrec.'(){';
                    for($y=0;$y<$x+1;$y++){
                        echo '
		document.getElementById("'.$y.$xrec.'ster").style.opacity = "1";';
                    }
                    for($y=$x+1;$y<6;$y++){
                        echo '
		document.getElementById("'.$y.$xrec.'ster").style.opacity = "0.3";';
                    }
                    echo "}</script>";                    
                }
                echo "<br>";
                echo "<br>";
                echo $row['bereiding'];
                ?>
            </div>
            <?php
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
        if(isset($_SESSION['gebruiker'])){
            echo " <a class=\"circle\" href=\"#\">+</a>";
        }?>
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





<div class="logintje" id="logindivetje">
    <div class="errortjezz">
        <a>
            <?php
            if(isset($_GET['lv'])){

                if($_GET['lv']=='p'){
                    echo "Verkeerde wachtwoord of gebruikersnaam";
                }}
            if(isset($_GET['pr'])){

                if($_GET['pr']=='p'){
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
            if(isset($_GET['pr'])){
                if($_GET['pr']=='s'){
                    echo "Probleem is aangemeld";
                }

            }
            echo "</a>";
            echo "</div>";
            if(isset($_SESSION['gebruiker'])){?>
    </div><div class='gelogged'>
        <div class='accountinstellingen'><ul>
                <li><a style='cursor:pointer' class='instellingen'>Instellingen</a></li>
                <li><a style='cursor:pointer' class='aanmeldprobleem'>Probleem Aanmelden</a></li>

                <?php
                if($admin){
                    echo"<li><b><a style='cursor:pointer' href='problemen.php' class='probleembekijk'>Problemen bekijken</a></b></li>";
                }?>
                <li><a style='cursor:pointer' class='uitloggen' href='logout.php' style='cursor:pointer' value='play'>Uitloggen</a></li>
            </ul></div>
        <?php
        }
        else{?>

            <form class='formlogin' action='login.php'  method='Post'>
                <div class='loginuser'>
                    <a class='usertekst'>Gebruikersnaam</a></br>
                    <input type='txtText' name='gebruiker' id='gebruiker'>
                </div>
                <div class='loginpassje'>
                    <a class='passjetekst'>Wachtwoord</a></br>
                    <input type='password' name='passwoord' id='passwoord'>
                </div>
                <div class='btn'>
                    <input type='submit' name='BUTNlogin' value='Login' class='btnlogin'>
                </div>
            </form>
        <?php }
        ?>

    </div>
</div>




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
            $(".venster").fadeOut(300);
            $(".recepttoevoegen").slideUp("fast");
            $(".gelogged").slideUp("fast");
            $(".probleemtoevoegen").slideUp("fast");

        });
    });

    $(document).keyup(function(e) {
        if (e.which === 27){
            $(".registratie").slideUp(300);
            $(".logindivetje").slideUp("fast");
            $(".venster").fadeOut(300);
            $(".recepttoevoegen").slideUp("fast");
            $(".gelogged").slideUp("fast");
            $(".probleemtoevoegen").slideUp("fast");
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
            $(".probleemtoevoegen").slideUp("fast");
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
            $(".probleemtoevoegen").slideUp("fast");
        });
    });
    $(document).ready(function(){
        $(".aanmeldprobleem").click(function(){
            $(".logintje").slideUp("fast");
            $(".registratie").slideUp("fast");
            $(".venster").fadeIn("fast");
            $(".recepttoevoegen").slideUp("fast");
            $(".gelogged").fadeOut("fast");
            $(".receptdiv").slideUp("fast");
            $(".probleemtoevoegen").fadeToggle("fast");
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
    <form class="voegrecept" action="recept.php" method="Post" enctype="multipart/form-data">

        <div class="titelgerecht">
            <a class="titelgerecht">Titel gerecht</a></br>
            <input type="txtText" name="Titel" id="TGR" required data-errormessage-value-missing="Vul dit veld in">

        </div>
        <div class="divrating">
            <a class="rating">Omschrijving</a></br>
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
            <input type="file" name="Foto" accept="image/*" size=35>
        </div>
        <input type="submit" name="Toevoegen" value="Toevoegen">
       </form>
</div>
<div class="probleemtoevoegen">
    <form id="probleemform" class="probleemtoevoeg" action="probleem.php" method="Post">

        <div class="omschrijving">
            <a class="titelgerecht">Beschrijf je probleem:</a></br></br>
            <textarea rows="4" cols="50" name="probleembeschrijf" form="probleemform"></textarea>
        </div></br>

        <input type="submit" name="Toevoegen" value="Toevoegen">
    </form>
</div>
</body>
</html>
