<?php
 
$dbcon = mysqli_connect('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze') or die(mysqli_error($dbcon));


$passwordcheck = mysqli_real_escape_string($dbcon, $_POST['parola-stergere']);
$password = sha1($passwordcheck);

$username= $_SESSION["username"];

if ($username <> '')
{     

    	session_start();

	if (isset($_POST["stergere-cont"]))
	{
	    
		$connection = new mysqli('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');

	
		
		$data = $connection->query("SELECT passsword FROM users WHERE username='$username' AND password='$password'");

   if (!$data->num_rows <> 0)
   {
 
    echo"<h2 align='center'>Parolă corectă</h2>";
    
       $link2 = mysqli_connect('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');
       $sql2 = "DELETE FROM article WHERE a_author = '$username' ";

if(mysqli_query($link2, $sql2))
{
} 
else{
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
}

 
    
       $link1 = mysqli_connect('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');
       $sql1= "DELETE FROM comments WHERE b_username = '$username' ";
       

if(mysqli_query($link1, $sql1))
{
}
else{
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
}


  $link3 = mysqli_connect('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');
       $sql3= "DELETE FROM users WHERE username = '$username' ";
    
    
 

if(mysqli_query($link3, $sql3))
{
    header('Location: logout.php');
   
} 
else{
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
    
}
   session_destroy();
    echo "<meta http-equiv='refresh' content='0'>";
      echo "<meta http-equiv='refresh' content='0'>";
   header('Location: logout.php');
   exit;
     echo "<meta http-equiv='refresh' content='0'>";
   }    
    else
{
  echo"<h2 align='center'>Parolă greșită</h2>";
  mysqli_close($dbcon);
}}}

else 
 require ("logincheck.php");
       
?>
   