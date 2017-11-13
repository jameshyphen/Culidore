<div class="logintje" id="logindivetje">
    <div class="errortjezz">
        <a>
            <?php
            include('MessageboxFailed.php');
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
            if(isset($_GET['e'])){
                if($_GET['e']=='s'){
                    echo "Jouw account is aangemaakt!";
                }

            }

            if(isset($_GET['lgo'])){
                if($_GET['lgo']=='s'){
                    echo "Je bent nu uitgelogd!";
                }

            }

            if(isset($_GET['prob'])){
                if($_GET['prob']=='f'){
                    echo "Probleem is gefikst";
                }

            }
            if(isset($_GET['prob'])){
                if($_GET['prob']=='nf'){
                    echo "Probleem is niet gefikst";
                }

            }
            if(isset($_GET['pr'])){
                if($_GET['pr']=='s'){
                    echo "Probleem is aangemeld";
                }

            }
            if(isset($_GET['reto'])){
                if($_GET['reto']=='s'){
                    echo "Recept is toegevoegd!";
                }

            }
            if(isset($_GET['rec'])){
                if($_GET['rec']=='s'){
                    echo "Recept verwijderd!";
                }

            }
            echo "</a>";
            echo "</div>";
            if(isset($_SESSION['username'])){?>
    </div>
    <div class='gelogged'>
        <div class='accountinstellingen'><ul>
                <li><a style='cursor:pointer' class='instellingen' href="instellingenwijzigen.php">Instellingen</a></li>
                <li><a style='cursor:pointer' class='aanmeldprobleem'>Probleem Aanmelden</a></li>

                <?php
                if($admin){
                    echo"<li><b><a href='problemen.php' style='cursor:pointer' class='probleembekijk'>Problemen bekijken</a></b></li>";
                }?>
                <li><a style='cursor:pointer' class='uitloggen' href='logout.php' style='cursor:pointer' value='play'>Uitloggen</a></li>
            </ul></div></div>
        <?php
        }


        else{?>

        <form class='formlogin' action='login.php'  method='Post'>
            <div class='loginuser'>
                <a class='usertekst'>Username</a></br>
                <input type='txtText' name='username' id='gebruiker'>
            </div>
            <div class='loginpassje'>
                <a class='passjetekst'>Wachtwoord</a></br>
                <input type='password' name='password' id='password'>
            </div>
            <div class='btn'>
                <input type='submit' name='BUTNlogin' value='Login' class='btnlogin'>
            </div>
        </form>
    </div>

<?php }
?>
