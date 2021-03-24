<?php 
// Php mailer for email varifiaction

	use PHPMailer\PHPMailer\PHPMailer;
    require_once '../phpmailer/Exception.php';
    require_once '../phpmailer/PHPMailer.php';
    require_once '../phpmailer/SMTP.php';

// Helper class || Model
	
	require_once "../Config/helper_class.php";
	$obj=new Helper_Class;	
	
// Data

	$data_array=array("table"=>"profiles");
	array_push($data_array,$_POST,$_FILES);
	echo "<pre>";
	$token=bin2hex(random_bytes(10));
	$data_array[0]['token']=$token;
	$data_array[0]['status']=0;
	$data_array[0]['VoteStatus']='Not Voted';
	
	
	unset($data_array[0]['RetypePass']);
	$File=$data_array[1]['Image'];
	$Filename = $File['name'];
	$File_tmp_name =  $File['tmp_name'];
	$File_new_name = time()."-".rand(1000, 9999).'_'.$Filename;
	$data_array[0]['Image']=$File_new_name;
	$EmailCheckData=[	'table'=>'profiles',
						'Column'=>'Email',
					  	'Data'=>$data_array[0]['Email']
					];
	// print_r($EmailCheckData);
	// die();
	$EmailChecking=$obj->ViewDataFetch($EmailCheckData);
	
	
	if (mysqli_num_rows($EmailChecking)==0) {
	$Pass=$data_array[0]['Password'];
	$cost=['cost'=>'12'];
	$PassEncry=password_hash($Pass, PASSWORD_BCRYPT,$cost);
	$data_array[0]['Password']=$PassEncry;

	// print_r($data_array);
	// exit();

	$Data=$obj->insert_data($data_array);
	if ($Data) {
			
	move_uploaded_file($File['tmp_name'], "../StoredImage/".$File_new_name);


		// Php mailer email verification

			$Email=$data_array[0]['Email'];
			$mail = new PHPMailer(true);
		    $mail->isSMTP();
		    $mail->Host = 'smtp.gmail.com';
		    $mail->SMTPAuth = true;
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		    $mail->Port = '587';
		    $mail->SMTPSecure = 'tls';
		    $mail->Username='bimanmofficial@gmail.com';
		    $mail->Password='BM06459@21';
		    $mail->setFrom('bimanmofficial@gmail.com');
		    $mail->addAddress("$Email");
		    $mail->isHTML(true);
		    $mail->Subject = 'Email Varification link from Online Voting System(MiniProject)';
		    $mail->Body = "Hi,".$data_array[0]['Name'].".Click Here to activate your account http://localhost/onlinevotingsystem(mini)/action/activate.php?token=".$data_array[0]['token'];
		    $mail->send();
		    	setcookie("Data_success","A verification link has been sent to email addresses, Check your email to activate your account.",time()+10,'/');
				header("Location: ../index.php");

		    
	}else{
		setcookie("Data_error","Error in Data Save.Please Try After Sometime",time()+10,'/');
		header("Location: ../signUpPage.php");
	}
	}elseif (mysqli_num_rows($EmailChecking)>0) {
		setcookie("Email_Validation_false", 'Your email address already exists, Please check your email to verify your account OR Login.', time()+10,'/');
		header("Location: ../index.php");
	}
	

	
	
	

 ?>