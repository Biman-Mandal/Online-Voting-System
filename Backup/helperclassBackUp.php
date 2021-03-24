<?php 
	$this->table=$data_array['table'];
			// If there multiple arraypush
			if (isset($data_array[0]) && isset($data_array[1])) {
			foreach ($data_array[1] as $Filekey => $Filevalue) {
				$Filekey;
			}

			// New Name for Image/File
			$File=$data_array[1]['Image'];
			$Filename = $File['name'];
			$File_tmp_name =  $File['tmp_name'];
			$File_new_name = time()."-".rand(1000, 9999).'_'.$Filename;
			$data_array[0][$Filekey]=$File_new_name;

			// Insert Data
			// print_r($data_array);
			$count=count($data_array[0]);
	 		$i=1;
	 		$sql="insert into ".$this->table."(";
	 		$sql1="values(";
	 		foreach($data_array[0] as $key=>$value){
	 			if($i==$count){
	 				$sql=$sql.$key;
	 				$sql1=$sql1."'".$value."'";
	 			}
	 			else{
	 				$sql=$sql.$key.",";
	 				$sql1=$sql1."'".$value."',";
	 			}
	 			$i++;
	 		}

	 		 $sql=$sql.") ".$sql1.")";
	 		// echo "<br>";
	 		// 
	 		
	 		
	 			$FileUpload=move_uploaded_file($File['tmp_name'], "../StoredImage/".$File_new_name);
	 			$run=mysqli_query($this->con,$sql);
	 			return $run;
	 		
	 		
 	
			}else{
			}
// Sign upAction

	if ($Data) {
		// setcookie("Email_Varification_link_true", 'Verification link has been sent to email addresses,Check your email to activate your accout', time()+1000);
		
	}else{
		

	}
	}else{
		setcookie("Email_Varification_link_false", 'Email verification link not send please try again.', time()+10,'/');
		header("Location: ../signUpPage.php");
	}

	}else{
		
	}
// 
	public function Email_Varification(array $data_array){
			
		    // die();
		    if ($mail->send()) {
		    	return true;
		    }else{
		    	return false;
		    }

		      
		}
		// Mail


		<?php 
	use PHPMailer\PHPMailer\PHPMailer;
    require_once '../phpmailer/Exception.php';
    require_once '../phpmailer/PHPMailer.php';
    require_once '../phpmailer/SMTP.php';

	class PHP_MailerClass{
		protected $Email;
		// Private 
		public function Email_Varification(array $data_array){
			$Email=$data_array[0]['Email'];
			$mail = new PHPMailer(true);
		    $mail->isSMTP();
		    $mail->Host = 'smtp.gmail.com';
		    $mail->SMTPAuth = true;
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		    $mail->Port = '587';
		    $mail->SMTPSecure = 'tls';
		    $mail->setFrom('bimanmofficial@gmail.com');
		    $mail->addAddress("$Email");
		    $mail->isHTML(true);
		    $mail->Subject = 'Email Varification link from Online Voting System(MiniProject)';
		    // print_r($data_array[0]);
		    // die();
		    $mail->Body = "Hi,".$data_array[0]['Name'].".Click Here to activate your account http://localhost/onlinevotingsystem(mini)/action/activate.php?token=".$data_array[0]['token'];
		    // die();
		    if ($mail->send()) {
		    	return true;
		    }else{
		    	return false;
		    }

		      
		}
	}

	// Login Action
		/*
	while ($data=mysqli_fetch_assoc($run)) {
		
		if($data['Email']==$data_array[0]['Email']){
			if ($data['status']=='Inactive') {
			setcookie("Login_inactive_Account","You do have to verify your account for login... Please check your email to verify your account.",time()+2,'/');
			header("Location: ../index.php");
			}elseif ($data['status']=='active') {
			$verify = password_verify($data_array[0]['Password'], $data['Password']);
			if ($verify) {
				$_SESSION['Email']=$data_array[0]['Email'];
				$_SESSION['is_login']="true";
				header("Location: ../main/MainPage.php");
			}else{
				setcookie("Login_Pass_Not_Match","The password doesn't match, Please check the password and try again.",time()+2,'/');
				header("Location: ../index.php");
			}
		}else{
			setcookie("Login_Email_Not_Match","You don't have an account please create an account.",time()+2,'/');
			header("Location: ../index.php");
		}
	}
}
	# code...
*/
public function email_checking(array $data_array){
				$this->table=$data_array['table'];
	 			// $Email=$data_array[0]['Email'];
				$Email=$data_array[0]['Email'];
				// exit();
				$qry="SELECT * from $this->table where email='$Email'";
				$Run=mysqli_query($this->con,$qry);
	 			// echo "<br>";
	 			return $Run;
		}
public function activateAccount($data){
			$this->table=$data['table'];
			// echo "<pre>";
			$token= $data[0]['token'];
			$sql="select * from profiles where token='$token'";
			// print_r($data);
			$run=mysqli_query($this->con,$sql);
			return $run;
		}
public function logincheck($data){
			$this->table=$data['table'];
			$Email=$data[0]['Email'];
			$sql="select * from ".$this->table." where Email='$Email'";
			$Run=mysqli_query($this->con,$sql);
			return $Run;
		}
		public function Vote_Profile_Check_Function($data){
			$Token=$data[0]['ProfileToken'];
			$sql="select * from profiles where token='$Token'";
			$Run=mysqli_query($this->con,$sql);
			return $Run;
		}
 ?>