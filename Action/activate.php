<?php
	require_once('../Config/helper_class.php');
	if (isset($_GET)) {
		$data_array=["table"=>"profiles"];
		array_push($data_array, $_GET);
		$obj=new helper_class;
		$activateAccount=[	'table'=>'profiles',
							'Column'=>'token',
					  		'data'=>$data_array[0]['token']
					];
		$viewData = $obj->uniqueData($activateAccount);
		$row=mysqli_num_rows($viewData);
		if ($row > 0) {
		while ($data=mysqli_fetch_assoc($viewData)) {
		if ($data['status'] == 0) {
				$UpdateData=$obj->updateData($data_array);
				?>
                <h3 style="color: skyblue; letter-spacing: 2px;" id="ActivateAccount">Processing...</h3>
               <?php
				setcookie("ActivateAccount","Your Account has been activated please enter your email and password for login.",time()+20,'/');
                }elseif ($data['status']==1) {
                        setcookie("AllreadyActivated","Your Account is already activated please enter your email and password for login.",time()+20,'/');
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