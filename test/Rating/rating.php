<style>
.ratezelf {
	display:inline-block;
	opacity:0.3;
}
.ratezelf:hover{
	opacity:0.6;
}


</style>


<?php



for($x=0;$x<5;$x++){
    echo '<div onclick="ster'.$x.'();" id="'.$x.'ster" class="ratezelf"><img onclick="ster'.$x.'();" width="30px" height="30px"		
	src="http://icons.iconarchive.com/icons/icons8/christmas-flat-color/256/star-icon.png"></div>';
    echo '<script>function ster'.$x.'(){';
    for($y=0;$y<$x+1;$y++){
        echo '
		document.getElementById("'.$y.'ster").style.opacity = "1";';
    }
    for($y=$x+1;$y<6;$y++){
        echo '
		document.getElementById("'.$y.'ster").style.opacity = "0.3";';
    }
    echo "}</script>";
}

?>

