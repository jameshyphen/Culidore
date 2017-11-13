<?php
if(isset($_SESSION['username'])){?>
<div class='gelogged'>
    <div class='accountinstellingen'><ul>
            <li><a style='cursor:pointer' class='instellingen'>Instellingen</a></li>
            <li><a style='cursor:pointer' class='aanmeldprobleem'>Probleem Aanmelden</a></li>

            <?php
            if($admin){
                echo"<li><b><a href='problemen.php' style='cursor:pointer' class='probleembekijk'>Problemen bekijken</a></b></li>";
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
</div>

<?php }
?>

