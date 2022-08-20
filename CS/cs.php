<?php

function countingSort(&$Array, $n)
{
    $max = 0;

    //find largest element in the Array
    for ($i=0; $i<$n; $i++) {
        if($max < $Array[$i]) {
            $max = $Array[$i];
        }
    }

    //Create a freq array to store number of occurrences of
    //each unique elements in the given array
    for ($i=0; $i<$max+1; $i++) {
        $freq[$i] = 0;
    }

    for ($i=0; $i<$n; $i++) {
        $freq[$Array[$i]]++;
    }

    //sort the given array using freq array
    for ($i=0, $j=0; $i<=$max; $i++) {
        while($freq[$i]>0) {
            $Array[$j] = $i;
            $j++;
            $freq[$i]--;
        }
    }
}

for ($i = 0; $i <= 10000000; $i = $i + 10000) {
    $arr = [];

    for ($n = 0; $n <= $i; $n++) {
        $arr[] = rand(1, 99999);
    }

    $start = microtime(true);

    countingSort($arr, sizeof($arr));

    echo $i . '; ' . (microtime(true) - $start) . PHP_EOL;
}