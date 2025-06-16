<?php 

$allCharacters = '!#$%&()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

$passwordGenerated = '';

if (isset($_GET['passwordLength'])) {
    for ($i = 0; $i < $_GET['passwordLength']; $i++) {
        $passwordGenerated[$i] = $allCharacters[rand(0, strlen($allCharacters))];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">

        <h1 class="text-center mt-4">Password Generator</h1>

        <form action="index.php" method="GET" class="form-control mt-4 p-5 d-flex flex-column align-items-center gap-4">
            <input type="number" min="5" max="20" name="passwordLength" required>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php 
        if (isset($_GET['passwordLength'])) {
            echo "<h3 class='text-center mt-4'>Here's your password:</h3>";
            echo "<h4 class='text-center mt-4'>$passwordGenerated</h4>";
        }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>