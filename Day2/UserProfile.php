<!DOCTYPE HTML>
<html>
<head>
	<?php 
        include('Control.php');
		session_start();
		$acc = new Account();
		if(empty($_SESSION['user']['email'])){
			header('location:Login.php');
		}
		$data = $acc->sel_info($_SESSION['user']['email']);
		foreach($data as $row){
			$name = empty($row['Name'])?'':$row['Name'];
			$dob = empty($row['DOB'])?'':$row['DOB'];
			$hobby = empty($row['Hobby'])?'':$row['Hobby'];
			$profileImg = empty($row['Image'])?'':"img/".$row['Image'];
		}
    ?>
    <meta charset="utf-8">
    <title>User Profile</title>
    <link rel="stylesheet" type="text/css" href="Day2.css"/>
</head>
<body>
    <div class="content">
    	<div class="profileColLeft">
        	<img src="<?php echo $profileImg ?>" width="200px"/>
            <h4><?php echo $_SESSION['user']['email'] ?></h4>
            <p><?php echo $name ?></p>
            <div class="profilePerInfo">
            	<p>DOB: <?php echo $dob ?></p>
            	<p>Hobby: <?php echo $hobby ?></p>
            </div>
            <form method="post" action="EditProfile.php">
            	<input type="submit" name="btnEditProfile" value="Edit Profile"/>
            </form>
            <form method="post" action="Logout.php">
            	<input type="submit" name="btnLogout" value="Log out"/>
            </form>
        </div>
    </div>
</body>
</html>