<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Alergii Help</title>
 
<link rel="stylesheet" href="../../css/css.css">
<link rel="stylesheet" href="../../css/style.css"> 

   
</head>
<body>
    <!-- începutul optiunilor setări cont -->
     <?php

           include '../../panou_mod_account/panoul_administratirului.php';

?>
        
     <!-- sfțrșitul optiunilor setări cont -->
    

    <?php

           include '../bara_navigatie.php';
?> 

     <section class="article">
            <h1 class="white" >
                
                <?php 
                 include '../../login/dbh.php';
                          

$server = "mysql.hostinger.com";
$username = "u784726611_teze";
$password = "b567c63b567c63";
$dbname = "u784726611_teze";
$conn = mysqli_connect($server,$username, $password, $dbname);
$connection = mysqli_connect($server,$username, $password, $dbname);

                          
                          
                          
                            

    $title = mysqli_real_escape_string($conn, $_GET['title']);
    $date = mysqli_real_escape_string($conn, $_GET['date']);


    $sql = "SELECT * FROM article WHERE a_title='$title' AND a_dat='$date'";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
                

    $data = $connection->query("SELECT image FROM users WHERE username = '" . $row['a_author'] . "'");
                            
                echo "
             ".$row['a_title']." <br><br>   </h1>
       <h4 class='white'>  Întrebare adăugată de ".$row['a_author']." 
          ( ".$row['a_dat']." ) <br></h4> ";
 
                ?>  
         </h1>
      
 </section>
    
     <div class="container">
            <div class="row">
              
   <br>
      
        <h3 class="center">Răspunsuri</h3>
      
       <?php
                 include '../../login/dbh.php';
                            
    $title = mysqli_real_escape_string($conn, $_GET['new']);
    $date = mysqli_real_escape_string($conn, $_GET['date']);


    $sql = "SELECT * FROM article WHERE  a_dat='$date'";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);

  $idd = mysqli_real_escape_string($conn, $_GET['hmm']);

  if ($conn->connect_error) 
  {
   die("Connection failed: " . $conn->connect_error);
  }
    $aproved=1;
    $sql = "SELECT * FROM comments WHERE b_idd='$idd'AND aproved='$aproved'";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);

    if($queryResults > 0)
    {
      while($row =mysqli_fetch_assoc($result))
      { 
         

    $data = $connection->query("SELECT image FROM users WHERE username = '" . $row['b_username'] . "'");  
    $title = $row['a_title'];
         
          echo " <div class='box'>
          
           <div class='post-st post-st-r'>";
            
                $row2 = $data->fetch_assoc();
                 $picture = $row2['image'];
                
    if ($picture == "")
        echo '<img  src="../../images/default.jpg" alt="Default Profile Pic"></div>';
    else
        echo '<img  src="../../images/' . $picture . '" alt="Profile Pic"></div>';
      
           $new = htmlspecialchars($row['b_text']);
          echo" 
          <div class='post-dr' >
         <p>$new</p>
    Adugat de ".$row['b_username']."
         (  ".$row['b_dat']." )
         <p><br></p>
         
         
</div>
</div>

<br>";  
    }  
    }

?>


 <?php                  
 
$date = date('FORMAT'); 

$current_date =  date('Y-m-d H:m:s');


$now_date = date('FORMAT', time()); 
date_default_timezone_set('Europe/Bucharest');







if($email <> '')
echo'	
  <h4>Introduceți un comentariul în câmpul de mai jos </h4>
   <form action="" method="POST" >
     <textarea placeholder="Introduce-ți comentariul"  type="text" name="textul" required ></textarea>
     
  <input type="submit" value="Trimiteți comentariul" name="comentariu" class="special">
</form>';
else 
echo'<h4>Pentru a adăuga un comentariu trebuie să vă conectați</h4>';


    if (isset($_POST["comentariu"]))
    {
   
 		$username=  $_SESSION["username"] ;
		$comentariu = $connection->real_escape_string($_POST["textul"]);  

			
		$data = $connection->query("INSERT INTO comments (b_username, b_text, b_idd , b_dat) 
		VALUES ('$username','$comentariu ', '$idd', '$current_date')");
		
		
		
		
    	if ($data === false)
        	echo "<div class=\"alert\">
 <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">×</span>      
 
  Va rugam schimbati-va numele si nu mai folositi script-uri / php code in nume .     
 
 </div>";
    	else
    	{	echo "<div class=\"alert\">
<span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">×</span>             Comentariul va fi verificat de un administrator înainte de a fi publicat.
           </div>";

	}	 
    }
?> 


            <br><br>
            
            
            
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
<script src="../../js/jq.js"></script> 
<script src="../../js/js.js"></script>

</body>
</html>