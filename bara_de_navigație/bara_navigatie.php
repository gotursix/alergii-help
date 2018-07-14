 <nav class="navbar navbar-inverse">
  
        <div class="container-fluid"> 
    
            <div class="navbar-header">
      
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myInverseNavbar2" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
                </button>
      
                <a href="#"><img class="dlike" src="https://alergii-help.xyz/images/avatar.png" ></a> 
            </div>
    
            <div class="collapse navbar-collapse" id="myInverseNavbar2">
      
                <ul class="nav navbar-nav navbar-left">
        
                    <li><a href="https://alergii-help.xyz/index.php">Acasă</a></li>
        
                    <li><a href="https://alergii-help.xyz/bara_de_navigație/Tipuri_de_alergii.php">Tipuri de alergii</a></li>
        
                    <li><a href="https://alergii-help.xyz/bara_de_navigație/Asistent.php">Asistent</a></li>
        
                    <li><a href="https://alergii-help.xyz/bara_de_navigație/locație/Locație.php">Locație</a></li>
        
                    <li><a href="https://alergii-help.xyz/bara_de_navigație/întrebări/întrebare.php">Întrebări</a></li>
        
                    <li><a href="https://alergii-help.xyz/bara_de_navigație/Despre_pagină.php">Despre pagină</a></li>   	
        
                </ul>
              
        
                <ul class="nav navbar-nav navbar-right">

                   
<?php

if (file_exists('nav.php')) 
     include 'nav.php';
 else 
   if (file_exists('../nav.php')) 
           include '../nav.php';
else
    if (file_exists('../../nav.php')) 
           include '../../nav.php';
else
if (file_exists('../../../nav.php')) 
           include '../../../nav.php';
else
  if (file_exists('bara_de_navigație/nav.php')) 
           include 'bara_de_navigație/nav.php';
                    else
  if (file_exists('../bara_de_navigație/nav.php')) 
           include '../bara_de_navigație/nav.php';
?>

        
                </ul>
    
            </div>
  
        </div>

    </nav>

<footer>
    <div class="footer">
        © 2018 Copyright: Alergii Help 
        <a href="https://www.facebook.com/Alergii-Help-1629710557127264/">
           <img class="footer-img" src="https://alergii-help.xyz/images/f.png" >
            
          </a>  
        <a href="https://www.paypal.me/V16768" class="btn-floating btn-fb mx-1">
           <img class="footer-img"src="https://alergii-help.xyz/images/puppy.png" >
            
          </a>
    </div>

  </footer>