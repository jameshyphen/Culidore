<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://use.fontawesome.com/3008661bde.js"></script>
<script src ="civem.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<style>

</style>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="design.css" />
    <title>Culidore</title>
</head>
<script>
    if(typeof window.history.pushState == 'function') {
        var currentLocation = window.location;
        window.history.pushState({}, "Hide", currentLocation);
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
    $vraag = 'select id, naam, rating, prijs, soort, omschrijving, foto, bereiding, Username, Tijdgeplaatst from tblrecepten';
    if ($result = mysqli_query($conn, $vraag)) {
        $xy=1;
        while ($row = mysqli_fetch_assoc($result)) {
            $xrec = $row['id'];
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

            if ($xy == 1) {
                $xy++;
                echo "<div class='mainpagina' onclick='closelogintje();'>
        <div class='venster' >
        </div>";
            }
            $time = strtotime($row['Tijdgeplaatst']);

            $newformat = date('d-F-Y',$time);


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
<script>
    function confirmationDelete(anchor)
    {
        var conf = confirm('Wil jij dit recept zeker verwijderen?');
        if(conf)
            window.location=anchor.attr("href");
    }
</script>

<?php
include('menuvanboven.php');
include('logindiv.php');
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


</script>
<?php
include('registerdiv.php');
include('recepttoevoegendiv.php');
include('probleemtoevoegen.php');
?>
</body>
</html>
