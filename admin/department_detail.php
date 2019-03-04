<?php 
	if(isset($_GET['detail_id']) && !empty($_GET['detail_id'])){
		$id=$_GET['detail_id'];
		
	}else{
		header("location:department.php");
		die();

	}
 ?>
<?php include 'include/header.php';?>
  <!-- Navigation-->
  <?php include 'include/sidebar.php';?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active col-11">active<a class="float-right btn btn-outline-secondary" href="add_department.php"> Add Department</a></li>
        
      </ol>
    
     <div class="container-fluid">
     	<hr class="bg-info">
     	<div class="container row">
     		<?php
     			require_once "../server/department_management.php";
     			$department=mysqli_fetch_object(department::Where('id',$id));
     		 ?>
     		<div class="col-md-4">
     			<img src="../server/Uploads/Department/<?= $department->img?>" alt="" width="100%" height="250px">
     		</div>
     		<div class="col-md-8">
     			<hr class="m-0 p-1">
     			<h3 class="text-center">
     				<?= $department->department_name?>&nbsp;&nbsp;(<small>Department</small>)
     			</h3>
     			<hr >
     			<p><?= $department->description?></p>
     		</div>
     	</div>
     	<hr class="bg-info">
     	<?php 
     		
				@require_once("../server/Model/duty_management_model.php");
		        $duty=duty::Where('department_id',$id);
		        if(mysqli_num_rows($duty)!=0){
				
			
     	 ?>
     	<div class="container">
     		<table class="table text-center">
      		  <thead>
      		    <tr>
      		      <th scope="col">no</th>
      		      <th scope="col">Carrer Name</th>
      		      <th scope="col">Day</th>
      		      <th scope="col">Duty In</th>
                <th scope="col">Duty Out</th>
      		       <th scope="col">Manage</th>

      		    </tr>
      		  </thead>
      		  <tbody>
            <?php 
                
                $i=0;
                while ($row=mysqli_fetch_object($duty)){
                  $i++;
             ?>
      		    <tr>
      		      <th scope="row" value="<?= $row->id ?>"><?= $i ?></th>
      		      <td>
                  <?php 
                    $carrer_id=$row->carrer_id;
                    require_once("../server/carrer_management.php");
                    $carrer=mysqli_fetch_object(carrer::Where('id',$carrer_id));
                  ?>
                      <?=$carrer->name ?>
                   
                </td>
      		  
      		     
      		    <td>
                    <?php 
                        $day=unserialize($row->day);
                       
                          echo "<p class='bg-success p-0 m-1'>".$day[0]."</p>";
                        
                     ?>
                </td>
      		      <td >
                  <?php 
                        $duty_in=unserialize($row->duty_in);
                       
                          echo "<p class='bg-info p-0 m-1'>".$duty_in[0]."</p>";
                       
                  ?>
                </td>
                <td >
                  <?php 
                        $duty_out=unserialize($row->duty_out);
                        
                          echo "<p class='bg-danger p-0 m-1'>".$duty_out[0]."</p>";
                        
                  ?>
                </td>
      		      <td>
      		      	<button class="btn btn-info" onclick="Edit(this)">
      		      		<i class="fas fa-edit"></i>
      		      	</button>
                  <button class="btn btn-danger" onclick="Delete(this,<?= $row->id ?>)">
                    <i class="fas fa-trash" ></i>
                  </button>
      		      </td>
      		    </tr>
              <?php 
                  }
               ?>


            
        
      		  </tbody>
      		</table>
     	</div>
     	<?php
     			}else{
     	?>
     	empty
     	<?php	} ?>
     </div>
      
    
    </div>
<?php include 'include/footer.php';?>   

