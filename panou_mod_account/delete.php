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

$server = "mysql.hostinger.com";
$username = "u784726611_teze";
$password = "b567c63b567c63";
$dbname = "u784726611_teze";
$conn = mysqli_connect($server,$username, $password, $dbname);
$dbcon= mysqli_connect($server,$username, $password, $dbname);
$link= mysqli_connect($server,$username, $password, $dbname);
$link2= mysqli_connect($server,$username, $password, $dbname);

 
  $id = mysqli_real_escape_string($conn, $_GET['hmm']);  
 

      
   $aproved='1';
   
        $sql = "DELETE FROM comments WHERE b_idd='$id' ";

if(mysqli_query($link, $sql))
{
    echo "<h2 class = 'center'>Comentariile întrebarii șterse cu succes.</h2> ";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
    
    
    
        $sql2 = "DELETE FROM article WHERE a_id='$id' ";

if(mysqli_query($link2, $sql2))
{
    echo "<h2 class = 'center'>Întrebare ștearsă cu succes.</h2> ";
} else{
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
}
 
      
?>
 
<br><br>
<a href="profilul_meu.php" class="btn btn-info" role="button">Înapoi la profil</a>


 </div>

<script src="../js/jq.js"></script> 
<script src="../js/js.js"></script>
    
</body>
</html>