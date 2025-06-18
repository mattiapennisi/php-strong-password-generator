<?php

// Include the file containing the password generation function
include_once './functions.php';

// Start or resume a session to store the generated password
session_start();

// Initialize default values for password generation options
$passwordLength = 10;
$allowForLetters = false;
$allowForNumbers = false;
$allowForSymbols = false;
$dontAllowForRepetitions = false;

// Check if form has been submitted with a password length
if (isset($_GET['passwordLength'])) {
    $passwordLength = $_GET['passwordLength'];

    // Redirect to result page after processing
    header('Location: result.php');
}

// Check which character types were selected in the form
if (isset($_GET['allowForLetters'])) {
    $allowForLetters = true;
}

if (isset($_GET['allowForNumbers'])) {
    $allowForNumbers = true;
}

if (isset($_GET['allowForSymbols'])) {
    $allowForSymbols = true;
}

// Check if repetitions should be prevented
if (isset($_GET['dontAllowForRepetitions'])) {
    $dontAllowForRepetitions = true;
}

// Generate the password with the selected options and store it in session
$_SESSION['generatedPassword'] = generateRandomPassword($passwordLength, $allowForLetters, $allowForNumbers, $allowForSymbols, $dontAllowForRepetitions);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password generator</title>
    <!-- Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body class="bg-light">
    <!-- Main container -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <!-- Password generator card -->
                <div class="card shadow-lg border-0 rounded-lg">
                    <!-- Card header with title -->
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h1 class="fs-4 fw-bold mb-0">Password Generator</h1>
                    </div>

                    <!-- Card body with form -->
                    <div class="card-body bg-white p-5">
                        <form action="index.php" method="GET" class="d-flex flex-column align-items-center gap-4">
                            <!-- Password length input field -->
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-light">Password Length</span>
                                <input type="number" min="5" max="10" name="passwordLength" value="10"
                                    class="form-control text-center fw-bold" required>
                            </div>

                            <!-- Character type options -->
                            <div class="w-100">
                                <!-- Letters option -->
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="allowForLetters" id="lettersCheckbox">
                                    <label class="form-check-label" for="lettersCheckbox">
                                        Include letters
                                    </label>
                                </div>

                                <!-- Numbers option -->
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="allowForNumbers" id="numbersCheckbox">
                                    <label class="form-check-label" for="numbersCheckbox">
                                        Include numbers
                                    </label>
                                </div>

                                <!-- Symbols option -->
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="allowForSymbols" id="symbolsCheckbox">
                                    <label class="form-check-label" for="symbolsCheckbox">
                                        Include symbols
                                    </label>
                                </div>

                                <!-- No repetition option -->
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="dontAllowForRepetitions" id="repetitionsCheckbox">
                                    <label class="form-check-label" for="repetitionsCheckbox">
                                        Don't allow for repetitions
                                    </label>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary px-4 py-2">Generate Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>