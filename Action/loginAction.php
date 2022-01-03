<?php 
	session_start();
	require_once "../Config/helper_class.php";
	$data_array=['table'=>'profiles'];
	array_push($data_array, $_POST);
	$obj=new helper_class;
	$EmailCheckData=[	'table'=>'profiles',
						'Column'=>'Email',
					  	'data'=>$data_array[0]['Email']
					];
	$run=$obj->uniqueData($EmailCheckData);
	if (mysqli_num_rows($run)>0) {
		while ($data=mysqli_fetch_assoc($run)) {
			echo "hello";
			if ($data['status']==0) {
				setcookie("Login_inactive_Account","You do have to verify your account for login... Please check your email to verify your account.",time()+2,'/');
				header("Location: ../index.php");
			}elseif ($data['status']==1) {
			$verify = password_verify($data_array[0]['Password'], $data['Password']);
			if ($verify) {
				$_SESSION['Email']=$data_array[0]['Email'];
				$_SESSION['is_login']="true";
				header('location:../Main/MainPage.php');
			}else{
				setcookie("Login_Pass_Not_Match","The password doesn't match, Please check the password and try again.",time()+2,'/');
				header("Location: ../index.php");
			    }
			}
		}
	}else{
			setcookie("Login_Email_Not_Match","You don't have an account please create an account.",time()+2,'/');
			header("Location: ../index.php");
	}