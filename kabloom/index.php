<?php
include 'config.php';
$sql = 'SELECT * FROM flowers';

$stmt = $conn->query($sql);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
<style>

</style>

<body>
    <table class="table table-hover table-warning  table-bordered">
        <?php foreach ($data as $flower) : ?>
            <tr>
                <td><?php echo htmlspecialchars($flower['id']); ?></td>
                <td><?php echo htmlspecialchars($flower['flowername']); ?></td>
                <td><?php echo htmlspecialchars($flower['price']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href='toevoegen.php'><button class="buttonOrder" type="button">Toevoegen</button></a>
</body>

</html>