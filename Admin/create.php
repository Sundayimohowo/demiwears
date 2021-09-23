
<?php include "header.php"; ?>

<?php
// include "../functions.php";
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
			<div class="container">
        <div class="text-center">
          <h5>
            ADD PRODUCT
            <h5>
              <?php
              if (isset($_POST['name'])){
                unset($_POST['create']);
                $errors=array();
                  if (!empty($_FILES['image']['name'])){
                    $image_name=time() . "_".$_FILES['image']['name'];
                    $destination= ROOT_PATH ."/images/" . $image_name;
                     $result= move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                     if ($result){
                            $_POST['image']=$image_name;
                        }else{
                            array_push($errors,'failed to upload image');
                        }
                  }
                //   $exist=selectOne('posts',['title'=>$_POST['title']]);
                //   if ($exist){
                //     array_push($errors,'title alrready exist');
                //   }
                  if (empty($_POST['category'])){
                    array_push($errors,'category can not be empty');
                  }
                     $_POST['publish']= isset($_POST['publish']) ? 1 : 0;
                     if (empty($errors)){
					 $create=create('products',$_POST);
                   }
            }
                         ?>
        </div>
        
            <form action="create.php" method="post" enctype='multipart/form-data'>
              <div class="form-group">
              <label for="form-title">PRODUCT NAME</label><br>
              <input class="form-control" type="text" name="name" value="" required>
              </div>
			  <div class="form-group">
              <label for="form-title">PRICE</label><br>
              <input class="form-control" type="text" name="price" value="" required>
              </div>
			  <div class="form-group">
              <label for="form-title">MANUFACTURER</label><br>
              <input class="form-control" type="text" name="manufacturer" value="" required>
              </div>
              <!-- <input class="form-control" type="text" name="price" value="" required> -->
              <div class="form-group">
              <label for="form-body">DESCRIPTION</label><br>
              <textarea class="form-control"  rows="8" cols="60" type="text" id="body" name="description" value=""></textarea>
              </div>
               <div class="form-group">
              <label for="form-body">Availables sizes separated by commas</label><br>
              <textarea class="form-control"  rows="8" cols="60" type="text" id="body" name="sizes" value=""></textarea>
              </div>
              <!-- <input class="form-control" type="hidden" name="man" value="0" required> -->
              <div class="form-group">
              <label for="form-title">PRODUCT IMAGE</label><br>
              <input class="form-control"  type="file" name="image" value=""required>
              </div><br><br>
              <div class="form-group">
              <label for="form-title">POST CATEGORY</label><br>
              <select class="form-control" name="category">
              <option value=""></option>
              <?php $sels=selectAll('categories');
              foreach ($sels as $key => $sel) {?>
              <option class="form-control" value="<?php echo $sel['name']; ?>"><?php echo $sel['name']; ?></option><br>
                          <?php }?>
              </div><br><br>
              <div class="checkbox">
                <label for="publish">PUBLISH</label>
                <input type="checkbox" name="publish" >
              </div>
             
			  <input type="submit" class="btn btn-inverse large"  name="create" value="create"><br>
              <?php if (!empty($errors)){?>
              <div class="alert alert-success">
                <?php  foreach ($errors as $key => $error) {
                    echo $error;?>
                    </div>
                    <?php
                  }
                } ?>

            </form>
      </div>
      
  <?php include ROOT_PATH.'/footer.php'; ?>