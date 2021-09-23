<?php include "header.php"; 
if (isset($_POST['confirm'])){
	$errors=array();
    if (isset($_POST['alldevices'])){
		// $tok=selectOne('login_tokens',['token'=>sha1($_COOKIE['DEMIWEARS'])]);
		$token=selectOne('login_tokens',['tokens'=>sha1($_COOKIE['DEMIWEARS'])]);
		$loggedInUsers=selectAll('login_tokens',['user_id'=>$token['user_id']]);
		foreach ($loggedInUsers as $key => $loggedInUser) {
		$del=delete('login_tokens',$loggedInUser['id']);
		}
		array_push($errors,"Logged out succesfully");
    }else{
        $tok=selectOne('login_tokens',['tokens'=>sha1($_COOKIE['DEMIWEARS'])]);
		$del=delete('login_tokens',$tok['id']);
		array_push($errors,"Logged out succesfully");
	}        
    setcookie('unm',"1",time()-3600);
    setcookie('pwd', "1",time()-3600);
}

?>
			
			<section class="container">
				<h4><span>LOGOUT OF DEMIWEARS</span></h4>

			</section>			

			<section class="container">				
				<div class="row">
					<div class="span5">		
					<h4 id='message'><?php if(!empty($errors)){
										foreach ($errors as $key => $error) {
											echo $error;
										}
										}?>
								</h4><br>
								<a href="login.php">Back To The Login Page??</a>			
                        <h4 class="title"><span class="text"><strong>Logout</strong> Form</span></h4>
                        <h4><span>Lougout of all accounts??</span></h4>
                            <p>Are you sure you'd like to logout??</p>
						<form action="logout.php" method="post">
						
							<fieldset>
                           
                            <div class="control-group">
									<div class="controls">
										<h4><input type="checkbox" name="alldevices" value="alldevices">Logout of all devices?</h4></br> 
                                        <input tabindex="3" class="btn" type="submit" name="confirm" value="confirm">
                                    </div>
							</fieldset>
                        </form>	
                    </div>			
				</div>
			</section>			
			<!-- <php include "footer.php"; ?> -->