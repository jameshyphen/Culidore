<body onload="createSelect();">
<script src="jquery-3.1.1.min.js"></script>
<?php
include('db.php');
if ($conn) {
    $vraag = "select id, Naam from Ingredienten";
    if ($result = mysqli_query($conn, $vraag)) {
        $id=0;
        while ($row = mysqli_fetch_assoc($result)) {
            $ingredienten[$id]=$row['Naam'];
            $id++;
        }
    }
    else{
        echo "Geen resultaat";
    }
}
?>
<input name="aantaling" id="idinput" type="hidden" />
<div id="demo"></div>

<div id="deldem"></div>
<a id="idknopingredient" onclick="createSelect();">Voeg ingredient</a>
<script>
    var ingredienten = [<?php echo '"'.implode('","',  $ingredienten ).'"' ?>];
    var id=0;
    var jsidinput = document.getElementById("idinput");
    function createSelect(){

            id++;

            jsidinput.value=id;
            var myDiv = document.createElement("div");
            myDiv.id = "selectdiv"+id;
            document.getElementById("demo").appendChild(myDiv);
            var selectList = document.createElement("select");
            selectList.name = "ingredient"+id;
            myDiv.appendChild(selectList);
            var option = document.createElement("option");

            option.text = "";
            selectList.appendChild(option);
            for (var i = 0; i < ingredienten.length; i++) {
                option = document.createElement("option");
                option.value = ingredienten[i];
                option.text = ingredienten[i];
                selectList.appendChild(option);
            }

    }
    $(document).ready(function(){
        $("#VerwijderIngredient").click(function(){
            if(id>1) {
                $("#selectdiv" + id).remove();
                id--;
                jsidinput.value=id;
            }
            else{
                alert("Jij moet minstens 1 ingredient hebben!");
            }
        });
    });
</script>
<a id="VerwijderIngredient">Verwijder ingredient</a>
</body>