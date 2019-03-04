<?php include 'include/header.php';?>
  <!-- Navigation-->
  <?php include 'include/sidebar.php';?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb ">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Gallary</li>
      </ol>
      <div class="container mt-5">
          <div class="row">
            <div class="col-md-6 offset-md-3">
               <form  action="../server/partner_management.php" method="post" enctype="multipart/form-data">
                   <div class="input-group col-md-12 float-left mb50">         
                      <div class="custom-file">

                        <input type="file" class="custom-file-input" id="inputGroupFile04"  name="Img" >
                        <label class="custom-file-label" for="inputGroupFile04">Upload Your Resume</label>
                      </div>
                    </div>
                  <div class="input-group col-md-12 float-left ">
                    <button type="submit" name="Submit" value="add_partner" class="btn btn-outline-secondary btn-block" >Submit</button>
                  </div>
               </form>
            </div>
          </div>
      </div>
      <div class="container-fluid">
          <div class="row">
            <?php 
              require_once("../server/Model/partner_management_model.php");
              $partner=partner::All();
              while ($row=mysqli_fetch_object($partner)) {
            
             ?>
              <div class="col-md-3 p-5">
                  <div class="card">
                    <img src="../server/Uploads/Partner/<?=$row->img ?>" class="img-fluid" alt="">
                    <button class="btn btn-danger" onclick="Del(this,<?=$row->id ?>)">
                    <i class="fas fa-trash"></i>
                  </button>
                  </div>
              </div>
            <?php  
              };
             ?>
          </div>
      </div>
    </div>
<?php include 'include/footer.php';?> 
<script>
  
/*var form=document.querySelector('form');
form.onsubmit=function(e){
  e.preventDefault();
  var data=new FormData(this);
  data.append('Submit','add_partner');
  var xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange=function(){ 
    if(this.status==200 && this.readyState==4){
        alert(this.responseText);
    }
  }
  xhttp.open("POST","../server/partner_management.php",true);
  xhttp.send(data);
}*/

function Del(el,id){
  var xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange=function(){ 
    if(this.status==200 && this.readyState==4){
          alert(this.responseText);
            el.parentElement.parentElement.remove();
        
    }
  }
  xhttp.open("GET","../server/partner_management.php?Del_id="+id,true);
  xhttp.send();

}
</script>
