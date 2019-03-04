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
      		      <th scope="col">Appoiment</th>
      		      <th scope="col">schedule</th>
      		      <th scope="col">Duty time</th>
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
                    $carrer=carrer::Where('id',$carrer_id);
                    echo mysqli_fetch_object($carrer)->name;
                  ?>
                  <select name="Carrer_Id" id="Name" class="form-control" style="display: none">
                      <?php 
                          require_once("../server/carrer_management.php");
                          $carrer=carrer::All();
                          while ($carrer_row=mysqli_fetch_object($carrer)) { ?>
                          
                          <option <?= ($carrer_row->id==$carrer_id)?"selected":""; ?> value="<?= $carrer_row->id; ?>"><?= $carrer_row->name; ?></option>

                      <?php  }
                       ?>
                  </select>
                </td>
      		      <td>
                  <?php 
                    $department_id=$row->department_id;
                    require_once("../server/department_management.php");
                    $department=department::Where('id',$department_id);
                    echo mysqli_fetch_object($department)->department_name;
                  ?>
                   <select name="Carrer_Id" id="Name" class="form-control" style="display: none">
                      <?php 
                          require_once("../server/department_management.php");
                          $department=department::All();
                          while ($department_row=mysqli_fetch_object($department)) { ?>
                          
                          <option <?= ($department_row->id==$department_id)?"selected":""; ?> value="<?= $department_row->id; ?>"><?= $department_row->department_name; ?></option>

                      <?php  }
                       ?>
                  </select>
                </td>
      		      <td><?= $row->appoiment ?></td>
      		      <td><?= $row->schedule ?></td>
      		      <td><?= $row->duty_time ?></td>
      		      <td>
      		      	<button class="btn btn-info" onclick="Edit(this)">
      		      		<i class="fas fa-edit"></i>
      		      	</button>
                  <button class="btn btn-danger" onclick="Delete(this)">
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

<script>

function Edit(el){
      $('.close_btn').click();
/*Original values*/
      var name=el.parentElement.parentElement.children[1].innerHTML;
      var department=el.parentElement.parentElement.children[2].innerHTML;
      var appoiment=el.parentElement.parentElement.children[3].innerHTML;
      var schedule=el.parentElement.parentElement.children[4].innerHTML;
      var duty_time=el.parentElement.parentElement.children[5].innerHTML;
/*Original values*/

  /*append input*/
      el.parentElement.parentElement.children[1].innerHTML="<input class='form-control' value="+name+">";
      el.parentElement.parentElement.children[2].innerHTML="<input class='form-control' value="+department+">";
      el.parentElement.parentElement.children[3].innerHTML="<input class='form-control' value="+appoiment+">";
      el.parentElement.parentElement.children[4].innerHTML="<input class='form-control' value="+schedule+">";
      el.parentElement.parentElement.children[5].innerHTML="<input class='form-control' value="+duty_time+">"
/*append input*/
    el.parentElement.innerHTML="<button class='btn btn-success' onclick='Update(this)'><i class='fas fa-check' ></i></button>  "+
    "<button class='btn btn-danger close_btn' onclick='Close(this)'><i class='fas fa-times' ></i></button>"
    ;
     
    localStorage.setItem('name',name);
    localStorage.setItem('department',department);
    localStorage.setItem('appoiment',appoiment);
    localStorage.setItem('schedule',schedule);
    localStorage.setItem('duty_time',duty_time);

}

function Close(el){

    el.parentElement.parentElement.children[1].innerHTML=localStorage.name;
    el.parentElement.parentElement.children[2].innerHTML=localStorage.department;
    el.parentElement.parentElement.children[3].innerHTML=localStorage.appoiment;
    el.parentElement.parentElement.children[4].innerHTML=localStorage.schedule;
    el.parentElement.parentElement.children[5].innerHTML=localStorage.duty_time;

    el.parentElement.innerHTML="<button class='btn btn-danger' onclick='Delete(this)'><i class='fas fa-trash' ></i></button>  "+
    "<button class='btn btn-danger' onclick='Edit(this)'><i class='fas fa-edit' ></i></button>"
    ;
    localStorage.clear();
}

function Delete(el){
  var id=el.parentElement.parentElement.children[0].attributes[1].value;


 var xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange=function(){
    if(this.status==200 && this.readyState==4){
        el.parentElement.parentElement.remove();
        alert(this.responseText);
    }
  }

  xhttp.open("GET","../server/duty_management.php?id="+id,true);
  /*xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");*/
  xhttp.send();


}

function Update(el){
    var id=el.parentElement.parentElement.children[0].attributes[1].value;
    var name=el.parentElement.parentElement.children[1].children[0].value;
    var department=el.parentElement.parentElement.children[2].children[0].value;
    var appoiment=el.parentElement.parentElement.children[3].children[0].value;
    var schedule=el.parentElement.parentElement.children[4].children[0].value;
    var duty_time=el.parentElement.parentElement.children[5].children[0].value;

     name=(name!='')?name:localStorage.name;
     department=(department!='')?department:localStorage.department;
     appoiment=(appoiment!='')?appoiment:localStorage.appoiment;
     schedule=(schedule!='')?schedule:localStorage.schedule;
     duty_time=(duty_time!='')?duty_time:localStorage.duty_time;
    


   var xhttp=new XMLHttpRequest();
   var data=new FormData();
   data.append('Update','DoUpDaTe');
   data.append('Id',id)
   data.append('Name',name);
   data.append('Department',department);
   data.append('Appoiment',appoiment);
   data.append('Schedule',schedule);
   data.append('Duty_Time',duty_time);

   xhttp.onreadystatechange=function(){
      if(this.readyState==4 && this.status==200){
           
            var data=JSON.parse(this.responseText);
            localStorage.setItem('name',data.name);
            localStorage.setItem('department',data.department);
            localStorage.setItem('appoiment',data.appoiment);
            localStorage.setItem('schedule',data.schedule);
            localStorage.setItem('duty_time',data.duty_time);
              Close(el);
              
      }
   }

   xhttp.open('POST',"../server/duty_management.php",true);
   xhttp.send(data);

}


</script>