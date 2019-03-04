<?php 
@require_once('Model/duty_management_model.php');

if(isset($_POST['Submit'])){
	$duty=false;
	$condition=true;
	if($condition){

		if(!empty($_POST['Day']) && !empty($_POST['Duty_In']) && !empty($_POST['Duty_Out'])){
				$day=$_POST['Day'];
				$duty_in=$_POST['Duty_In'];
				$duty_out=$_POST['Duty_Out'];
				$carrer_id=$_POST['Carrer_Id'];
				$department_id=$_POST['Department_Id'];
				
				$duty=duty::Create([
						"carrer_id"=>$carrer_id,
						"department_id"=>$department_id,
						"day"=>serialize($day),
						"duty_in"=>serialize($duty_in),
						"duty_out"=>serialize($duty_out)
					]);

			}
	}
	
	if($duty){
		echo "success";
		}else{
			echo "fail";
		}
	header("location:../public/admin/add_duty.php");
	
}

if(isset($_GET['id'])){
   $id=$_GET['id'];
   $duty=duty::Delete('id',$id);
   if($duty){
   	echo "Successfully Delete";
   }else{
   		echo "fail Delete";
   }
}

if(isset($_POST['Update']) && $_POST['Update']='DoUpDaTe'){
		$id=$_POST['Id'];
		$name=$_POST['Name'];
		$department=$_POST['Department'];
		$appoiment=$_POST['Appoiment'];
		$schedule=$_POST['Schedule'];
		$duty_time=$_POST['Duty_Time'];
		$update=duty::Update('id',$id,[
				'name'=>$name,
				'department'=>$department,
				'appoiment'=>$appoiment,
				'schedule'=>$schedule,
				'duty_time'=>$duty_time
			]);
		if($update){
			 $duty=duty::Where('id',$id);
			 $row=mysqli_fetch_object($duty);
			 
			 echo json_encode($row);
		}else{
			echo('fail update');
		}
}

 ?>