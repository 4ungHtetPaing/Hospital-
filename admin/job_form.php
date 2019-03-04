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
         <li class="breadcrumb-item active col-11">Career List
          <a class="btn btn-outline-info float-right" href="job_form.php">Job Form</a>
          
        </li>
      </ol>
      
      <div class="container">
        <form class="row" action="../server/job_form_management.php" method="post">
          <div class="col-md-6">
              <div class="form-group row">
                <label  class="col-sm-3 col-form-label">Department</label>
                <div class="col-sm-9">
                  <select name="Department_Id" id="" class="form-control">
                      <?php 
                          require_once("../server/department_management.php");
                          $department=department::All();
                          while ($row=mysqli_fetch_object($department)) { ?>
                          
                          <option value="<?= $row->id ?>"><?= $row->department_name ?></option>

                      <?php  }
                       ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label  class="col-sm-3 col-form-label">Job Salary</label>
                <div class="col-sm-9">
                  <input type="number" name="Job_Salary" class="form-control" placeholder="job salary">
                </div>
              </div>
              <br>
              <div class="form-group row">
                <p class="text-center col-12">Last Date Of Cv Form</p>
                <div class="col-sm-10 offset-sm-1">
                   <div class="row">
                     <div class="col-sm-4">
                        <select name="Day" id="" class="form-control">
                            <option value="">Day</option>
                         <?php 
                          for($i=0;$i<=31;$i++){?>
                            <option value="<?=$i ?>"  <?=($i== date('d',time()))?"selected":"";?> ><?= $i?></option>
                         <?php } 
                          ?>
                        </select>
                     </div>
                     <div class="col-sm-4">
                         <select name="Month" id="" class="form-control">
                            <option value="">Month</option>
                          <?php 
                          for($i=0;$i<=12;$i++){?>
                            <option value="<?=$i ?>" <?=($i== date('m',time()))?"selected":"";?> ><?= $i?></option>
                         <?php }
                          ?>
                        </select>
                     </div>
                     <div class="col-sm-4">
                         <select name="Year" id="" class="form-control">
                            <option value="">Year</option>
                          <?php 
                          for($i=2018;$i<=2058;$i++){?>
                            <option value="<?=$i ?>" <?=($i== date('Y',time()))?"selected":"";?> ><?= $i?></option>
                         <?php }
                          ?>
                        </select>
                     </div>
                   </div>
                </div>
              </div>
              <button class="btn btn-block btn-outline-primary mt-5" type="submit" name="Submit" value="Insert"> Submit</button>
          </div>
          <div class="col-md-6">
              <div class="form-group row">
                <label  class="col-sm-3 col-form-label">Job Position</label>
                <div class="col-sm-9">
                  <input type="text" name="Job_Position" class="form-control" placeholder="job position">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Job Vacancy</label>
                <div class="col-sm-9">
                  <input type="number" name="Job_Vacancy" class="form-control" >
                </div>
              </div>
              <div class="form-group row">
                
                <div class="col-12">
                  <label  >Job Description</label>
                  <textarea type="text" class="form-control col-sm-9 offset-sm-3"  rows="5" name="Job_Description"></textarea>
                </div>
              </div>
          </div>
        </form>   
      </div>
      <hr class="bg-info">
      <?php 
        require_once "../server/job_form_management.php";
        require_once "../server/department_management.php";
       ?>
      <table class="table text-center">
                <thead>
                  
                  
                    <th scope="col">#</th>
                    <th scope="col">Department</th>
                    <th scope="col">Job Position</th>
                    <th scope="col0">Job  Salary</th>
                    <th scope="col">Job Vacancy</th>
                    <th scope="col">Job Description</th>
                    <th scope="col">Manage</th>
                </thead>
                <tbody>
                  <?php 
                      $i=1;
                      $job_form=job_form::All();
                      while ($row=mysqli_fetch_object($job_form)) {
                   ?>
                  <tr >
                    <th scope="row"><?= $i ?></th>
                    <td>
                        <?php $id=$row->department_id;
                           echo mysqli_fetch_object(department::Where('id',$id))->department_name;
                        ?>  
                    </td>
                    <td><?=$row->job_position?></td>
                    <td><?=$row->job_salary?></td>
                    <td><?=$row->job_vacancy?></td>
                    <td>
                       <?php $str=$row->job_description;
                          echo(strlen($str)<30)?$str:substr($str,0,30).'...';
                       ?> 
                    </td>
                    <td>
                        
                        <p class="btn btn-outline-info fas fa-info" onclick="Modal(<?=$row->id?>)"></p>
                    </td>
                  </tr>
                  <?php 
                        $i++;
                      }
                   ?>
                </tbody>
      </table>
     
         
    </div>
  </div>
<?php include 'include/footer.php';?> 

