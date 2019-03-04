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
        <li class="breadcrumb-item active">Carrer</li>
      </ol>
    
          <div class="container-fluid">
           
              <div class="row">
                  <?php 
                    require_once("../server/carrer_management.php");
                    $carrer=carrer::Where('status',0);
                   
                    
                    while ($row=mysqli_fetch_object($carrer)) {?>
                       <div class="col-md-4 col-sm-6 mb-5">
                          <div class="card mt-2" >             
                            <div class="card-body">
                               <h5 class="card-title"><?= $row->name;?></h5>

                                <div class="card-text row mb-2">
                                  <div class="row">
                                      <img class="col-md-6 pr-0" src="../server/Uploads/carrer/images/<?= $row->img?>" alt="" style="width: 100%;height: 175px">
                                      <div class="col-md-6 p-0 pl-1">
                                        <p><?php $str=$row->job_experience;
                                              echo(strlen($str)>130)?substr($str,0,130)."..." :$str;
                                        ?></p>
                                      </div>
                                  </div>
                                  
                                </div>
                                <div class="row">
                                  <a  href="carrer_detail.php?detail_id=<?= $row->id ?>" class="btn btn-info btn-block col-md-10 offset-md-1">view detail<i class="fas fa-angle-double-right ml-2"></i></a>
                                </div>
                            </div>
                          </div> 
                       </div>
                  <?php }
                   ?> 
              </div>
              <?php 
                if(mysqli_num_rows($carrer)==0){
               ?>
              <div class="bg-info">
                 <h4 class="text-center text-white py-3">Empty Register List</h4>
              </div>
              <?php 
                }
               ?>
              
          </div>
      	
    </div>
<?php include 'include/footer.php';?> 
