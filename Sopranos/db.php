<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=sopranos", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo"Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $sql = 'SELECT DISTINCT(pizzanaam), image_URL FROM pizza  ';
    $stmt = $conn->query($sql);
    $pizzas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>