<?php
session_start();

     if(isset($_POST['submit']))
   
   { 
       
       	
			
     
       
     $types = array('image/jpeg', 'image/gif', 'image/jpg' , 'image/png');
   
   
    if (in_array($_FILES['file']['type'], $types)) 
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
       
       

  $file = "images/".$_SESSION["picture"];
    unlink($file);
           if(file_exists('images/default.jpg'))
               move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);
               else
              if(file_exists('../images/default.jpg'))
                   move_uploaded_file($_FILES['file']['tmp_name'],"../images/".$_FILES['file']['name']);
                   else
             if(file_exists('../../images/default.jpg'))
                          move_uploaded_file($_FILES['file']['tmp_name'],"../../images/".$_FILES['file']['name']);
                                      else
                if(file_exists('../../../images/default.jpg'))
                       move_uploaded_file($_FILES['file']['tmp_name'],"../../../images/".$_FILES['file']['name']);
                                                                            
             $con = mysqli_connect('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');
            $q = mysqli_query($con,"UPDATE users SET image = '".$_FILES['file']['name']."' WHERE email = '".$_SESSION['email']."'");
                 $connection = new mysqli('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');
		
		$email =  $_SESSION["email"];
    	$data = $connection->query("SELECT image FROM users WHERE email='$email'");

   if ($data->num_rows > 0)
   {
    $row = $data->fetch_assoc();
    $_SESSION["picture"]=$row['image'];

  }
          }
       
 
    }	
        
 
   
?> 
            

    
