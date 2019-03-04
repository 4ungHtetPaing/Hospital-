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
        <li class="breadcrumb-item active col-11">View Blog 
          <a class="btn btn-outline-secondary float-right" href="view_blog.php">view Post</a>
          <a class="float-right btn btn-outline-secondary mr-3" href="blog.php"> Add Blog Post</a>
        </li>
      </ol>
      <div class="post_view container-fluid">
      	<div class="row">

             
              <div class="  col-md-8" >
              <?php
                  if(isset($_GET['detail_id'])){
                      $id=$_GET['detail_id'];
                      require_once("../server/blog_management.php");
                      $blog=blog::Where('id',$id);
                      while($row=mysqli_fetch_object($blog)):

                 
                  
               ?>
                  <div class="card">
                    <img class="card-img-top " src="../server/Uploads/Blog/<?=$row->img ?>" alt="Card image cap" height="400px">
                    <div class="card-body mb50">
                      <p>
                        <span>Author : <b><?= $row->author; ?></b></span>
                        <span class="float-right">
                          <b>
                            <i><?= date("d-M-Y",strtotime($row->created_at));?></i>
                            </b>
                        </span>
                      </p>
                      <h3 class="card-title text-center mb-3">
                          <?= $row->title ?>
                      </h3>

                      
                      
                      <p class="card-text p-3">
                          <?= $row->article;?>
                      </p>
                     
                     
                      <a href="#" class="btn btn-outline-success">Previous</a>
                      <a href="#" class="btn btn-outline-success ">Next</a>
                      <button class="btn btn-danger float-right " onclick="Del(<?= $row->id;?>)">
                          <i class="fas fa-trash "></i>
                      </button>
                      <a  class="cw btn btn-info float-right mr-3" href="blog.php?edit_id=<?= $row->id;?>"><i class="fas fa-edit"></i></a>
                    </div>
                  </div>
                <div class=" command mt-3">
                      <h5 class="card-title h3">Comment</h5>
                    <?php 
                        require_once "../server/blog_comment_management.php";
                        $blog_comment=blog_comment::Where('blog_id',$id);

                        if(0!=mysqli_num_rows($blog_comment)){
                        while($row=mysqli_fetch_object($blog_comment)):
                    ?>
                      <div class="row mb-5">
                        <div class="col-md-3">
                          <i>Mg Mg</i>
                        </div>
                        <div class="col-md-6">
                          <p><?= $row->comment?></p>
                        </div>
                        <div class="col-md-3">
                          <?php 
                            if($row->status==0){
                          ?>
                              <button class="btn" onclick="Publish(<?=$row->id?>)">Publish</button>
                          <?php      
                            }else{
                          ?>
                              Reply
                          <?php    
                            }
                           ?>
                            
                        </div>
                      </div>
                    <?php
                            endwhile;
                        }else{
                              echo "no comment";
                        }
                     ?>  
                      
                      
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
     window.location.replace("../server/blog_management.php?del_id="+id);
 };
  /*if(confirm){
    
  } */ 
}

function Publish(id){
  var xhttp=new XMLHttpRequest();
  var data=new FormData();
  data.append('id',id);
  data.append('Publish','');
  xhttp.onreadystatechange=function(){
    if(this.readyState==4 && this.status==200){
      alert(this.responseText);
    }
  }
  xhttp.open('POST',"../server/blog_comment_management.php",true);
  xhttp.send(data);

}
</script>