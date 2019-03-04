<?php 
	if(isset($_GET['detail_id']) && !empty($_GET['detail_id'])){
		require_once "../server/event_management.php";
		$id=$_GET['detail_id'];
		$event=event::Where('id',$id);
	
	}else{
		die();
	}	
?>					
<?php include 'common/header.php';?>
<?php include 'common/banner.php';?>

	<div class="container mb50">
		<h1 class="mb20 p0">Our Event</h1>
		<div class="row">
			
			<?php $row=mysqli_fetch_object($event) ?>
			<div class="col-md-9">
				<div class="row mb20">
					<div class="col-md-12 p0">
					<img src="../server/Uploads/Event/<?= $row->img;?>" alt=""  class="blogimg">
					</div> 
					<div class="col-md-12 p20">
						<h3><?= $row->title?><br><span class="f15 date">22.7.2018</span></h3>
						<p class="lineheight2"><?= $row->description?></p>
						<button type="button" class="btn btn-outline-success ">Previous</button>
						<button type="button" class="btn btn-outline-success float-right">Next</button>
					</div>
				</div>
				
			</div>
			<div class="col-md-3">

              <div class="list-group  mb20">
                <?php $event=event::All();
                	while ($row=mysqli_fetch_object($event)) {
                	
                 ?>
                <a href="event_detail.php?detail_id=<?=$row->id ?>" class="list-group-item list-group-item-action bdg" <?php echo ($id==$row->id)?"style='cursor:not-allowed;'":" "; ?> >
                	<?php $str=$row->title;
                             echo (strlen($str)<25)?$str:substr($str,0,25)." ....";
                    ?>
                </a>
               
                <?php 
                	}
                 ?>
              </div>

                <div>
                	<h3>Previous Event</h3>
                	
                	<div class="col-md-12 p0"> 
                	            <img class="" src="images/blog_head.jpg" alt="" style="width: 100%;">

                	           <div class="text_heading2">
                	                <h4>Event Heading</h4>
                	               <p>Lorem ipsum dolor sit amet,</p>
                	           </div>
                	</div>
                	</div>
                </div>
				       
			</div>
		</div>
	</div>
	
<?php include 'common/footer.php';?>
