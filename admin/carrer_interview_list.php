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
         <li class="breadcrumb-item active col-11">Interview List
          <a class="btn btn-outline-info float-right" href="carrer_register.php">carrer Register</a>
          
        </li>
      </ol>
      
     
      		<div class="container">
            <div>
                <a href="carrer_register.php"><button class="btn btn-outline-info"><i class="fa fa-arrow-left"> Back</i></button></a>
                
            </div>
            <?php 
                 require_once('../server/carrer_management.php');
                 $carrer=carrer::Where('status',2);
                 if(mysqli_num_rows($carrer)==0){ ?>
                    <div class="bg-info my-3 carrer_header">
                       <h4 class="text-center text-white py-3">Empty Interview List</h4>
                    </div>
            <?php  }else{

             ?>
            <div class="bg-info my-3 carrer_header">
               <h4 class="text-center text-white py-3">carrer Detail</h4>
            </div>
            <div class="row">
              
              <table class="table text-center">
                <thead>
                  
                  
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col0">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Manage</th>
                </thead>
                <tbody>
                  <?php 
                   
                    while($row=mysqli_fetch_object($carrer)):
                   ?>
                  <tr style="line-height: 100px">
                    <th scope="row">1</th>
                    <td><img src="../server/Uploads/carrer/images/cv_img_5abdbf7031c04.jpg" alt="" width="100px" height="100px"></td>
                    <td><?= $row->name ?></td>
                    <td><?= $row->email ?></td>
                    <td><?= $row->phone ?></td>
                    <td><?php
                         $str=$row->address;
                        echo (strlen($str)<40)?$str:substr($str,0,40).'...'; 
                         ?>
                    </td>
                    <td>
                        <a href="../server/carrer_management.php?cancel_interview_id=<?= $row->id ?>" class="btn btn-outline-warning  fas fa-times"></a>
                        <a href="carrer_detail.php?detail_id=<?= $row->id;?>" class="btn btn-outline-info fas fa-info"></a>
                    </td>
                  </tr>
                  <?php 
                    endwhile;
                  }
                   ?>
                </tbody>
              </table>
             
            </div>

            
                
          </div>
     
    </div>
  </div>
<?php include 'include/footer.php';?> 

