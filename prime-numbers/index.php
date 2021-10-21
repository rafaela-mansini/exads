<?php 

for ($i = 1; $i <= 100; $i++) {
    $divisors = 0;
    $multiples = [];

    for ($j=$i; $j>=1; $j--) {

        if(($i % $j) === 0){
            $divisors++;
            $multiples[] = $j;
        } 
    }

    if($divisors === 2) {
        echo $i . ' [PRIME]<br/>';
    } else {
        $multiples = implode(', ', $multiples);
        // echo $i . '<br/>';
        echo "$i [$multiples]<br/>";
    }

}
