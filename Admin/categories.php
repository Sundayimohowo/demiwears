
<?php include "header.php"; ?>
<?php
if(isset($_POST['name'])){
    unset($_POST['create']);
    if (!empty($_POST['name']) && !empty($_POST['description'])){
    $create=create('categories',['name'=>$_POST['name'],'description'=>$_POST['description']]);
    }
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
            CREATE CATEGORY
            <h5>
            <form  id='myForm' action="categories.php" method="POST">
              <div class="form-group">
              <label for="form-title">CATEGORY NAME</label><br>
              <input class="form-control" type="text" name="name" id="name" value="" required="">
              </div>
              <div class="form-group">
              <label for="form-body">DESCRIPTION</label><br>
              <textarea class="form-control"  rows="8" cols="60" type="text" name="description" id="body" value=""></textarea>
              </div><br><br>
                <input type="submit" class="btn btn-danger submit-btn" id="create" name="create" value="create"><br>
            </form>
        <div class="col-md-12 col-lg-12 col-ms-12 col-xs-12 text-center">
      
          <h5>
            <!-- WELCOME BACK <php echo $_SESSION['name']; ?><br><br><br> -->
            MANAGE CATEGORIES
            <h5>
        </div>
            <table class="table table-hovered">
              <thead>
                <tr>
                <th>s/n</th>
                <th>category</th>
                <th>description</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  $cats=selectAll('categories');
                  foreach ($cats as $key => $cat) {
                    ?>
                    <?php if (isset($_GET['delete'])){
                      $cat=selectOne('categories',['name'=>$_GET['delete']]);
                        $id=$cat['id'];
                      $delete=delete('categories',$id);
                      header('location: manage-categories.php');
                    }?>
                  <td><?php echo $key+1; ?></td>
                  <td><?php echo $cat['name'];?></td>
                  <td><?php echo $cat['description'];?></td>
                  <td class="btn btn-success"><a href="edit-cat.php?category=<?php echo $cat['id'];?>">edit</a></td>
                  <td class="btn btn-danger"><a href="edit-cat.php?delete=<?php echo $cat['id']; ?>">delete</a></td>
                </tr>
              <?php
             } ?>
              </tbody>
            </table>
      </div>
            </section>

  <?php include ROOT_PATH.'/footer.php'; ?>