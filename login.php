<?php  include "header.php";
if (isset($_COOKIE['DEMIWEARS'])){
$token=selectOne('login_tokens',['tokens'=>sha1($_COOKIE['DEMIWEARS'])]);
if ($token){
	header('location:index.php');
	}
}
 ?>
 
<script type="text/javascript">
	
	$(document).ready(function(){
		$("#register-container").css("display","none");
		$(".register").click(function(){
			$("#register-container").toggle();
		});
	});
</script>
 <script type="text/javascript">
        $(document).ready(function() {
            var form = $('#myForm'); // contact form
            var submit = $('.login');
            var registerBtn=$('.register-btn'); // submit button
            var alert = $('.alert-msg'); // alert div for show alert message

            // form submit event
            form.on('submit', function(e) {
                e.preventDefault(); // prevent default form submit

                $.ajax({
                    url: 'log.php', // form action url
                    type: 'POST', // form submit method get/post
                    dataType: 'html', // request type html/json/xml
                    data: form.serialize(), // serialize form data
                    beforeSend: function() {
                        alert.fadeOut();
                        submit.html('creating....'); // change submit button text
                    },
                    success: function(data) {
                        alert.html(data).fadeIn(); // fade in response data
                        form.trigger('reset'); // reset form
                    },
                    error: function(e) {
                        console.log(e)
                    }
                });
                 
            });
        });
        </script>
       
<div class="container">
		<div class="user-login">
			<span class="register"><i class="fa fa-pencil"></i>register</span>
			<h2>DEMIWEARS LOGIN</h2>
			
				<form action="" method="post" id="myForm">
					<div class="email">
						<input type="email" name="email" placeholder="Enter Your email">
					</div>
					<div class="password">
						<input type="password" name="passcode" placeholder="Enter Your password">
					</div>
					<input type="hidden" name="login">
						<div class="alert-msg alert-success" style="text-align: center; color: black;"></div>
					<input class="login" type="submit" value="Sign in">
				</form>
				<a href="forgot-pass.php">Forgot password?</a>
		</div>
	</div>
	<div class="container" id="register-container">
		<div class="user-register">
			<span class="register close">&times</span>
			<h2>DEMIWEARS REGISTER</h2>
			
				<form action="log.php" method="post" id="myForm">
					<div class="username">
						<input type="text" name="email" placeholder="Enter Your email">
					</div>
					<div class="password">
						<input type="text" name="passcode" placeholder="Enter Your password">
					</div>
					
						<div class="alert-msg alert-success" style="text-align: center; color: gold;"></div>
										
					<input class="register-btn" name="create" type="submit" value="SignUp">
				</form>
				<a href="">Forgot password?</a>
		</div>
	</div>
	<?php include 'footer.php'; ?>