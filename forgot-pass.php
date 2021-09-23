
<?php include "header.php"; ?>	
<?php

if (isset($_POST['email'])){
	$errors=array();
    unset($_POST['login']);
    $user=selectOne('register',['email'=>$_POST['email']]);
    if($user){
            $true=true;
            $token=bin2hex(openssl_random_pseudo_bytes(64,$true));
            $create_token=create('login_tokens',['tokens'=>sha1($token),'user_id'=>$user['id']]);
            
			$tok=selectOne('login_tokens',['id'=>$create_token]);
			$to = $user['email'];
		
		
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "From: DEMIWEARS \r\n"; // Sender's E-mail
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
			$message =" ";
			$message ="<div style='margin-bottom:4em';>";
			$message ="This is a password reset link. Follow the link below to reset your password";
			$message ="<a> recover-pass.php?token=".$tok['tokens']."</a>";
			$message ="</div>";
		
			if (@mail($to, $email, $message, $headers))
			{
				array_push($errors,'The password reset link has been sent successully.please,check your mail');
			}else{
				array_push($errors,'try again');
			}
	
        }else{
            array_push($errors,"incorrect details");
        }
    }

?>					
			<section class="main-content" style="text-align: center;">						
               
						<h4 class="title"><span class="text"><strong>FORGOT</strong> PASSWORD</span></h4>
						<form action="forgot-pass.php" method="post" style="margin: auto;width: 80%; margin-bottom:1em;">
							<fieldset>
                            <div class="control-group">
									<label class="control-label">EMAIL</label>
									<div class="controls">
										<input style="border:1px solid rgba(0,0,0,0.2);border-radius: 5px;width:70%;margin-top: 1em;height: 3em;" type="email" placeholder="Enter your password" name="email" id="password" class="input-xlarge">
									</div>
								</div>
							    <h5> <?php if(!empty($errors)){
										foreach ($errors as $key => $error) {
											echo $error;
										}
										}?>
                                        </h5>
								<div class="control-group">
									<input tabindex="3" class="btn" type="submit" name="login" value="recover">
									<hr>
									
								</div>
							</fieldset>
                        </form>	
			</section>			
			<?php include "footer.php"; ?>