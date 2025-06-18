<?php

function generateRandomPassword($passwordLength = 10, $allowForLetters = false, $allowForNumbers = false, $allowForSymbols = false, $dontAllowForRepetitions = false)
{
    $lettersPool = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $numbersPool = '0123456789';
    $symbolsPool = '!@#$%^&*';
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

    if (!$dontAllowForRepetitions) {
        for ($i = 0; $i < $passwordLength; $i++) {
            $randomIndex = rand(0, strlen($allCharactersPool) - 1);
            $generatedPassword .= $allCharactersPool[$randomIndex];
        }
    } else if ($dontAllowForRepetitions) {
        for ($i = 0; $i < $passwordLength; $i++) {
            $randomIndex = rand(0, strlen($allCharactersPool) - 1);

            if (!str_contains($generatedPassword, $allCharactersPool[$randomIndex])) {
                $generatedPassword .= $allCharactersPool[$randomIndex];
            }
        }
    }

    return $generatedPassword;
}
