<?php

function generateRandomPassword()
{
    $allCharacters = '!#$%&()*0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $passwordGenerated = '';

    if (isset($_GET['passwordLength'])) {
        $passwordGenerated = '';
        $length = intval($_GET['passwordLength']);

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = rand(0, strlen($allCharacters) - 1);
            $passwordGenerated .= $allCharacters[$randomIndex];
        }

        header('Location: result.php');

        return $passwordGenerated;
    }
};
