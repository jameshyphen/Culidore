<table class="receptentabellen" style="cursor:pointer" id="tabrec<?= $xrec ?>">

                <tr>
                    <td colspan="2"><?= $row['naam'] ?></td>
</tr>
<tr>
    <td colspan="2"><?= $newformat ?></td>
</tr>
<tr>
    <td colspan="2"><img id="fotosss" width="150px"   height="150px" src="<?= $row['foto'] ?>"</td>
</tr>
<tr>
    <td colspan="2">Gepublished door: <?= $row['Username'] ?></td>
</tr>
<tr>
    <td colspan="2"><?= $row['omschrijving'] ?></td>
</tr>
<tr>
    <td>
        <?php
        for ($x = 0; $x < $row['prijs']; $x++) {
            echo '<div class="ratrat"><img width="20px" height="20px" src="http://www.freeiconspng.com/uploads/dollar-round-icon--18.png"></div>';
        }
        ?>


    </td>
    <td>
        <?php

        for ($x = 0; $x < $row['rating']; $x++) {
            echo '<div class="ratrat"><img width="20px" height="20px" src="http://icons.iconarchive.com/icons/icons8/christmas-flat-color/256/star-icon.png"></div>';
        }
        ?>
    </td>
    </table>