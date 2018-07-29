<!doctype html>
<html lang="en">
<head>
	<link rel="stylesheet" href="../css/css.css">
       <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   <div class="container up center">
               <img src="../images/avatar1.png"><br><br>
              	
              	<form class="login" action="login.php" method="post"> 			 	                    			
 	<h2>
				  	 Bine ați venit! 

					</h2>
 	           
 	           
 	            <div data-validate = "Email invalid">
					 <input  placeholder="Introduceți adresa de e-mail" type="text"  name="email"  required />	
						<span  data-placeholder="Email"></span>
					</div>
 	            			
 	             
 	               <div data-validate="Enter password">
					 <input placeholder="Introduceți parola" type="password"  name="password"  required /> 
	                     <span data-placeholder="Parola"></span>
					</div>
					
					
 	            
 	            
 <?php
	session_start();

	if (isset($_POST["logIn"])) {
		
		
		
$server = "mysql.hostinger.com";
$username = "u784726611_teze";
$password = "b567c63b567c63";
$dbname = "u784726611_teze";
$connection= mysqli_connect($server,$username, $password, $dbname);


		
		$email = $connection->real_escape_string($_POST["email"]);
		$password = sha1($connection->real_escape_string($_POST["password"]));
		$data = $connection->query("SELECT image FROM users WHERE email='$email' AND password='$password'");

   if ($data->num_rows > 0)
   {
 
    $row = $data->fetch_assoc();
    $_SESSION["email"] = $email;
    $_SESSION["loggedIn"] = 1;
    $_SESSION["picture"]=$row['image'];

    $data = $connection->query("SELECT username FROM users WHERE email='$email' AND password='$password'");
    $row = $data->fetch_assoc();
    $_SESSION["username"] = htmlspecialchars($row['username']);
    
 	header("Location: ../index.php");



} else {
			
			echo "<div class='alert'>
             <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">×</span>
            Numele sau parola este gresită!
              </div>";
		}
	}	
?>     

 	             <input type="submit"  value="Conectare" name= "logIn" > 
 	             
               <br><br>

							<h4>
                                <a href="forgotPassword.php">
                                Recuperează-ți parola</a>
						</h4>
							<h4 ><a href="register.php">
								Nu ai un cont? Înregistrează-te </a></h4>     
    </form>
       </div>
    <script src="../js/jq.js"></script> 
<script src="../js/js.js"></script>
</body>
</html>
