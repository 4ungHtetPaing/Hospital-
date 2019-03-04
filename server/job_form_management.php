<?php 
require_once "Model/job_form_management_model.php";
if(isset($_POST["Submit"]) && $_POST["Submit"]=="Insert"){
	$condition=true;
	if($condition){
		$department_id=$_POST['Department_Id'];
		$job_salary=$_POST['Job_Salary'];
		$job_position=$_POST['Job_Position'];
		$job_description=$_POST['Job_Description'];
		$job_vacancy=$_POST['Job_Vacancy'];
		$last_date_of_cv=$_POST['Day']."-".$_POST['Month']."-".$_POST['Year'];

		$job_form=job_form::Create([
					'department_id'=>$department_id,
					'job_position'=>$job_position,
					'job_salary'=>$job_salary,
					'job_description'=>$job_description,
					'job_vacancy'=>$job_vacancy,
					'last_date_of_cv'=>$last_date_of_cv

			]);

		if($job_form){
			echo "successfully";
		}else{
			echo "fail";
		}
	}
}

if(isset($_GET['id'])){
	$id=$_GET['id'];
	$job_form=job_form::Where('id',$id);
	$row=mysqli_fetch_object($job_form);
			 
	 echo json_encode($row);
}

if(isset($_GET['del_id'])){
	$id=$_GET['del_id'];
	$job_form=job_form::Delete('id',$id);
	if($job_form){
		echo "delete_successfully";
	}else{
		echo "fail";
	}

	header("location:../public/admin/job_form.php");
	
}	

 ?>
