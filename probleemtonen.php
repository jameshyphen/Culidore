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
                        <?=htmlspecialchars($row['Omschrijving'], ENT_QUOTES, 'UTF-8');?>
                    </td>
                    <td>
                        <?=$bugfix?>
                    </td>

                    <td>
                        <?=htmlspecialchars($row['gebruiker'], ENT_QUOTES, 'UTF-8');?>
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