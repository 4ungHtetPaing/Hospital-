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
        <li class="breadcrumb-item active col-11">blog 
          <a class="btn btn-outline-secondary float-right" href="view_blog.php">view Post</a>
          <a class="float-right btn btn-outline-secondary mr-3" href="add_blog_category.php">Manage Blog Category</a>
        </li>
      </ol>
      <div class="gallary col-12">
      	<div class="row">
          <?php 
            if(isset($_GET['edit_id'])){
              require_once("../server/blog_management.php");
                $id=$_GET['edit_id'];
               $blog=blog::Where('id',$id);
               while ($blog_row=mysqli_fetch_object($blog)) : ?>
                   <form class="col-6 mb20" method="post" action="../server/blog_management.php" enctype="multipart/form-data">
                      <legend class="col-12">Post Upload 
                      </legend>
                      <div class="input-group col-md-12">
                   
                          <div class="custom-file">

                              <input type="file" class="custom-file-input" id="inputGroupFile04" name="Img" onchange="img_preview(this)">
                              <label class="custom-file-label" for="inputGroupFile04">Upload Image</label>
                          </div>
                          </div>
                          
                          <div class="form-group col-md-12 ">
                              <label for="title">Title</label>
                              <input type="title" class="form-control" id="title" placeholder="write your title" name="Title" onkeyup="preview_tite(this)" value="<?= $blog_row->title?>">
                          </div>
                          <div class="form-group col-md-12 ">
                              <label for="title">Author</label>
                              <input type="title" class="form-control" id="title" placeholder="Author" name="Author" onkeyup="preview_author(this)" value="<?= $blog_row->author ?>" >
                          </div>
                          <div class="form-group col-md-12 ">
                              <label >Category</label>
                              <select class="custom-select" name="Category_Id">
                              <?php 
                                    require_once("../server/Model/blog_category_management_model.php");
                                    $blog_category=blog_category::All();
                                  while($row=mysqli_fetch_object($blog_category)){
                              ?>
                              <option value="<?= $row->id ?>" <?=($row->id==$blog_row->category_id)? "selected":""; ?> > <?= $row->category_name?></option>
                              <?php 
                                }
                               ?>
                              </select>
                          </div>
                          
                      <div class="form-group col-md-12">
                          <label for="Text">Article</label>
                          <textarea class="form-control" id="text" rows="5" name="Article" onkeyup="preview_des(this)"><?= $blog_row->article; ?>
                          </textarea>
                       </div>
                       <input type="hidden" name="id" value="<?= $blog_row->id ?>">
                     
                      <div class="input-group col-md-12 float-left ">
                        <button type="submit" name="Submit" value="Update" class="btn btn-outline-secondary btn-block">Update</button>
                      </div>
                   </form>
                   <div class="col-6 mt10">
                    <legend class="">Blog post Preview</legend>
                    <div class="card col-12 p0  float-right" >
                      <img class="card-img-top" src="../server/Uploads/Blog/<?= $blog_row->img ?>" alt="Card image cap" style="height: 250px;">
                      <div class="card-body">
                        <h5 class="card-title text-center"><?= $blog_row->title ?> 
                        </h5>
                        <p>
                          <span>Author : <b class="author_name"><?= $blog_row->author ?></b></span>
                          <span class="float-right"><i><?= date("d-M-Y",time())?></i></span>
                        </p>
                        <p class="card-text"><?= $blog_row->article ?></p>
                        
                      </div>
                    </div>
             </div>
          <?php     
               endwhile;
            }else{
         ?>
      		  <form class="col-6 mb20" method="post" action="../server/blog_management.php" enctype="multipart/form-data">
                <legend class="col-12">Post Upload 
                  
                </legend>
                <div class="input-group col-md-12">
             
                    <div class="custom-file">

                        <input type="file" class="custom-file-input" id="inputGroupFile04" name="Img" onchange="img_preview(this)">
                        <label class="custom-file-label" for="inputGroupFile04">Upload Image</label>
                    </div>
                    </div>
                    
                    <div class="form-group col-md-12 ">
                        <label for="title">Title</label>
                        <input type="title" class="form-control" id="title" placeholder="write your title" name="Title" onkeyup="preview_tite(this)">
                    </div>
                    <div class="form-group col-md-12 ">
                        <label for="title">Author</label>
                        <input type="title" class="form-control" id="title" placeholder="Author" name="Author" onkeyup="preview_author(this)">
                    </div>
                    <div class="form-group col-md-12 ">
                        <label >Category</label>
                        <select class="custom-select" name="Category_Id">
                        <?php 
                              require_once("../server/Model/blog_category_management_model.php");
                              $blog_category=blog_category::All();
                            while($row=mysqli_fetch_object($blog_category)){
                        ?>
                        <option value="<?= $row->id ?>"><?= $row->category_name?></option>
                        <?php 
                          }
                         ?>
                        </select>
                    </div>
                    
                <div class="form-group col-md-12">
                    <label for="Text">Article</label>
                    <textarea class="form-control" id="text" rows="5" name="Article" onkeyup="preview_des(this)"></textarea>
                 </div>

               
                <div class="input-group col-md-12 float-left ">
                  <button type="submit" name="Submit" value="Insert" class="btn btn-outline-secondary btn-block">Submit</button>
                </div>
            </form>
            
             <div class="col-6 mt10">
                  <legend class="">Blog post Preview</legend>
                  <div class="card col-12 p0  float-right" >
                    <img class="card-img-top" src="../images/14.jpg" alt="Card image cap" style="height: 250px;">
                    <div class="card-body">
                      <h5 class="card-title text-center">Blog  title Here 
                      </h5>
                      <p>
                        <span>Author : <b class="author_name">Author name</b></span>
                        <span class="float-right"><i><?= date("d-M-Y",time())?></i></span>
                      </p>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt veritatis voluptas ipsa, sit fugit dolore, et eos ullam aperiam amet provident quidem, possimus repudiandae illo? Quae cum explicabo odit sunt! </p>
                      
                    </div>
                  </div>
             </div>
           
          <?php 
            }
           ?>   
             </div>
          </div>
      	</div>
      </div>
    </div>
<?php include 'include/footer.php';?> 

<script>
  
function preview_tite(el){
  document.querySelector('.card-title').innerText=el.value;
}

function preview_des(el){
  document.querySelector('.card-text').innerText=el.value;
}

function img_preview(el){
  
  var img=URL.createObjectURL(el.files[0]);
  document.querySelector(".card-img-top").src=img;
  
}

function preview_author(el){
  document.querySelector(".author_name").innerText=el.value;
}

</script>