<?php

include ('functions.php');

if (isset($_POST['login'])){
	$errors=array();
    unset($_POST['login']);
    $user=selectOne('register',['email'=>$_POST['email']]);
   if($user){
	        if(password_verify($_POST['passcode'],$user['passcode'])){
	            $true=true;
	            $token=bin2hex(openssl_random_pseudo_bytes(64,$true));
	            $create_token=create('login_tokens',['tokens'=>sha1($token),'user_id'=>$user['id']]);
	            setcookie('DEMIWEARS',$token,time()+60*60*24*7,'/',NULL,NULL,TRUE);
	            setcookie('DEMIWEARS_','1',time()+60*60*24*2);?>
	            <script type="text/javascript">
	            	document.location.href = "index.php";
	            </script>
	            <?php
	            
    }else{
    	echo "wrong details";
    }
}else{
	echo "user no found";
}
}

if (isset($_POST['create'])){
	unset($_POST['create']);
	$existingUser=selectOne('register',['email'=>$_POST['email']]);
	$passcode=password_hash($_POST['passcode'],PASSWORD_BCRYPT);
	if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
		if(strlen($_POST['passcode'])>=6 && strlen($_POST['passcode'])<=60){
			if(!$existingUser){
		$create=create('register',['email'=>$_POST['email'],'passcode'=>$passcode]);
		?>
		<script type="text/javascript">
			document.location.href = "login.php";
		</script>
		<?php
		echo "you can now login";
		}else{
			echo "Email is already registered.";
		}
	}else{
		echo "incorrect password";
	}
}else {
	echo "invalid email";
}

}
if(isset($_GET['product'])){
	$single=$_GET['product'];
	$products=selectOne('products',['id'=>$single]);
}
if(isset($_POST['quantity'])){
		 $cookie=$_COOKIE['DEMIWEARS'];
		$user=selectOne('login_tokens',['tokens'=>sha1($cookie)]);
		
		$cart=selectOne('carts',['product_id'=>$single]); 
	unset($_POST['addtocart']);
	$exist=selectOne('carts',['product_id'=>$single,'user_id'=>$_POST['user_id']]);
	$product=selectOne('products',['id'=>$single]);
	if ($user){
		$user_id=$user['user_id'];
	if($exist){
		$id=$exist['id'];
		$update=update('carts',$id,['quantity'=>$_POST['quantity'],'price'=>$_POST['quantity'] * $product['price']]);
		if ($update) {
			# code...
			echo "updated successfully";
		}
	}else{
		$_POST['price']=$_POST['quantity'] * $product['price'];
	$create=create('carts',$_POST);
	if ($create) {
			# code...
			echo "added successfully";
		}
	}
}else{
	echo "please,login to add product to your cart";
}
}
								
?>