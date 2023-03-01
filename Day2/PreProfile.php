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
			$name = $row['Name'];
			$dob = $row['DOB'];
			$hobby = $row['Hobby'];
			$profileImg = "img/".$row['Image'];
		}
    ?>
    <link rel="stylesheet" type="text/css" href="Day2.css"/>
<meta charset="utf-8">
<title>Profile Preview</title>
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
            <form method="post" action="PreProfile.php">
            	<input type="submit" name="btnConfirm" value="Confirm"/>
            	<input type="submit" name="btnUndo" value="Undo"/>
            </form>
        </div>
    </div>
</body>
</html>