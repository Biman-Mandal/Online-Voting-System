<?php 
	include('../Config/helper_class.php');
	$data_array=['table'=>'profiles'];
	$data_array1=['table'=>'votingtable'];
	$obj=new helper_class;
	array_push($data_array1, $_POST);
	echo "<pre>";
	print_r($data_array1);
	$EmailCheckData=[ 'table'=>'votingtable',
               	'Column'=>'Email',
                'Data'=> $data_array1[0]['Email']
          ];
  	$data1=$obj->ViewDataFetch($EmailCheckData);
	// die();
	// $data1=$obj->loginCheck($data_array1);
	
	$row=mysqli_num_rows($data1);
	if ($row==0){
		
	array_push($data_array, $_POST);
	array_pop($data_array[0]);
	array_pop($data_array[0]);

	$data_array[0]['VoteStatus']="Voted";
	
	$data=$obj->updateData($data_array);
	if ($data) {
		$data_array2=['table'=>'votingtable'];
		array_push($data_array2, $_POST);
		$data2=$obj->insert_data($data_array2);
		if ($data2) {
			setcookie("Vote","Thanks for voting.",time()+2,'/');
		header("Location: ../Main/MainPage.php");	
		}
		
		}
	}elseif($row>0){
		setcookie("Allready_Voted","Already voted. You cant vote another time.",time()+2,'/');
		header("Location: ../Main/MainPage.php");
	}

?>