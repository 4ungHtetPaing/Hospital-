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
        <li class="breadcrumb-item active col-11">Gallery
          <a class="btn btn-outline-info float-right" href="gallary_view.php">view gallery</a>
          
        </li>
      </ol>
      <div class="gallary col-12">
      	<div class="row">
<!--              <legend class="col-12">Gallary Upload 
     <button class="btn btn-outline-secondary float-right"><a href="gallary_view.php">view gallary</a></button>
 </legend> -->
      		  <form class="col-6 mb20" action="../server/gallery_management.php" method="post" enctype="multipart/form-data">               
                <div class="form-group col-md-12  float-left">
                  <label for="Name">Title</label>
                  <input type="text" class="form-control" id="Name" placeholder="write your name" name="Title" onkeyup="title_preview(this)">
                </div>
                <div class="form-group col-md-12  float-left">
                  <label for="Text">Desciption</label>
                  <input type="text" class="form-control" id="Text" placeholder="lorem ..." name="Description" onkeyup="text_preview(this)">
                </div>
                <div class="input-group col-md-12 float-left mb50">         
                    <div class="custom-file">

                      <input type="file" class="custom-file-input" id="inputGroupFile04"  name="Img" >
                      <label class="custom-file-label" for="inputGroupFile04">Upload Your Resume</label>
                    </div>
                  </div>
                <div class="input-group col-md-12 float-left ">
                  <button type="submit" class="btn btn-outline-secondary btn-block" name="Submit" value="add_gallery">Submit</button>
                </div>
            </form>
            
              <div class="col-6 mt10">
              <legend class="">Gallary Preview</legend>
              <div class="card col-12 p0  float-right" >
                <img class="card-img-top" src="../images/14.jpg" alt="Card image cap" style="height: 185px;">
                <div class="card-body">
                  <h5 class="card-title" id="title_preview">Card title</h5>
                  <p class="card-text" id="text_preview">Some quick example text to build </p>
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

function title_preview(el){
  var value=el.value;
  document.getElementById("title_preview").innerHTML='';
  document.getElementById("title_preview").innerHTML+=value;
  
}

function text_preview(el){
  var value=el.value;
  document.getElementById("text_preview").innerHTML='';
  document.getElementById("text_preview").innerHTML+=value;

}

document.querySelector('.custom-file-input').onchange=function(e){
    var filename=e.srcElement.files[0].name;
    this.nextElementSibling.innerHTML=filename;
    var src=URL.createObjectURL(e.target.files[0]);
    document.querySelector('.card-img-top').setAttribute('src',src);
    
  }


</script>