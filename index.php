<?php include "header.php";
function getPublishedProduct(){
 global $conn;
 $sql="SELECT * FROM products WHERE publish=? ORDER BY id DESC LIMIT 8";

 $stmt= executeQuery($sql, ['publish' => 1]);
 $records=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);
 return $records;
}
if (isset($_POST['search-term'])){
	$cat=searchPosts($_POST['search-term']);
	if(!$cat){
		$errors=array();
		array_push($errors, 'search not found');
	}
}else{
	$cat=getPublishedProduct();

	}
	if (isset($_GET['delete'])){
		$del=delete('carts',$_GET['delete']);
		header('location:cart.php');
}
?>

		<div class="content">
			<div class="slide-show-container">
			  <div class="container">
	<div id="proparallax">
		<img class="one" src="images/art1.png" /> 
		<img class="two" src="images/slide2.png" />
		<img class="three" src="images/slide3.png" />
	</div>
          
        </div>
			</div>
			<style type="text/css">
				a{
					color: gold;
				}
				a:hover{
					color: #000;
				}
			</style>

			
			<script type="text/javascript">
$(document).ready(function(){
	var initial=2;
  $('#next-btn').click(function(){
	initial=initial+2;
    $('#product-box').load('more-products.php',{
		after : initial
	});
  });
});
  </script>
<div class="index-page">
	<div class="latest-title title" style="margin-top:50px;">
		<h3>LATEST PRODUCTS</h3>
	</div>

	<div class="latest-products product-wrapper">
		<?php 
															foreach ($cat as $key => $cats) {?>	
							<div class="items">
						<a href="product_detail.php?product=<?php echo $cats['id']; ?>">
							<div class="featured-image">
								<img src="<?php echo BASE_URL.'/images/'.$cats['image']; ?>" alt="" />
															</div>
							<div class="info">
								<span><?php echo $cats['name']; ?></span>
								<span><?php echo $cats['price']; ?></span>
							</div>
						</a>
					</div>
					<?php } ?>
				</div>															</ul>
															<h4 id='message'><?php if(!empty($errors)){
										foreach ($errors as $key => $error) {
											echo $error;
										}
										}?>
				<div class="nav-links">

								<button id="next-btn">More...</button>
									</div>
			
			</div>



		</div> <!-- content -->
	</div> <!-- main wrapper -->
	<?php include ROOT_PATH.'/footer.php'; ?>