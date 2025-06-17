<?php

function generateRandomPassword()
{
    $lettersPool = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $numbersPool = '0123456789';
    $symbolsPool = '!#$%&()*';
    $allCharactersPool = '';
    $generatedPassword = '';

    if (isset($_GET['allowForLetters'])) {
        $allCharactersPool .= $lettersPool;
    }

    if (isset($_GET['allowForNumbers'])) {
        $allCharactersPool .= $numbersPool;
    }

    if (isset($_GET['allowForSymbols'])) {
        $allCharactersPool .= $symbolsPool;
    }

    if (empty($allCharactersPool)) {
        $allCharactersPool = $lettersPool . $numbersPool . $symbolsPool;
    }

    if (isset($_GET['passwordLength'])) {
        $passwordLength = intval($_GET['passwordLength']);

        for ($i = 0; $i < $passwordLength; $i++) {
            $randomIndex = rand(0, strlen($allCharactersPool) - 1);
            $generatedPassword .= $allCharactersPool[$randomIndex];
        }

        header('Location: result.php');
    }

    return $generatedPassword;
};
