<?php  include "functions.php" ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="images/fav.png">
	<title>DEMIWEARS- HOME</title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL.'/style.css'?>">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
		$(document).ready(function(){
			$(".nav-toggle").click(function(){
				$(".nav-3").toggle();
			
			});
		});
</script>

</head>
<style>

.container {
	width:100%;
	margin-right:auto;
	margin-left:auto;
}
/* Basic appearance stuff ends here */

/* Parallax Horizontal Scroller - by Bree Dulmage, 2020 */
#proparallax {
	display: block;
	position: relative;
	overflow: hidden;
	width:100%;
	height: 27.5rem;
}	

#proparallax img {
	position: absolute;
	width: 100%;
	height: 100%;
	overflow: hidden;
	object-fit: contain;
}

@keyframes parallax_one { /* controls img.one movement */
	0% { /* .imageloaded */
		height: 100%;
		width: 100%;
		left: 0rem;
		opacity: 1;
	}
	/* .imagehold runs from 0 to 27.77% */
	27.77% { /* .imageloaded */
		width: 100%;
		left: 0rem;
	}
	27.78% { /* .imagepreunload */
		width: 100%;
		left: 0rem;
		right: 50rem;
	}
	33.33% { /* .imageunloaded */
		height: 100%;
		width: 0rem;
		left: 0rem;
		right: 0rem;
		opacity: 1;
	}
	33.34% { /* imageoff */
		opacity: 0;	
	}
	94.43% { /* .imageon */
		left: 0rem;
		opacity: 0;
	}
	94.44% { /* .imageinitial */
		height: 100%;
		width: 0rem;
		left: 50rem;
		opacity: 1;
	}
	100% { /* .imageloaded */
		width: 100%;
		left: 0rem;
		opacity: 1;		
	}
}

@keyframes parallax_two { /* controls img.two movement */
	0% { /* .imageoff */
		opacity: 0;
	}
	27.77% { /* .imageon */
		left: 0rem;
		opacity: 0;
	}
	27.78% { /* .imageinitial */
		width: 0rem;
		height: 100%;
		left: 50rem;
		opacity: 1;
	}
	33.33% { /* .imageloaded */
		width: 100%;
		left: 0rem;
	}
	/* .imagehold runs from 33.34% - 61.10% */
	61.10%{ /* .imageloaded */
		width: 100%;
		left: 0rem;
	}
	61.11% { /* .imagepreunload */
		width: 100%;
		left: 0rem;
		right: 50rem;
	}
	66.67% { /* .imageunloaded */
		width: 0rem;
		right: 0rem;
		left: 0rem;
		height: 100%;
		opacity: 1;
	}
	66.68% { /* .imageoff */
		opacity: 0;
	}
	100% { /* .imageoff */
		opacity: 0;
	}
}

@keyframes parallax_three { /* controls img.three movement */
	0% { /* .imageoff */
		opacity: 0;
	}
	61.10%{ /* .imageon */
		opacity: 0;
	}
	61.11% { /* .imageinitial */
		width: 0rem;
		height: 100%;
		left: 50rem;
		opacity: 1;		
	}
	66.67% { /* .imageloaded */
		width: 100%;
		left: 0rem;
	}
	/* .imagehold runs from 66.67% - 94.43% */
	94.43% { /* .imageloaded */
		width: 100%;
		left: 0rem;
	}
	94.44% { /* .imagepreunload */
		width: 100%;
		left: 0rem;
		right: 50rem;
	}
	100% { /* imageunloaded */
		width: 0rem;
		right: 0rem;
		left: 0rem;
		height: 100%;
		opacity: 1;
	}
}

#proparallax img.one{
	animation-name: parallax_one; /* controls img.one movement */
	animation-timing-function: linear;
	animation-iteration-count: infinite;
	animation-duration: 18s;
	animation-direction: forwards;
	object-fit: cover;
}

#proparallax img.two {
	animation-name: parallax_two; /* controls img.two movement */
	animation-timing-function: linear;
	animation-iteration-count: infinite;
	animation-duration: 18s;
	animation-direction: forwards;
	object-fit: cover;
}

#proparallax img.three {
	animation-name: parallax_three; /* controls img.three movement */
	animation-timing-function: linear;
	animation-iteration-count: infinite;
	animation-duration: 18s;
	animation-direction: forwards;
	object-fit: cover;
}
@media (max-width:568px){
	#proparallax{
		height:20rem;
	}
	.nav-2{
	height:60px;
	}
}
</style>
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

			<header style='width:50%;height:100%;overflow:hidden;'>
				<img style='width:90%;height:180%;margin-top:-20px;' src="images/logo.png">
			</header>
			<ul>
				<li class="search1"><form action="index.php" method="post">
					<input type="text" name="search-term" placeholder="search...">
					<button><i class="fa fa-search"></i></button>
				</form> </li>
							<?php 
							if (isset($_COOKIE['DEMIWEARS'])){
	$token=selectOne('login_tokens',['tokens'=>sha1($_COOKIE['DEMIWEARS'])]);
	if ($token) {
	$user=selectOne('register',['id'=>$token['user_id']]);
	?>
				<li class="press"><i class="fa fa-user"></i><?php echo $user['email']; ?><ul class="category-child">
					<li class="press"><a href='<?php echo BASE_URL."/logout.php";?>'>Logout</a></li>
				</ul></li>
				  <?php														
                        }
					}else{?>
                        <li class="press"><a  style="color: gold" href='<?php echo BASE_URL."/login.php";?>'>Login</a></li>

                            <?php
                        }
                        ?>
					<li class="search"><i class="fa fa-search"></i><i class="italic-search">Search</i><ul class="search-child"><li><div><form><input type="" name="" placeholder="search..."><button><i class="fa fa-search"></i></button></form></div></li></ul></li>
				
			</ul>
			<div class="nav-toggle"><span></span></div>
		</nav>
		<nav class="nav-3">
			<ul class="user-menu">
				<script type="text/javascript">
					$(document).ready(function(){
						var ul=$(".user-menu");
						ul.load('num.php');
					});
				</script>
				
			</ul>
		</nav>
	</div>
