<?php
	include('Connect.php');
	
	class Account{
		public function add_user($email,$pwd){
			global $conn;
			$sql="insert into User values('$email','$pwd')";
			$run=mysqli_query($conn,$sql);
			return $run;
		}
		public function check_user($email){
			global $conn;
			$sql="select * from user where email='$email'";
			$run=mysqli_query($conn,$sql);
			$num=mysqli_num_rows($run);
			return $num;
		}
		public function login($email){
			global $conn;
			$sql="select * from user where email='$email'";
			$run=mysqli_query($conn,$sql);
			$data=array();
			if($run){
				while($rows=mysqli_fetch_array($run)){
					$data[]=$rows;
				}
			}
			return $data;
		}
		public function upload_image($file,$name){
			$up=move_uploaded_file($file,"img/".$name);
			return $up;
		}
		public function sel_info($session){
			global $conn;
			$sql="select * from userDetail where email='$session'";
			$run=mysqli_query($conn,$sql);
			if(mysqli_num_rows($run)<=0){
				$sql="insert into userdetail(Email) values ('$session')";
				$run2=mysqli_query($conn,$sql);
			}
			$data=array();
			if($run){
				while($rows=mysqli_fetch_array($run)){
					$data[]=$rows;
				}
			}
			return $data;
		}
		public function update_info($name,$dob,$image,$hobby,$session){
			global $conn;
			$sql="update userdetail set
					Name = '$name',
					DOB = '$dob',
					Image = '$image',
					Hobby = '$hobby'
					 Where Email = '$session'";
			if(mysqli_query($conn, $sql)){
				return 0;
			}
			return 1;
		}
	}
?>