<?php
include('sources.php');
include('scriptremoveGET.php');
?>
<script>

    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", "Index");
    }
</script>

<body>

<?php include('scriptswhensomethingsucceedorfail.php');
?>


<?php include('scriptfunctionsonclick.php');
?>



<div class="mainpagina">
<?php
include('ifadmin.php');
include('showrecept.php');
?>

</div>

<?php
include('scriptremoveGET.php');
include('menuvanboven.php');
include('logindiv.php');
include('script1.php');
?>
<?php
include('registerdiv.php');
include('recepttoevoegendiv.php');
include('probleemtoevoegen.php');
?>
</body>
</html>