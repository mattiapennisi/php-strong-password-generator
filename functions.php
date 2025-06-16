<?php

$allCharacters = '!#$%&()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

$passwordGenerated = '';

if (isset($_GET['passwordLength'])) {

    for ($i = 0; $i < $_GET['passwordLength']; $i++) {

        $randomIndex = rand(0, strlen($allCharacters) - 1);
        $passwordGenerated .= $allCharacters[$randomIndex];
    }
}

?>