<?php include 'include/header.php';?>
  <!-- Navigation-->
  <?php include 'include/sidebar.php';?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="department.php">Department</a>
        </li>
        <li class="breadcrumb-item active">Add Department</li>
      </ol>
      <div class="container-fluid">
          <div class="row">
             <div class="col-md-4 offset-md-4">
                <form method="post" action="../server/department_management.php" enctype="multipart/form-data">
                  <div class="form-group">
                     <label for="Name">Department Name :</label>
                     <input type="text" class="form-control" id="Name" placeholder="write department name" name="Department_Name">
                  </div>
                  <br>
                  <div class="form-group">
                     <label for="Description">Description :</label>
                     <textarea  class="form-control" id="Description"  name="Description"></textarea>
                  </div>
                  <br>
                  <br>
                  <div class="custom-file">

                      <input type="file" class="custom-file-input" id="inputGroupFile04"  name="Img" >
                      <label class="custom-file-label" for="inputGroupFile04">Upload Your Resume</label>
                  </div>
                 

                   <button type="submit" class="btn btn-outline-secondary btn-block mt-5" name='Submit' value="Insert">Submit</button>
                </form>   
             </div>
          </div>
      </div>
    </div>
<?php include 'include/footer.php';?> 


