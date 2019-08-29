<?php
if(!empty($homescreen)){
	foreach ($homescreen as $value) {
		?>
			<div id="deskstop-slider"><a href="<?php echo base_url(); ?>index.php/event?me=<?php echo $value['event_id']; ?>">
  			<img class="mySlides img-responsive" src="<?php echo $value['slider_image']; ?>"></a></div>
			<a href="<?php echo base_url(); ?>index.php/event?me=<?php echo $value['event_id']; ?>"><button class="explore">
  			Purchase Ticket</button></a>

  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>

		<?php
	}
} else {
	?>
		<div id="deskstop-slider"><a href="<?php echo base_url('index.php/coming_soon');?>">
		<img class="mySlides img-responsive" src="assets/images/default.jpg"></a></div>
		<div class="defaultBanner">
		Tickets4U allows you to sell tickets online for a festival, concert, conference, movie, play, sports tournament or transport business. 
		<a href="<?php echo base_url('index.php/coming_soon');?>">Read more</a>
        </div>

	<?php
}
?>
  

<style>
	.view{
		visibility: hidden !important;
	}
</style>
<div class="spacer-35"></div>
<section class="section-upcoming-events view">
	<div class="container">
	<div class="row">
	<!-- start upcoming event slider Section -->
	<div class="col-lg-12 col-md-6">
		<div class="all_team">

			<?php
          if(count($thumbs) >= 3){
				foreach ($thumbs as $value) {
					?>
			  			<div class="sngl_team" style="padding:10px;">
							<a href="<?php echo base_url(); ?>index.php/event?me=<?php echo $value['event_id']; ?>">
							
							<?php 
							$date = date('Y-m-d');
							$date2 = $value['event_date'];
							if(strtotime($date2) > strtotime($date)){
						
								?>
							<div class="card" style=" padding-bottom:50px; height:400px;">
							  <img src="<?php echo $value['cover_image']; ?>" alt="<?php echo $value['event_title']; ?>" style="width:300px; height:250px;">
							  <div class="card-container" style="text-align: left;">
							  	 <div style="font-size: 11px;"><b>Event:</b> <font style="color:#514848;"><?php echo $value['event_title']; ?></font></div> 
								<div style="font-size: 11px;"><b>Event Date:</b> <font style="color:#514848;"><?php echo $value['event_date']; ?></font></div> 
							  	 <div style="font-size: 11px;"><b>Location:</b> <font style="color:#514848;"><?php echo $value['event_venue']; ?></font></div> 
								<button style="background-color: #4CAF50;border: none;color: white;padding: 5px 32px;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;bottom: 4px;" class="button">Read more</button>
							  </div>
							</div>
					
						<?php
						} else {
							?>
							<div class="card" style="padding-bottom:50px; height:400px;">
							  <img src="<?php echo $value['cover_image']; ?>" alt="<?php echo $value['event_title']; ?>" style="width:300px; height:250px;">
							  <div class="card-container past-event" style="text-align: left;  filter: blur(1px);grid-column: 1/-1; grid-row: 1/-1; filter: grayscale(100%); filter: gray; ">
							  	 <div style="font-size: 11px;"><b>Event:</b> <font style="color:#514848;filter: blur(1px);"><?php echo $value['event_title']; ?></font></div> 
								<div style="font-size: 11px;"><b>Event Date:</b> <font style="color:#514848;filter: blur(1px);"><?php echo $value['event_date']; ?></font></div> 
							  	 <div style="font-size: 11px;"><b>Location:</b> <font style="color:#514848;filter: blur(1px);"><?php echo $value['event_venue']; ?></font></div> 
							 <button style="background-color: #4CAF50;border: none;color: white;padding: 5px 32px;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;bottom: 4px;" class="button">Read more</button>
							  </div>
							</div>
					
							<?php
						}
						?>



							</a>
						</div>


					<?php
				}
          }
			?>
		</div>
	</div>
<!-- End upcoming event slider Section -->
</div>
</div>
<style>
	.view{
		visibility: visible !important;
	}
