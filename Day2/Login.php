<!DOCTYPE HTML>
<html>
<head>
	<?php 
        include('Control.php');
		$acc = new Account();
		session_start();
		if(!empty($_SESSION['user'])){
			if(strcmp($_SESSION['user']['isAdmin'],"0")==0)
				header("location:admin.php");
			else header('location:UserProfile.php');
		}
    ?>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="Day2.css"/>
</head>
<body>
	<div class="content login">
    	<h4>Đăng nhập</h4>
        <form method="post" action="Login.php">
            <input type="text" name="txtEmail" class="textInput" placeholder="Email"/></br>
            <input type="password" name="txtPwd" class="textInput" placeholder="Password"/></br>
            <input type="submit" name="btnLogin" class="btnLogin" value="Login"/></br>
            <input type="submit" name="btnRegister" class="btnRegis" value="Register"/>
        </form>
        <p class="errorText">
		<?php
			if(isset($_POST['btnRegister'])){
				header('location:Register.php');
			}
            if(isset($_POST['btnLogin'])){
                $email = $_POST['txtEmail'];
                $pwd = $_POST['txtPwd'];
                $run_flag = 1;
                $accounts = $acc->login($email);
                if(!empty($run_flag)){
                    if(empty($email) || empty($pwd)){
                        $run_flag = 0;
                        echo "Các trường phải được nhập đầy đủ<br>";
                    }
                    if(empty($accounts)){
                        $run_flag = 0;
                        echo "Không tìm thấy địa chỉ email<br>";
                    }
                    if($run_flag == 1){
                        foreach($accounts as $account){
                            if(strcmp($account['pwd'],$pwd) == 0){
                                $_SESSION['user'] = $account;
								echo $_SESSION['user']['isAdmin'];
								if(strcmp($_SESSION['user']['isAdmin'],"0")==0)
									header("location:admin.php");
                               	else header("location:userProfile.php");
                            }
                            echo "Mật khẩu không đúng<br>";
                        }
                    }
                }
            }
        ?>
        </p>
    </div>
</body>
</html>