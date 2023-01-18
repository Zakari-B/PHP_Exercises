<?php

/*** TREES ***/
// 🌳 Deciduous
// 🌲 Evergreen
// 🌴 Palm
// 🌱 Seed
// ☘️ Shamrock
// 🌿 Herb
// 🍀 Four Leaf Clover
/*************/

function plantFirstGarden(int $rows = 10, int $columns = 10): array
{
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $columns; $j++) {
            $garden[$i][$j] = '🌱';
        }
    }

    return $garden;
}

function plantSecondGarden(int $rows = 10, int $columns = 10): array
{

    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $columns; $j++) {
            if ($i == 0 || $j == 0 || $j == $rows - 1 || $i == $columns - 1) {
                $garden[$i][$j] = '🌳';
            } else {
                $garden[$i][$j] = '🌱';
            }
        }
    }

    return $garden;
}

function plantThirdGarden(int $rows = 10, int $columns = 10): array
{
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $columns; $j++) {
            if ($i == 0 || $j == 0 || $j == $rows - 1 || $i == $columns - 1) {
                $garden[$i][$j] = '🌳';
            } elseif ($i == $j || $i == $columns - $j - 1) {
                $garden[$i][$j] = '🍀';
            } else {
                $garden[$i][$j] = '🌱';
            }
        }
    }

    return $garden;
}

function plantFourthGarden(int $rows = 10, int $columns = 10): array
{


    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $columns; $j++) {
            if ($i == 0 || $j == 0 || $j == $rows - 1 || $i == $columns - 1) {
                $garden[$i][$j] = '🌳';
            } else {
                $garden[$i][$j] = '🌱';
            }
        }
    }
    for ($i = 3; $i < $rows - 3; $i++) {
        for ($j = 3; $j < $columns - 3; $j++) {
            $garden[$i][$j] = '🌴';
        }
    }
    for ($i = 1; $i < $rows - 1; $i++) {
        $garden[$i][$i] = '🍀';
        $garden[$rows - $i - 1][$i] = '🍀';
    }

    return $garden;
}

function plantFifthGarden(int $rows = 10, int $columns = 10): array
{
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $columns; $j++) {
            $garden[$i][$j] = '🌳';
        }
    }

    for ($i = 1; $i < ($rows - 1); $i++) {
        for ($j = 1; $j < ($columns - 1); $j++) {
            if ($i % 2 === 0) {
                if($j%2 == 0) {
                    $garden[$i][$j] = '🌿';
                } else {
                    $garden[$i][$j] = '🌲';
                }
            } else {
                if($j%2 == 0) {
                    $garden[$i][$j] = '🌲';
                } else {
                    $garden[$i][$j] = '🌿';
                }            }
        }
    }


    for ($i = 3; $i < $rows - 3; $i++) {
        for ($j = 3; $j < $columns - 3; $j++) {
            $garden[$i][$j] = '🌴';
        }
    }

    for ($i = 1; $i < $rows - 1; $i++) {
        $garden[$i][$i] = '🍀';
        $garden[$rows - $i - 1][$i] = '🍀';
    }

    return $garden;
}



function plantSixthGarden(int $rows = 10, int $columns = 10): array
{
    $garden[5][2]= '🍀';
    $garden[8][6]= '🌴';
    return $garden;
}

/**********************/
// DO NOT TOUCH THIS //
/*********************/

$gardens[1] = plantFirstGarden();
$gardens[2] = plantSecondGarden();
$gardens[3] = plantThirdGarden();
$gardens[4] = plantFourthGarden();
$gardens[5] = plantFifthGarden();
$gardens[6] = plantSixthGarden();
