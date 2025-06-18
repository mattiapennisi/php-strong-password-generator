<?php

include_once './functions.php';

session_start();

$passwordLength = 10;
$allowForLetters = false;
$allowForNumbers = false;
$allowForSymbols = false;

if (isset($_GET['passwordLength'])){
    $passwordLength = $_GET['passwordLength'];

    header('Location: result.php');
}

if (isset($_GET['allowForLetters'])) {
    $allowForLetters = true;
}

if (isset($_GET['allowForNumbers'])) {
    $allowForNumbers = true;
}

if (isset($_GET['allowForSymbols'])) {
    $allowForSymbols = true;
}

$_SESSION['generatedPassword'] = generateRandomPassword($passwordLength, $allowForLetters, $allowForNumbers, $allowForSymbols);

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
            <input type="number" min="5" max="20" name="passwordLength" value='10' required>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>