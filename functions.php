<?php

/**
 * Generates a random password based on user preferences
 * 
 * @param int $passwordLength - The desired length of the password
 * @param bool $allowForLetters - Whether to include letters in the password
 * @param bool $allowForNumbers - Whether to include numbers in the password
 * @param bool $allowForSymbols - Whether to include symbols in the password
 * @param bool $dontAllowForRepetitions - Whether to prevent character repetition
 * @return string - The generated password
 */
function generateRandomPassword($passwordLength = 10, $allowForLetters = false, $allowForNumbers = false, $allowForSymbols = false, $dontAllowForRepetitions = false)
{
    // Define character pools for different character types
    $lettersPool = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $numbersPool = '0123456789';
    $symbolsPool = '!@#$%^&*_-';
    $allCharactersPool = '';
    $generatedPassword = '';

    // Build the character pool based on user preferences
    if ($allowForLetters) {
        $allCharactersPool .= $lettersPool;
    }

    if ($allowForNumbers) {
        $allCharactersPool .= $numbersPool;
    }

    if ($allowForSymbols) {
        $allCharactersPool .= $symbolsPool;
    }

    // Default: use all character types if none selected
    if (empty($allCharactersPool)) {
        $allCharactersPool = $lettersPool . $numbersPool . $symbolsPool;
    }

    // Standard password generation (allows character repetition)
    if (!$dontAllowForRepetitions) {
        // Simply add random characters from the pool
        for ($i = 0; $i < $passwordLength; $i++) {
            $randomIndex = rand(0, strlen($allCharactersPool) - 1);
            $generatedPassword .= $allCharactersPool[$randomIndex];
        }
    } else {
        // No-repetition algorithm
        $attempts = 0;
        $maxAttempts = 100; // Prevents infinite loops

        // Keep adding characters until we reach desired length or max attempts
        while (strlen($generatedPassword) < $passwordLength && $attempts < $maxAttempts) {
            // Get a random character from the pool
            $randomIndex = rand(0, strlen($allCharactersPool) - 1);

            // Only add the character if it's not already in the password
            if (!str_contains($generatedPassword, $allCharactersPool[$randomIndex])) {
                $generatedPassword .= $allCharactersPool[$randomIndex];
            }

            // Count this attempt regardless of success
            $attempts++;
        }
    }

    // Return the final password
    return $generatedPassword;
}
