<?php include "header.php";
if(isset($_GET['product'])){
	$single=$_GET['product'];
	$products=selectOne('products',['id'=>$single]);
}
?>

<div class="content">

		<h4 style="text-align: center;">PRODUCT DETAILS</h4>
	<div class="single-product">
		<style type="text/css">
			button{
				cursor: pointer;
				margin-left: 5px;
			}
			.single-product{
				margin-top: 3em;
				width: 70%;
				margin: auto;
				margin-bottom: 3em;
				display: flex;
				justify-content: space-between;
			}
			.product{
				max-width: 70%;
				margin-top: 1em;
				display: flex;
				padding-bottom: 1em;
				border-bottom: 1px solid rgba(0,0,0,0.1);
			}
			.product input{
				border: 1px solid rgba(0,0,0,0.1);
			}
			.addtocart{
				height:30px;
				font-size: 13px;
			}
			.product img{
				width: 250px;
				margin-right: 2em;
				height: 250px;
			}
			.product-detail{
				margin-top: -1em;
			}
			.single-category .Category-detail{
				margin-top: -15px;
			}
			.single-category .Category-detail h5{
				margin-top: 13px;
				text-transform: uppercase;
				font-size: 15px;
				border-bottom: 1px solid rgba(0,0,0,0.1);
				margin-top: -15px;
			}
			@media (max-width: 1000px){
				.single-category{
					display: none;
				}
				.single-product{
					width: 90%;
				}
				.product{
					width: 100%;
					margin: auto;
				}
				.product img{
					margin-right: 3em;
				}
			}
				@media (max-width: 768px){
				
				.single-product{
					width: 100%;
				}
				.product{
					width: 100%;
					margin: auto;
				}
				.product img{
					margin-right: 3em;
				}
			}
				@media (max-width: 616px){
				
			
				.product img{
					margin-right: 6em;
				}
			}
			@media (max-width: 590px){

				.product{
					flex-direction: column;
					justify-content: space-between;
				}
				.product img{
					margin-right: 0;
					width: 100%;
				}
				.product-detail{
				width: 100%;
			}
			}

		</style>
		<script type="text/javascript">
        $(document).ready(function() {
            var form = $('#myForm'); // contact form
            var submit = $('.addtocart'); // submit button
            var alert = $('.alert-msg'); // alert div for show alert message
            var ul=$(".user-menu");
            var num=$(".quant").val();
            var cart_id=$(".hidden").val();
            // form submit event
            form.on('submit', function(e) {
                e.preventDefault(); // prevent default form submit

                $.ajax({
                    url: 'log.php?product=<?php echo $products['id']; ?>', // form action url
                    type: 'POST', // form submit method get/post
                    dataType: 'html', // request type html/json/xml
                    data: form.serialize(), // serialize form data
                    beforeSend: function() {
                        alert.fadeOut();
                        submit.html('creating....'); // change submit button text
                    },
                    success: function(data) {
                        alert.html(data).fadeIn(); // fade in response data
                        form.trigger('reset'); // reset form
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
				
				ul.load('num.php');
				setInterval('location.reload()', 1000);
        });
            });
        </script>
		<div class="product">
			<a href="<?php echo BASE_URL.'/images/'.$products['image']; ?>" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img src="<?php echo BASE_URL.'/images/'.$products['image']; ?>"></a>
			<div class="product-detail">
				  <?php 

		 $cookie=$_COOKIE['DEMIWEARS'];
		$user=selectOne('login_tokens',['tokens'=>sha1($cookie)]);
		if ($user) {
			# code...
			$user_id=$user['user_id'];
		}
		$cart=selectOne('carts',['product_id'=>$single]); ?>
				<h3>Name: <?php echo $products['name'];?></h3>
				<p>sizes: <?php echo $products['sizes'];?></p>
				<p>product id: <?php echo $products['id'];?></p>
				<p>price: #<?php echo $products['price'];?></p>
				<p><form class="form-inline" id="myForm" action="">
									<input type="hidden" class="span1" name="price" value="<?php echo $products['price']; ?>">
									<input type="hidden" class="span1" name="category" value="<?php echo $products['category']; ?>">
									<input type="hidden" class="span1" name="user_id" value="<?php echo $user_id; ?>">
									<input type="hidden" class="span1" name="product_id" value="<?php echo $products['id']; ?>">
									<?php 
									if ($user) {?>
									<input type="text" class="quant span1" name="quantity" value="<?php
																						 if($cart){ 
																						 	echo $cart['quantity'];}else{
																								echo "1";
																							} ?>">
								

              	<div class="alert-msg" style="text-align: left;"></div>
								</h4>
									<input class="addtocart btn btn-inverse" type="submit" name="addtocart" value="Add to cart"><?php }else{?><h4 style="color: gold">please,login to add product to cart</h4><?php }?>
								</form></p>
				<p>Description: <?php echo $products['description'];?></p>
			</div>
		</div>

		<div class="single-category">
			<h3>Categories</h3>
				 <div class="Category-detail">
				 	<?php
								$sel=selectAll('categories');
								foreach ($sel as $key => $cat) {
								?>
								<a href="products.php?category=<?php echo $cat['name']; ?>"><h5><?php echo $cat['name']; ?></h5></a>
									<?php
							}
								?>
								
				 </div>
			
		</div>

	</div>
<script type="text/javascript">
$(document).ready(function(){
	var initiallim=2;
  $('#next-btn').click(function(){
	initiallim=initiallim+2;
	var category=$(".get").val();
    $('#product-box').load('more-products.php',{
		afterlim : initiallim,
		afterCat : category
	});
  });
});
  </script>
	<div class="index-page">
	
		<h4 style="text-align: center;">OTHER PRODUCTS</h4>

	<div class="latest-products product-wrapper">
									<input class="get" type="hidden" value="<?php echo $products['category']; ?>" />
									<?php $categories=getProductsBycategory($products['category']);
									foreach ($categories as $key => $category) {
										if ($category != $products['category']){?>
							<div class="items">
						<a href="product_detail.php?product=<?php echo $category['id']; ?>">
							<div class="featured-image">
								<img alt="" src="<?php echo BASE_URL.'/images/'.$category['image']; ?>">
															</div>
							<div class="info">
								<span><?php echo $category['name']; ?></span>
								<span>#<?php echo $category['price']; ?></span>
							</div>
						</a>
					</div>
					<?php 
									}
									} ?>
				</div>															</ul>
					
				<div class="nav-links">
								<button id="next-btn">More...</button>
									</div><br>
			</nav>
		



		</div> <!-- content -->
	</div> <!-- main wrapper -->
</div>
<?php include "footer.php"; ?>