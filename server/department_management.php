
<?php 
@require_once('Model/department_management_model.php');

if(isset($_POST['Submit']) && $_POST['Submit']=="Insert"){
	if(!empty($_POST['Department_Name'])&&!empty($_FILES['Img'])){

		$department_name=$_POST['Department_Name'];
		$file=$_FILES['Img']['tmp_name'];
		$img_name=$department_name.'_'.uniqid().'.jpg';
		$description=$_POST['Description'];

		move_uploaded_file($file,"Uploads/Department/".$img_name);
		$department=department::Create([
						'department_name'=>$department_name,
						'img'=>$img_name,
						'description'=>$description,
			]);
		if($department){
			echo "Insert successfully";
		}else{
			echo "Insert fail";
		}

	}
}


if(isset($_GET['Del_id'])){
   $id=$_GET['Del_id'];

   $department=department::Delete('id',$id);
   if($department){
   	echo "Deleted successfully";
   }else{
   	echo "Delete fail";
   }
}

if(isset($_POST['Update']) && $_POST['Update']=="UpdateDepartment"){
	$department_name=$_POST['Department_Name'];
	$department_description=$_POST['Department_Description'];

	$id=$_POST['Id'];
	$tmp_name=$_FILES['Img']['tmp_name'];
	if($tmp_name!=''){
		$del_filename=mysqli_fetch_object(department::Where('id',$id))->img;
		unlink('Uploads/Department/'.$del_filename);

		$img_name=$department_name.'_'.uniqid().'.jpg';
		move_uploaded_file($tmp_name,"Uploads/Department/".$img_name);
		department::Update('id',$id,[

				'img'=>$img_name,
		]);

	}

	$department=department::Update('id',$id,[
				"department_name"=>$department_name,
				"description"=>$department_description
		]);

	if($department){
		echo "Update successfully";
	}else{
		echo "Updated fail";
	}
	

}

 ?>
