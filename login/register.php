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
 
            <div data-validate = "Enter username" class="upb">
					 <input placeholder="Introduce-ți numele de utilizator" type="text"  name="firstName"  required />	
						<span data-placeholder="Username"></span>
					</div>
 	            
 	            
 	            <div data-validate="Enter email">
					 <input placeholder="Introduce-ți adresa de e-mail" type="email" name="email"  required/> 
	                     <span data-placeholder="Email"></span>
					</div>			
 	             
 	               <div data-validate="Enter password">
					 <input placeholder="Introduce-ți parola" type="password" name="password"  required/> 
	                     <span  data-placeholder="Parola"></span>
					</div>
                            <h4> Alegeți-vă o poză de profil 	</h4>
                     <div class="image-image" >       
               <input name="file" class="register-img" type="file" name="myImage" accept="image/*" />
</div>
                
            
 <?php                     
   
   
   
   
    if (isset($_POST["register"]))
   
   { 
       
       	
			
     
       
     $types = array('image/jpeg', 'image/gif', 'image/jpg' , 'image/png');
   
   
    if (in_array($_FILES['file']['type'], $types)) 
    {
        
        
                       
$server = "mysql.hostinger.com";
$username = "u784726611_teze";
$password = "b567c63b567c63";
$dbname = "u784726611_teze";
$connection= mysqli_connect($server,$username, $password, $dbname);

    
    
    
        $firstName = $connection->real_escape_string($_POST["firstName"]);  		
		$email = $connection->real_escape_string($_POST["email"]);  
		$password = sha1($connection->real_escape_string($_POST["password"])); 
	
		$data = $connection->query("INSERT INTO users (username, email, password) VALUES ('$firstName', '$email', '$password')");
		
		
		
    	if ($data === false)
        	echo "<div class='alert'>
             <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">×</span>
               Există deja un cont creat cu această adresă de e-mail.
              </div>";
       
        $uploadOk = 1;
        

       move_uploaded_file($_FILES['file']['tmp_name'],"../images/".$_FILES['file']['name']);
       
         $connection = mysqli_connect('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');
         $q = mysqli_query($connection,"UPDATE users SET image = '".$_FILES['file']['name']."' WHERE username LIKE '%$firstName%' ");
    	
    		header("Location: login.php");
			exit();}	
        
        else {
            
            
             if (empty($_FILES['file']['name'])) 
             {
           
           	$connection = new mysqli('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');

		$firstName = $connection->real_escape_string($_POST["firstName"]);  		
		$email = $connection->real_escape_string($_POST["email"]);  
		$password = sha1($connection->real_escape_string($_POST["password"])); 
			
		$data = $connection->query("INSERT INTO users (username, email, password) VALUES ('$firstName', '$email', '$password')");
		
    	if ($data === false)
        	echo "<div class='alert'>
             <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">×</span>
               Există deja un cont creat cu această adresă de e-mail.
              </div>";
         }
         
         
         else 
         
          	echo "<div class='alert'>
             <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">×</span>
               Fisierul nu este o imagine
              </div> ";
      
    }
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


