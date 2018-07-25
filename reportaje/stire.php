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

     <section class="center">
         
        
<?php

    include '../login/dbh.php';
                 
?>
     
         
         
      
 </section>
    
     <div class="container">
            <div class="row">
              
   <br>
      
 <?php
     
$server = "mysql.hostinger.com";
$username = "u784726611_teze";
$password = "b567c63b567c63";
$dbname = "u784726611_teze";
$conn = mysqli_connect($server,$username, $password, $dbname);
$connection = mysqli_connect($server,$username, $password, $dbname);
           
     $idd = mysqli_real_escape_string($conn, $_GET['hmm']);

 
     
     
    $aproved='1';      
    
   
     $sql = "SELECT * FROM news WHERE aproved = '$aproved' AND c_id = '$idd'";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);
   
    if($queryResults > 0)
    {

 while ($row = mysqli_fetch_assoc($result)) 
     {
     
 
    
    
     echo " 
             <div class='caption'>
             <h3>".$row['c_title']."</h3>
            <p>".$row['c_text']."</p>
            <hr>
           
            </div>
            
           
             ";
 
 
      }


    }
    
    
 $conn->close();
  $connection->close();
    ?>

 

            
            
         </div>
    </div>
       
       
       

      <!-- Start of LiveChat (www.livechatinc.com) code -->
	  
<script type="text/javascript">
window.__lc = window.__lc || {};
window.__lc.license = 9884095;
(function() {
  var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
  lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();
</script>
<!-- End of LiveChat code -->

<script src="../js/jq.js"></script> 
<script src="../js/js.js"></script>

</body>
</html>