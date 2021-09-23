<?php include "header.php"; 
   $cookie=$_COOKIE['DEMIWEARS'];
	$user=selectOne('login_tokens',['tokens'=>sha1($cookie)]);
	function ola()
	{
		$selects=selectAll('carts',['user_id'=>$user['user_id']]);
		foreach($selects as $key => $select) {
			echo($select['price'].',');
			
			}
	}
?>
<style type="text/css">
	.cart-total{
		text-align: center;
		font-size: 1em;
		color: #000;
		font-weight: bolder;
	}
		.cart-container{
			width: 100%;
			text-align: center;
		}
		.cart-body{
			width: 100%;
			display: inline;
		}
		.single-cart{
			text-align: left;
			background-color: white;
			margin-left: 5%;
			box-shadow: 1px 1px 2px 2px rgba(0,0,0,0.06);
			width: 40%;
			display: flex;
			margin-top: 1em;
			padding-top: 1.5em;
			padding-bottom: 1em;
		}
		.single-cart img{
			width: 20%;
			height:100%;
			margin-right: 10%;
		}
		.single-cart span{
			display: block;
		}
		.cart-trash{
			position: relative;
			color: red;
			left: 90%;
		}
		.payment-btn{
			background-color: black;
			color: white;
			cursor: pointer;
			height: 2.5em;
			font-weight: bolder;
			border-radius: 5px;
		}
		@media (max-width: 991px){
			.single-cart{
			margin: auto;
			width: 90%;
			margin-top: 1.4em;
		}
		@media (max-width: 414px){
			.cart-trash{
			top:-0.9em;
		}
		}
	</style>
	<div class="container">
		<div class="cart-container">
			<?php 
								$user_id=$user['user_id'];
								$products=selectAll('carts',['user_id'=>$user_id]);?>
								<h3>Your Cart <?php echo count($products);?> items</h3>
								<?php
								foreach ($products as $key => $product){
									$image=selectOne('products',['id'=>$product['product_id']]);
								?>
			<div class="cart-body">
				<div class="single-cart">
				<div class="cart-trash"><a href="index.php?delete=<?php echo $product['id'];?>"> <i class="fa fa-trash"></i> </a></div>
					<img alt="" src="<?php echo BASE_URL.'/images/'.$image['image']  ?>">
					<span>
					<span>Name: <?php echo $image['name']; ?></span>
					<span>quantity: <?php echo $product['quantity'];?></span>
					<span>price: #<?php echo $image['price']; ?>	</span>
					<span>total: #<?php echo $product['price']; ?>	</span>
					<span><a href="product_detail.php?product=<?php echo $image['id']; ?>">Edit</a></span>
				</span>
				</div>
			</div>
		<?php }?>
		</div>
		<?php if ($user) {?>
			<p class="cart-total">
							
							<strong>Total price: #</strong>
							<?php 
							$allProducts=selectAll('carts',['user_id'=>$user_id]);
							$initial_price=0;
							foreach ($allProducts as $key => $product) {
								$initial_price += $product['price'];
							}echo $initial_price;
							?> <br>
						<a href="checkout.php"><button class="payment-btn">continue to payment</button></a>
						</p>
					<?php }else{
						echo "<h3 style='text-align:center'>please,login to add product to yor cart</h3>";
					}?>
	</div>
	<?php include "footer.php"; ?>