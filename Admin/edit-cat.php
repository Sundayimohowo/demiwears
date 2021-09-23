
<?php include "header.php"; ?>
<?php

if (isset($_GET['category'])){
	$get=$_GET['category'];
}
if(isset($_POST['name'])){
    unset($_POST['update']);
    if (!empty($_POST['name']) && !empty($_POST['description'])){
    $create=update('categories',$get,['name'=>$_POST['name'],'description'=>$_POST['description']]);
  	header('location:categories.php');
    }
}
if (isset($_GET['delete'])){
$del=delete('categories',$_GET['delete']);
header('location:categories.php');
}
 $cookie=$_COOKIE['DEMIWEARS'];
  $user=selectOne('login_tokens',['tokens'=>sha1($cookie)]);
  $user1=selectOne('register',['id'=>$user['user_id']]);
if(!$user){
	return false;
  }else if($user1['position'] != "admin"){
  	
  	header('location:../index.php');
  	array_push($errors, 'Please, log in');
  }
?>
            <section>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <h5>
            UPDATE CATEGORY
            <h5>
            	<?php $one=selectOne('categories',['id'=>$_GET['category']]); ?>
            <form  id='myForm' action="" method="POST">
              <div class="form-group">
              <label for="form-title">CATEGORY NAME</label><br>
              <input class="form-control" type="text" name="name" id="name" value="<?php echo($one['name']) ?>" required="">
              </div>
              <div class="form-group">
              <label for="form-body">DESCRIPTION</label><br>
              <textarea class="form-control"  rows="8" cols="60" type="text" name="description" id="body"><?php echo($one['description']); ?></textarea>
              </div><br><br>
                <input type="submit" class="btn btn-danger submit-btn" id="create" name="update" value="update"><br>
            </form>
      </div>
            </section>

  <?php include ROOT_PATH.'/footer.php'; ?>