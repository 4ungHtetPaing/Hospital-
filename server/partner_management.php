<?php 
@require_once('Model/partner_management_model.php');

if(isset($_POST['Submit']) && $_POST['Submit']=='add_partner'){
		$file=$_FILES['Img']['tmp_name'];
		$img_name="Partner_image_".uniqid().'.jpg';
		move_uploaded_file($file, "Uploads/Partner/".$img_name);
		$partner=partner::Create([
				'img'=>$img_name,
			]);
		if($partner){
		    header("location:/Hospital/public/admin/partner.php");

		}else{
			echo "error";
		}
}

if(isset($_GET['Del_id'])){
  $id=$_GET['Del_id'];

  $partner=partner::Delete('id',$id);
  if($partner){
  	echo "success";
  }else{
  	echo "fail";
  }

}

?>
