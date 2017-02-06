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
    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", "problemen.php");
    }
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
        $vraag = "select id, admin from Gebruikers where gebruiker='".$_SESSION['gebruiker']."'";
        if ($result = mysqli_query($conn, $vraag)) {
            while ($row = mysqli_fetch_assoc($result)){
                if($row['admin']==1){
                    $admin = true;
                }
            }}}}
if ($conn)
{
$vraag = "select id,Omschrijving, Bugfix, gebruiker, datum from Problemen";
echo "<div class='mainpagina' onclick='closelogintje();'>
        <div class='venster'>
        </div>";
if ($result = mysqli_query($conn, $vraag)) {
    $xrec = 0;
    echo "<table class='tablebugfixes'>";
    echo "<tr>
                <td>
                    Omschrijving
                </td>
                <td>
                    Bugfix
                </td>
                <td>
                    Gebruiker
                </td>
                <td>
                    Datum
                </td>
              </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        if($row['Bugfix']){
            $bugfix = "<a class='fixed'>Fixed</a>";
        }
        else{
            $bugfix = "<a class='notfixed'>Not fixed</a>";
        }
        $time = strtotime($row['datum']);
        $idx = $row['id'];
        $newformat = date('d-F-Y', $time);
        ?><?php if($admin) : ?>
        <tr>
            <td>
                <?=$row['Omschrijving']?>
            </td>
            <td>
                <?=$bugfix?>
            </td>

            <td>
                <?=$row['gebruiker']?>
            </td>

            <td>
                <?=$newformat?>
            </td>
            <td><?php
                if($row['Bugfix']==false){
                    echo"<form method=\"POST\" action=\"fixprobleem.php\">
                    <input class=\"checkbuxx\" name=\"probl\" value=\"$idx\" checked type=\"text\">
                    <input type=\"submit\" value=\"✓\">
                </form>";
                }?>

            </td>
        </tr>
        <?php endif; ?>




<?php
        }
        echo " </table>";

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
        <a href="index.php"><img  src="Finished.png" alt="logo"></a>
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
            if(isset($_GET['prob'])){

                if($_GET['prob']=='nf'){
                    echo "Probleem met probleem fixen";
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
            if(isset($_GET['prob'])){
                if($_GET['prob']=='f'){
                    echo "Probleem is gefixed";
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
                    echo"<li><b><a style='cursor:pointer' class='probleembekijk'>Problemen bekijken</a></b></li>";
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
    <form class="voegrecept" action="recept.php" method="Post">

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
            <input type="file" name="Foto" id="fileToUpload" size=35>
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
