<footer id="colophon" class="site-footer">

     <div class="main-footer">
        <div class="container">
            <div class="row">
			  <div class="col-md-4 footer-1">
				  <div class="social clearfix">
					<h3>Stay Connected</h3>
				  </div>
				  <div class="social clearfix">
					<ul>
						<li class="facebook">
							<a href="#">
								<i class="fa fa-facebook" aria-hidden="true"></i>
								Facebook
							</a>
						</li>
						<li class="twitter">
							<a href="#">
								<i class="fa fa-twitter" aria-hidden="true"></i>
								Twitter
							</a>
						</li>
						<li >
							<a href="#">
								<i class="fa fa-whatsapp" aria-hidden="true" style="background:#00E34A;width: 25px;height: 25px;line-height: 20px;font-size: 13px;text-align: center;margin: 0 7px 0 0;color:#fff;"></i>
								WhatsApp
							</a>
						</li>
						<li class="rss">
							<a href="#">
								<i class="fa fa-rss-square" aria-hidden="true"></i>
								RSS
							</a>
						</li>
					</ul>
				  </div>
			  </div>


			  <div class="col-md-4 footer-2" id="importantplace">
			      <div class="support clearfix">
					<h3>Support and Contact</h3>
				  </div>
			          <?php echo form_open('help');?>
                          	<div class="form-group">
                              <input type="email" name="Email" class="form-control" placeholder="your email" required>
                          	</div>
                            <div class="form-group">
                              <input type="text" name="subject" class="form-control"  placeholder="subject"  required>
                          	</div>
                            <div class="form-group">
                               <textarea name="comment" placeholder="write something..." required></textarea>
                          	</div>
                          	<div class="form-group">
			                  <Button type="submit" name="send" class="btn btn-primary" href="#">send</Button>
			                </div>
					 </form>
			  </div>

			  <div class="col-md-4 footer-2">
				 <div class="footer-dashboard">
					<h3>TICKET4U Dashboard</h3>
					<ul>
						<li>
			               <a href="http://dashboard.tickets4u.co.ke/index.php/login">
						     <i class="fa fa-user-plus" aria-hidden="true" style="background:#00E34A;width: 20px;height: 20px;line-height: 20px;font-size: 13px;text-align: center;margin: 0 7px 0 0;color:#fff;"></i>
							REGISTER
						   </a>
			            </li>
						<li>
							<a href="http://dashboard.tickets4u.co.ke/index.php/login">
						      <i class="fa fa-sign-in" aria-hidden="true" style="background:#00E34A;width: 20px;height: 20px;line-height: 20px;font-size: 13px;text-align: center;margin: 0 7px 0 0;color:#fff;"></i>
							LOGIN
						   </a>
						</li>
					</ul>
				  </div>
			  </div>
            </div>
        </div>
     </div>



		<div class="top-footer">
		  <div class="container">
		     <div class="row">

			    <div class="col-md-4">
				  <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo"></a>
			    </div>
			    <div class="tc col-md-4">
				    <p>
				    	<ul style="display: inline;font-size: 11px; color: #ccc;">
							<li><a href="<?php echo base_url('index.php/terms_of_service');?>">Terms of Service</a> |</li>
							<li><a href="<?php echo base_url('index.php/privacy_policy');?>">Privacy Policy</a></li>
					    </ul>
				    </p>
			    </div>
			    <div class="col-md-4">
			       <p>&copy; 2019 tickets4u.co.ke. ALL RIGHTS PRESERVED</p>
			    </div>
		     </div>
		  </div>
		</div>



</footer><!-- #colophon -->

<div class="phone-signup">
  <div class="container">
     <div class="row">
	    <div class="col-md-12">
		    <table style="border: 0px; width: 100%">
				<tr style="border: 0px;">
					<td style="border: 0px;">
						<ul>
							<br><br>
							<li>
								<a id="mobile-signup" href="http://dashboard.tickets4u.co.ke/index.php/login">Sign In / Sign Up</a>	
							</li>
						</ul>
					</td>
					<td style="border: 0px;">
						<br>
						<ul style="display: inline; color: #c23730; font-size: 11px;">
						<li>
							<a style="color: #c23730;" href="#">
								<i class="fa fa-phone"></i>
								<a class="mobilesOnly" href="tel:0207655555">0207655555</a><br>
								<i class="fa fa-phone"></i>
								<a class="mobilesOnly" href="tel:0207655555">0713129623</a>
							</a>
						</li>
						<li>
							<a style="color: #c23730;" href="#importantplace">
								<i class="fa fa-envelope-o"></i>
								info@tickets4u.co.ke
							</a>
						</li>
					   </ul>
					</td>
				</tr>
			</table>
	    </div>
     </div>
  </div>
</div>

<script src="asetsjs/jquery-3.2.0.min.js"></script>
		<script src="assets/js/bootstrap-slider.min.js"></script>
		<script src="assets/js/bootstrap-select.min.js"></script>
		<script src="assets/js/jquery.scrolling-tabs.min.js"></script>
		<script src="assets/js/jquery.countdown.min.js"></script>
		<script src="assets/js/jquery.flexslider-min.js"></script>
		<script src="assets/js/jquery.imagemapster.min.js"></script>
		<script src="assets/js/tooltip.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/featherlight.min.js"></script>
		<script src="assets/js/featherlight.gallery.min.js"></script>
		<script src="assets/js/bootstrap.offcanvas.min.js"></script>
		<script src="assets/js/main.js"></script>

</body>
</html>