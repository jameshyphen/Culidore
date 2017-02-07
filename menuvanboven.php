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


            <li><a id="welkom" style="cursor:pointer" value="play"><?php echo htmlspecialchars($gebruiker, ENT_QUOTES, 'UTF-8'); ?></a></li>
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