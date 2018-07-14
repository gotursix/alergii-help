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
      
      else 
        header("Location:../index.php");
} 
else 
        header("Location:../index.php");


?>


<br><br>

<h2 align="center">Abonați</h2>
<br>
    
     <?php

            $abonat="1";
          	$conn = new mysqli('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');  
            
             $sql = "SELECT * FROM users WHERE abonat='$abonat'";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);
   
    if($queryResults > 0)
    {

 while ($row = mysqli_fetch_assoc($result)) 
     {
     
      
     echo "   <div class = 'center'>      ".$row['email']."     </div>
     
     
            <br> ";
 
 
      }


    }
    else 
    echo "<h3 class='center'>Nu există momentan.</h3>";
  
  
?>
    

   


 </div>

<script src="../js/jq.js"></script> 
<script src="../js/js.js"></script>
    
</body>
</html>