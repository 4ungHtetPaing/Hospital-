<?php include 'common/header.php';?>
<?php include 'common/banner.php';?>

	<div class="container mb50">
		<h1 class="mb20">Our Blog</h1>
		<div class="row">
			
			<div class="col-md-9">
				<?php require_once "../server/blog_management.php";
					$pg=1;
					if(isset($_GET['pg'])){
						$pg=$_GET['pg'];
					}
					$blog=blog::Order_By_Limit('id','desc',"$pg,3");
					while ($row=mysqli_fetch_object($blog)) :
				?>

				<div class="row mb20">
					<div class="col-md-6 p0">
					<img src="../server/Uploads/Blog/<?= $row->img?>" alt=""  class="blogimg">
					</div> 
					<dic class="col-md-6 p30 bd bdg">
						<h3><?= $row->title?><br><i class="f15"><?= date('d M Y',strtotime($row->created_at)) ?></i></h3>
						<p class="lineheight2"><?= $row->article?></p>
						<button type="button" class="btn btn-outline-success "><a href="blog_detail.php?detail_id=<?= $row->id?>">Read More</a></button>
					</dic>
				</div>
				<?php		
					endwhile;
				?>
			</div>
			<div class="col-md-3">
			
              <form class="form-inline  ">
                <input class="form-control col-10 bdg" type="text" placeholder="Search">
                <button class="btn btn-outline-success  col-2" type="submit"><i class="fas fa-search"></i></button>
                </form>
              <div class="list-group m32 mb20">
                <button type="button" class="list-group-item list-group-item-action  bdg">
                    Category
                </button>
                <button type="button" class="list-group-item list-group-item-action bdg">Dapibus ac facilisis in</button>
                <button type="button" class="list-group-item list-group-item-action bdg">Morbi leo risus</button>
                <button type="button" class="list-group-item list-group-item-action bdg">Porta ac consectetur ac</button>
                <button type="button" class="list-group-item list-group-item-action bdg" disabled="">Vestibulum at eros</button>
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
		<nav aria-label="Page navigation example">
				  <ul class="pagination justify-content-center">
				    <li class="page-item">
				         <a class="page-link" href="#" aria-label="Previous">
				           <span aria-hidden="true">&laquo;</span>
				           <span class="sr-only">Previous</span>
				         </a>
				       </li>
				       <?php 
				       		$blog=blog::All();
				       		$i=mysqli_num_rows($blog);
				       		$pg_page=ceil($i/3);
				       		for($n=1;$n<=$pg_page;$n++):
				       	?>
				       	
				       <li class="page-item"><a href="?pg=<?=$n?>" class="page-link" ><?=$n?></a></li>
				       	<?php		
				       		endfor;
				        ?>
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
