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
        <li class="breadcrumb-item active">Doctor Add</li>
      </ol>
      <div id="doctor_register" class=" col-12">
        <div class="container-fluid">
          <form class="row" method="post" action="../server/duty_management.php">
              <div class="col-md-6">
                  <div class="form-group col-md-12">
                    <label for="Name">Name </label>
                    <select name="Carrer_Id" id="Name" class="form-control">
                            <option value="">Please Select Name</option>
                            <?php 
                                require_once("../server/carrer_management.php");
                                $carrer=carrer::Where('status',1);
                                while ($row=mysqli_fetch_object($carrer)) { ?>
                                
                                <option value="<?= $row->id ?>"><?= $row->name ?></option>

                            <?php  }
                             ?>
                        </select>
                  </div>
                  <div class="form-group col-md-12 mt-5">
                    <label for="Department">Department </label>
                    <select name="Department_Id" id="" class="form-control">
                            <option value="">Please Select Department</option>
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
             <div class="col-md-6">
                <table class="table ">
                  <thead>
                    <tr>
                      <th scope="col">Day</th>
                      <th scope="col">Duty In</th>
                      <th scope="col">Duty Out</th>
                    </tr>
                  </thead>
                  <tbody>
                 
                    <tr>
                      <td>
                          Mon
                          <input type="checkbox" class="float-right" value="mon" name="Day[]" onchange="enableInput(this)">
                      </td>
                      <td>
                          <input type="time" value="12:00" name="Duty_In[]" disabled> 
                      </td>
                      <td>
                          <input type="time" value="12:00" name="Duty_Out[]" disabled> 
                      </td>
                    </tr>

                    <tr>
                      <td>
                          Tue
                          <input type="checkbox" value="tue" class="float-right" name="Day[]" onchange="enableInput(this)">
                      </td>
                      <td>
                          <input type="time" value="12:00" name="Duty_In[]" disabled> 
                      </td>
                      <td>
                          <input type="time" value="12:00" name="Duty_Out[]" disabled> 
                      </td> 
                    </tr>

                    <tr>
                      <td>
                          Wed
                          <input type="checkbox" value="wed" class="float-right" name="Day[]" onchange="enableInput(this)">
                      </td>
                      <td>
                          <input type="time" value="12:00" name="Duty_In[]" disabled> 
                      </td>
                      <td>
                          <input type="time" value="12:00" name="Duty_Out[]" disabled> 
                      </td> 
                    </tr>

                    <tr>
                      <td>
                          Thu
                          <input type="checkbox" value="thu" class="float-right" name="Day[]" onchange="enableInput(this)">
                      </td>
                      <td>
                          <input type="time" value="12:00" name="Duty_In[]" disabled> 
                      </td>
                      <td>
                          <input type="time" value="12:00" name="Duty_Out[]" disabled> 
                      </td> 
                    </tr>

                    <tr>
                      <td>
                          Fri
                          <input type="checkbox" value="fri" class="float-right" name="Day[]" onchange="enableInput(this)">
                      </td>
                      <td>
                          <input type="time" value="12:00" name="Duty_In[]" disabled> 
                      </td>
                      <td>
                          <input type="time" value="12:00" name="Duty_Out[]" disabled> 
                      </td> 
                    </tr>
                    <tr>
                      <td>
                          Sat
                          <input type="checkbox" value="sat" class="float-right" name="Day[]" onchange="enableInput(this)">
                      </td>
                      <td>
                          <input type="time" value="12:00" name="Duty_In[]" disabled> 
                      </td>
                      <td>
                          <input type="time" value="12:00" name="Duty_Out[]" disabled> 
                      </td> 
                    </tr>
                    <tr>
                      <td>
                          Sun
                          <input type="checkbox" value="sun" class="float-right" name="Day[]" onchange="enableInput(this)">
                      </td>
                      <td>
                          <input type="time" value="12:00" name="Duty_In[]" disabled> 
                      </td>
                      <td>
                          <input type="time" value="12:00" name="Duty_Out[]" disabled> 
                      </td> 
                    </tr>
                  </tbody>
                </table>
             </div>
            <div class=" col-md-6 ">
                    <br>
                    <button type="submit" class="btn btn-outline-info btn-block mt-2" name='Submit'>Submit</button>
            </div>
            
            
          </form>
        </div>
      </div>
    </div>
<?php include 'include/footer.php';?> 
<script>
   function enableInput(el){
    if(el.checked){
        el.parentElement.parentElement.children[1].children[0].disabled=false;
        el.parentElement.parentElement.children[2].children[0].disabled=false;
    }else{
        el.parentElement.parentElement.children[1].children[0].disabled=true;
        el.parentElement.parentElement.children[2].children[0].disabled=true;
    }
     
   }
</script>