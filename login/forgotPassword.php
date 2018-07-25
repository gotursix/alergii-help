<!doctype html>
<html lang="en">
<head>
 <link rel="stylesheet" href="../css/css.css">
       <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
    
    <div class="container up center">
  	
        <form  class="login" action="forgotPassword.php" method="post">
        
            <img src="../images/avatar1.png"><br><br>
                	
                <h2>
				  	 Recuperează parola
					</h2>
		    	
		    	 <div data-validate = "Email invalid">
					 <input placeholder="Introduceți adresa de e-mail"  type="text"  name="email"  required />	
						<span data-placeholder="Email"></span>
					</div>
		    	
			<?php
	if (isset($_POST["forgotPass"])) {
	
	
$server = "mysql.hostinger.com";
$username = "u784726611_teze";
$password = "b567c63b567c63";
$dbname = "u784726611_teze";
$connection= mysqli_connect($server,$username, $password, $dbname);


		
		$email = $connection->real_escape_string($_POST["email"]);
		
		$data = $connection->query("SELECT id FROM users WHERE email='$email'");

		if ($data->num_rows > 0) {
			$str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
			$str = str_shuffle($str);
			$str = substr($str, 0, 10);
			$url = "https://alergii-help.xyz/login/resetPassword.php?token=$str&email=$email";

			mail($email, "Resetare parola", "Pentru a reseta parola folosiți urmatorul link: $url", "From: admin@alergii-help.xyz\r\n");

			$connection->query("UPDATE users SET token='$str', expire = DATE_ADD(NOW(), INTERVAL 30 MINUTE) WHERE email='$email'");

			echo "<div class='alert success'>
  <span class='closebtn'>&times;</span>  
  E-mail-ul de recuperare va fi trimis.
</div>";
		} else {
				echo "<div class='alert'>
              <span class='closebtn'>&times;</span>  
              Adresa de e-mail este gresită!
              </div>
              
              <script>
var close = document.getElementsByClassName('closebtn');
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = '0';
        setTimeout(function(){ div.style.display = 'none'; }, 600);
    }
}
</script>";
		}
	}
?>

			<input type="submit"  name="forgotPass" value="Resetare">
			
              <br><br>
        
                    <h4> <a href="login.php">
                                Ai deja cont? Conectează-te</a>
				    </h4>
				    <h4> <a href="register.php">
								Nu ai un cont? Înregistrează-te </a>
                    </h4> 
             
             
		</form>
    </div>
                <p id="response"></p>
    
<script src="../js/jq.js"></script> 
<script src="../js/js.js"></script>
</body>
</html>


