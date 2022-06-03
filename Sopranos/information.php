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



<div class="information"> 
Je naam is: <?php echo $_GET["naam"]; ?><br>
Je achternaam is: <?php echo $_GET["achternaam"] ?> <br>
Je telefoonnummer is: <?php echo $_GET["telefoonnummer"]; ?> <br>
Je E-mail is: <?php echo $_GET["e-mail"]; ?> <br>
Je Stad + Postcode is: <?php echo $_GET["postcode"]; ?> <br>
Je adres is: <?php      echo $_GET ["adres"];?> <br>
</div>

<div class="tekstbestelling">
    Je Bestelling is gelukt!

    Duurt Hooguit 30 minuten!
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