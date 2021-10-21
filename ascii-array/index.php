<?php

const FIRST_ASCII = ',';
const SECOND_ASCII = '|';


$ascii = createAsciiArrayWithConstParams();
list($first, $second) = firstAndSecondAsciiChar();

for ($i=$first; $i <= $second; $i++) {
    $searchAscii = chr($i);
    if (!in_array($searchAscii, $ascii)) {
        echo 'The missing Ascii character is: ' . $searchAscii;
        break;
    }
}

function createAsciiArrayWithConstParams() {
    list($first, $second) = firstAndSecondAsciiChar();
    $ascii = [];
    
    for($char = $first; $char <= $second; $char++) {
        $ascii[] = chr($char);
    }
    $indexToRemove = array_rand($ascii, 1);
    // echo 'MISSING IS: ' . $ascii[$indexToRemove] . '<br/>';
    unset($ascii[$indexToRemove]);
    shuffle($ascii);
    return $ascii;
}

function firstAndSecondAsciiChar() {
    $firstAscii = ord(FIRST_ASCII);
    $secondAscii = ord(SECOND_ASCII);

    $first = min($firstAscii, $secondAscii);
    $second = max($firstAscii, $secondAscii);

    return [$first, $second];
}
