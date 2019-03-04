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
        <li class="breadcrumb-item active col-11">View Event Post
          <a class="btn btn-outline-secondary float-right" href="event_view.php">View Event</a>
          <a class="float-right btn btn-outline-secondary mr-3" href="event.php"> Add Event Post</a>
        </li>
      </ol>
      <div class="post_view container-fluid">
      	<div class="row">

             
              <div class="  col-md-8" >
              <?php
                  if(isset($_GET['detail_id'])){
                      $id=$_GET['detail_id'];
                      require_once("../server/event_management.php");
                      $event=event::Where('id',$id);
                      while($row=mysqli_fetch_object($event)):

                 
                  
               ?>
                  <div class="card">
                    <img class="card-img-top " src="../server/Uploads/Event/<?=$row->img ?>" alt="Card image cap" height="400px">
                    <div class="card-body mb50">
                     
                      <h3 class="card-title text-center mb-3">
                          <?= $row->title ?>
                      </h3>

                      
                      
                      <p class="card-text p-3">
                          <?= $row->description;?>
                      </p>
                     
                     
                      <a href="#" class="btn btn-outline-success">Previous</a>
                      <a href="#" class="btn btn-outline-success ">Next</a>
                      <button class="btn btn-danger float-right " onclick="Del(<?= $row->id;?>)">
                          <i class="fas fa-trash "></i>
                      </button>
                      <a  class="cw btn btn-info float-right mr-3" href="blog.php?edit_id=<?= $row->id;?>"><i class="fas fa-edit"></i></a>
                    </div>
                  </div>
              
              <?php 
                   endwhile;
                }
               ?>      
              </div>
             
              <div class="col-md-4">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action active">
                        Category
                    </button>
                    <?php 
                        require_once("../server/blog_category_management.php");
                        $blog_category=blog_category::all();
                        while ($row=mysqli_fetch_object($blog_category)) {
                     ?>
                    <a href="?id=<?= $row->id?>">
                      <button type="button" class="list-group-item list-group-item-action"><?= $row->category_name?></button>
                    </a>  
                    <?php 
                      }
                     ?>
                </div>
              </div>
        </div>
              

              
             </div>
             
               
             
              
             
          </div>
      	</div>
      </div>
    </div>
<?php include 'include/footer.php';?> 
<script>

 function Del(id){
    if(confirm("Press a button!")){
        var xhttp=new XMLHttpRequest();
         xhttp.onreadystatechange=function(){

            if(this.status==200 && this.readyState==4){
                window.location.replace("event_view.php");
            }
         }
         xhttp.open("GET","../server/event_management.php?Del_id="+id,true);
         xhttp.send();
    };
   
  }
</script>
