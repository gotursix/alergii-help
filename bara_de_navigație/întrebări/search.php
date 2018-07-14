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


                 <div class="container">
            
              
                    <section>
                            <?php
                             include '../../login/dbh.php';
                            ?>
                             
                          <h2 class="center">Rezultate</h2>
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
             echo '<div class="center">Aveti '.$queryResult.' rezultate!</div>';
             echo"<p></p>";
           while ($row = mysqli_fetch_assoc($result))
                echo"<a href='article.php?title=".$row['a_title']."&date=".$row['a_dat']."&hmm=".$row['a_id']."'><div class='b8'>
                        <h2>".$row['a_title']."</h2>
                        <p>".$row['a_dat']."</p>
                        <br>
                     </div></a>";
        }
            else 
            {  echo "<h1 class='center'>Intrebarea aceasta nu a fost pusa de nimeni. Puteti sa o puneti apasand pe butonul de mai jos.         </h1>
                 <div class='center'><a href='intrebare/index.php' ><button class='button-intrebare' >Adauga</button></a></div>   ";}
      }
?>
</div>


                       
                    </section>  
         
               
        </div>
 
                 

<script src="../../js/jq.js"></script> 
<script src="../../js/js.js"></script>

</body>
</html>