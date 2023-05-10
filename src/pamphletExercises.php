<?php

/////
///// Type your code in the function with the same number as the page you're working on.
///// For example, pamphlet1 is the function for "Ruins guide (1)".
/////

function pamphlet1(string $pamphletText): string
{
    ////
    //// WRITE YOUR  CODE HERE :



    ////
    //// DO NOT TOUCH THE CODE BELOW
    ////
    return $pamphletText;
}

function pamphlet2(string $pamphletText): string
{
    ////
    //// WRITE YOUR  CODE HERE :



    ////
    //// DO NOT TOUCH THE CODE BELOW
    ////
    return $pamphletText;
}

function pamphlet3(string $pamphletText): string
{
    ////
    //// WRITE YOUR  CODE HERE :



    ////
    //// DO NOT TOUCH THE CODE BELOW
    ////
    return $pamphletText;
}





////////////////////////////////
/// DO NOT MODIFY BELOW THIS LINE
////////////////////////////////

function lineSplitter(string $input): array
{
    $lines = explode("\n", $input);
    foreach ($lines as $key => $line) {
        $lines[$key] = trim($line);
    }
    return $lines;
}

function lineFuser(array $input): string
{
    $outputString = implode("\n", $input);
    return $outputString;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['stage'])) {
    $pamphletQuery = 'pamphlet' . $_POST['stage'];
    if (function_exists($pamphletQuery)) {
        $pamphletUpdate = $pamphletQuery($_POST['pamphletText']);
        echo trim($pamphletUpdate);
    }
}
