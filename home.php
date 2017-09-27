<?php
//Start Session
session_start();

if(!isset($_SESSION['name'])||(trim($_SESSION['name'])==''))
{
	header("location:login.html");
	exit();
}
?>
<html>
<head>
<title>Home Page</title>
</head>
<body>
<h1>Welcome,<?php echo $_SESSION["name"]?></h1>
</body>
</html>