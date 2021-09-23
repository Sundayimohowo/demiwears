
<?php  include "../functions.php" ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="images/fav.png">
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL.'/style.css'?>">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
    <script type="text/javascript">
		$(document).ready(function(){
			$(".nav-toggle").click(function(){
				$(".nav-3").toggle();
			
			});
		});
</script>
 <style type="text/css">
          .text-center{
            align-items: center;
            margin: auto;
          }
          .form-group{
            max-width: 90%;
            line-height: 3em;
          }
          .form-group input{
            max-width: 90%;
            border:1px solid rgba(0,0,0,0.3);
            height: 2em;
            border-radius: 10px;
          }
          .text-area{
            width: 0%;
          }
          option{
            width: 100%;
          }
        </style>
			  

</head>
<body>
	<div class="container" id="header">
		<!-- <nav class="nav-1">
			<ul>
				<li><a href="shop.html"><i class="fa fa-question"></i>FAQ</a></li>
				<li><a href="shop.html"><i class="fa fa-bell"></i>Terms & Conditions</a><li>
				<li><a href="contact.html"><i class="fa fa-search"></i>Contact Us</a></li>
			</ul>
			
		</nav> -->
		<nav class="nav-2">

			<header>
				<h1><a style="color: gold" href="<?php echo BASE_URL ?>"> MarketPlace</a></h1>

			</header>
			<ul>
				<li class="search1"><form action="index.php" method="post">
					<input type="text" name="search-term" placeholder="search...">
					<button><i class="fa fa-search"></i></button>
				</form> </li>
							<?php 
// if(isset($_COOKIE['DEMIWEARS'])){
	$token=selectOne('login_tokens',['tokens'=>sha1($_COOKIE['DEMIWEARS'])]);
	if ($token) {
	$user=selectOne('register',['id'=>$token['user_id']]);
	?>
				<li class="press"><i class="fa fa-user"></i><?php echo $user['email']; ?><ul class="category-child">
					<li class="press"><a href='<?php echo BASE_URL."/logout.php";?>'>Logout</a></li>
					<li class="press"><a href='<?php echo BASE_URL."/logout.php";?>'>Orders</a></li>
				</ul></li>
				  <?php														
                        }else{?>
                        <li class="press"><a href='<?php echo BASE_URL."/logout.php";?>'>Orders</a></li>

                            <?php
                        }
                        ?>
					<li class="search"><a href=""><i class="fa fa-search"></i><i class="italic-search">Search</i></a><ul class="search-child"><li><div><form><input type="" name="" placeholder="search..."><button><i class="fa fa-search"></i></button></form></div></li></ul></li>
				
			</ul>
			<div class="nav-toggle"><span></span></div>
		</nav>
		<nav class="nav-3">
			<ul class="user-menu">
				<li><a href="users.php">ADMINS</a>
							</li>														
														
                            <!-- <li><a href="orders.php">ORDERS</a></li>									 -->
                            <li><a href="create.php">ADD PRODUCT</a></li>
                            <li><a href="manage-products.php">MANAGE PRODUCTS</a></li>
                            <li><a href="categories.php">MANAGE CATEGORIES</a>
                            <li><a href="orders.php">ORDERS</a>
							</li>
				
			</ul>
		</nav>
	</div>
