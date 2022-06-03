<?php
include 'db.php';
if (isset($_POST["submit"])) {
          //  echo $_POST["pizzanaam"];
          //  echo $_POST["prijs"];
        
            $sql = "INSERT INTO `pizza` (`pizza_ID`, `pizzanaam`, `prijs`) 
            VALUES (NULL, :pizzanaam, :prijs);";
        
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':pizzanaam', $pizzanaam);
            $stmt->bindParam(':prijs', $prijs);
        
            // insert a row
          //  $pizzanaam = $_POST["pizzanaam"];
          //  $prijs = $_POST["prijs"];
          //  $stmt->execute();
        }
        $ID = 1;
        $sql = "SELECT * FROM pizza WHERE pizza_ID =1";
        $stat = $conn->query($sql);
        $data = $stat->fetch(PDO::FETCH_ASSOC);
        if(isset($_POST["wijzigen"])){
            $pizzanaam = $_POST["pizzanaam"];
            $prijs = $_POST["prijs"];
            $sql = "UPDATE `pizza` 
                    SET `pizzanaam` = :pizzanaam, `prijs` = :prijs
                    WHERE `pizza`.`pizza_ID` = :pizza_ID;";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':pizzanaam', $pizzanaam);
                $stmt->bindParam(':prijs', $prijs);
                $stmt->bindParam(':pizza_ID', $ID);
                $stmt->execute();
            }
            if(isset($_POST["delete"])){

                $sql ="DELETE FROM pizza WHERE `pizza`.`pizza_ID` = :pizza_ID";
          
               $stmt = $conn->prepare($sql);
               $stmt->bindParam(':pizza_ID', $pizza_ID);
          
               $pizza_ID = $_POST["pizza_ID"];
          
               $stmt->execute();
             }

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<body>
  
    <div class="header"> 
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="bestellen.php">Bestellen</a></li>
                <li><a href="winkelwagen.php">Winkelwagen</a></li>
           </ul>
        </div>
    </div>

    <form id="form4" action="" method="post">
        Voeg een pizza toe! 
        <input type="text" id="" name="pizzanaam">
        <input type="text" id="" name="prijs">
        <input type="submit" value="submit" name="submit">
    </form>



    <form id="form3" action="" method="post">
    Verander hier een pizzanaam en de prijs ervan!
    <br>
        <input type="text" name="pizzanaam" value=<?php echo $data["pizzanaam"]; ?>>
        <input type="text" name="prijs" value=<?php echo $data["prijs"]; ?>>
        <input type="submit" value="wijzigen" name="wijzigen">
    </form>


    <form id="form5" action="" method="post">
      Weet u zeker dat uw Pizza met dit id wilt verwijderen?
      <br>
    <input id=""type="text" name="pizza_ID" id=""  placeholder="ID Nummer">  
    <input type="submit" value="DELETE"  name ="delete" id="" > 
   </form>
    

 <section>
  <div class="content">
    <h2>Admin</h2>
    <h2>Admin</h2>
  </div>
</section>



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