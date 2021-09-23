
<?php include "header.php"; ?>
<?php
if(isset($_GET['user'])){
	$name=$_GET['user'];
}

if(isset($_GET['delete_order'])){
	$name=$_GET['delete_order'];
	$del=delete('orders',$_GET['delete_order']);
header('location:orders.php');
}


if (isset($_GET['delete'])){
$del=delete('products',$_GET['delete']);
header('location:manage-products.php');
}
if (isset($_GET['unpublish'])){
$update=update('products',$_GET['unpublish'],['publish'=>0]);
header('location:manage-products.php');
}

if (isset($_GET['publish'])){
$update=update('products',$_GET['publish'],['publish'=>1]);
header('location:manage-products.php');
}


if (isset($_POST['update'])){
	$errors=array();
	unset($_POST['update']);
	if (!empty($_POST['email']) && !empty($_POST['position'])){
	$user=selectOne('register',['email'=>$name]);
	$id=$user['id'];
	$update=update('register',$id,['email'=>$_POST['email'],'position'=>$_POST['position']]);
	header('location:users.php');
	if ($update){
  	array_push($errors, 'success');
  	header('location:users.php');
	}
}else{
	
  	array_push($errors, 'fields can\'t be empty');
}
}
 $cookie=$_COOKIE['DEMIWEARS'];
  $user=selectOne('login_tokens',['tokens'=>sha1($cookie)]);
  $user1=selectOne('register',['id'=>$user['user_id']]);
if(!$user){
  	
  	header('location:../index.php');
  	array_push($errors, 'Please, log in');
  }else if($user1['position'] != "admin"){
  	
  	header('location:../index.php');
  	array_push($errors, 'You are not authorized');
  }
?>
            <section id="">
            <div class="container">
        <div class="text-center">
          <h5>
            EDIT USER
            <h5>
        </div>
<?php $user=selectOne('register',['email'=>$name]); ?>
            <form  id='myForm' action="edit-user.php?user=<?php echo $name; ?>" method="POST">
              <div class="form-group">
              <label for="form-title">email</label><br>
              <input class="form-control" type="text" name="email" value="<?php echo $user['email']; ?>" required="">
              </div>
              <label for="form-body">ROLE</label><br>
			  <input class="form-control"  rows="8" cols="60" type="text" name="position" value="<?php echo $user['position']; ?>">
              </div><br>
              	<div id="alert-msg" class="alert-msg alert-success" style="text-align: left;"><?php if(!empty($errors)){
              		foreach ($errors as $key => $error) {
              			echo $error;
              		}
              	} ?></div>
				  <div class="control-group">
					<input tabindex="3" class="btn btn-inverse large" type="submit" name="update" value="update">
					<hr>
				</div>			
				</form>
      </div>
            </section>
          <?php include ROOT_PATH."/footer.php"; ?>