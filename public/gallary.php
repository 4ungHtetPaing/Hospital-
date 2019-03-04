<?php include 'common/header.php';?>
<?php include 'common/banner.php';?>
<div class="appoitment_buttom ">
	<a href="appoitment.php">
	<i class="fas fa-clipboard-list"></i><br>
	Book Your Appoitment</a>
</div>
	<div class="container mb50" id="gallary">
		<h1 class="mb20">Our Gallary</h1>
		<div class="row ">
			<?php require_once "../server/gallery_management.php";
				$gallery=gallery::All();
				while($row=mysqli_fetch_object($gallery)){
			 ?>
			<div class=" card col-xs-12 col-sm-12 col-md-4 pl0  mb20">
				
                <div class="col-md-12 p0"> 
    	            <img class="" src="../server/Uploads/Gallery/<?=$row->img;?>" alt="" style="width: 100%;">

    	           <div class="text_heading2 ">
    	                <h4><?=$row->title;?></h4>
    	               <p><?=$row->description;?></p>
    	           </div>
	        	</div>
             
			</div>
			<?php 
				}
			 ?>
		</div>
		<nav aria-label="Page navigation example ">
				  <ul class="pagination justify-content-center">
				    <li class="page-item">
				         <a class="page-link" href="#" aria-label="Previous">
				           <span aria-hidden="true">&laquo;</span>
				           <span class="sr-only">Previous</span>
				         </a>
				       </li>
				       <li class="page-item"><a class="page-link" href="#">1</a></li>
				       <li class="page-item"><a class="page-link" href="#">2</a></li>
				       <li class="page-item"><a class="page-link" href="#">3</a></li>
				       <li class="page-item">
				         <a class="page-link" href="#" aria-label="Next">
				           <span aria-hidden="true">&raquo;</span>
				           <span class="sr-only">Next</span>
				         </a>
				       </li>
				  </ul>
				</nav>
	</div>
<?php include 'common/footer.php';?>