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
        
                

        
        
        <br><br>
        
        
<?php
    
   require ("logincheck.php");

$server = "mysql.hostinger.com";
$username = "u784726611_teze";
$password = "b567c63b567c63";
$dbname = "u784726611_teze";
$connection = mysqli_connect($server,$username, $password, $dbname);
$conn = mysqli_connect($server,$username, $password, $dbname);


		
		
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

<h2 class="center">Întrebări ce necesită revizurire</h2>
<br>
    
     <?php

            $aproved="";
          	
            
             $sql = "SELECT * FROM article WHERE aproved='$aproved'";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);
   
    if($queryResults > 0)
    {

 while ($row = mysqli_fetch_assoc($result)) 
     {
     

    $data = $connection->query("SELECT image FROM users WHERE username = '" . $row['a_author'] . "'");  
    $title = $row['a_title'];
         
          echo " <div class='box'>
          
           
           <div class='post-st post-st-r'>";
            
                $row2 = $data->fetch_assoc();
                 $picture = $row2['image'];
                
                
    if ($picture == "")
        echo '<img  src="../images/default.jpg" alt="Default Profile Pic"></div>';
    else
        echo '<img  src="../images/' . $picture . '" alt="Profile Pic"></div>';
 
 
  $app='1';
  $deny='0';
  $part='1';

       $new = htmlspecialchars($row['a_title']);
       
       
     echo " 
            <div class='post-dr'>
            
           
             
            <h3>$new</h3>
             
             <p>".$row['a_author']."  ( ".$row['a_dat']." ) "."</p>
          
        
   
   
  
<a href='delete.php?title="."&aproved=".$app."&hmm=".$row['a_id']."&part=".$part."'>
         <img class='dlike' src='../images/Like.png' alt='Default Profile Pic'> 
</a>

<a href='delete.php?title="."&aproved=".$deny."&hmm=".$row['a_id']."&part=".$part."'>
          <img class='dlike' src='../images/Dislike.png' alt='Default Profile Pic'>
</a>

               <br><br>
            </div>
              </div>
            <br> ";
 
 
      }


    }
    else 
    echo "<h3 class ='center'>Nu exista momentan.</h3>";
  
  
           
 


 
    
?>
    

   
    
    <br><br>
    <h2 class="center">Comentarii ce necesită revizurire</h2>

<br>

<?php

	$connection = new mysqli('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');
		
		$email =   $_SESSION["email"];
	
		$data = $connection->query("SELECT admin FROM users WHERE email='$email'");

   if ($data->num_rows > 0)
   {$row = $data->fetch_assoc();
    $_SESSION["admin"] =$row['admin'];}
    
    
    if( $_SESSION["admin"]<>'1')
   
 
            $aproved="";
           
            
             $sql = "SELECT * FROM comments WHERE aproved='$aproved'";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);
    
    
 
    if($queryResults > 0)
    {

 while ($row = mysqli_fetch_assoc($result)) 
     {
         
      
 

    
    $data = $connection->query("SELECT image FROM users WHERE username = '" . $row['b_username'] . "'");  
    $title = $row['b_text'];
         
          echo " <div class='box'>
          
           
           <div class='post-st'>";
            
                $row2 = $data->fetch_assoc();
                 $picture = $row2['image'];
                
                
    if ($picture == "")
        echo '<img  src="../images/default.jpg" alt="Default Profile Pic"></div>';
    else
        echo '<img  src="../images/' . $picture . '" alt="Profile Pic"></div>';

  
   $app='1';
  $deny='0';
  $part='2';

$new = htmlspecialchars($row['b_text']);


     echo" 
            <div class='post-dr'>
            
            
            <h3> $new</h3>
            <p>".$row['b_username']."  ( ".$row['b_dat']." ) "."</p>
             
          <a href='delete.php?title="."&aproved=".$app."&hmm=".$row['b_id']."&part=".$part."'>
         <img class='dlike' src='../images/Like.png' alt='Default Profile Pic'> 
</a>

<a href='delete.php?title="."&aproved=".$deny."&hmm=".$row['b_id']."&part=".$part."'>
          <img class='dlike' src='../images/Dislike.png' alt='Default Profile Pic'>
</a>
               <br><br>
            
            
            </div></div>
            <br> ";
      }
    }
    
    else 
    
    echo "<h3 class ='center'>Nu exista momentan.</h3>";
  ?>
  

 </div>

<script src="../js/jq.js"></script> 
<script src="../js/js.js"></script>
    
</body>
</html>