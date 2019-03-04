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
        <li class="breadcrumb-item active">carrers Register</li>
      </ol>
      
        <div class="container-fluid">
      		<form class="row">
            
            <div class="form-group col-md-6 ">
              <label for="Name">Name</label>
              <input type="text" class="form-control" id="Name" placeholder="write your name" name="Name">
            </div>
            <div class="form-group col-md-6 ">
              <label for="Email">Email </label>
              <input type="email" class="form-control" id="Email" placeholder="name@example.com" name="Email">
            </div>
            <div class="form-group col-md-4">
              <label for="Phone">Phone</label>
              <input type="text" class="form-control" id="Phone" placeholder="write your Phone" name="Phone">
            </div>
            <div class="form-group col-md-4 ">
              <p class="text-center">Gender</p>
             <div class="row">
                <div class="col-md-4 text-center">
                  <input type="radio" checked class="mr-2" name="Gender" value="male"><p>Male</p>
                </div>
                <div class="col-4 text-center ">
                  <input type="radio" required class="mr-2" name="Gender" value="female"><p>Female</p>
                </div>
                <div class="col-4 text-center">
                  <input type="radio" required class="mr-2" name="Gender" value="other"><p>Other</p>
                </div>
             </div>  
            </div>
            <div class="form-group col-md-4">
              <label for="age" class="col-12">Date Of Birth</label>
    
                <select aria-label="Day" name="Birthday_day" id="day" title="Day" class="col-md-3 custom-select  ">
                    <option value="0">Day</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27" selected="1">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
                </select>

                <select aria-label="Month" name="Birthday_month" id="month" title="Month" class="col-md-4  custom-select">
                    <option value="0">Month</option><option value="1">Jan</option><option value="2">Feb</option><option value="3" selected="1">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sept</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
                </select>

                <select aria-label="Year" name="Birthday_year" id="year" title="Year" class="col-md-4  custom-select">
                    <option value="0">Year</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993" selected="1">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option>
                </select>
            </div>

            <div class="form-group col-md-12">
              <label for="Address">Address</label>
              <textarea class="form-control" id="Address" rows="3" name="Address"></textarea>
            </div>

            <div class="input-group col-md-12 mb-3">
             
              <div class="custom-file">

                <input type="file" class="custom-file-input" id="inputGroupFile04" name="Img">
                <label class="custom-file-label" for="inputGroupFile04" >Upload Your Photo</label>
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="Qualification">Qualification</label>
              <input type="text" class="form-control" id="Qualification" placeholder="Qualification" name="Qualification">
            </div>

            <div class="form-group col-md-6 ">
              <label for="Position">Position</label>
              <input type="text" class="form-control" id="Position" placeholder="doctor/marketing" name="Position">
            </div>

            <div class="form-group col-md-6 ">
              <label for="Department">Department</label>
              <input type="text" class="form-control" id="Department" placeholder="Eye/Heart" name="Department">
            </div>

            <div class="form-group col-md-6 ">
              <label for="salary">Job Salary</label>
              <input type="text" class="form-control" id="salary" placeholder="your salary" name="Job_Salary">
            </div>

            <div class="form-group col-md-12">
              <label for="Address">Job Experience</label>
             <textarea class="form-control" id="description" rows="3" name="Job_Experience"></textarea>
            </div>
              
            <div class="form-group col-md-12">
              <label for="description">Job Description</label>
              <textarea class="form-control" id="description" rows="3" name="Job_Description"></textarea>
            </div>
            

            <div class="form-group col-md-10">
             
              <div class="custom-file">
            
                <input type="file" class="custom-file-input" id="inputGroupFile04" name="Cv_Form">
                <label class="custom-file-label" for="inputGroupFile04">Upload Your Resume</label>
              </div>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-outline-secondary btn-block">Submit</button>
            </div>
             
          </form>
        </div>  
        
    </div>
  </div>
<?php include 'include/footer.php';?> 