</style>
<div class="spacer-35"></div>
</section>

		

		<section class="section-event-category">
			
			<div class="container">
			<div class="clearfix">	
				<div class="row">
					<div class="section-header">
						<h2>Event by Categories</h2>
					</div>
					<div class="section-content">
						
							<?php
							foreach ($event_category as $category) {
								if($category['id']=="1"){
							?>
								<div class="category-1 col-sm-2">	
							   		<a href="<?php echo base_url('index.php/Welcome/event_category/'.$category['id']); ?>">
									<img src="assets/images/running.png" style="width:100px; height:100px;">
								 	<div><?php echo $category['category_name']; ?></div></a>
								</div>
									<?php }
									elseif($category['id']=="3"){
									?>
								<div class="category-1 col-sm-2">	
							   		<a href="<?php echo base_url('index.php/Welcome/event_category/'.$category['id']); ?>">
									<img src="assets/images/singer.png" style="width:100px; height:100px;">
								 	<div><?php echo $category['category_name']; ?></div></a>
								</div>
									<?php }
									elseif($category['id']=="4"){
										?>
								<div class="category-1 col-sm-2">	
							   		<a href="<?php echo base_url('index.php/Welcome/event_category/'.$category['id']); ?>">
									<img src="assets/images/theatre-masks.png" style="width:100px; height:100px;">
								 	<div><?php echo $category['category_name']; ?></div></a>
								</div>
									<?php }
									elseif($category['id']=="5"){
										?>
								<div class="category-1 col-sm-2">	
										<a href="<?php echo base_url('index.php/Welcome/event_category/'.$category['id']); ?>">
									 <img src="assets/images/parties.png" style="width:100px; height:100px;">
									  <div><?php echo $category['category_name']; ?></div></a>
								</div>
									 <?php }
									 elseif($category['id']=="6"){
										 ?>
								<div class="category-1 col-sm-2">	
										 <a href="<?php echo base_url('index.php/Welcome/event_category/'.$category['id']); ?>">
									  <img src="assets/images/communities.png" style="width:100px; height:100px;">
									   <div><?php echo $category['category_name']; ?></div></a>
								</div>
									  <?php }
									  else{
										  ?>
								<div class="category-1 col-sm-2">	
										  <a href="<?php echo base_url('index.php/Welcome/event_category/'.$category['id']); ?>">
									   <img src="assets/images/class.png" style="width:100px; height:100px;">
										<div><?php echo $category['category_name']; ?></div></a>
								 </div>
									   <?php }?>		
						
								
							<?php  }?>
					
					</div>
				</div>
				</div>
			</div>
			
		<div class="spacer-35"></div>
		<div class="spacer-35"></div>
		<div class="spacer-35"></div>	
        <div class="container-fluid" id="ipay_channels_icons">
			<div style="width: 84%; margin: 0 auto; background-color: #eee;padding-top: 5px;padding-bottom: 5px;">
			<div class="row align-items-start">
				<div class="section-header"><b>AVAILABLE PAYMENT CHANNELS</b>
					<img src="assets/images/channels.png" class="ipay_channels_icons">
					<a href="<?php echo base_url(); ?>index.php/upcoming_events/0">See all upcoming events</a>
				</div>
			</div>
		    </div>
		</div>
		</section>


		<!--<section class="section-newsletter">
			<div class="container">
				<div class="section-content">
					<h2>Stay Up to date With Your Favorite Events!</h2>
					<?php
					if ($this->session->tempdata('success')) {
						echo "<div>".$this->session->tempdata('success').".</div>";
					}
					if ($this->session->tempdata('fail')) {
						echo "<div>".$this->session->tempdata('fail')."</div>";
					}
					if ($this->session->tempdata('failed')) {
						echo "<div>".$this->session->tempdata('failed')."</div>";
					}
					?>

					<form method="POST" action = "<?php echo base_url('index.php/Welcome/subscribers'); ?>">
						<div class="newsletter-form clearfix">
							<input type="email" name="email" placeholder="Your Email Address">
							<input type="submit" value="Subscribe">
						</div>
				</form>
				</div>
			</div>
		</section>-->

		<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 15000); // Change image every 15 seconds
}
</script>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}
</script>







<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="events_slider/css/normalize.css">
        <link rel="stylesheet" href="events_slider/css/main.css">
        <link rel="stylesheet" href="events_slider/css/bootstrap.min.css">
        <link rel="stylesheet" href="events_slider/css/font-awesome.min.css">
        <link rel="stylesheet" href="events_slider/css/owl.carousel.css">
        <link rel="stylesheet" href="events_slider/css/responsive.css">
        <link rel="stylesheet" href="events_slider/css/style.css">

        <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 95%;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        .card-container {
            padding: 2px 16px;
            background: #fff;
        }
        </style>






<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="events_slider/js/vendor/jquery-1.11.2.min.js"></script>

<script src="events_slider/js/isotope.pkgd.min.js"></script>
<script src="events_slider/js/bootstrap.min.js"></script>
<script src="events_slider/js/jquery-ui.js"></script>
<script src="events_slider/js/appear.js"></script>
<script src="events_slider/js/jquery.counterup.min.js"></script>
<script src="events_slider/js/waypoints.min.js"></script>
<script src="events_slider/js/owl.carousel.min.js"></script>
<script src="events_slider/js/jquery.nicescroll.min.js"></script>
<script src="events_slider/js/jquery.easing.min.js"></script>
<script src="events_slider/js/scrolling-nav.js"></script>
<script src="events_slider/js/plugins.js"></script>


<script src="events_slider/js/main.js"></script>

<script src="events_slider/showHide.js" type="text/javascript"></script>
