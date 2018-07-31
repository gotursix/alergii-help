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



        <div class="container up">
                   <?php
                             include '../../login/dbh.php';
                            ?>
                       
   
              <section>
          
          
          
          <?php
      
      
      
      $aproved='1';     
      $server = "mysql.hostinger.com";
        $username = "u784726611_teze";
        $password = "b567c63b567c63";
        $dbname = "u784726611_teze";
        $connection = mysqli_connect($server,$username, $password, $dbname);
        $conn = mysqli_connect($server,$username, $password, $dbname);
      
?>


                       
                    </section>
                <div style="margin-left:15%; margin-right:15%">
                 <?php                  
 
$date = date('FORMAT'); 

$current_date =  date('Y-m-d H:m:s');


$now_date = date('FORMAT', time()); 
date_default_timezone_set('Europe/Bucharest');

if($email <> '')
echo'	
  <h2>Introduceți întrebarea în câmpul de mai jos </h2>
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