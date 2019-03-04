<?php 
require_once "Model/event_management_model.php";
if(isset($_POST['Submit']) && $_POST['Submit']=="add_event"){
	$title=$_POST['Title'];
	$description=$_POST['Description'];
	$tmp_name=$_FILES['Img']['tmp_name'];
	$img_name="Event_image_".uniqid().'.jpg';
	$size=$_FILES['Img']['size'];
	move_uploaded_file($tmp_name,"Uploads/Event/".$img_name);

	$event=event::Create([
			'title'=>$title,
			'description'=>$description,
			'img'=>$img_name
		]);
	if($event){
		echo "successfully";
	}else{
		echo "fail";
	}		
}

if(isset($_POST['Update']) && $_POST['Update']=="UpdateEvent"){
	$title=$_POST['Title'];
	$description=$_POST['Description'];
	$id=$_POST['Id'];
	
	$file=$_FILES['Img']['tmp_name'];
			if($file!=''){
				$del_filename=mysqli_fetch_object(event::Where('id',$id))->img;
				unlink('Uploads/Event/'.$del_filename);

				$img_name='Event_image_'.uniqid().'.jpg';
				move_uploaded_file($file,"Uploads/Event/".$img_name);
				event::Update('id',$id,[

						'img'=>$img_name,
				]);

			}
	$event=event::Update('id',$id,[
			'title'=>$title,
			'description'=>$description,

	]);

	if($event){
		echo "successfully";
	}		
}

if(isset($_GET['Del_id'])){
	$id=$_GET['Del_id'];
	$del_filename=mysqli_fetch_object(event::Where('id',$id))->img;
	unlink('Uploads/Event/'.$del_filename);
	$event=Event::Delete('id',$id);
	if($event){
		echo "successfully";
	}else{
		echo "fail";
	}
}


 ?>
