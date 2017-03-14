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

    <form class="allesformreg" style="overflow-y: scroll;" action="registratie.php?loc=index" method="Post">

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