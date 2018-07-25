<!doctype html>
<html lang="en">
<head>
    
 <link rel="stylesheet" href="../css/css.css">
       <link rel="stylesheet" href="../css/style.css">
    
</head>
    
<body>
       
    <div class="container up center">
        
    
     <img src="../images/avatar1.png">
                	<h2>
				  	Recuperează parola
					</h2>



<?php

ini_set("display_errors", "0");
error_reporting(E_ALL);

	if (isset($_GET["token"]) && isset($_GET["email"])) {
	
$server = "mysql.hostinger.com";
$username = "u784726611_teze";
$password = "b567c63b567c63";
$dbname = "u784726611_teze";
$connection= mysqli_connect($server,$username, $password, $dbname);

	
		
		$email = $connection->real_escape_string($_GET["email"]);
		$token = $connection->real_escape_string($_GET["token"]);

		$data = $connection->query("SELECT id FROM users WHERE email='$email' AND token='$token' AND token <> '' ");
    
		if ($data->num_rows > 0) {
			$str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
			$str = str_shuffle($str);
			$str = substr($str, 0, 15);

			$password = sha1($str);

			$connection->query("UPDATE users SET password = '$password', token = '' WHERE email='$email'");


		echo "<div class='alert success'>
  <span class='closebtn'>&times;</span>  
  Noua parolă este: $str
</div>";
		
		} else {
				echo "<div class='alert'>
              <span class='closebtn'>&times;</span>  
              link invalid!
              </div>";
		}
	} else {
		header("Location: login.php");
		exit();
	}
?>

					<h4> <a href="login.php">
                                Ai deja cont? Conectează-te</a>
				    </h4>
    </div>

   
   <script src="../js/jq.js"></script> 
<script src="../js/js.js"></script>
</body>
</html>




