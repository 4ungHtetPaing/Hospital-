<?php 
@require_once('Model/blog_category_management_model.php');
@require_once('Model/blog_management_model.php');

if(isset($_POST['Submit']) && $_POST['Submit']=="Insert"){
	$category_name=$_POST['Category_Name'];
	$blog_category=blog_category::Create([
					'category_name' => $category_name
		]);
	if($category_name){
		echo "Insert Successfully";

	}else{
		echo "fail";
	}
	header("location:../public/admin/add_blog_category.php");	
}

if(isset($_GET['Del_id'])){
	$id=$_GET['Del_id'];
	$blog=blog::Where('category_id',$id);
	if(mysqli_num_rows($blog)!=0){
		$del_filename=mysqli_fetch_object($blog)->img;
		if(file_exists("Uploads/Blog/".$del_filename)){
			unlink("Uploads/Blog/".$del_filename);
		}

		$blog=blog::Delete('category_id',$id);

	};
	
	
	$blog_category=blog_category::Delete('id',$id);

	if($blog_category && $blog){
		echo "Delete Successfully";
	}else{
		echo "Detete fail";
	}
}

if(isset($_POST["Update"]) && $_POST['Update']=="Cat_Update"){
	$category_name=$_POST["Category_Name"];
	$id=$_POST['Id'];
	$blog_category=blog_category::Update('id',$id,[

				"category_name"=>$category_name

		]);
	if($blog_category){
		echo "Successfully Update";
	}else{
		echo "Update Fails";
	}
}	


?>
