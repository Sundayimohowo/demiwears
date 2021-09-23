
<style>
#cart-count{
	color:#cc8866;
	position:relative;
	top:-18px;
	font-weight:bolder;
}
</style>
<?php 
include ('functions.php');
// if(isset($_COOKIE['DEMIWEARS'])){
$token=selectOne('login_tokens',['tokens'=>sha1($_COOKIE['DEMIWEARS'])]);
if ($token){
$number=selectAll('carts',['user_id'=>$token['user_id']]);
?>

<li><a href="checkout.php">Checkout</a></li>
<li><a href="cart.php"> <i class="fa fa-shopping-cart" style="font-size:2em;"></i><span id="cart-count"><?php
	echo count($number);}else{?>
		<li><a href="cart.php"> <i class="fa fa-shopping-cart" style="font-size:2em;"></i><span id="cart-count"><?php echo "0";} ?></span></a></li>
<?php 
// if(isset($_COOKIE['DEMIWEARS'])){
	$token=selectOne('login_tokens',['tokens'=>sha1($_COOKIE['DEMIWEARS'])]);
	if ($token) {
	$user=selectOne('register',['id'=>$token['user_id']]);
	?>
					<li class="press"><a href="<?php echo BASE_URL.'/logout.php'; ?>">Logout</a></li>
				<li class="search"><a href=""><i class="fa fa-search"></i>Search</a><ul class="search-child"><li><div><form><input type="" name="" placeholder="search..."><button><i class="fa fa-search"></i></button></form></div></li></ul></li>
				   <?php $categories=selectAll('categories');
                            foreach ($categories as $key => $category) {?>

							<li><a href="products.php?category=<?php echo $category['name']; ?>"><?php echo $category['name']; ?></a>					
                            </li>	
                            <?php														
                        }
                            ?>

<?php }else{
	?>
	   <?php $categories=selectAll('categories');
                            foreach ($categories as $key => $category) {?>

							<li><a href="products.php?category=<?php echo $category['name']; ?>"><?php echo $category['name']; ?></a>					
                            </li>	
                            <?php														
                        }
                            ?>
                            <li class="press"><a href="<?php echo BASE_URL.'/login.php'; ?>">Login</a></li>
	<?php
}
?>