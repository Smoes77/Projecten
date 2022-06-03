<?php
include 'config.php';


if (isset($_POST["submit"])) {
    echo $_POST["flowername"];
    echo $_POST["price"];

    $sql = "INSERT INTO `flowers` (`id`, `flowername`, `price`) 
    VALUES (NULL, :flowername, :price);";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':flowername', $flowername);
    $stmt->bindParam(':price', $price);

    // insert a row
    $flowername = $_POST["flowername"];
    $price = $_POST["price"];
    $stmt->execute();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=a, initial-scale=1.0">
    <title>Toevoegen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<style>

</style>

<body>

    <form action="" method="post">
        <input type="text" id="" name="flowername">
        <input type="text" id="" name="price">
        <input type="submit" value="submit" name="submit">
    </form>

</body>

</html>