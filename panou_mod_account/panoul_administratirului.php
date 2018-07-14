
<div id="mySidenav" class="sidenav">
  
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      
        <a class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Panoul utilizatorului<br><br></a>
     
        <div class="dropdown">
    
            <a class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Schimbați-vă poza de profil
    
                <span class="caret"></span>
            </a>
    
            <ul class="dropdown-menu avatar" aria-labelledby="dropdownMenuButton">
        
                <li> 
                <?php

                    include 'avatar.php';
                  	?>
                    <form action="" method="post" enctype="multipart/form-data">
                       
                       <div class="image-file">
                        <input type="file" name="file" accept="image/*"/>
                        </div>
                        <input value="Schimbați poza" type="submit" name="submit" />
                
                    </form>
            
                </li>
  
            </ul>
  
        </div>
        
        
        <div class="dropdown">
    
            <a class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Schimbăți-vă numele
    
                <span class="caret"></span>
            </a>
    
            <ul class="dropdown-menu nume" aria-labelledby="dropdownMenuButton">
        
                <li> 
            
                    <form class="form-n" name="frmChange" role="form" method="POST" action="">
            
                    <?php

                        include 'nume_de_utilizator.php';
      	?>
      	
                
                        <div  data-validate="Enter password" >
					 
                    <input placeholder="Introduce-ți noul nume" type="text"  name="username"  required/> 
	                
                    <span data-placeholder="Parola"></span>
				
                        </div>

                        <button class="btn btn-info" type="submit" value="send">Confirmă schimbarea</button>
                

                
 
                    </form>
            
            
            
            
                </li>
  
            </ul>
  
        </div>
                
                
                
                
                
                
                
              
        <div class="dropdown">
    
            <a class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Schimbați-vă parola
    
                <span class="caret"></span>
            </a>
    
            <ul class="dropdown-menu parola" aria-labelledby="dropdownMenuButton">
        
                <li> 
                  
                    <form class="form-p" name="frmChange" role="form" method="POST" action="">
  <?php
         include 'parola.php';
         
         ?>
                        <div data-validate="Enter password" >
					 
                            <input  placeholder="Parolă nouă" type="password"  name="newPassword"  required> 
	                     
                            <span  data-placeholder="Parola"></span>
					
                        </div>
	
	  
                       
                       
                       
                       
                        <div  data-validate="Enter password" >
					 
                            <input  placeholder="Reintroduce-ți parola" type="password"  name="confirmPassword"  required> 
	                     
                            <span data-placeholder="Confirmati parola"></span>
					
                        </div>
   
                        <button class="btn btn-info" type="submit" value="send" >Efectuați schimbarea parolei</button>

                    </form>
            
                </li>
  
            </ul>
  
        </div>
      
          
          
          
          
          
          
          
          
        <div class="dropdown">
    
            <a class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Abonează-te la newsletter
    
                <span class="caret"></span>
            </a>
    
            <ul class="dropdown-menu abonare" aria-labelledby="dropdownMenuButton">
        
                <li> 
                  
                   <?php    


 $email=$_SESSION["email"];


		$connection = new mysqli('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze');
		
		$email =   $_SESSION["email"];
	
		$data = $connection->query("SELECT abonat FROM users WHERE email='$email'");

   if ($data->num_rows > 0)
   {
 
    $row = $data->fetch_assoc();
    $_SESSION["abonat"]=$row['abonat'];

} 

if($_SESSION["abonat"] <> '1')
echo'<form action=" " method="POST">
  <input type="submit" value="Abonare" name="submit-newsfeed">
</form>';

else 
echo'<form action=" " method="POST">
  <input type="submit" value="Dezabonare" name="submit-newsfeed-2">
</form>';

 ?>


    <?php

	session_start();
	
if(isset($_POST['submit-newsfeed']))
 {

    $dbcon = mysqli_connect('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze') or die(mysqli_error($dbcon));

      $abonat='1';

     if (mysqli_query($dbcon, "UPDATE users SET abonat='$abonat' WHERE email='$email'"))
       	echo "Abonat cu succes!";
         else 
          echo"Eroare!";
    echo "<meta http-equiv='refresh' content='0'>";
     }
  
  
     if(isset($_POST['submit-newsfeed-2']))
 {

    $dbcon = mysqli_connect('mysql.hostinger.com', 'u784726611_teze', 'b567c63b567c63', 'u784726611_teze') or die(mysqli_error($dbcon));
    
      $abonat='0';

     if (mysqli_query($dbcon, "UPDATE users SET abonat='$abonat' WHERE email='$email'"))
       	echo "Dezabonat cu succes!";
         else 
          echo"Eroare!";
    echo "<meta http-equiv='refresh' content='0'>";
     }
    ?>
    
            
                </li>
  
            </ul>
  
        </div>
    
    </div> 
