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
            
              
                    <section>
                            <?php
                             include '../../login/dbh.php';
                            ?>
                          
                          
<div class="article-container">
<?php 


        if(isset($_POST['submit-search']))
      {

        	$search = mysqli_real_escape_string($conn, $_POST['search']);
        	$sql = "SELECT * FROM article WHERE a_title LIKE '%$search%'";
        	$result = mysqli_query($conn, $sql);
          $queryResult = mysqli_num_rows($result);

        

        if($queryResult >0)
        {   
             echo '<div class="center"> <h2> Aveți '.$queryResult.' rezultate! </h2> </div>';
             echo"<p></p>";
             

             
           while ($row = mysqli_fetch_assoc($result))
           {
           
                      $new = htmlspecialchars($row['a_title']);

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
            else 
            {
                
echo'<h3 class="center container">Această întrebare nu a fost adăugată de nimeni! <br></h3>';
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
echo'<h4 class="container center">Pentru a adăuga o întrebare trebuie să vă conectați</h4>';


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
    
            }
      }
?>
</div>


                       
                    </section>  
         
               
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