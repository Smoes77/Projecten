<?php
 include 'config.php';

 if(isset($_POST["delete"])){

      $sql ="DELETE FROM flowers WHERE flowers.id = :flowerid";

     $stmt = $conn->prepare($sql);
     $stmt->bindParam(':flowerid', $flowerID);

     $flowerID = $_POST["flowerid"];

     $stmt->execute();
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verwijderen</title>
</head>
<body>
<form action="" method="post">
Weet u zeker dat uw bloem met dit id wilt verwijderen?
<input type="text" name="flowerid" id="" style="width:75px;" placeholder="ID nr">  <br> <br>
<input type="submit" value="DELETE"  name ="delete" id="" > 
</form>
</body>
</html>