<?php 
@require_once('Model/blog_comment_management_model.php');
@require_once('Model/blog_management_model.php');


	if(isset($_POST['Submit'])){
		$name=$_POST['Name'];
		$email=$_POST['Email'];
		$comment=$_POST['Comment'];
		$blog_id=$_POST['Blog_Id'];
		$blog_comment=blog_comment::Create([
				'name'=>$name,
				'email'=>$email,
				'comment'=>$comment,
				'blog_id'=>$blog_id

			]);
		if($blog_comment){
			echo "success";
		}
		
	}
	if(isset($_POST['Publish'])){
		$id=$_POST['id'];
		$blog_comment=blog_comment::Update('id',$id,[
				'status'=>1,

			]);
		if ($blog_comment) {
			echo "success";
		}
	}
?>