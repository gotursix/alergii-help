<?php

session_start();

        $server = "mysql.hostinger.com";
        $username = "u784726611_teze";
        $password = "b567c63b567c63";
        $dbname = "u784726611_teze";
        $dbcon = mysqli_connect($server,$username, $password, $dbname);

$username = mysqli_real_escape_string($dbcon, $_POST['username']);
$email = mysqli_real_escape_string($dbcon, $_SESSION['email']);

$usernamef=$_SESSION["username"];
if ($username <> '')
      
{     
    
     if (mysqli_query($dbcon, "UPDATE users SET username='$username' WHERE email='$email'"))
      
     
    {  
    
     mysqli_query($dbcon, "UPDATE article SET a_author='$username' WHERE a_author='$usernamef'");
     mysqli_query($dbcon, "UPDATE comments SET b_username='$username' WHERE b_username='$usernamef'");
      
       $_SESSION["username"] = $username;
       
        echo "<br> Schimbare realizată cu succes!";}
       
    else
{
   mysqli_error($dbcon);
}
mysqli_close($dbcon);
}


?>





