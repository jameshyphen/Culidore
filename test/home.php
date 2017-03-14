<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="design.css" />
<title>Index</title>
</head>
<body>
<div class="menuvanboven">

<ul>
<a><img src="http://puu.sh/rWbc5/e2826e8a64.png" alt="Mountain View"></a>
<li><a href="#">Sign in</a></li>
<li><a href="login.php">Login</a></li>
</form>
</ul>
</div>
<div class="menuvanlinks">
<ul id="logo">
<li><a href="#">INDEX</a></li>
<li><a href="#">FAVOR</a></li>
<li><a href="#">BROWS</a></li>
<li><a href="#">FRIDG</a></li>
<li><a href="#">RANDM</a></li>
</ul>

</div>
</body>
</html>
<?php ob_end_flush(); ?>