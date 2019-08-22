<style>
   #map {
    height: 200px;
    width: 100%;
   }
</style>

<section class="section-page-header">
	<div class="container">
		<h1 class="entry-title">Review Order</h1>
	</div>
</section>
	
<section class="section-page-content">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-lg-6">
				<div class="section-order-review-pricing">
					<div class="pricing-coupon">
						<h3>Pricing</h3>
						<div class="coupon">
							<div class="row">
								<div class="col-sm-12 col-lg-12">
									<h3>Please confirm your Order of 
										<font color="red">
											<?php 
											$tickets = 0;
											foreach ($order as $key => $value) {
												$tickets = $tickets  + $value['no_of_tickets'];
											}
												 echo $tickets. " Ticket(s)";
											?>
										</font>
									</h3>
									
								</div>
							</div>
						</div>
						
						<div class="pricing">
							<table class="table pricing-review">
								<tbody>
								<?php 
								foreach ($order as $key => $value) {
									if ($value['no_of_tickets'] > 0) {
									
								?>
									<tr>
										<td><?php echo $value['ticket_name'];?></td>
										<td><?php echo "Ksh. ". ($value['amount'] * $value['no_of_tickets']);?></td>
									</tr>
									<?php
								}
								}
								?>
								</tbody>
								<tfoot>
									<tr>
										<td>Total Price</td>
										<td class="total-price">
										<?php 
											$amount = 0;
											foreach ($order as $key => $value) {
												$amount = $amount  + ($value['amount'] * $value['no_of_tickets']);

											}
												 echo "Ksh ".$amount;
											?></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
				</div>
						
				<div class="col-sm-6 col-lg-6">	
				<div class="section-order-details-event-info">
					<div class="seat-details">
						<h3>Please Fill Details</h3>
						<div class="seat-details-info">
							<form method="post" action="callipay">
								<div class="form-group">
                                  <input type="text" name="fullName" class="form-control"  placeholder="Full Name"  required>
                              	</div>
                              	<div class="form-group">
                                  <input type="text" pattern="[07][0-9]{9}" name="phone" class="form-control" placeholder="Phone Number" required>
                              	</div>
                              	<div class="form-group">
                                  <input type="email" name="Email" class="form-control" placeholder="emailAddress@email.com" required>
                              	</div>
                              	<div class="section-order-details-event-action">
									<div class="row">
										<div class="col-sm-offset-5 col-sm-7 col-lg-offset-6 col-lg-6">
											<Button type="submit" name="checkout" class="primary-link" href="#">Proceed Checkout</Button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
	</div>
	<div class="alert alert-info" role="alert">
		<p><i class="fa fa-info-circle" aria-hidden="true"></i> After purchase your tickets will be instantly available</p>
	</div>
	</div>	
</section>