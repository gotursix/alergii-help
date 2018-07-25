<?php
session_start();

     if(isset($_POST['submit']))
   
   { 
       
       	
			
     
       
     $types = array('image/jpeg', 'image/gif', 'image/jpg' , 'image/png');
   
   
    if (in_array($_FILES['file']['type'], $types)) 
    {
        
        
                       
    	$server = "mysql.hostinger.com";
        $username = "u784726611_teze";
        $password = "b567c63b567c63";
        $dbname = "u784726611_teze";
        $connection = mysqli_connect($server,$username, $password, $dbname);
        

  $file = "../images/".$_SESSION["picture"];
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
                                                                            
                    
        $server = "mysql.hostinger.com";
        $username = "u784726611_teze";
        $password = "b567c63b567c63";
        $dbname = "u784726611_teze";
        $con = mysqli_connect($server,$username, $password, $dbname);
             
            $q = mysqli_query($con,"UPDATE users SET image = '".$_FILES['file']['name']."' WHERE email = '".$_SESSION['email']."'");
                
        $server = "mysql.hostinger.com";
        $username = "u784726611_teze";
        $password = "b567c63b567c63";
        $dbname = "u784726611_teze";
        $connection = mysqli_connect($server,$username, $password, $dbname);
		
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
            

    
