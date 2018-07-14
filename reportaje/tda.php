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
      
     $conn = new mysqli('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');            
     $idd = mysqli_real_escape_string($conn, $_GET['hmm']);

 
     
     
    $aproved='1';      
    
    $conn = new mysqli('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');     
   
     $sql = "SELECT * FROM tda WHERE aproved = '$aproved' AND d_id = '$idd'";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);
   
    if($queryResults > 0)
    {

 while ($row = mysqli_fetch_assoc($result)) 
     {
     
  $connection = new mysqli('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');  
    
    
     echo " 
             <div class='caption'>
             <h1 class='center'>".$row['d_title']."</h1>
            <p>".$row['d_text']."</p>
            <hr>
           
            </div>
            
           
             ";
 
 
      }


    }
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