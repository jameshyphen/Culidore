<?php include('sources.php')
?>
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
    function confirmationDelete(anchor)
    {
        var conf = confirm('Weet je zeker dat je dit recept wilt verwijderen?');
        if(conf)
            window.location=anchor.attr("href");
    }
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
    if(typeof window.history.pushState == 'function') {
        var currentLocation = window.location;
        window.history.pushState({}, "Hide", currentLocation);
    }
</script>
