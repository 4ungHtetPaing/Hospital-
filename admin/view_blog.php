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
      <div class="post_view col-12">
      	<div class="row">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                          <?php
                             require_once("../server/blog_management.php");
                             if(isset($_GET['id'])){
                               $id=$_GET['id'];
                               $blog=blog::Where('category_id',$id);
                                  while($row=mysqli_fetch_object($blog)):
                                ?>
                                    <div class=" col-lg-4 col-md-4" >
                                       <img class="card-img-top" src="../server/Uploads/Blog/<?= $row->img ?>" alt="Card image cap" style="height: 185px;">
                                       <div class="card-body mb-3 card">
                                          <h6 class="card-title  text-center"><?= $row->title ?></h6>
                                           <p>
                                              <span>
                                                <?= $row->author; ?>
                                              </span>
                                              
                                           </p>
                                           
                                           <p class="card-text">
                                               <?php 
                                                  $article=$row->article;
                                                   echo (strlen($article)>30)?substr($article,0,30).'....':$row->article;
                                                ?>
                                                <span class="float-right">
                                                 <i>
                                                    <?= date('d-M-Y',strtotime($row->created_at)) ?>
                                                 </i>
                                              </span>
                                           </p>
                                           <p>
                                             <a href="view_blog_detail.php?detail_id=<?=$row->id ?>" class="btn btn-outline-success float-left comm " >Readmore</a>  
                                              
                                           </p>                               
                                                                        
                                       </div>
                                    </div>
                                <?php
                                  endwhile;
                             }else{ 
                           
                                $blog=blog::All();
                                while($row=mysqli_fetch_object($blog)):
                               ?>
                                <div class=" col-lg-4 col-md-4" >
                                   <img class="card-img-top" src="../server/Uploads/Blog/<?= $row->img ?>" alt="Card image cap" style="height: 185px;">
                                   <div class="card-body mb-3 card">
                                      <h6 class="card-title  text-center"><?= $row->title ?></h6>
                                       <p>
                                          <span>
                                            <?= $row->author; ?>
                                          </span>
                                          
                                       </p>
                                       
                                       <p class="card-text">
                                           <?php 
                                              $article=$row->article;
                                               echo (strlen($article)>30)?substr($article,0,30).'....':$row->article;
                                            ?>
                                            <span class="float-right">
                                             <i>
                                                <?= date('d-M-Y',strtotime($row->created_at)) ?>
                                             </i>
                                          </span>
                                       </p>
                                       <p>
                                         <a href="view_blog_detail.php?detail_id=<?=$row->id ?>" class="btn btn-outline-success float-left comm " >Readmore</a>  
                                          
                                       </p>                               
                                                                    
                                   </div>
                                </div>
                            <?php 
                                endwhile;
                            }    
                             ?>
                        </div>
                         <!--   -->
                    </div>
                    <div class="col-md-3">
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
      	</div>
      </div>
    </div>
<?php include 'include/footer.php';?> 
