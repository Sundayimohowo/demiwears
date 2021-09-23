

<?php include "header.php"; ?>
<?php
 $cookie=$_COOKIE['DEMIWEARS'];
  $user=selectOne('login_tokens',['tokens'=>sha1($cookie)]);
  $user1=selectOne('register',['id'=>$user['user_id']]);
if(!$user){
  	
  	header('location:../index.php');
  	array_push($errors, 'You are not authorized');
  }else if($user1['position'] != "admin"){
  	
  	header('location:../index.php');
  	array_push($errors, 'You are not authorized');
  }
?>
				<div class="index-page">
	<div class="latest-title title">
		<h3>UNPUBLISHED PRODUCTS</h3>
	</div>

	<div class="latest-products product-wrapper">					
				
															<h4 id='message'><?php if(!empty($errors)){
										foreach ($errors as $key => $error) {
											echo $error;
										}
										}?>				</h4>	
												
												<?php
												 $unPublishedProducts=selectAll('products',['publish'=>0]);
												foreach ($unPublishedProducts as $key => $unPublishedProduct) {
												?>
												<div class="items">
															<div class="featured-image">
															<img src="<?php echo BASE_URL.'/images/'.$unPublishedProduct['image']; ?>" />
															</div>
															<div class="info">
								<span><?php echo $unPublishedProduct['name']; ?></span>
								<span><?php echo $unPublishedProduct['description']; ?></span>

								<span><?php echo $unPublishedProduct['price']; ?></span>
								<span><a style="margin-right:8px; text-decoration:underline;" href="edit-user.php?delete=<?php echo $unPublishedProduct['id'] ?>">delete</a></span>
														<span><a style="text-decoration:underline;" href="edit-user.php?<?php if ($unPublishedProduct['publish']==1){
															echo "unpublish";
														}else{
															echo "Publish";
														} ?>=<?php echo $unPublishedProduct['id'] ?>"><?php if ($unPublishedProduct['publish']==1){
															echo "UNPUBLISH";
														}else{
															echo "Publish";
														} ?></a></span>
							</div>
														

													</div>
												</li>
												<?php
												}?>
											</ul>
										</div>
									</div>
								</div>
												
						<br/>
				<div class="index-page">
	<div class="latest-title title">
		<h3>UNPUBLISHED PRODUCTS</h3>
	</div>

	<div class="latest-products product-wrapper">					
				
															<h4 id='message'><?php if(!empty($errors)){
										foreach ($errors as $key => $error) {
											echo $error;
										}
										}?>				</h4>	
												
												<?php 
												$PublishedProducts=selectAll('products',['publish'=>1]);
												foreach ($PublishedProducts as $key => $PublishedProduct) {
												?>
												<div class="items">
															<div class="featured-image">
															<img src="<?php echo BASE_URL.'/images/'.$PublishedProduct['image']; ?>" />
															</div>
															<div class="info">
								<span><?php echo $PublishedProduct['name']; ?></span>
								<span><?php echo $PublishedProduct['description']; ?></span>

								<span><?php echo $PublishedProduct['price']; ?></span>
								<span><a style="margin-right:8px; text-decoration:underline;" href="edit-user.php?delete=<?php echo $PublishedProduct['id'] ?>">delete</a></span>
														<span><a style="text-decoration:underline;" href="edit-user.php?<?php if ($PublishedProduct['publish']==1){
															echo "unpublish";
														}else{
															echo "Publish";
														} ?>=<?php echo $PublishedProduct['id'] ?>"><?php if ($PublishedProduct['publish']==1){
															echo "UNPUBLISH";
														}else{
															echo "Publish";
														} ?></a></span>
							</div>
														

													</div>
												</li>
												<?php
												}?>
											</ul>
										</div>
									</div>
								</div>

<?php include ROOT_PATH."/footer.php"; ?>