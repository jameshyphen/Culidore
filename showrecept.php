<?php
include('db.php');
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

    include('tabelrecept.php');
    include('receptdiv.php');
    }

    }
    else
    {
    echo 'Geen resultaat';
    }
    mysqli_close($conn);
    }
?>