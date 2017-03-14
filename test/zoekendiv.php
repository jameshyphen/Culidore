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

    </form>


    <button id="sel">Select alles</button>
    <button id="desel">Deselect alles</button>
</div>