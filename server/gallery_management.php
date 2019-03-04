<?php 
@require_once('Model/gallery_management_model.php');

if(isset($_POST['Submit']) && $_POST["Submit"]==='add_gallery'){

	if(!empty($_POST['Title']) && !empty($_POST['Description']) && !empty($_FILES['Img']))
	{
		$tmp_name=$_FILES['Img']['tmp_name'];
		$img_name="Gallery_image_".uniqid().'.jpg';
		$size=$_FILES['Img']['size'];
		move_uploaded_file($tmp_name,"Uploads/Gallery/".$img_name);	

		$title=$_POST['Title'];
		$description=$_POST['Description'];
		$gallery=gallery::Create([
				'title'=>$title,
				'description'=>$description,
				'img'=>$img_name,
			]);
			if($gallery){
				echo "upload successfully";
			};
	}else{
		die("upload fail");
	}
	
}

if(isset($_GET['del_id']) && !empty($_GET['del_id'])){
	$id=$_GET['del_id'];
	$image=mysqli_fetch_object(gallery::Where('id',$id))->img;
	unlink("Uploads/Gallery/".$image);

	$gallery=gallery::Delete('id',$id);
	if($gallery){
		echo "deleted successfully";
	}else{
		echo "delete fail";
	}
}

if(isset($_POST['Update']) && $_POST['Update']=="UpdateGallery"){
	$title=$_POST['Title'];
	$text=$_POST['Text'];
	$id=$_POST['Id'];
	$tmp_name=$_FILES['Img']['tmp_name'];
	if($tmp_name!=''){
		$del_filename=mysqli_fetch_object(gallery::Where('id',$id))->img;
		unlink('Uploads/Gallery/'.$del_filename);

		$img_name="Gallery_image_".uniqid().'.jpg';
		move_uploaded_file($tmp_name,"Uploads/Gallery/".$img_name);
		gallery::Update('id',$id,[
				'img'=>$img_name,
		]);

	}

	$gallery=gallery::Update('id',$id,[
				'title'=>$title,
				'description'=>$text,

		]);

	if($gallery){
		$gallery=gallery::Where('id',$id);
	    $row=mysqli_fetch_object($gallery);
	    echo json_encode($row);
	}else{
		echo "Updated fail";
	}
	

}



 ?>