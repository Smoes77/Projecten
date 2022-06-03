<?php
include 'config.php';
$id = 1;
$sql = 'SELECT * FROM flowers WHERE id = 1';
$stmt = $conn->query($sql);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
if(isset($_POST["wijzigen"])){

    $flowername = $_POST["flowername"];
    $price = $_POST["price"];
    $sql = "UPDATE `flowers`
    SET `flowername` = :flowername, `price` = :price
    WHERE `flowers`.`id` = :id;";



   // $sql = "INSERT INTO `flowers` (`id`, `flowername`, `price`) 
   // VALUES (NULL, :flowername, :price);";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':flowername', $flowername);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':id', $id);

    // insert a row

    $stmt->execute();

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klaboom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>


<body>
    <form action"" method="post">
   <input type="text" name="flowername" id="" value=<?php echo $data["flowername"] ?>>
    <input type="text" name="price" id="" value=<?php echo $data["price"] ?>>
    <input type="submit" value="wijzigen">

</body>

</html>