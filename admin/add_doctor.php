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
         <li class="breadcrumb-item active col-11">Carrer List
          <a class="btn btn-outline-info float-right" href="add_doctor.php">Add Doctor</a>
          
        </li>
      </ol>
      
     
          <div class="container">
              <button id="Select_Carrer_Btn" class="btn btn-outline-info" onclick="Select_Carrer()" >Select Carrier</button>
             <form class="row mt-5" id="doctor_form" method="post" action="../server/doctor_management.php"> 
                <div class="col-md-4">
                    <img src="" alt=""  width="100%" class="mb-5">
                    <button type="submit" class="btn btn-success btn-block" name="Submit">Submit</button>
                </div>
                <div class="form col-8 ">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="Name">Name</label>
                        </div>
                         <input type="text"  id="Name" class="form-control"  placeholder="write your name"  name="Name">
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="Phone">Phone</label>
                        </div>
                         <input type="text"  id="Phone" class="form-control"  placeholder="write your name"  name="Phone">
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="Qualification">Qualification</label>
                        </div>
                         <input type="text"  id="Qualification" class="form-control"  placeholder="write your name"  name="Qualification">
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="Specilist">Specilist</label>
                        </div>
                         <input type="text"  id="Specilist" class="form-control"  placeholder="write your name"  name="Specilist">
                      </div>
                      
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Department</label>
                        </div>
                         <select class="custom-select" id="Department" name="Department_Id">
                          <option selected>Choose...</option>
                          <?php 
                                require_once "../server/department_management.php";
                                $department=department::All();
                                while ($row=mysqli_fetch_object($department)) {
                          ?>

                          <option value="<?=$row->id?>"><?= $row->department_name?></option>
                          <?php          
                                }
                           ?>
                        </select>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="Description">Description</label>
                        </div>
                         <textarea name="Description" id="Description" class="form-control">
                           
                         </textarea>
                      </div>
                      <input type="hidden" Name="Img" id="Img">
                      <input type="hidden" Name="Carrer_Id" id="Carrer_Id">
                </div>
             </form>       
          </div>

    </div>
  </div>
<?php include 'include/footer.php';?>
<div id="Modal">
   <div id="Modal_wrapper">
      <div class="modal-header">
          <h5 class="modal-title text-center">Select Carrer</h5>
          <button type="button" class="close" onclick="CloseModal()">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body" id="Select_Carrer">
        <div class="row">
        <?php 
            require_once "../server/carrer_management.php";
            $carrer=carrer::Where('status',1);
            while ($row=mysqli_fetch_object($carrer)):
        ?>
          <div class="col-md-3">
            <div class="card p-1">
               <p class="bg-warning text-center mb-0 p-1 text-white"><b><?= $row->name?></b></p>
               
               <img src="../server/Uploads/Carrer/images/<?=$row->img?> " width="100%" alt="" class="my-1">
               <p class="bg-info text-center mb-0 p-1 text-white"><b>Doctor</b></p>
               <div class="overlay" onclick="Choice({'id':'<?=$row->id?>','name':'<?=$row->name?>','phone':'<?=$row->phone?>','department_id':'<?=$row->department_id?>','qualification':'<?=$row->qualification?>','description':'<?=$row->job_description?>','img':'<?=$row->img?>'})">
                    <i class="fa fa-check"></i>
               </div>
            </div>
          </div>
        <?php    
            endwhile
        ?>
          
          
        
        </div>    
      </div>
   </div>
</div>

<script>
   var Modal=document.getElementById('Modal');
  function Select_Carrer(){
   
      Modal.style.display="block";
      Modal.style.opacity="1";
  }
  function CloseModal(){
      Modal.style.display="none";
      Modal.style.opacity="0";
  }
  function Choice(data){
    
    var doctor_form=document.getElementById('doctor_form');
    var Select_Carrer_Btn=document.getElementById('Select_Carrer_Btn');
    Select_Carrer_Btn.style.display="none";
    doctor_form.style.display="flex";
    CloseModal();
    doctor_form.querySelector('img').src='../server/Uploads/Carrer/images/'+data.img;
    var Name=document.getElementById('Name');
    var Phone=document.getElementById('Phone');
    var Qualification=document.getElementById('Qualification');
    var Department=document.getElementById('Department');
    var Description=document.getElementById('Description');
    var Img=document.getElementById('Img');
    var Carrer_Id=document.getElementById('Carrer_Id');
    Name.value=data.name;
    Phone.value=data.phone;
    Qualification.value=data.qualification;
    Description.innerHTML=data.description;
    Img.value=data.img;
    Carrer_Id.value=data.id;
    var option=Department.querySelectorAll('option');
    var length=option.length;
    
    for(i=0;i<=length;i++){

        if(option[i].value==data.department_id){
          option[i].setAttribute("selected",'true');
          option[i].style.background='yellow';
        }
    }


  }

  
  
</script>