<div id="Modal">
   <div id="Modal_wrapper">
      <div class="modal-header">
          <h5 class="modal-title text-center"></h5>
          <button type="button" class="close" onclick="CloseModal()">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <div class="job_form col-12">
                <div class="container">
                     <h4 class="text-center pb-4">Job Form Preview</h4>
                  <div class="row">
                    <p class="col-sm-6 px-5">Department <b class="float-right">-</b></p>
                    <p class="col-sm-6 pr-5" id="Department">leee</p>
                  </div>
                  <div class="row">
                    <p class="col-sm-6 px-5">Job Position <b class="float-right">-</b></p>
                    <p class="col-sm-6 pr-5" id="Job_Position">Cleaner</p>
                  </div> 
                  <div class="row">
                    <p class="col-sm-6 px-5">Job Salary <b class="float-right">-</b></p>
                    <p class="col-sm-6 pr-5" id="Job_Salary">3000</p>
                  </div>
                  <div class="row">
                    <p class="col-sm-6 px-5">Job Vacancy <b class="float-right">-</b></p>
                    <p class="col-sm-6 pr-5" id="Job_Vacancy">3</p>
                  </div>
                  <div class="row">
                    <p class="col-sm-6 px-5">Job Description <b class="float-right">-</b></p>
                    <p class="col-sm-6 text-justify pr-5" id="Job_Description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus aperiam, tempora aspernatur in fugiat facere, reiciendis deleniti inventore molestias accusamus quia commodi delectus, minus nisi repudiandae, doloremque odit debitis saepe.</p>
                  </div>
                  <div class="row">
                    <div class=" col-sm-6 pr-5" id="Management_Row">
                      <button class="btn btn-outline-danger " onclick="Del()">Delete</button>
                      <button class="btn btn-outline-warning  mx-3 " onclick="Edit()">Edit</button>
                    </div>
                  </div>
                  
                    
                     
                </div>
          </div>
      </div>
   </div>
</div>

<script>

  function Modal(id){
      var department=document.getElementById('Department');
      var job_position=document.getElementById('Job_Position');
      var job_salary=document.getElementById('Job_Salary');
      var job_vacancy=document.getElementById('Job_Vacancy');
      var job_description=document.getElementById('Job_Description');
      var Modal=document.getElementById('Modal');
      Modal.style.display="block";
      Modal.style.opacity="1";
      Modal.style.paddingTop="80px";
      //alert(id);
      var xhttp=new XMLHttpRequest();
       xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
          data=JSON.parse(this.responseText);
          //department.innerHTML=data.department_id;
          localStorage.id=data.id;
          job_position.innerHTML=data.job_position;
          job_salary.innerHTML=data.job_salary;
          job_vacancy.innerHTML=data.job_vacancy;
          job_description.innerHTML=data.job_description;
          
         
        }
      }
      xhttp.open("GET","../server/job_form_management.php?id="+id,true);
      xhttp.send();
     
  }

  function Cancel(){
    var department=document.getElementById('Department');
    var job_position=document.getElementById('Job_Position');
    var job_salary=document.getElementById('Job_Salary');
    var job_vacancy=document.getElementById('Job_Vacancy');
    var job_description=document.getElementById('Job_Description');

    department.innerHTML=localStorage.department;
    job_position.innerHTML=localStorage.job_position;
    job_salary.innerHTML=localStorage.job_salary;
    job_vacancy.innerHTML=localStorage.job_vacancy;
    job_description.innerHTML=localStorage.job_description;

    var row=document.getElementById("Management_Row");
    row.innerHTML="<button class='btn btn-outline-danger' onclick='Del()'>Delete</button>"
                  +"<button class='btn btn-outline-warning  mx-3'  onclick='Edit()'>Edit</button>";
  }

  function CloseModal(){
      var Modal=document.getElementById('Modal');
      Modal.style.display="none";
      Modal.style.opacity="0";

      Cancel();
    
  }

  function Del(){
      var id=localStorage.id;
      if(confirm("Are You Sure!")){
           window.location.replace("../server/job_form_management.php?del_id="+id);
      }
     
  }

  function Edit(){
    var department=document.getElementById('Department');
    var job_position=document.getElementById('Job_Position');
    var job_salary=document.getElementById('Job_Salary');
    var job_vacancy=document.getElementById('Job_Vacancy');
    var job_description=document.getElementById('Job_Description');
    localStorage.department=department.innerHTML;
    localStorage.job_position=job_position.innerHTML;
    localStorage.job_salary=job_salary.innerHTML;
    localStorage.job_vacancy=job_vacancy.innerHTML;
    localStorage.job_description=job_description.innerHTML;

    department.innerHTML="<input type='text' value='"+localStorage.department+"' class='form-control'>";
    job_position.innerHTML="<input type='text' value='"+localStorage.job_position+"' class='form-control'>";
    job_salary.innerHTML="<input type='number' value='"+localStorage.job_salary+"' class='form-control'>";
    job_vacancy.innerHTML="<input type='number' value='"+localStorage.job_vacancy+"' class='form-control'>";
    job_description.innerHTML="<textarea class='form-control' rows='3'>"+localStorage.job_description+"</textarea>";

    var row=document.getElementById("Management_Row");
    row.innerHTML="<button class='btn btn-outline-warning' onclick='Cancel()' >Cancel</button>"
                  +"<button class='btn btn-success mx-3' >Update</button>";


  }
</script>

<style>
 
</style>