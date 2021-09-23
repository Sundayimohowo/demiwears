

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
            <section id="">
            <table class="table">
              <thead>
                <tr>
                <th>s/n</th>
                <th>category</th>
                <th>role</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  $cats=selectAll('register');
                  foreach ($cats as $key => $cat) {
                    ?>
                  <td><?php echo $key+1; ?></td>
                  <td><?php echo $cat['email'];?></td>
                  <td><?php echo $cat['position'];?></td>
                  <td class="btn btn-success"><a href="edit-user.php?user=<?php echo $cat['email'];?>">edit</a></td>
                </tr>
              <?php
             } ?>
              </tbody>
            </table>
            </section>
  
  <?php include ROOT_PATH.'/footer.php'; ?>