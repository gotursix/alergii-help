<?php
session_start();

     if(isset($_POST['submit']))
        {
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
?>
    
