<?php include 'common/header.php';?>
<?php include 'common/banner.php';?>
<div class="container">
	<div id="appoitment" class=" col-12  ">
		<div class="row mb50">
			<h3 class="col-12 text-center h3">Book your Appoitment</h3>
			<form class="col-12">
			<legend>Personal Information:</legend>
	      <div class="form-group col-md-4 ">
	        <label for="First Name">First Name</label>
	        <input name="first name" type="text" class="form-control" id="Name" placeholder="write your first name">
	      </div>
	      <div class="form-group col-md-4 ">
	       <label for="Last Name">Last Name</label>
	        <input name="last name " type="text" class="form-control" id="Name" placeholder="write your last name">
	      </div>
	      <div class="form-group col-md-4 ">
	        <label for="age">Age</label>
	        <input name="age " type="number" class="form-control" id="age" placeholder="write your age">
	      </div>
	      <div class="form-group col-md-4 ">
	       <label for="phone">Phone</label>
	        <input name="phone" type="text" class="form-control" id="phone" placeholder="write your phone">
	      </div>
	      <div class="form-group col-md-4 ">
	        <label for="email">Email</label>
	        <input name=" email" type="email" class="form-control" id="email" placeholder="write your email">
	      </div>
	       <div class="form-group col-md-4 ">
	         <label >Gender</label>
	         <select class="custom-select">
	           <option selected>--SEX--</option>
	           <option value="1">Male</option>
	           <option value="2">Female</option>
	           <option value="3">Other</option>
	         </select>
	       </div>
	      <div class="form-group col-md-4 ">
	       <label for="state">State</label>
	        <input name=" state" type="text" class="form-control" id="state" placeholder="write your state">
	      </div>
	 
	     
	      <div class="form-group col-md-4 ">
	        <label for="city">City</label>
	        <input name="city" type="text" class="form-control" id="city" placeholder="write your city">
	      </div>
		  <div class="form-group col-md-4 ">
		   <label for="country">Country</label>
		   <input name=" country" type="text" class="form-control" id="country" placeholder="write your Country">
		 </div>

		      <div class="form-group col-md-12">
		         <label for="Address">Address</label>
		         <textarea class="form-control" id="Address" rows="1" name="Address"></textarea>
		       </div>
		  <legend class="">Appoitment Schedule</legend>
		  <div class="form-group col-md-4 ">
		   <label for="department">Department</label>
		    <select class="custom-select">
	          <option selected>Select Department</option>
	          <option value="1">Eye</option>
	          <option value="2">heart</option>
	          <option value="3">General</option>
	        </select>
		  </div>
		  	  <div class="form-group col-md-4 ">
		  	   <label for="department">Preferred Doctor</label>
		  	    <select class="custom-select">
		            <option selected>Select Doctor</option>
		            <option value="1">ko ko</option>
		            <option value="2">mg mg</option>
		           
		          </select>
		  	  </div>
		  	  <div class="form-group col-md-4 ">
		  	    <label for="date">Appoitment Date</label>
		  	    <input name=" date" type="date" class="form-control" id="date" >
		  	  </div>
		  <legend class="">Medical Problem</legend>
	      <div class="form-group col-md-6">
	        <label for="problem">Your Problem</label>
	        <textarea class="form-control" id="problem" rows="3" name="problem"></textarea>
	      </div>
	      <div class="form-group col-md-6">
	        <label for="remark">Remark</label>
	        <textarea class="form-control" id="remark" rows="3" name="remark"></textarea>
	      </div>
	      <button type="button" class="btn btn-outline-success col-md-2 btn_design">Submit</button>
	    </form>
		</div>
	</div>
</div>
<?php include 'common/footer.php';?>