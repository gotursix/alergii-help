<!DOCTYPE html>
<html lang="en">
    

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Alergii Help</title>

        <link rel="stylesheet" href="css/css.css">

        <link rel="stylesheet" href="css/style.css"> 
	
    </head>

    <body>
        
     


        
    <!-- începutul optiunilor setări cont -->
     <?php
                include 'panou_mod_account/panoul_administratirului.php';
?>
        
     <!-- sfțrșitul optiunilor setări cont -->
    

<?php
           include 'bara_de_navigație/bara_navigatie.php';
?>
  
  
    <div class="container">
    
        <div class="row">
      
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs">
        
                <div id="carousel-299058" class="carousel slide">
          
                    <ol class="carousel-indicators">
            
                        <li data-target="#carousel-299058" data-slide-to="0" class=""> </li>
            
                        <li data-target="#carousel-299058" data-slide-to="1" class="active"> </li>
            
                        <li data-target="#carousel-299058" data-slide-to="2" class=""> </li>
          
                    </ol>
          
                    <div class="carousel-inner">
            
                        <div class="item"> <img class="img-responsive" src="images/1.jpg" alt="thumb">
              
                            <div class="carousel-caption">  </div>
            
                        </div>
            
                        <div class="item active"> <img class="img-responsive" src="images/2.jpg" alt="thumb">
              
                            <div class="carousel-caption"> </div>
            
                        </div>
            
                        <div class="item"> <img class="img-responsive" src="images/3.jpg" alt="thumb">
              
                            <div class="carousel-caption"></div>
            
                        </div>
          
                    </div>
          
                    <a class="left carousel-control" href="#carousel-299058" data-slide="prev"><span class="icon-prev"></span></a> <a class="right carousel-control" href="#carousel-299058" data-slide="next"><span class="icon-next"></span></a></div>
      
            </div>
    
        </div>
    
        <hr>
  
    </div>
        

    <div class="container">
  
        <div class="row">
    
            <div class="col-lg-9 col-md-12">

                <div class="row">
            
                          
               <?php
                           
    
    
$server = "mysql.hostinger.com";
$username = "u784726611_teze";
$password = "b567c63b567c63";
$dbname = "u784726611_teze";
$conn = mysqli_connect($server,$username, $password, $dbname);
$connection = mysqli_connect($server,$username, $password, $dbname);

        $aproved='1';  
    $sql = "SELECT * FROM news WHERE aproved = $aproved  ";
  
       

    $result = mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);
   
    if($queryResults > 0)
    {

 while ($row = mysqli_fetch_assoc($result)) 
     {
     
    
    
     echo "  <div class='col-lg-4 col-md-4 col-sm-6 col-xs-6'>
          
                        <div class='thumbnail'>
             <div class='caption'>
             <h3>".$row['c_title']."</h3>
            <p>".$row['c_home']."</p>
            <hr>
                <div class='center'>
      
<a href='reportaje/stire.php?title=".$row['c_title']."&date=".$row['c_dat']."&hmm=".$row['c_id']."' class='btn btn-info' role='button'> Mai mult</a>   
            </div>
            </div>
              </div>
          
                        </div>
        
             ";
 
 
      }


    }
    ?>
     
            
                            </div>
          
                        </div>
        
    
            <div class="col-lg-3 col-md-6 col-md-offset-3 col-lg-offset-0">
  
                <iframe src="https://www.meteoblue.com/en/weather/widget/three?geoloc=detect&nocurrent=0&noforecast=0&noforecast=1&days=4&tempunit=CELSIUS&windunit=METER_PER_SECOND&layout=image"  frameborder="0" scrolling="NO" allowtransparency="true" sandbox="allow-same-origin allow-scripts allow-popups allow-popups-to-escape-sandbox" class="forecast"></iframe>
      
                        <br><br>
                        
                
                <?php
                
                include 'panoul_dezvoltatorilor/buton_panou_admin.php';
                
                ?>
    
            </div>
  </div>
        </div>
  
   <?php
    
    if (isset($_SESSION["email"]) || isset($_SESSION["loggedIn"])) 
          {
           echo ' <div class="center">Puteți adăuga un reportaj apăsând pe butonul de mai jos<br>
           <a href="login/stire.php"> <button class="btn btn-info">Adaugă</button> </a>
           </div></div>';
}

    ?> 
    
    
    
    
 

    <script src="js/jq.js"></script> 

    <script src="js/js.js"></script>

    </body>

</html>