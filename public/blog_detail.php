<?php 
	if(isset($_GET['detail_id']) && !empty($_GET['detail_id'])){
		require_once "../server/blog_management.php";
		$id=$_GET['detail_id'];
		$blog=blog::Where('id',$id);
	
	}else{
		die();
	}	
?>	
<?php include 'common/header.php';?>
<?php include 'common/banner.php';?>

	<div class="container mb50">
		<h1 class="mb20 p0">Our Blog</h1>
		<?php 
			while($row=mysqli_fetch_object($blog)):
		 ?>
		<div class="row">
			
			<div class="col-md-9">
				<div class="row mb20">
					<div class="col-md-12 p0">
					<img src="../server/Uploads/Blog/<?= $row->img?>" alt=""  class="blogimg">
					</div> 
					<div class="col-md-12 p20">
						<h3><?= $row->title?><br><i class="f15"><?= date('d.M.Y',strtotime($row->created_at)) ?></i></h3>
						<p class="lineheight2">
							<?= $row->article?>
						</p>
						<button type="button" class="btn btn-outline-success ">Previous</button>
						<button type="button" class="btn btn-outline-success float-right">Next</button>
					</div>
				</div>
				
			</div>
			<div class="col-md-3">
			
              <form class="form-inline  ">
                <input class="form-control col-10 bdg" type="text" placeholder="Search">
                <button class="btn btn-outline-success  col-2" type="submit"><i class="fas fa-search"></i></button>
                </form>
              <div class="list-group m32 mb20">

                   <?php $blog=blog::All();
	                	while ($row=mysqli_fetch_object($blog)) {
	                	
	                 ?>
	                <a href="blog_detail.php?detail_id=<?=$row->id ?>" class="list-group-item list-group-item-action bdg" <?php echo ($id==$row->id)?"style='cursor:not-allowed;'":" "; ?> >
	                	<?php $str=$row->title;
	                             echo (strlen($str)<25)?$str:substr($str,0,25)." ....";
	                    ?>
	                </a>
	               
	                <?php 
	                	}
	                 ?>
              </div>

                <div>
                	<h3>Recent Post</h3>
                	
                	<div class="col-md-12 p0"> 
                	            <img class="" src="images/blog_head.jpg" alt="" style="width: 100%;">

                	           <div class="text_heading2">
                	                <h4>Blog Heading</h4>
                	               <p>Lorem ipsum dolor sit amet,</p>
                	           </div>
                	</div>
                	</div>
                </div>
				       
			</div>
		</div>
		<?php
			endwhile;
		?>
	</div>
	<div id="command">
		<div class="container">

			<div class="row col-md-9">
				<h3 class="col-12 p0 mb20">Comment</h3>
				<p>User Name | REPLY</p>
				<p class="lineheight hr">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste error accusamus placeat velit labore quod ullam natus et provident. Atque, deserunt quae rerum distinctio sunt, totam aperiam placeat voluptate, beatae obcaecati fuga molestias dignissimos non.</p>

				<div class="row col-md-9 offset-md-1">
					<p>User Name | REPLY </p>
					<p class="lineheight2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste error accusamus placeat velit labore quod ullam natus et provident. Atque, deserunt quae rerum distinctio sunt, totam aperiam placeat voluptate, beatae obcaecati fuga molestias dignissimos non.</p>
				</div>
			</div>
		</div>
		
	</div>
	<div class="container pb50">

		<form class="col-9" method="post" action="../server/blog_comment_management.php">
			<h3 class="col-12 p0 mb20">Leave comment</h3>
			<div class="row">
			      <div class="form-group col-md-6 ">
			        <label for="First Name">Name</label>
			        <input type="text" class="form-control" id="Name" placeholder="write your first name" name="Name">
			      </div>
			      
			      <div class="form-group col-md-6 ">
			        <label for="email">Email</label>
			        <input type="email" class="form-control" id="email" placeholder="write your email" name="Email">
			      </div>
			     
			      <div class="form-group col-md-12">
			        <label for="Comment">Comment</label>
			        <textarea class="form-control" name="Comment" id="Comment" rows="3" ></textarea>
			      </div>
			      <input type="hidden" name="Blog_Id" value="<?=$id?>">
			      <button type="submit" class="btn btn-outline-success col-md-2 btn_design"
			      name="Submit">Submit</button>
			</div>
		</form>  
	</div>
<?php include 'common/footer.php';?>
