<?php 
require_once('Model/doctor_management_model.php');
require_once('Model/carrer_management_model.php');

if(isset($_POST['Submit'])){

	$name=$_POST['Name'];
	$phone=$_POST['Phone'];
	$qualification=$_POST['Qualification'];
	$specialist=$_POST['Specilist'];
	$department_id=$_POST['Department_Id'];
	$description=$_POST['Description'];
	$img=$_POST['Img'];
	$carrer_id=$_POST['Carrer_Id'];

	$doctor=doctor::Create([
					'name'=>$name,
					'phone'=>$phone,
					'qualification'=>$qualification,
					'specialist'=>$specialist,
					'department_id'=>$department_id,
					'description'=>$description,
					'img'=>$img,
					'carrer_id'=>$carrer_id

		]);
	$carrer=carrer::Update('id',$carrer_id,[
						'name'=>$name,
						'phone'=>$phone,
						'qualification'=>$qualification,
						'department_id'=>$department_id,
						'job_description'=>$description,
						'position'=>'doctor',
						'img'=>$img,
		]);

	if($doctor && $carrer){
		echo "success";
	}else{
		echo "fail";
	}
}

?>
