<?php 
@require_once('Model/blog_management_model.php');

if(isset($_POST['Submit']) && $_POST['Submit']=="Insert"){
	$condition=!empty($_POST['Title']) && !empty($_POST['Article']) && !empty($_POST['Author']) && !empty($_POST['Category_Id']) && !empty($_FILES['Img']);
		if($condition){
			$title=$_POST['Title'];
			$author=$_POST['Author'];
			$article=$_POST['Article'];
			$category_id=$_POST['Category_Id'];
			$file=$_FILES['Img']['tmp_name'];
			$img_name="Blog_image_".uniqid().'.jpg';
			move_uploaded_file($file,"Uploads/Blog/".$img_name);

			$blog=blog::Create([
						"category_id"=>$category_id,
						"title"=>$title,
						"author"=>$author,
						"article"=>$article,
						"img"=>$img_name,

				]);
			if($blog){
				echo "Insert Successfully";
			}else{
				echo "Fail";
			}

		}else{
			echo "Something went wrong";
		}
	
		
}
if(isset($_GET['del_id'])){
	$id=$_GET['del_id'];
	$del_filename=mysqli_fetch_object(blog::Where('id',$id))->img;
	unlink('Uploads/Blog/'.$del_filename);
	$blog=blog::Delete('id',$id);
	if($blog){
		echo "successfully";
	}else{
		echo "fail";
	}

	header('Location: ../public/admin/view_blog.php');
}

if(isset($_POST['Submit']) && $_POST['Submit']=="Update"){
			$id=$_POST['id'];
			$title=$_POST['Title'];
			$author=$_POST['Author'];
			$article=$_POST['Article'];
			$category_id=$_POST['Category_Id'];
			$file=$_FILES['Img']['tmp_name'];
			if($file!=''){
				$del_filename=mysqli_fetch_object(blog::Where('id',$id))->img;
				unlink('Uploads/Blog/'.$del_filename);

				$img_name='Blog_image_'.uniqid().'.jpg';
				move_uploaded_file($file,"Uploads/Blog/".$img_name);
				blog::Update('id',$id,[

						'img'=>$img_name,
				]);

			}
			
			$blog=blog::Update('id',$id,[
						"category_id"=>$category_id,
						"title"=>$title,
						"author"=>$author,
						"article"=>$article,
						

				]);
			header('Location: ../public/admin/view_blog_detail.php?detail_id='.$id);
}


?>
