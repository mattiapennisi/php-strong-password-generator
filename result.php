<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET['passwordLength'])) {
        echo "<h3 class='text-center mt-4'>Here's your generated password:</h3>";
        echo "<h4 class='text-center mt-4'>$passwordGenerated</h4>";
    }
    ?>
</body>

</html>