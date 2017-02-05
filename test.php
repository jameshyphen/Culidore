<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid black;
            padding: 5px;
        }

        th {text-align: left;}
    </style>
</head>
<body>

<?php

include('db.php');

mysqli_select_db($conn,"ajax_demo");
$sql="SELECT id, Bugfix FROM Problemen";
$result = mysqli_query($conn,$sql);


while($row = mysqli_fetch_array($result)) {
    if($row['Bugfix']){
        echo"Fixed<button onclick=fixBug(".$row['id']." >Fix</button></br>";

    }
    else
    {
        echo "not fixed</br>";
        echo "";
    }

}

mysqli_close($conn);
?>
<script>
    function fixBug(str) {
        if (str=="") {
            document.getElementById("txtHint").innerHTML="";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("txtHint").innerHTML=this.responseText;
            }
        }
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
</script>
</body>
</html>