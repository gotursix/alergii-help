     <?php

		$connection = new mysqli('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');
		
		$email =   $_SESSION["email"];
	
		$data = $connection->query("SELECT admin FROM users WHERE email='$email'");

   if ($data->num_rows > 0)
   {$row = $data->fetch_assoc();
    $_SESSION["admin"] =$row['admin'];}
    
    
    if( $_SESSION["admin"]=='1')
    {
        
        
        echo'<a href="panoul_dezvoltatorilor/index.php" class="btn btn-info" role="button" > Panoul administratorului </a>';
    
         echo'<a href="panoul_dezvoltatorilor/abonati.php" class="btn btn-info upb" role="button"> Abonații la newsletter </a>';
        
        
        
    }
 
 
 
        ?>