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
        <li class="breadcrumb-item active col-11">active<a class="float-right btn btn-outline-secondary" href="add_department.php"> Add Department</a></li>
        
      </ol>
    
      
      
      <div class="col-12 p0">
        <div class="row m0">
          
        <?php 
            require_once("../server/department_management.php");

            $department=department::All();
            while ($row=mysqli_fetch_object($department)) {
           
         ?>
          <div class="col-lg-4 col-md-3 p-3">
             <div class="card" >
              <div class="card-title pr-3 pt-3">
                <b class="mx-4 department_name"><?= $row->department_name;?></b>
                  <a href="department_detail.php?detail_id=<?=$row->id;?>" class="btn btn-outline-info fas fa-info float-right"></a>
              </div>
               <div class="card-body pt-0 pb-0 p-0">      
                   <div class="card-text">
                     
                      <img  src="../server/Uploads/Department/<?= $row->img;?>" alt=""  height="200px" width="100%">
                      <hr class="bg-info mb-1 mx-2">
                     <p style="display: none;" class="department_description"><?=$row->description ?></p>
                      <p class="mb-1 px-3 text-justify ">
                        
                        <?php $str=$row->description;
                             echo (strlen($str)<120)?$str:substr($str,0,120)." ....";
                        ?>
                      </p>
                   </div>
                   <div class="card-footer row mx-0">
                      <div class="col-sm-6">
                        <button class="btn btn-outline-success btn-block" onclick="Edit(this,<?= $row->id;?>)">
                          <i class="fas fa-edit"></i>
                        </button>
                      </div>
                      <div class="col-sm-6">
                        <button class="btn btn-outline-warning btn-block" onclick="Del(this,<?= $row->id;?>)">
                          <i class="fas fa-trash"></i>
                        </button>
                      </div>
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
<div id="Modal">
   <div id="Modal_wrapper">
      <div class="modal-header">
          <h5 class="modal-title text-center">Edit Gallery</h5>
          <button type="button" class="close" onclick="CloseModal()">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
         <div class="gallary col-12">
                <div class="row">
                     <form class="col-6 mb20 " id="form"  enctype="multipart/form-data">            
                         <div class="form-group col-md-12  float-left">
                           <label for="Department_Name">Department Name</label>
                           <input type="text"  id="Deparment_Name" class="form-control"  placeholder="write your name" onkeyup="preview(this)" name="Department_Name">
                         </div>
                         <div class="form-group col-md-12  float-left">
                           <label for="Department_Description">Department Name</label>
                           <textarea type="text"  id="Department_Description" class="form-control"  onkeyup="preview_description(this)" name="Department_Description" rows="5"></textarea>
                         </div>
                         <div class="input-group col-md-12 float-left mb50">         
                             <div class="custom-file">
  
                               <input type="file" class="custom-file-input" id="inputGroupFile04" name='Img'>
                               <label class="custom-file-label" for="inputGroupFile04">Select image</label>
                             </div>
                          </div>
                         <div class="input-group col-md-12 float-left ">
                           <button type="submit"  class="btn btn-outline-secondary btn-block">Update</button>
                         </div>
                     </form>
                     
                     <div class="col-6 mt10">
                      
                       <div class="card col-12 p0  float-right" >
                         <img class="card-img-top" src="../images/14.jpg" alt="Card image cap" style="height: 185px;">
                         <div class="card-body">
                           <h5 class="card-title">Card title</h5>
                           <p></p>
                         </div>
                       </div> 
                    </div>
                    
                      </div>
                   </div>
                </div>
               </div>
      </div>
   </div>
</div>
<script>
  
  function Del(el,id){
   var xhttp=new XMLHttpRequest();
   xhttp.onreadystatechange=function(){

      if(this.status==200 && this.readyState==4){
          alert(this.responseText);
      }
      el.parentElement.parentElement.parentElement.remove();
   }
   xhttp.open("GET","../server/department_management.php?Del_id="+id,true);
   xhttp.send();
  }

  function Edit(el,id){
      var department_name=el.parentElement.parentElement.parentElement.parentElement.querySelector('.department_name').innerText;
      
      var img=el.parentElement.parentElement.parentElement.parentElement.querySelector('img').src;
      var department_description=el.parentElement.parentElement.parentElement.parentElement.querySelector('.department_description').innerText;
     
      
      localStorage.setItem("department_name",department_name);
      localStorage.setItem("department_description",department_description);
      localStorage.setItem("img",img);
      localStorage.setItem("id",id);
      var Modal=document.getElementById('Modal');
      Modal.style.display="block";
      Modal.style.opacity="1";

      Modal.querySelector("#Deparment_Name").value=department_name;
      Modal.querySelector("#Department_Description").innerHTML=department_description;
      Modal.querySelector(".card-title").innerHTML=department_name;
      Modal.querySelector(".card-body p").innerHTML=department_description;
      Modal.querySelector("img").src=img;
  }

   function CloseModal(){
      var Modal=document.getElementById("Modal");
      
      Modal.style.display="none";
      Modal.style.opacity="0";
     localStorage.clear();
     document.querySelector('.custom-file-input').value="";
     document.querySelector('.custom-file-input').nextElementSibling.innerHTML='Select image';
  }

  function preview(el){
    var Modal=document.getElementById('Modal');
    Modal.querySelector(".card-title").innerHTML="";
    Modal.querySelector(".card-title").innerHTML+= el.value;

    if( Modal.querySelector(".card-title").innerHTML==""){
       Modal.querySelector(".card-title").innerHTML=localStorage.department_name;
    }
 
  }

   function preview_description(el){
    var Modal=document.getElementById('Modal');
    Modal.querySelector(".card-body p").innerHTML="";
    Modal.querySelector(".card-body p").innerHTML+= el.value;

    if( Modal.querySelector(".card-body p").innerHTML==""){
       Modal.querySelector(".card-body p").innerHTML=localStorage.department_description;
    }
 
  }

document.querySelector('.custom-file-input').onchange=function(e){
    var filename=e.srcElement.files[0].name;
    this.nextElementSibling.innerHTML=filename;
    var src=URL.createObjectURL(e.target.files[0]);
    document.querySelector('#Modal .card-img-top').setAttribute('src',src);
    
  }

var form=document.getElementById('form');
  form.onsubmit=function(e){
      e.preventDefault();
      if(Modal.querySelector('#Deparment_Name').value==''){
          Modal.querySelector('#Deparment_Name').value=localStorage.title;
      };
     
      var id=localStorage.id;
      data=new FormData(this);

      data.append('Update','UpdateDepartment');
      data.append('Id',id);
      var xhttp=new XMLHttpRequest();
      xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
           alert(this.responseText);
          
           console.log(data);
            CloseModal();
        }
      }

      xhttp.open("POST","../server/department_management.php",true);
      xhttp.send(data);
  };


</script>