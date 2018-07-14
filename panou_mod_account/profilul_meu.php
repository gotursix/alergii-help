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
                include 'panoul_administratirului.php';

?>
        
     <!-- sfțrșitul optiunilor setări cont -->
    

    <?php
           include '../bara_de_navigație/bara_navigatie.php';
?>
    
    <div class="container up">
   <div class="row">
   
    <?php
    
       require ("logincheck.php");
		$connection = new mysqli('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');
		
		$email =  $_SESSION["email"];
	  $username = $_SESSION["username"];
	  $picture= $_SESSION["picture"];
	  
      echo "<h1 class='center'>Bine ai venit, $username</h1> ";
      
   echo '<div class="post-st profil">';

    if ($picture == "")
        echo '<img class="image-big" src="../images/default.jpg" alt="Default Profile Pic">';
    else
        echo '<img class="image-big"  src="../images/' . $picture . '" alt="Profile Pic">';      

           echo '</div>';

        ?>
        
        
        
         <div class="post-dr sterge-left">
        <h4> Doriți să ștergeți contul permanent? <br>  </h4>
         
                 <div class="dropdown">
    
            <button class="button special btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Șterge-ți contul
    
                <span class="caret"></span>
            </button>
            <ul  class="dropdown-menu sterge-center" aria-labelledby="dropdownMenuButton">
         
                <div class="right-image">
                <h4> Odată șters contu-ul aceasta nu mai poate fi recuperat!</h4>
   <form action="" method="POST" >
 
  <input type="password" name="parola-stergere"  placeholder="Introduceți parola" required size="30" minlength="3" >
     
  <input class="sterge-cont" type="submit" value="Șterge cont-ul" name="stergere-cont" >
</form>

            <?php 
            include 'sterge_cont.php'; 
            ?>

                </div>
            </ul>
        </div>
    
        
       </div>
      </div>     
<?php
            
              $aproved='1';    
              
              
    $conn = new mysqli('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');     
     $sql = "SELECT * FROM article WHERE aproved = '$aproved' AND a_author= '$username'";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);
   
    if($queryResults > 0)
    {

 while ($row = mysqli_fetch_assoc($result)) 
     {
     
  $connection = new mysqli('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');  
    
    $data = $connection->query("SELECT image FROM users WHERE username = '$username' ");  
    $title = $row['a_title'];
         
          echo " <div class='box'>
          
           <div class='post-st'>";
            
                $row2 = $data->fetch_assoc();
                 $picture = $row2['image'];
                
   
        echo '<img  src="../images/' . $picture . '" alt="Profile Pic"></div>';




       $part='2';
     echo " <a href='../bara_de_navigație/întrebări/article.php?title=".$row['a_title']."&date=".$row['a_dat']."&hmm=".$row['a_id']."'>
            <div class='post-dr'>
             <h3>".$row['a_title']."</h3>
            <p>".$row['a_author']."</p>
             </a>
             
            
 
           <a href='delete.php?title="."&hmm=".$row['a_id']."'>
           
       
          <img class='dlike' src='../images/Dislike.png' alt='Default Profile Pic'>
          </a>
            
               
            </div>
            <br>
              </div>
             
            <br> 
            
         

";   }}
 ?>
 
    </div>
<script src="../js/jq.js"></script> 
<script src="../js/js.js"></script>
    
</body>
</html>