<!DOCTYPE HTML>
<html>
<head>
	<?php 
        include('Control.php');
		$acc = new Account();
		session_start();
		if(empty($_SESSION['user']['email'])){
			header('location:Login.php');
		}
		$data = $acc->sel_info($_SESSION['user']['email']);
		foreach($data as $row){
			$id = $row['Id'];
			$name = $row['Name'];
			$dob = $row['DOB'];
			$hobbies = explode(',',$row['Hobby']);
			$imgName = $row['Image'];
			$profileImg = "img/".$row['Image'];
		}
    ?>
    <meta charset="utf-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="Day2.css"/>
</head>
<body>
    <div class="content">
        <div class="leftCol">
            <img src="<?php echo isset($profileImg)?$profileImg:'img/jellyfish.jpg'; ?>" width="300px" name="imgProfile"/>
        </div>
        <div class="rightCol">
            <form method="post" enctype="multipart/form-data">
                <h4>Edit Profile</h4>
				<?php
                    if(isset($_POST['btnSubmit'])){
                        $run_flag = 1;
                        $name = $_POST['txtName'];
                        $dob = $_POST['txtDOB'];
                        $hobby = isset($_POST['cbHobby'])?implode(',',$_POST['cbHobby']):'';
						if(!empty($_FILES['flProfileImg']['tmp_name'])){
							$imgName = basename($_FILES['flProfileImg']['name']).$id;
							$file = $_FILES['flProfileImg']['tmp_name'];
						}
					}
				?>
                <input type="text" name="txtName" placeholder="Name" value="<?php echo (isset($name))?$name:''?>"/></br>
                <input type="text" name="txtEmail" readonly value="<?php echo $_SESSION['user']['email']?>"/></br>
                <input type="text" name="txtDOB" placeholder="yyyy-mm-dd" value="<?php echo (isset($dob))?$dob:''?>"/></br>
                Hobby: <input type="checkbox" name="cbHobby[]" value="Sport" <?php if(in_array('Sport',$hobbies)) echo 'checked'; ?>/>Sport
                	<input type="checkbox" name="cbHobby[]" value="Music" <?php if(in_array('Music',$hobbies)) echo 'checked'; ?>/>Music
                	<input type="checkbox" name="cbHobby[]" value="Art" <?php if(in_array('Art',$hobbies)) echo 'checked'; ?>/>Art<br>
                <input type="file" name="flProfileImg"/>
                <p class="errorText">
                <?php
					if(!empty($run_flag)){
						if(empty($name) || empty($dob)){
							$run_flag = 0;
							echo "Các trường phải được nhập đầy đủ<br>";
						}
						if(isset($file) && !getimagesize($file)){
							$run_flag = 0;
							echo "Không phải là file ảnh<br>";
						}
						if($run_flag == 1){
							if(isset($file)) $acc->upload_image($file,$imgName);
							$acc->update_info($name,$dob,$imgName,$hobby,$_SESSION['user']['email']);
							header('location:UserProfile.php');
						}
                    }
                ?>
                </p>
                <input type="submit" name="btnSubmit" value="Cập nhật"/> 
            </form>
        </div>
    </div>
</body>
</html>