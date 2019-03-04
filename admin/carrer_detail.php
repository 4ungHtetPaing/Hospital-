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
        <li class="breadcrumb-item active">Carrers Register</li>
      </ol>
      
      <?php 
         
          if(isset($_GET['detail_id'])){
             require_once("../server/carrer_management.php");
              $id=$_GET['detail_id'];
              $carrer=carrer::Where('id',$id);
              if(mysqli_num_rows($carrer)!=0){
                  while($row=mysqli_fetch_object($carrer)):
       ?>
      		<div class="container">
            <div>
                <a href="carrer_register.php"><button class="btn btn-outline-info"><i class="fa fa-arrow-left"> Back</i></button></a>
                <a href="../server/carrer_management.php?del_id=<?= $row->id ?>" class="float-right"><button class="btn btn-danger">Delete</button></a>
                
                <?php 
                    if($row->status!=1){?>

                <a href="../server/carrer_management.php?confirm_id=<?= $row->id ?>" " class="float-right mx-3"><button class="btn btn-primary">Comfirm Carrer</button></a>
                        <?php 
                            if($row->status!=2){?>
                                           <a href="../server/carrer_management.php?interview_id=<?= $row->id ?>" " class="float-right "><button class="btn btn-warning">To Interview</button></a>
                        <?php   }
                         ?>
               
                
                <?php  }
                 ?>
            </div>
            <div class="bg-info my-3 carrer_header">
               <h4 class="text-center text-white py-3">Carrer Detail</h4>
            </div>
            <div class="row">
              
              <div class="col-md-8" id="carrer_detail">
                    <ul>
                      <li>
                        <p>Name <span>-</span></p>
                        <p ><?= $row->name ?></p>
                      </li>
                      <li>
                        <p>Email <span>-</span></p>
                        <p ><?= $row->email ?></p>
                      </li>
                      <li>
                        <p>Phone <span>-</span></p>
                        <p ><?= $row->phone ?></p>
                      </li>
                      <li>
                        <p>Address <span>-</span></p>
                        <p class="text-justify"><?= $row->address ?></p>
                      </li>
                      <li>
                        <p>Date Of Birth <span>-</span></p>
                        <p id="age"><?= $row->date_of_birth ?></p>
                      </li>
                       <li>
                        <p>Gender <span>-</span></p>
                        <p><?= $row->gender ?></p>
                      </li>
                      <li>
                        <p>Qualification <span>-</span></p>
                        <p><?= $row->qualification ?></p>
                      </li>
                      <li>
                        <p>Position <span>-</span></p>
                        <p ><?= $row->position ?></p>
                      </li>
                      <li>
                        <p>Department <span>-</span></p>
                        <p><?= $row->department_id ?></p>
                      </li>
                      <li>
                        <p>Job Experience <span>-</span></p>
                        <p class="text-justify"><?= $row->job_experience ?></p>
                      </li>
                      <li>
                        <p>Job Salary <span>-</span></p>
                        <p ><?= $row->job_salary ?></p>
                      </li>
                      <li>
                        <p>Job Description <span>-</span></p>
                        <p class="text-justify"><?= $row->job_description?></p>
                      </li>
                      
                   </ul>
              </div>
              <div class="col-md-3">
                  <img src="../server/Uploads/carrer/images/<?= $row->img ?>" alt="" style="width
                  :100%;height:250px;" id="Img">
                  <br>

                  <div class="mt-5">
                    <a href="../server/Uploads/carrer/cv_form/<?= $row->cv_form ?>">
                      <i class="fa fa-2x fa-file">&nbsp;</i>
                      <span><?= $row->cv_form ?></span>
                    </a>
                  </div>
              </div>
            </div>
                
          </div>
      <?php

            endwhile;
          }else{
             echo "<script>window.location.replace('carrer_register.php');</script>";
          }
         
        }else{
          
             echo "<script>window.location.replace('carrer_register.php');</script>";
         
        } 
       ?>  
    </div>
  </div>
<?php include 'include/footer.php';?> 

