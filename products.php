<?php include "header.php";
function getCategoryProduct($category){
    global $conn;
    $sql="SELECT * FROM products WHERE publish=? AND category=? ORDER BY id DESC LIMIT 12";
   
    $stmt= executeQuery($sql, ['publish' => 1,'category'=>$category]);
    $records=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
   }
if(isset($_GET['category'])){
	$cat=($_GET['category']);
	$products=getCategoryProduct($cat);
}
?>
<script type="text/javascript">
$(document).ready(function(){
	var initial=2;
	var get=$(".get").val();
  $('#next-btn').click(function(){
	initial=initial+2;
    $('#product-box').load('more-products.php',{
		product : initial,
		category : get
	});
  });
});

</script>
<div class="content">
			<div class="slide-show-container">
				

				
				</div>
				</div>

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

<div class="index-page">
	<div class="latest-title title">
		<h3><?php echo $_GET['category']; ?></h3>
	</div>

	<div class="latest-products product-wrapper">
		<?php 
															foreach ($products as $key => $product) {?>	
							<div class="items">
						<a href="product_detail.php?product=<?php echo $product['id']; ?>">
							<div class="featured-image">
								<img alt="" src="<?php echo BASE_URL.'/images/'.$product['image']; ?>">
															</div>
							<div class="info">
								<span><?php echo $product['name']; ?></span>
								<span><?php echo $product['price']; ?></span>
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
<?php include 'footer.php'; ?>