<!DOCTYPE HTML>
<html>
<head>
<?php
	session_start();
	if(empty($_SESSION['user']['email'])){
		header('location:Login.php');
	}
	if($_SESSION['user']['isAdmin'] != 0){
		header('location:Login.php');
	}
?>
<meta charset="utf-8">
<title>Admin</title>
</head>
<body>
	<h4>Đây là page admin</h4>
    <p>Hiii<?php echo $_SESSION['user']['email'];?></p>
    <form method="post" action="Logout.php">
        <input type="submit" name="btnLogout" value="Log out"/>
    </form>
</body>
</html>