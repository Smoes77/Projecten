<?php
session_start();
if (empty($_SESSION['winkelwagen'])){
    $_SESSION['winkelwagen'] = array();
}
// Remove product from winkelwagen, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the winkelwagen
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['winkelwagen']) && isset($_SESSION['winkelwagen'][$_GET['remove']])) {
    // Remove the product from the shopping winkelwagen
    unset($_SESSION['winkelwagen'][$_GET['remove']]);
}

// Update product quantities in winkelwagen if the user clicks the "Update" button on the shopping winkelwagen page
if (isset($_POST['update']) && isset($_SESSION['winkelwagen'])) {
    // Loop through the post data so we can update the quantities for every product in winkelwagen
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'aantal') !== false && is_numeric($v)) {
            $id = str_replace('aantal-', '', $k);
            $aantal = (int)$v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['winkelwagen'][$id]) && $aantal > 0) {
                // Update new aantal
                $_SESSION['winkelwagen'][$id] = $aantal;
            }
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=winkelwagen');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">

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


<div class="winkelwagen">

    <p3> Winkelwagen </p3>


    <?php
require "db.php";
    $winkelwagen = $_SESSION['winkelwagen'];
    //print_r($winkelwagen);
    echo "<table><thead><tbody><tr><th>Pizza</th><th>Grootte</th><th>Prijs</th><th>Aantal</th><th>Totaal</th><th>Delete</th><th></th></tr></thead>";

    foreach ($winkelwagen as $k => $v){

        $sql = "SELECT * FROM pizza WHERE  pizza_ID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $k);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        // print_r($data);
        echo "<tr><td>". $data['pizzanaam'] ."</td>";
        echo "<td>". $data['grootte'] ."</td>";
        echo "<td>". $data['prijs'] ."</td>";

        echo "<td><form method='POST' action='winkelwagen.php' id='form".$k."'>";
        echo "<input id='input2' type='hidden' name='id' value='".$k."'>";
        echo "<input type='number' name='aantal' id='aantal " . $k ."' value='". $v ."' min='0'></input>";
        echo "</form>"; 
        echo "<td>". $v * $data['prijs'] ."</td>";
        echo "<td> <form id='delete" . $k . "' method='POST' action='winkelwagen.php'><input type='hidden' value='" . $k . "' name='delete'></input><input value='delete' type='submit'></input></form></td>";
        echo "<td>";
        //echo " $data ['pizzasoort']";
      //  echo "<form method='post' action=''>";
       // echo "<input type='hidden' name='code' value='''";
      //  echo "<input type='hidden' name='action' value='remove' />";
      //echo "<button class=remove type='submit  '>Remove Item</button>";
      //  echo "<button class=remove  onclick=submit(".$k.") '>Update</button>";


     //  echo " </form>";
     //   echo "</td>";
    //    echo "</tr>";
    }


         echo "</table>";

         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST['aantal']) && !empty($_POST['id'])){
                if ($_POST['aantal'] == 0){
                    unset($_SESSION['winkelwagen'][intval($_POST['id'])]);
                }else{
                    $_SESSION['winkelwagen'][intval($_POST['id'])] = $_POST['aantal'];
                }
                header("Refresh:0");
            }else if(!empty($_POST['delete'])){
                unset($_SESSION['winkelwagen'][intval($_POST['delete'])]);
                header("Refresh:0");
            }
        }

?>


<script>
        function submit(id){
            document.getElementById("form"+id).submit()
            if (document.getElementById('amount' + id).value == 0){
                document.getElementById("row" + id).remove()
            }
        }
    </script>


</div>
<div class="pijl"> 
            <ul>
                <li><a href="klantgegevens.php">></a></li>
           </ul>
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