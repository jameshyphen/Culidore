<div style="overflow-y: scroll;" class="zoekendiv">
    <form method="GET">
        <input type="text" name="zoek" placeholder="Zoeken">
        <h1>Producten die je zeker wil hebben:</h1>
        <table>
            <?php
            include('db.php');
            $vraag = "select id, Naam from Ingredienten";
            $resetcolumn = 0;

            if ($result = mysqli_query($conn, $vraag)) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id=$row['id'];
                    $naam=$row['Naam'];

                    if($resetcolumn==0) {

                        echo "<tr>";
                        echo "<td><input name=\"ingredient$id\"  type=\"checkbox\" class='verschillendeingredienten'>$naam</input></td>";
                        $resetcolumn++;
                    }
                    else{
                        if($resetcolumn==3){

                            echo "<td><input  name=\"ingredient$id\"  type=\"checkbox\" class='verschillendeingredienten'>$naam</input></td></tr>";
                            $resetcolumn=0;
                        }
                        else {

                            echo "<td>";
                            echo "<input name=\"ingredient$id\"  type=\"checkbox\"  class='verschillendeingredienten'>$naam</input>";
                            echo "</td>";
                            $resetcolumn++;
                        }

                    }

                }
            }

            ?>
        </table>

        <div class="soortendivzoeken">
            <b>Soort:   </b><select name="Soort">
                <option>Alles</option>
            <?php
            $vraag = "select distinct soort from tblrecepten order by soort";
            if ($result = mysqli_query($conn, $vraag)) {
                while ($row = mysqli_fetch_assoc($result)) {?>
                    <option><?=$row['soort']?></option>
               <?php }
            }
            ?>
            </select>
        </div>
        <script>

            $(document).ready(function() {
                $('#sel').click(function () {
                    $('.verschillendeingredienten').prop('checked', true);
                });
                $('#desel').click(function () {
                    $('.verschillendeingredienten').prop('checked', false);
                });
            });


        </script>
        <input class="zoekenreceptinput" type="submit" value="Zoeken">
    </form>


    <button class="zoekenreceptinput" id="sel">Select alles</button>
    <button class="zoekenreceptinput" id="desel">Deselect alles</button>
</div>