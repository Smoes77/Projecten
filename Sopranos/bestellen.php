<?php

session_start();
if (empty($_SESSION)) {

    $_SESSION['winkelwagen'] = array();
    }



if(isset($_POST["pizza"])){
    $_SESSION['winkelwagen'][$_POST['pizza']] +=1;
header("Location: bestellen.php");
exit();



}  
?>

<?php include 'db.php' ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header"> 
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="bestellen.php">Bestellen</a></li>
                <li><a href="winkelwagen.php">Winkelwagen</a></li>
           </ul> 
        </div>
    </div>




<?php 

foreach ($pizzas as $pizza){

    // print_r($pizza)
    echo '<div id="menu">';
     echo '   <form method="post">';
     echo   ' <div class="dropdown5"> ';
     echo  '<button class="dropbtn5" type="submit"name="knop">'.$pizza["pizzanaam"].'</button> ';
     echo '<select class="form-select" name="pizza">'

     .$sql = 'SELECT * from pizza WHERE pizzanaam = "'.$pizza["pizzanaam"].'"';

     $stm = $conn->query($sql);
        $formats = $stm->fetchAll(PDO::FETCH_ASSOC);
        foreach($formats as $format){
        echo   ' <option value='.$format['pizza_ID'].'>'.$format["grootte"]." € ".$format["prijs"] .'
        </option>';
        }
        echo '</select>';

        echo   '</div> ';


        echo  '<div class="menu">';
        echo       '  <img src="'.$pizza["image_URL"].'" style="width: 200px; z-index : 0;">  ';
        echo ' </div>  ';

        echo '</form>';

        echo ' </div>  ';

    }
?>




<div class="prijskaartje">
        <h1>Prijskaartje</h1>
      <div class=" tekstm"> 
        <p1> Pizza Margherita: €5,00  </p1>
</div>
<div class=" teksts"> 
        <p1> Pizza Salami: €6,00  </p1>
</div>
<div class=" tekstsh"> 
        <p1> Pizza Shoarma: €7,00  </p1>
</div>
<div class=" tekstv"> 
        <p1> Pizza Veggie: €9,00  </p1>
</div>
</div>


  
<div class="rollendepizza">
  <img src="sopranos.jpg" style="width: 500px; height: 500px;">
</div>




        
     

    <div class="footer"> 
    <div class="waviy">
   <span style="--i:1">D</span>
   <span style="--i:2">a</span>
   <span style="--i:3">a</span>
   <span style="--i:4">n</span>
   <span style="--i:5"></span>
   <span style="--i:6">S</span>
   <span style="--i:7">t</span>
   <span style="--i:8">u</span>
   <span style="--i:9">i</span>
   <span style="--i:10">v</span>
   <span style="--i:11">e</span>
   <span style="--i:12">n</span>
   <span style="--i:13">b</span>
   <span style="--i:14">e</span>
   <span style="--i:15">r</span>
   <span style="--i:16">g</span>
  </div>
    </div>
 
    
</body>
</html>