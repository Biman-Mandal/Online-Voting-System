<?php 
	class DB
    {
		protected $con;
		public function __construct(){
	 		ob_start();
			$this->con=mysqli_connect('localhost','root','', 'OnlineVoting_DB');
		}
	}
	class Helper_Class extends DB
    {
		private $table;
		private $Email;
		public function insert_data(array $data_array)
        {
				$this->table=$data_array['table'];
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
		 		 $run=mysqli_query($this->con,$sql);
	 			 return $run;
		}

		public function updateData(array $data)
        {
			$this->table=$data['table'];
	 		$count=count($data[0]);
	 		$i=1;
	 		if (isset($data[0]['token'])) {
	 			$token=$data[0]['token'];
	 			$sql="update ".$this->table." set status=1 ";
	 		}else{
	 			 $sql="update ".$this->table." set ";
	 		}
	 		$sql1="where ";
	 		foreach($data[0] as $key=>$value){
	 			if($i==1){
	 				$sql1=$sql1.$key."='".$value."'";
	 			}
	 			elseif($i==$count){
	 				$sql=$sql.$key."='".$value."' ";
	 			}
	 			else{
	 				$sql=$sql.$key."='".$value."',";
	 			}
	 			$i++;
	 		}
	 		$sql=$sql.$sql1;
	 		$qry=mysqli_query($this->con,$sql);
	 		return $qry;
		}
		
		public function viewData(array $data)
        {
			$this->table=$data['table'];
 			$sql="select * from ".$this->table;
 			$rs=mysqli_query($this->con,$sql);
 			return $rs;
		}
		
		public function VoteCount($data)
        {
			$sql="select * from votingtable where vote='$data'";
			$Run=mysqli_query($this->con,$sql);
			$count=mysqli_num_rows($Run);
			return $count;
		}

		public function uniqueData($data_array)
        {
			$this->table=$data_array['table'];
			$data = $data_array['data'];
			$qry="select * from " .$this->table." where " . $data_array['Column'] ."='$data'";
			$run=mysqli_query($this->con,$qry);
			return $run;
		}
	}