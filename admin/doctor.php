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
         <li class="breadcrumb-item active col-11">Carrer List
          <a class="btn btn-outline-info float-right" href="add_doctor.php">Add Doctor</a>
          
        </li>
      </ol>
      
     
          <div class="container">
           
            <div class="bg-info my-3 carrer_header">
               <h4 class="text-center text-white py-3">Doctor List</h4>
            </div>
            <?php 
                require_once "../server/doctor_management.php";
                $doctor=doctor::Order_BY_All('id','desc');
                while ($row=mysqli_fetch_object($doctor)) {
            ?>

            <div class="card m-3">
              <div class="row p-2">
                <div class="col-md-4">
                  <img src="../server/Uploads/Carrer/images/<?=$row->img?>" width="100%" alt="">
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <p class="col-6">Name</p>
                    <p class="col-6"><?=$row->name?></p>
                  </div>
                  <div class="row">
                    <p class="col-6">Phone</p>
                    <p class="col-6"><?=$row->phone?></p>
                  </div>
                  <div class="row">
                    <p class="col-6">Specialist</p>
                    <p class="col-6"><?=$row->specialist?></p>
                  </div>
                  <div class="row">
                    <p class="col-6">Department</p>
                    <p class="col-6"><?=$row->department_id?></p>
                  </div>
                  <div class="row">
                    <p class="col-6">Description</p>
                    <p class="col-6"><?=$row->description?></p>
                  </div>
                </div>
              </div>
            </div> 
          <?php
                }
          ?>



                
        </div>
     
    </div>
  </div>
<?php include 'include/footer.php';?> 

