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