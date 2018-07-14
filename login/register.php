<!doctype html>
<html lang="en">
<head>
    
 <link rel="stylesheet" href="../css/css.css">
       <link rel="stylesheet" href="../css/style.css">
    
</head>
    
<body>
       
    <div class="container up center" >
        
<form class="register" action="register.php" method="post"  enctype="multipart/form-data"> 
    
                <img src="../images/avatar1.png"><br><br>
                	<h2>
				  	 Crează un cont
					</h2>
 
            <div data-validate = "Enter username" style="margin-bottom:1%;">
					 <input placeholder="Introduce-ți numele de utilizator" type="text"  name="firstName"  required />	
						<span data-placeholder="Username"></span>
					</div>
 	            
 	            
 	            <div data-validate="Enter email" style="margin-bottom:1%;">
					 <input placeholder="Introduce-ți adresa de e-mail" type="email" name="email"  required/> 
	                     <span data-placeholder="Email"></span>
					</div>			
 	             
 	               <div data-validate="Enter password" style="margin-bottom:1%;">
					 <input placeholder="Introduce-ți parola" type="password" name="password"  required/> 
	                     <span  data-placeholder="Parola"></span>
					</div>
                            <h4> Alegeți-vă o poză de profil 	</h4>
                        <input class="register-img" name="file" type="image" accept="image/*">
            
 <?php                     
    if (isset($_POST["register"]))
    
    {
               
    	$connection = new mysqli('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');

		$firstName = $connection->real_escape_string($_POST["firstName"]);  		
		$email = $connection->real_escape_string($_POST["email"]);  
		$password = sha1($connection->real_escape_string($_POST["password"])); 
			
		$data = $connection->query("INSERT INTO users (username, email, password) VALUES ('$firstName', '$email', '$password')");
		
    	if ($data === false)
        	echo "<div class='alert'>
              <span class='closebtn'>&times;</span>  
               Există deja un cont creat cu această adresă de e-mail.
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
    	else
    	{
    	 move_uploaded_file($_FILES['file']['tmp_name'],"../images/".$_FILES['file']['name']);
       
         $connection = mysqli_connect('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');
         $q = mysqli_query($connection,"UPDATE users SET image = '".$_FILES['file']['name']."' WHERE username LIKE '%$firstName%' ");
    	
    		header("Location: login.php");
			exit();}	
	}	                 
?> 

            <input type="submit" name="register" value="Inregistrare" required />    
            <br><br>
            
                 <h4>
                      <a href="forgotPassword.php">
                          Recuperează-ți parola</a>
				</h4>

					<h4> <a href="login.php">
                                Ai deja cont? Conectează-te</a>
				    </h4>
                   
                   </form>
    </div>
    
   <script src="../js/jq.js"></script> 
<script src="../js/js.js"></script>
</body>
</html>


