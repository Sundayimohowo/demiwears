
<?php include "header.php"; ?>
<?php
if($_GET['token']){
    $token=$_GET['token'];
    $user_token=selectOne('login_tokens',['tokens'=>$token]);
    $user=selectOne('register',['id'=>$user_token['user_id']]);
}
if (isset($_POST['email'])){
	$errors=array();
    unset($_POST['login']);
    if($_POST['passcode'] != $_POST['confirm_pass']){
        array_push($errors,"passwords must be the same");
    }else{
    	unset( $_POST['confirm_pass']);
    	$selectone=selectone('register',['email'=>$_POST['email']]);
    	$update=update('register', $selectone['id'],['passcode'=>password_hash($_POST['passcode'],PASSWORD_BCRYPT)]);
    	$delete=delete('login_tokens',$user_token['id']);
    	header('location:index.php');
    }
    
    }

?>			
						
			<section class="main-content" style="text-align: center;">				
				<div class="row">				
               
						<h4 class="title"><span class="text"><strong>RESET</strong> PASSWORD</span></h4>
						<form action="" method="post" style="margin: auto;width: 80%; margin-bottom:1em;">
							<fieldset>
                            <div class="control-group">
									<label class="control-label">EMAIL</label>
									<div class="controls">
										<input type="email" style="border:1px solid rgba(0,0,0,0.2);border-radius: 5px;width:70%;margin-top: 1em;height: 3em;" placeholder="Enter your password" value="<?php echo $user['email']; ?>" name="email" id="password" class="input-xlarge">
									</div>
								
                                <label class="control-label">ENTER NEW PASSWORD</label>
									<div class="controls">
										<input type="text" style="border:1px solid rgba(0,0,0,0.2);border-radius: 5px;width:70%;margin-top: 1em;height: 3em;" placeholder="Enter new password" value="" name="passcode" id="password">
									</div>
								
                                <label class="control-label">CONFIRM PASSWORD</label>
									<div class="controls">
										<input type="text" style="border:1px solid rgba(0,0,0,0.2);border-radius: 5px;width:70%;margin-top: 1em;height: 3em;" placeholder="confirm password" value="" name="confirm_pass" id="password">									
								</div>
							    <h5> <?php if(!empty($errors)){
										foreach ($errors as $key => $error) {
											echo $error;
										}
										}?>
                                        </h5>
								<div class="control-group">
									<input  tabindex="3" class="btn" type="submit" name="login" value="Sign into your account">
									<hr>
									
								</div>
							</fieldset>
                        </form>				
				</div>
			</section>			
			<?php include "footer.php"; ?>