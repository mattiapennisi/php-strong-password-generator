<?php

function generateRandomPassword($passwordLength = 10, $allowForLetters = false, $allowForNumbers = false, $allowForSymbols = false)
{
    $lettersPool = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $numbersPool = '0123456789';
    $symbolsPool = '!#$%&()*';
    $allCharactersPool = '';
    $generatedPassword = '';

    if ($allowForLetters) {
        $allCharactersPool .= $lettersPool;
    }

    if ($allowForNumbers) {
        $allCharactersPool .= $numbersPool;
    }

    if ($allowForSymbols) {
        $allCharactersPool .= $symbolsPool;
    }

    if (empty($allCharactersPool)) {
        $allCharactersPool = $lettersPool . $numbersPool . $symbolsPool;
    }

    for ($i = 0; $i < $passwordLength; $i++) {
        $randomIndex = rand(0, strlen($allCharactersPool) - 1);
        $generatedPassword .= $allCharactersPool[$randomIndex];
    }

    return $generatedPassword;
}
