<?php

include_once './functions.php';

session_start();

$passwordLength = 10;
$allowForLetters = false;
$allowForNumbers = false;
$allowForSymbols = false;
$dontAllowForRepetitions = false;

if (isset($_GET['passwordLength'])) {
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

if (isset($_GET['dontAllowForRepetitions'])) {
    $dontAllowForRepetitions = true;
}

$_SESSION['generatedPassword'] = generateRandomPassword($passwordLength, $allowForLetters, $allowForNumbers, $allowForSymbols, $dontAllowForRepetitions);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h1 class="fs-4 fw-bold mb-0">Password Generator</h1>
                    </div>

                    <div class="card-body bg-white p-5">
                        <form action="index.php" method="GET" class="d-flex flex-column align-items-center gap-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-light">Password Length</span>
                                <input type="number" min="5" max="20" name="passwordLength" value="10"
                                    class="form-control text-center fw-bold" required>
                            </div>

                            <div class="w-100">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="allowForLetters" id="lettersCheckbox">
                                    <label class="form-check-label" for="lettersCheckbox">
                                        Include letters
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="allowForNumbers" id="numbersCheckbox">
                                    <label class="form-check-label" for="numbersCheckbox">
                                        Include numbers
                                    </label>
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="allowForSymbols" id="symbolsCheckbox">
                                    <label class="form-check-label" for="symbolsCheckbox">
                                        Include symbols
                                    </label>
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="dontAllowForRepetitions" id="repetitionsCheckbox">
                                    <label class="form-check-label" for="repetitionsCheckbox">
                                        Don't allow for repetitions
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary px-4 py-2">Generate Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>