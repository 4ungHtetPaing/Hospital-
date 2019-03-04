<?php include 'common/header.php';?>
<?php include 'common/banner.php';?>
<div class="appoitment_buttom ">
	<a href="appoitment.php">
	<i class="fas fa-clipboard-list"></i><br>
	Book Your Appoitment</a>
</div>
	<div class="container mb50 mt8" id="department">
		<div class="row">
			<h3 class="col-12">Our Department
			    <div class="input-group col-lg-4 col-xs-12 float-right">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-outline-secondary" type="button">Go!</button>
                  </span>
                </div>
			</h3>
		</div>
		<div class="row mt8">
			<?php 
				require_once("../server/department_management.php");
				$department=department::All();
				if(0!=mysqli_num_rows($department)){
					while($row=mysqli_fetch_object($department)):
			?>
				<div class="col-md-6 col-sm-12 col-xs-12 float-left box mr2 mb20">
			        <div class="col-md-3 float-left">
			            <img src="../server/Uploads/Department/<?= $row->img?>" alt="heart" style="width:100%;height: 100%;">
			        </div>
			        <div class="col-md-9 float-left">
			            <h3><?php echo $row->department_name?></h3>
			            <p class="mb20"><?php echo $row->description?></p>
			             <button type="button" class="btn btn-outline-success btn-lg btn_clf "><a href="appoitment.php">Book Appoitment</a></button>
			        </div>
			    </div>
			<?php		
					endwhile;	
				}else{
					echo "No Post";
				}
			 ?>
		    
		   
        </div>
		

	</div>
	<div class="col-12 bgB text-white p30 ">
		<h1 class="col-12 text-center">More Department</h1>
		<p class="col-md-4 offset-md-4 text-center lineheight">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet nemo repellat provident nostrum similique repudiandae nihil laborum voluptatibus architecto fugit corrupti, vero deserunt obcaecati autem, numquam tempore suscipit sequi hic.
		</p>
		<h1 class="col-12 text-center m0"><button class="btn btn-outline-info text-white" type="button">Contact Us</button></h1>
	</div>
<?php include 'common/footer.php';?>