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



 <section>
        <div class="container">
                   <?php
                             include '../../login/dbh.php';
                            ?>
            <div class="alert info">
   <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>   
  <strong>Atenție!</strong> <br> <hr> Unele răspunsuri primite pe acest forum pot veni de la persoane fără competențe medicale. Alegeți cu discernământ ce sfaturi urmați. 
</div>
                         <h2 class="center">Introduceţi întrebarea dumneavoastră</h2>
            <form class="bar" action="search.php" method="POST">
<input type="text" name="search"  placeholder="cauta intrebarea" required
    size="30" minlength="4" >
<button type="submit" name="submit-search"  class="button special upb" >Caută</button> 
</form>
      <span class="validity"></span>
  </div>
</section>  

        <div class="container">
            <div class="row">
              
                    <section>
          
          
          
          <?php
      
      
      
      $aproved='1';     
      $server = "mysql.hostinger.com";
        $username = "u784726611_teze";
        $password = "b567c63b567c63";
        $dbname = "u784726611_teze";
        $connection = mysqli_connect($server,$username, $password, $dbname);
        $conn = mysqli_connect($server,$username, $password, $dbname);
      
      
     $sql = "SELECT * FROM article WHERE aproved = '$aproved'";
    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);
   
    if($queryResults > 0)
    {

 while ($row = mysqli_fetch_assoc($result)) 
     {
     

    $data = $connection->query("SELECT image FROM users WHERE username = '" . $row['a_author'] . "' ");  
    $title = $row['a_title'];
    
    
           $new = htmlspecialchars($row['a_title']);

         
          echo " <div class='box'>
          
           <div class='post-st-r post-st'>";
            
                $row2 = $data->fetch_assoc();
                 $picture = $row2['image'];
                
    if ($picture == "")
        echo '<img  src="../../images/default.jpg" alt="Default Profile Pic"></div>';
    else
        echo '<img  src="../../images/' . $picture . '" alt="Profile Pic"></div>';

     echo " <a href='article.php?title=".$new."&date=".$row['a_dat']."&hmm=".$row['a_id']."'>
            <div class='post-dr'>
             <h3>$new</h3>
            <p>".$row['a_author']."</p>
            </div>
              </div>
              </a>
            <br> ";
 
 
      }


    }
?>        
                        
                       
                    </section>
                
                 <?php                  
 
$date = date('FORMAT'); 

$current_date =  date('Y-m-d H:m:s');


$now_date = date('FORMAT', time()); 
date_default_timezone_set('Europe/Bucharest');

if($email <> '')
echo'	
  <h4>Introduceți întrebarea în câmpul de mai jos </h4>
   <form action="" method="POST" >
     <textarea placeholder="Introduce-ți întrebarea"  type="text" name="textul" required ></textarea>
     
  <input type="submit" value="Trimiteți întrebarea" name="comentariu" class="special">
</form>';
else 
echo'<h4 class="center">Pentru a adăuga o întrebare trebuie să vă conectați</h4>';


    if (isset($_POST["comentariu"]))
    {
   
 		$username=  $_SESSION["username"] ;
		$comentariu = $connection->real_escape_string($_POST["textul"]);          
        
        echo $id;
        
		$data = $connection->query("INSERT INTO article ( a_title, a_author, a_dat) 
		VALUES ('$comentariu', '$username', '$current_date')");
		
        
    	if ($data === false)
        	echo "<div class='alert'>
             <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">×</span>
                 Va rugam schimbati-va numele si nu mai folositi script-uri / php code in nume .
              </div>";
    	else
    	{	echo "<div class='alert'>
             <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">×</span>
              Întrebarea va fi verificată de un administrator înainte de a fi publicată.
              </div>";
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
    
<script src="../../js/jq.js"></script> 
<script src="../../js/js.js"></script>

</body>
</html>