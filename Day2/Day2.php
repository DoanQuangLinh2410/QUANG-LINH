<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php 
        include('Control.php');
		$acc = new Account();
    ?>
    <meta charset="utf-8" />
    <title>Bài tập thực hành buổi 2</title>
    <link rel="stylesheet" type="text/css" href="Day2.css"/>
</head>
<body>
    <div class="content">
        <div class="leftCol">
            <img src="Jellyfish.jpg" width="300px"/>
        </div>
        <div class="rightCol">
            <form method="post">
                <h4>Create An Account.</h4>
				<?php
                    if(isset($_POST['btnSubmit'])){
                        $run_flag = 1;
                        $email = $_POST['txtEmail'];
                        $pwd = $_POST['txtPwd'];
                        $rePwd = $_POST['txtRePwd'];
					}
				?>
                <input type="text" name="txtEmail" placeholder="Email" value="<?php echo (isset($email))?$email:''?>"/>
                <input type="password" name="txtPwd" placeholder="Password"/>
                <input type="password" name="txtRePwd" placeholder="Password Confirm"/><br>
                <input type="checkbox" name="cbConfirm"/>Tôi đồng ý với các điều khoản<br>
                <p class="errorText">
                <?php
					if(!empty($run_flag)){
						if(empty($email) || empty($pwd) || empty($rePwd)){
							$run_flag = 0;
							echo "Các trường phải được nhập đầy đủ<br>";
						}
						if(strcmp($pwd,$rePwd) != 0){
							$run_flag = 0;
							echo "Mật khẩu không giống nhau<br>";
						}
                        if(!isset($_POST['cbConfirm'])){
							$run_flag = 0;
							echo "Bạn cần phải đồng ý với các điều khoàn để đăng ký<br>";
						}
						if($acc->SelectUser($email)>0){
							$run_flag = 0;
							echo "Email này đã được dùng để đăng ký<br>";
						}
						if($run_flag == 1){
							$acc->AddUser($email,$pwd);
						}
                    }
                ?>
                </p>
                <input type="submit" name="btnSubmit" value="Đăng ký"/>
            </form>
        </div>
    </div>
</body>
</html>