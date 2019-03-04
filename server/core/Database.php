<?php 
class Database{
	public $db;
	function __construct(){
		$this->db=@mysqli_connect('localhost','root','','hospital');
		
		if(mysqli_connect_errno()){
				echo 'connection error';
				die();
		}else{

			//echo 'connected';
			
		}
	}

	
}

?>

