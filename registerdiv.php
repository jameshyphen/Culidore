<div class="registratie">
    <div class="errortjezz">
        <a>
            <?php
            if(isset($_GET['e'])){

                if($_GET['e']=='p'){
                    echo "The passwords do not match."; //view error message pass!=pass2
                }
                if($_GET['e']=='m'){
                    echo "E-mail address already registered."; //view error message email registered
                }
            }
            ?>
        </a>
    </div>

    <form class="RegistrationformClass" style="overflow-y: scroll;" action="registratie.php?loc=index" method="Post">

        <div class="FirstnameDiv">
            <a>Firstname</a></br>
            <input type="txtText" name="firstname" id="VNT" required data-errormessage-value-missing="<b>*</b>This field cannot be empty.">
        </div>
        <div class="SurnameDiv">
            <a>Surname</a></br>
            <input type="txtText" name="surname" id="ANT" required="" >
        </div>
        <div class="EmailDiv">
            <a>E-mail address</a></br>
            <input class="inputje" type="email" placeholder="example@email.com" name="email" required data-errormessage-value-missing="<b>*</b>This field cannot be empty." data-errormessage-type-mismatch="Not a valid e-mail address.">
        </div>
        <div class="UsernameDiv">
            <a>Username</a></br>
            <input class="inputje" type="txtText" name="username"  required data-errormessage-value-missing="<b>*</b>This field cannot be empty.">
        </div>
        <div class="PassDiv">
            <a>Password</a></br>
            <input class="inputje" type="password" name="pass"  required data-errormessage-value-missing="<b>*</b>This field cannot be empty." >
        </div>
        <div class="Pass2Div">
            <a>Repeat your password</a></br>
            <input class="inputje" type="password" name="pass2"  required data-errormessage-value-missing="<b>*</b>This field cannot be empty." >
        </div>
        <div class="btn">
            <input type="submit" name="BUTN" value="Registreren" class="btnRegister">
        </div>


    </form>





    </form>
</div>