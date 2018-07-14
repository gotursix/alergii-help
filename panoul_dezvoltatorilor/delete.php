<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Alergii Help</title>
 
<link rel="stylesheet" href="../css/css.css">
       <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    
       <!-- începutul optiunilor setări cont -->
     <?php
                include '../panou_mod_account/panoul_administratirului.php';
?>
        
     <!-- sfțrșitul optiunilor setări cont -->
    

    <?php
           include '../bara_de_navigație/bara_navigatie.php';
?>
    
    <div class="container">
 
<?php



      require ("logincheck.php");
    
		$connection = new mysqli('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');
		
		$email =  $_SESSION["email"];
		$data = $connection->query("SELECT image FROM users WHERE email='$email'");

   if ($data->num_rows > 0)
   {
    
    $admin="1";
    $username = $_SESSION["username"];
    $row = $data->fetch_assoc();
    $_SESSION["admin"]=$row['admin'];
    
      if($admin='$_SESSION["admin"]')
      echo "<h1 class='center'>Bine ai venit, $username</h1> ";
} 



	$conn = new mysqli('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');
   $aproved = mysqli_real_escape_string($conn, $_GET['aproved']);
    $id = mysqli_real_escape_string($conn, $_GET['hmm']);  
      $part = mysqli_real_escape_string($conn, $_GET['part']);  

    
    $dbcon = mysqli_connect('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze') or die(mysqli_error($dbcon));
 
 
 if($part =='1')
 
  {  if($aproved == '0')
      
    { $link = mysqli_connect('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');
        $sql = "DELETE FROM article WHERE a_id='$id' ";
        
        
if(mysqli_query($link, $sql)){
    echo "<h2 class = 'center'>Ștearsă cu succes.</h2> ";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
    }
        
        else
        
   {  if (mysqli_query($dbcon, "UPDATE article SET aproved='$aproved' WHERE a_id='$id'"))
       {
        	echo "<div class='alert'>
              <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">×</span> 
              Statusul întrebării schimbat cu succes
              </div>";
       }
       
    else
{
   mysqli_error($dbcon);
   
   echo "<div class='alert'>
             <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">×</span>  
              Eroare
              </div>";
}}}



if($part =='2')
   {  if($aproved == '0')
      
    { $link = mysqli_connect('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');
        $sql = "DELETE FROM comments WHERE b_id='$id' ";
        
        
if(mysqli_query($link, $sql)){
    echo "<h2 style='text-class:center;'>Șters cu succes</h2> ";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
    }
        
else
{
 
 if (mysqli_query($dbcon, "UPDATE comments SET aproved='$aproved' WHERE b_id='$id'"))
        	echo "<div class='alert'>
             <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">×</span> 
              Statusul comentariului schimbat cu succes
              </div>";
       
       
    else
{
   mysqli_error($dbcon);
   
   echo "<div class='alert'>
             <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">×</span>  
              Eroare
              </div>";
}}	}	
      
?>

<br><br>
<a href="index.php" class="btn btn-info" role="button"> Înapoi la panou </a>


 </div>

<script src="../js/jq.js"></script> 
<script src="../js/js.js"></script>
    
</body>
</html>







    