<div id="Modal">
  <div id="Modal_wrapper" class="Cv_modal">
      <div class="modal-header">
          <h5 class="modal-title">Preview Cv form</h5>
          <button type="button" class="close" onclick="CloseModal()">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-5">
              <img src="../images/12.jpg" alt="" style="width
              :100%;height: 340px;" id="Img">
          </div>
          <div class="col-md-7">
                <ul>
                  <li>
                    <p>Name <span>-</span></p>
                    <p id="name">Please Insert Name</p>
                  </li>
                  <li>
                    <p>Email <span>-</span></p>
                    <p id="email">Please Insert Email</p>
                  </li>
                  <li>
                    <p>Phone <span>-</span></p>
                    <p id="phone">Please Insert Phone</p>
                  </li>
                  <li>
                    <p>Date Of Birth <span>-</span></p>
                    <p id="age">Please Select Age</p>
                  </li>
                   <li>
                    <p>Gender <span>-</span></p>
                    <p id="gender">Please Select Gender</p>
                  </li>
                  <li>
                    <p>Qualification <span>-</span></p>
                    <p id="qualification">Please Insert Qualification</p>
                  </li>
                  <li>
                    <p>Position <span>-</span></p>
                    <p id="position">Please Insert Position</p>
                  </li>
                  <li>
                    <p>Department <span>-</span></p>
                    <p id="department">Please Insert Department</p>
                  </li>
                  <li>
                    <p>Job Salary <span>-</span></p>
                    <p id="job_salary">Please Insert Job Salary</p>
                  </li>
                  
               </ul>
          </div>
        </div>  
           <h4 class"profile_tit p20">Address </h4>
            <i class="profile_desc" id="address">Please Insert Address</i>
           <h4 class"profile_tit p20" >Job Experience </h4>
            <p class="profile_desc" id="job_experience">Please Insert Job Experience</p>
            <h4 class"profile_tit p20">Job Description </h4>
            <p class="profile_desc" id="job_description">Please Insert Description</p>

            <i class="fa fa-2x fa-file">&nbsp;&nbsp;</i><span id="File"></span>
      </div>
      <div class="modal-footer">
        <button class="btn btn-info" onclick="CloseModal()">Cancel</button>
        <button class="btn btn-success" id="Comfirm_Cv">Comfirm</button>
      </div>
  </div>
</div>

<script>
/*var input=document.getElementsByTagName('input');
    input[0].value="hh";
    input[1].value="hh";
    input[2].value="hh";
    input[5].value="hshs";
    input[7].value="leepal";
    input[8].value="hh";
    input[9].value="hh";
    input[10].value="hh";
var textarea=document.getElementsByTagName('textarea');
    textarea[0].innerHTML="hhhh";
    textarea[1].innerHTML="hhhh";
    textarea[2].innerHTML="hhhh";

document.getElementsByName('Img').value="haha";
console.log( input[6].file)*/


  
  var form=document.querySelector("form");
  form.onsubmit=function(e){
    e.preventDefault();

    var Modal=document.querySelector("#Modal");
    Modal.style.display="block";
    Modal.style.opacity=1;


        var data=new FormData(this);
        var result={};
       for (var entry of data.entries())
        {
            result[entry[0]] = entry[1];
        }
         /*result = JSON.stringify(result)
         console.log(result);*/
     
      var name=document.getElementById('name');
      var email=document.getElementById('email');
      var phone=document.getElementById('phone');
      var age=document.getElementById('age');
      var gender=document.getElementById('gender');
      var qualification=document.getElementById('qualification');
      var position=document.getElementById('position');
      var department=document.getElementById('department');
      var job_salary=document.getElementById('job_salary');
      var address=document.getElementById('address');
      var job_experience=document.getElementById('job_experience');
      var job_description=document.getElementById('job_description');
      var img=document.getElementById('Img');
      var file=document.getElementById('File');

    var imgfile=(result.Img['type']=="image/jpeg")?img.src=URL.createObjectURL(result.Img):console.log('fuck');

    file.innerHTML=result.Cv_Form['name'];
     
     name.innerHTML= (result.Name)? result.Name:"Please Insert Name";
     email.innerHTML=(result.Email)? result.Email:"Please Insert Email";
     phone.innerHTML=(result.Phone)? result.Phone:"Please Insert Phone";
     age.innerHTML=result.Birthday_day+'-'+result.Birthday_month+'-'+result.Birthday_year;
     gender.innerHTML=(result.Gender)? result.Gender:"Please Select Gender";
     qualification.innerHTML=(result.Qualification)? result.Qualification:"Please Insert Qualification";
     position.innerHTML=(result.Position)? result.Position:"Please Insert Position";
     department.innerHTML=(result.Department)? result.Department:"Please Insert Department";
     job_salary.innerHTML=(result.Job_Salary)? result.Job_Salary:"Please Insert Job_Salary";
     address.innerHTML=(result.Address)? result.Address:"Please Insert Address";
     job_experience.innerHTML=(result.Job_Experience)? result.Job_Experience:"Please Insert Job_Experience";
     job_description.innerHTML=(result.Job_Description)? result.Job_Description:"Please Insert Job_Description";
    
            document.getElementById("Comfirm_Cv").onclick=function(){
                data.append('Submit','Insert');
                xhttp=new XMLHttpRequest();
                xhttp.onreadystatechange=function(){
                   if(this.readyState==4 && this.status==200){
                    alert(this.responseText);

                    
                   
                    location.reload();
                   }
                }

                xhttp.open("POST","../server/carrer_management.php",true);
                xhttp.send(data);

            }




  }


     function CloseModal(){
      var Modal=document.getElementById("Modal");
      
      Modal.style.display="none";
      Modal.style.opacity="0";
     
     
  }
</script>

