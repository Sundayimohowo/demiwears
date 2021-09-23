<?php
include "functions.php";

if (isset($_GET['order'])){
	$user=$_GET['order'];
	$carts=selectAll('carts',['user_id'=>$user]);
	foreach ($carts as $key => $cart) {
 $data = [
       'product_id'=>$cart['product_id'],
      'user_id'=>$cart['user_id'],
      'category'=>$cart['category'],
      'price'=>$cart['price'],
      'quantity'=>$cart['quantity']
   ];
   $user=create('orders', $data);
   $delete=delete('carts',$cart['id']);
?>
<?php
		
	}
	header('location:index.php');
	
}



?>


