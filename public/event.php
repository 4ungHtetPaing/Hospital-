<?php include 'common/header.php';?>
<?php include 'common/banner.php';?>
<div class="appoitment_buttom ">
	<a href="appoitment.php">
	<i class="fas fa-clipboard-list"></i><br>
	Book Your Appoitment</a>
</div>
<div class="container">
	<div class="row mar_B30">
	
		    <h3 class="aboutit mar_TB30 col-12">Our Event</h3>
		<?php require_once "../server/event_management.php";
			$event=event::All();
			while ($row=mysqli_fetch_object($event)) {
		?>

		    <div class="event pad_TB10 col-lg-6 col-md-6 col-sm-12 col-xs-12 mar_B30" style="border: none !important;">
		        <a href="#" class="fll mar_T15"><img src="../server/Uploads/Event/<?=$row->img;?>" alt="" class="imgcircle"></a>
		        <p class="margin_L90">
		            <span class="date">22.5.13</span><br>
		            <span class="h3 font-weight-bold" >
		            	 <?php $str=$row->title;
                             echo (strlen($str)<25)?$str:substr($str,0,25)." ....";
                         ?>
		            </span><br>
		            <?php $str=$row->description;
                             echo (strlen($str)<250)?$str:substr($str,0,250)." ....";
                    ?>
		        </p>
		        <a class="btn btn-outline-success mar_B30 margin_L90" href="event_detail.php?detail_id=<?=$row->id;?>">DETAIL EVENT</a>
		    </div>
		<?php    
			}
		 ?>    

	</div>
</div>

<?php include 'common/footer.php';?>