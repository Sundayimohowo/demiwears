<?php include "header.php"; ?>
<?php
 $cookie=$_COOKIE['DEMIWEARS'];
  $user=selectOne('login_tokens',['tokens'=>sha1($cookie)]);
  $user1=selectOne('register',['id'=>$user['user_id']]);
if(!$user){
	return false;
  }else if($user1['position'] != "admin"){
  	
  	header('location:../index.php');
  	array_push($errors, 'You are not authorized');
  }
?>
<div class="all_orders">
	  <table class="table">
              <thead>
                <tr>
                <th>s/n</th>
                <th>email</th>
                <th>product id</th>
                  <th>product name</th>
                   <th>telephone</th>
                  <th>category</th>
                  <th>quantity</th>
                  <th>price</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  $cats=selectAll('orders');
                  foreach ($cats as $key => $cat) {
                  	$email=selectOne('register',['id'=>$cat['user_id']]);
                  	$phone=selectOne('details',['user_id'=>$cat['user_id']]);
                  	$product=selectOne('products',['id'=>$cat['product_id']]);

                    ?>
                  <td><?php echo $key+1; ?></td>
                  <td><?php echo $email['email'];?></td>
                  <td><?php echo $cat['product_id'];?></td>
                  <td><?php echo $product['name'];?></td>
                        <td><?php echo $phone['telephone'];?></td>
                   <td><?php echo $product['category'];?></td>

                   <td><?php echo $cat['quantity'];?></td>
                    <td><?php echo $product['price'];?></td>

                  <td class="btn btn-success"><a href="edit-user.php?delete_order=<?php echo $cat['id'];?>">delete</a></td>
                </tr>
              <?php
             } ?>
              </tbody>
            </table>
</div>
<?php include "../footer.php"; ?>