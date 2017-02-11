<div id="ingdiv3">
    Test
</div>

<script>

    function myFunction() {

        var para = document.createElement("A");
        var t = document.createTextNode("X");
        para.appendChild(t);
        para.id="result" + divid;
        para.onclick= function(){
            $("#result" + divid).remove();
        }
        document.getElementById("ingdiv").appendChild(para);
    }
</script>
<a onclick="myFunction();">Test</a>