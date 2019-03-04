<?php include 'common/header.php';?>
<?php include 'common/banner.php';?>
<div class="appoitment_buttom ">
	<a href="appoitment.php">
	<i class="fas fa-clipboard-list"></i><br>
	Book Your Appoitment</a>
</div>
	<div class="container mb50">
		<div class="row">
			<h1 class="mb20 col-12">Our Contact</h1>
			<div class="head col-12 row mb50">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 float-left">
					<img src="images/newyork.jpg" alt="" style="width: 100%;">
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 float-left lineheight"> 
					<h3>Address</h3>
					<p>Yangon,Myanmar</p>
					<h3>Phone Number</h3>
					<p>09-123345612</p>
					<p>09-123345612</p>
					<h3></h3>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 bggreen text-white p50"> 
					
					<h3>Book Yours<br>Appoitment</h3>
					<a href="appoitment.php" class="btn btn-success m20 ">
					<i class="fas fa-clipboard-list"></i>
					Book Your Appoitment</a>
				</div>
			</div>
			<form class="col-12">
				<div class="row">
				      <div class="form-group col-md-6 ">
				        <label for="First Name">First Name</label>
				        <input name="first name" type="text" class="form-control" id="Name" placeholder="write your first name">
				      </div>
				      <div class="form-group col-md-6 ">
				       <label for="Last Name">Last Name</label>
				        <input name="last name " type="text" class="form-control" id="Name" placeholder="write your last name">
				      </div>
				      <div class="form-group col-md-6 ">
				        <label for="email">Email</label>
				        <input name=" email" type="email" class="form-control" id="email" placeholder="write your email">
				      </div>
				      <div class="form-group col-md-6 ">
				       <label for="phone">Phone</label>
				        <input name="phone" type="text" class="form-control" id="phone" placeholder="write your phone">
				      </div>
				      <div class="form-group col-md-12">
				        <label for="message">message</label>
				        <textarea class="form-control" id="message" rows="3" name="message"></textarea>
				      </div>
				      <button type="button" class="btn btn-outline-success col-md-2 btn_design">Submit</button>
				</div>
			</form>    	  
		</div>
	</div>
	<div id="map" style="height: 400px;"></div>
		<script>
		function myMap() {
		var mapProp= {
		    center:new google.maps.LatLng(16.8019281,96.1282532),
		    zoom:16,
		};
		var map=new google.maps.Map(document.getElementById("map"),mapProp);
		}
		</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSZ_7mluCfcFdA6WEt75zEWYTXWxfR8Gc&callback=myMap"></script>
<?php include 'common/footer.php';?>



