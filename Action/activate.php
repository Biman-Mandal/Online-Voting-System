<?php 
	require_once('../Config/helper_class.php');
	if (isset($_GET)) {
		$data_array=["table"=>"profiles"];
		array_push($data_array, $_GET);
		$obj=new helper_class;
		// echo "<pre>";
		// print_r($data_array);
		$activateAccount=[	'table'=>'profiles',
							'Column'=>'token',
					  		'Data'=>$data_array[0]['token']
					];
		// die();
		$viewData=$obj->ViewDataFetch($activateAccount);
		$row=mysqli_num_rows($viewData);
		if ($row > 0) {
		
		while ($data=mysqli_fetch_assoc($viewData)) {
		
		if ($data['status']==0) {
			
				// print_r($data_array);
				$UpdateData=$obj->updateData($data_array);
				// $DeleteData=$obj->
				// exit();
				// die();
				setcookie("ActivateAccount","Your Account has been activated please enter your email and password for login.",time()+20,'/');
					?>
				<h3 style="color: skyblue;letter-spacing: 2px;" id="ActivateAccount">Your Account is going to activate in 4s please wait.......<span ></span></h3>
					<?php					
				
		}elseif ($data['status']==1) {
				setcookie("AllreadyActivated","Your Account is allready activated please enter your email and password for login.",time()+20,'/');
					header("location: ../index.php");
		}
				}
		}else{
			setcookie("DontHaveAccountActivate","You don't have an account please create an account.",time()+20,'/');
					header("location: ../signUpPage.php");
		}
	}
		


 ?>


 <script type="text/javascript" src="../js/signup.js"></script>