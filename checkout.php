
<?php include "header.php"; ?>
<?php

 $cookie=$_COOKIE['DEMIWEARS'];
  $user=selectOne('login_tokens',['tokens'=>sha1($cookie)]);
  $errors=array();
if(!$user){
  	array_push($errors, 'please,login to checkout');
	return false;
  }?>				

		<script type="text/javascript">
			$(document).ready(function(){
				$(".checkout-details").css("display","none");
				$(".collapse").css("transition","0.1s ease-in");
				$(".collapse-toggle").click(function(){
					$(".collapse").toggle();
				});
				$(".collapse-toggle-2").click(function(){
					$(".collapse-2").toggle();
				});
			});
		</script>
		<div class="content">
			<div class="slide-show-container">
				<!-- <div class="slide-show slide-1">
					<img class="slide-img-background" src="images/slide-bg-1.png" alt="banner">
					<div class="slide-product"><img src="images/slide1.jpg" alt="slides"></div>
					<div class="info">
						<span>RELIABLE<br>WEARS</span>
						<span>Get your footwears at 20% off</span>
						<a href="#">shop now</a>
					</div>
				</div>

				<div class="slide-show slide-2">
					<img class="slide-img-background" src="images/slide-bg-3.png" alt="banner">
					<div class="slide-product"><img src="images/images.jpeg" alt="slides"></div>
					<div class="info">
						<span>DEMI<br>WEARS</span>
						<span>Your feet deserves the best</span>
						<a href="#">shop now</a>
					</div>
				</div>

				<div class="slide-show slide-3">
					<img class="slide-img-background" src="images/slide-bg-2.png" alt="banner">
					<div class="slide-product"><img src="images/images.jpeg" alt="slides"></div>
					<div class="info">
						<span>LOOK<br>DIFFERENT</span>
						<span>The confidence you need to walk the world</span>
						<a href="#">shop now</a>
					</div>
				</div> -->
			</div>
			<style type="text/css">
				a{
					color: gold;
				}
				a:hover{
					color: #000;
				}
			</style>

			<script>
					var slideIndex = 0;
					showSlides();

					function showSlides() {
					    var i;
					    var slides = document.getElementsByClassName("slide-show");
					    for (i = 0; i < slides.length; i++) {
					       slides[i].style.display = "none";  
					    }
					    slideIndex++;
					    if (slideIndex > slides.length) {
					    	slideIndex = 1
					    }  
					    slides[slideIndex-1].style.display = "flex";
					    setTimeout(showSlides, 10000); // Change image every 2 seconds
					}
			</script>
			<div class="checkout-page">
				<div class="toggle-account collapse-toggle">
				<h4>checkout Account</h4>
			</div>
				
				<?php
												$cookie=$_COOKIE['DEMIWEARS'];
												$user=selectOne('login_tokens',['tokens'=>sha1($cookie)]);
												$user_id=$user['user_id'];
												 if(isset($_POST['continue'])){
												 	$errors=array();
													unset($_POST['continue']);
													$exist=selectOne('details',['user_id'=>$user_id]);
													if(!$exist){
													if(!empty($_POST['firstname'])){
														if(!empty($_POST['lastname'])){
															if(!empty($_POST['email'])){
																if(!empty($_POST['telephone'])){
																	if(!empty($_POST['address1'])){
																		
																		$create=create('details',$_POST);
														   }else{
														   	array_push($errors, "error occurred while creating account");
														   }
														}else {
															array_push($errors, "Telephone can not be empty");
														}
															}else {
																array_push($errors, "Email can not be empty");
															}
														}else {
															array_push($errors, "lastname can not be empty");
														}
													}else {
														array_push($errors, "firstname can not be empty");
													}
												}else {
													$id=$exist['id'];
													$update=update('details',$id,$_POST);
												}
												} ?>
												<?php 	
												
												$detail=selectOne('details',['user_id'=>$user_id]);
												?>
												<h4 id='message'><?php if(!empty($errors)){
										foreach ($errors as $key => $error) {
											echo $error;
										}
										}?>
								</h4>
											
				<div class="checkout-details collapse">
				<form action="checkout.php" method="post" id="paystackEmbedContainer">
					<div class="control-group">
					<label class="control-label">*First Name</label>
					<div class="controls">
						<input type="text" name="firstname" value="<?php echo $detail['firstname'];?>" class="input-xlarge">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">*Last Name</label>
					<div class="controls">
						<input type="text" name="lastname" value="<?php echo $detail['lastname'];?>" class="input-xlarge">
					</div>
				</div>	
				
				<input type="hidden" name="user_id" class="input-xlarge" value="<?php echo $user_id; ?>">				  
				<div class="control-group">
					<label class="control-label">*Email Address</label>
					<div class="controls">
						<input type="text" name="email" value="<?php $one=selectOne('register',['id'=>$user_id]); echo $one['email']; ?>" class="input-xlarge">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">*Telephone</label>
					<div class="controls">
						<input type="text" value="<?php echo $detail['telephone'];?>" name="telephone" class="phone input-xlarge">
					</div>
				</div>
		
				<div class="control-group">
					<label class="control-label">Company</label>
					<div class="controls">
						<input type="text" value="<?php echo $detail['company'];?>" name="company" class="input-xlarge">
					</div>
				</div>
									  
				<div class="control-group">
					<label class="control-label"><span class="required">*</span> Address 1:</label>
					<div class="controls">
						<input type="text" name="address1" value="<?php echo $detail['address1'];?>" class="address input-xlarge">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Address 2:</label>
					<div class="controls">
						<input type="text" name="address2" value="<?php echo $detail['address2'];?>" class="input-xlarge">
					</div>
				</div>
				<input class="btn-submit" type="submit" name="continue" value="update">
	
				</form>

				</div>
				<div class="form-payment">
					<div class="toggle-account collapse-toggle-2">
				<h4>continue to payment</h4>
			</div>
			<div class="checkout-details collapse-2">
					<form action="checkout.php" method="post" id="paystackEmbedContainer">	
						<div class="control-group">
					<label class="control-label">Email</label>
					<div class="controls">
						<input type="email" name="email" value="<?php echo $one['email'];?>" class="order-email">
					</div>
				</div>

				<h4>click on pay below to pay a sum of #<span class="cart-total right">
							<?php 
							$allProducts=selectAll('carts',['user_id'=>$user_id]);
							$initial_price=0;
							foreach ($allProducts as $key => $product) {
								$initial_price += $product['price'];
							}echo $initial_price;
							?> <br>
						</span> </h4>

						<h4 style="display:none;">products id:<span class="cart-id right">
							<?php 
							$allProducts=selectAll('carts',['user_id'=>$user_id]);
							
							foreach ($allProducts as $key => $product) {
								echo $product['product_id'].',';
							}
							?> <br>
						</span> </h4>
						<input type="submit" class="order_confirm btn-submit" value="pay">	
					</form>
				</div>
				</div>
				<div class="form-payment">
				<div class="toggle-account collapse-toggle3">
				<h4>Your Orders</h4>
			</div>
			 <table class="table">
              <thead>
                <tr>
                <th>s/n</th>
                <th> id</th>
                  <th> name</th>
                  <th>category</th>
                  <th>qty</th>
                  <th>price</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  $cats=selectAll('orders',['user_id'=>$user['user_id']]);
                  foreach ($cats as $key => $cat) {
                  	$product=selectOne('products',['id'=>$cat['product_id']]);

                    ?>
                  <td><?php echo $key+1; ?></td>
                  <td><?php echo $cat['product_id'];?></td>
                  <td><?php echo $product['name'];?></td>
                   <td><?php echo $product['category'];?></td>
                   <td><?php echo $cat['quantity'];?></td>
                    <td><?php echo $product['price'];?></td>
                </tr>
              <?php
             } ?>
              </tbody>
            </table>
            <script>
				var button = document.querySelector('.order_confirm');
				// var container= document.querySelector('')
				button.addEventListener('click', place_order);

				function place_order(e) {
					e.preventDefault();

					var amount = document.querySelector('.cart-total').innerHTML;
					var id = document.querySelector('.cart-id').innerHTML;

					// var productPrice = productType.options[productType.selectedIndex].value;

					var emailAddress = document.querySelector('.order-email').value;
					var phoneNumber = document.querySelector('.phone').value;
					var phoneNumber = document.querySelector('.address').value;
					var handler = PaystackPop.setup({
						key: 'pk_live_3f69d3dec1d889c80bec047a1ecbefae19f8b36e',
						email: emailAddress,
						amount: parseFloat(amount)*100,
						product: id,
						currency: "NGN",
						callback: function(response){
							window.location.href="success.php?order=<?php echo $user['user_id'];?>";
							alert('success. transaction ref is ' + response.reference);
						},
						onClose: function(){
							alert('window closed');
						}
						});

					handler.openIframe();
				}
			</script>

<script src="https://js.paystack.co/v1/inline.js"></script> 
      </div>
			</div>

<?php include "footer.php"; ?>