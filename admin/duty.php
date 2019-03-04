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
        <li class="breadcrumb-item active">duty</li>
      </ol>
      <div class="duty col-12">
      	<div class="row">
      		<table class="table text-center">
      		  <thead>
      		  	<h3 class="col-12">
      		  	Duty List 
      		  	<button class="float-right btn btn-outline-secondary"> 
      		  	             <a href="add_duty.php"> Add Duty</a>
      		  	              </button>
      		  </h3>
      		    <tr>
      		      <th scope="col">no</th>
      		      <th scope="col">Name</th>
      		      <th scope="col">Department</th>
      		     
      		      <th scope="col">Day</th>
      		      <th scope="col">Duty In</th>
                <th scope="col">Duty Out</th>
      		       <th scope="col">Manage</th>

      		    </tr>
      		  </thead>
      		  <tbody>
            <?php 
                @require_once("../server/Model/duty_management_model.php");
                $duty=duty::All();
                $i=0;
                while ($row=mysqli_fetch_object($duty)){
                  $i++;
             ?>
      		    <tr>
      		      <th scope="row" value="<?= $row->id ?>"><?= $i ?></th>
      		      <td>
                  <?php 
                    $carrer_id=$row->carrer_id;
                    require_once("../server/carrer_management.php");
                    $carrer=mysqli_fetch_object(carrer::Where('id',$carrer_id));
                  ?>
                  <div style="width: 130px;margin:0 auto" >
                       <img src="../server/Uploads/Carrer/images/<?=$carrer->img ?>" alt="" width="100%" height="100px">
                       <br>
                       <p class="text-center bg-info mt-1 text-white p-1"><?=$carrer->name ?></p>
                  </div>
                 
                   
                </td>
      		      <td>
                  <?php 
                    $department_id=$row->department_id;
                    require_once("../server/department_management.php");
                    $department=mysqli_fetch_object(department::Where('id',$department_id));
                    
                  ?>
                  <div style="width: 130px;margin:0 auto" >
                       <img src="../server/Uploads/Department/<?=$department->img ?>" alt="" width="100%" height="100px">
                       <br>
                       <p class="text-center bg-info mt-1 text-white p-1"><?=$department->department_name ?></p>
                  </div>
                </td>
      		     
      		      <td class="p-0 m-0 text-center">
                    <?php 
                        $days=unserialize($row->day);
                        foreach ($days as $day) {
                          echo "<p class='bg-success p-0 m-1'>".$day."</p>";
                        }
                     ?>
                </td>
      		      <td class="p-0 m-0 text-center">
                  <?php 
                        $duty_ins=unserialize($row->duty_in);
                        foreach ($duty_ins as $duty_in) {
                          echo "<p class='bg-info p-0 m-1'>".$duty_in."</p>";
                        }
                  ?>
                </td>
                <td class="p-0 m-0 text-center">
                  <?php 
                        $duty_outs=unserialize($row->duty_out);
                        foreach ($duty_outs as $duty_out) {
                          echo "<p class='bg-danger p-0 m-1'>".$duty_out."</p>";
                        }
                  ?>
                </td>
      		      <td>
      		      	<button class="btn btn-info" onclick="Edit(this)">
      		      		<i class="fas fa-edit"></i>
      		      	</button>
                  <button class="btn btn-danger" onclick="Delete(this,<?= $row->id ?>)">
                    <i class="fas fa-trash" ></i>
                  </button>
      		      </td>
      		    </tr>
              <?php 
                  }
               ?>


            
        
      		  </tbody>
      		</table>
         
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

function Edit(){
  var Modal=document.getElementById('Modal');
  Modal.style.display="block";
  Modal.style.opacity="1";
}
function CloseModal(){
      var Modal=document.getElementById("Modal");
      
      Modal.style.display="none";
      Modal.style.opacity="0";
    
  }

function Delete(el,id){
    if(confirm("Are you want to Delete")){
        var xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange=function(){
          if(this.readyState==4 && this.status==200){
             el.parentElement.parentElement.remove();
          }
        }

        xhttp.open("GET","../server/duty_management.php?id="+id,true);
        xhttp.send();
    }
}


</script>