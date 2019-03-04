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
        <li class="breadcrumb-item active">Gallary</li>
      </ol>
      <div class="gallary_view col-12">
      	<div class="row">

            
              <div class="col-12">
                    <legend class="">Gallary view</legend>
                    <div class="row">
                      <?php 
                          require_once("../server/Model/gallery_management_model.php");

                                $gallery=gallery::All();

                                while ($row=mysqli_fetch_object($gallery)) {?>
                                  <div class="col-lg-4 col-md-4 mb-5"  >
                                    <div class="card_wrapper">
                                        <div class="card">
                                            <img class="card-img-top" src="../server/Uploads/Gallery/<?= $row->img ?>" alt="Card image cap" style="height: 250px;">
                                            <div class="card-body">
                                              
                                              <h5 class="card-title"><?= $row->title ?></h5>
                                              <button class="btn btn-danger float-right" onclick="del(this,<?= $row->id ?>)" ><i class="fas fa-trash "></i></button>
                                              <button class="btn btn-danger float-right mr-2" onclick="edit(this,<?= $row->id ?>)"><i class="fas fa-edit"></i></a></button>

                                              
                                              <p class="card-text"><?= $row->description ?></p>
                                            </div>
                                        </div>      
                                    </div> 
                                  </div>
                          <?php  }

                       ?>
                      
                    </div>   
             
              
             </div>
          </div>
      	</div>
      </div>
    </div>
<?php include 'include/footer.php'; ?> 

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
                           <label for="Name">Title</label>
                           <input type="text"  id="Input_Title" class="form-control" id="Name" placeholder="write your name" onkeyup="preview_title(this)" name="Title">
                         </div>
                         <div class="form-group col-md-12  float-left">
                           <label for="Text">Text</label>
                           <input type="text" id="Input_Text"  class="form-control" id="Text" placeholder="lorem ..." onkeyup="preview_text(this)" name="Text">
                         </div>
                         <div class="input-group col-md-12 float-left mb50">         
                             <div class="custom-file">
  
                               <input type="file" class="custom-file-input" id="inputGroupFile04" name='Img'>
                               <label class="custom-file-label" for="inputGroupFile04">Select image</label>
                             </div>
                          </div>
                         <div class="input-group col-md-12 float-left ">
                           <button type="submit"  class="btn btn-outline-secondary btn-block">Submit</button>
                         </div>
                     </form>
                     
                     <div class="col-6 mt10">
                      
                       <div class="card col-12 p0  float-right" >
                         <img class="card-img-top" src="../images/14.jpg" alt="Card image cap" style="height: 185px;">
                         <div class="card-body">
                           <h5 class="card-title">Card title</h5>
                           <p class="card-text">Some quick example text to build </p>
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
window.onload=function(){
  localStorage.clear();
};


  function del(el,id){

   var xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
      if(this.readyState==4 && this.status==200){
            el.parentElement.parentElement.parentElement.remove();
            alert(this.responseText);
      }
    }
    xhttp.open("GET","../server/gallery_management.php?del_id="+id,true);
    xhttp.send();
  }

  function edit(el,id){
   var Modal=document.getElementById("Modal");
   
   Modal.style.display="block";
   Modal.style.opacity="1";
   var img=el.parentElement.parentElement.children[0].getAttribute("src");
   var title=el.parentElement.children[0].innerText;
   var text=el.parentElement.children[3].innerText;

   document.getElementById("Input_Title").value=title;
   document.getElementById("Input_Text").value=text;
   localStorage.setItem('title',title);
   localStorage.setItem('text',text);
   localStorage.setItem('id',id);
   Modal.querySelector('.card').querySelector('img').setAttribute('src',img);
   Modal.querySelector('.card').querySelector('.card-title').innerText=title;
   Modal.querySelector('.card').querySelector('.card-text').innerText=text;

  }


  function preview_text(el){
     var Modal=document.getElementById("Modal");
      Modal.querySelector('.card').querySelector('.card-text').innerText='';
      Modal.querySelector('.card').querySelector('.card-text').innerText+=el.value;
      if(Modal.querySelector('.card').querySelector('.card-text').innerText==''){
           Modal.querySelector('.card').querySelector('.card-text').innerText=localStorage.text;
      }
    
  }

   function preview_title(el){
     var Modal=document.getElementById("Modal");
      Modal.querySelector('.card').querySelector('.card-title').innerText='';
      Modal.querySelector('.card').querySelector('.card-title').innerText+=el.value;

    if(Modal.querySelector('.card').querySelector('.card-title').innerText==''){
           Modal.querySelector('.card').querySelector('.card-title').innerText=localStorage.title;
      }
  }

  var form=document.getElementById('form');
  form.onsubmit=function(e){
      e.preventDefault();
      if(Modal.querySelector('#Input_Title').value==''){
          Modal.querySelector('#Input_Title').value=localStorage.title;
      };
      if(Modal.querySelector('#Input_Text').value==''){
          Modal.querySelector('#Input_Text').value=localStorage.text;
      };
      var id=localStorage.id;
      data=new FormData(this);

      data.append('Update','UpdateGallery');
      data.append('Id',id);
      var xhttp=new XMLHttpRequest();
      xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
           var data=JSON.parse(this.responseText);
          
           console.log(data);
            CloseModal();
        }
      }

      xhttp.open("POST","../server/gallery_management.php",true);
      xhttp.send(data);
  };

  

  function CloseModal(){
    var Modal=document.getElementById("Modal");
    
    Modal.style.display="none";
    Modal.style.opacity="0";
   localStorage.clear();
   document.querySelector('.custom-file-input').value="";
   document.querySelector('.custom-file-input').nextElementSibling.innerHTML='Select image';
  }

  document.querySelector('.custom-file-input').onchange=function(e){
    var filename=e.srcElement.files[0].name;
    this.nextElementSibling.innerHTML=filename;
    var src=URL.createObjectURL(e.target.files[0]);
    document.querySelector('#Modal .card-img-top').setAttribute('src',src);
    
  }

 
</script>