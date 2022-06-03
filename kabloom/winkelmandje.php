<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulier</title>
</head>
<body>
    <!-- Opgave 29 -->
    <form action="verwerken.php" method='post'>
        Uw naam :
        <input type="text" name='naam'>
        <input type="hidden" name='taal' value='false'>
        <br>Kies een taal:
        <input type="radio" name="taal" value="N"> Nederlands
        <input type="radio" name="taal" value="E"> Engels
        <input type="radio" name="taal" value="S"> Spaans
        <br>
        <input type="submit" name='submit' value='Versturen'>
    </form>
</body>
</html>