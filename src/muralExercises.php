<?php

/////
///// You can display help at any time on the tablet by returning the input string unmodified in the function.
/////
///// For example :
/////
///// function mural1(string $muralText) : string
///// {
///// *your own code, commented*
/////
///// return $decodedMural;
///// }
/////

function mural1(string $muralText): string
{

    // WRITE YOUR CODE BELOW

    $decodedMural = $muralText;

    /////

    return $decodedMural;
}

function mural2(string $muralText): string
{

    // WRITE YOUR CODE BELOW

    $decodedMural = $muralText;

    /////

    return $decodedMural;
}

function mural3(string $muralText): string
{

    // WRITE YOUR CODE BELOW

    $decodedMural = $muralText;

    /////

    return $decodedMural;
}


////////////////////////////////
/// DO NOT MODIFY BELOW THIS LINE
////////////////////////////////

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['stage'])) {
    $muralQuery = 'mural' . $_POST['stage'];
    if (function_exists($muralQuery)) {
        $muralUpdate = $muralQuery($_POST['muralText']);
        echo '{"tabletUpdate": "' . $muralUpdate . '"}';
    }
}
