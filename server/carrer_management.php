<?php 
require_once("Model/carrer_management_model.php");

if(isset($_POST['Submit']) && $_POST['Submit']=='Insert'){
	$condition=true;
	if($condition){
		$name=$_POST['Name'];
		$email=$_POST['Email'];
		$phone=$_POST['Phone'];
		$gender=$_POST['Gender'];
		$date_of_birth=$_POST['Birthday_day'].'-'.$_POST['Birthday_month'].'-'.$_POST['Birthday_year'];
		$address=$_POST['Address'];
		$qualification=$_POST['Qualification'];
		$position=$_POST['Position'];
		$department=$_POST['Department'];
		$job_salary=$_POST['Job_Salary'];
		$job_experience=$_POST['Job_Experience'];
		$job_description=$_POST['Job_Description'];
		
		$img=$_FILES['Img']['tmp_name'];
		$img_name="cv_img_".uniqid().".jpg";
		move_uploaded_file($img,"Uploads/carrer/images/".$img_name);

		$file=$_FILES['Cv_Form']['tmp_name'];
		$file_name=$_FILES['Cv_Form']['name'];
		move_uploaded_file($file,"Uploads/carrer/cv_form/".$file_name);

		$carrer=carrer::Create([
				'name'=>$name,
				'email'=>$email,
				'phone'=>$phone,
				'gender'=>$gender,
				'date_of_birth'=>$date_of_birth,
				'address'=>$address,
				'qualification'=>$qualification,
				'position'=>$position,
				'department'=>$department,
				'job_salary'=>$job_salary,
				'job_experience'=>$job_experience,
				'job_description'=>$job_description,
				'img'=>$img_name,
				'cv_form'=>$file_name,
				'status'=>0
			]);
		if($carrer){
			echo "Insert Successfully";
		}else{
			echo "Insert fail";
		}
	}
	
}

if(isset($_GET['del_id'])){
	$id=$_GET['del_id'];
	

	$carrer=mysqli_fetch_object(carrer::Where('id',$id));

	$img=$carrer->img;
	$file=$carrer->cv_form;
	
	

	$del_carrer=carrer::Delete('id',$id);
	if($del_carrer){
		echo "delete successfully";
	}else{
		echo "fail";
	}

	header("location:../public/admin/carrer_confirm.php");

	
}

if(isset($_GET['interview_id'])){
	$id=$_GET['interview_id'];
	
	$carrer=carrer::Update('id',$id,[
				'status'=>'2',
		]);
	if($carrer){
		echo "Update successfully";
	}else{
		echo "fail";
	}
	header("location:../public/admin/carrer_interview_list.php");
}

if(isset($_GET['cancel_interview_id'])){
	$id=$_GET['cancel_interview_id'];
	
	$carrer=carrer::Update('id',$id,[
				'status'=>'0',
		]);
	if($carrer){
		echo "Update successfully";
	}else{
		echo "fail";
	}
	header("location:../public/admin/carrer_interview_list.php");
}

if(isset($_GET['confirm_id'])){
	$id=$_GET['confirm_id'];
	
	$carrer=carrer::Update('id',$id,[
				'status'=>'1',
		]);
	if($carrer){
		echo "Update successfully";
	}else{
		echo "fail";
	}
	header("location:../public/admin/carrer.php");
}
 ?>


 
