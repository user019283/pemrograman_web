<?php

function generator($n){
    for ($i = 1; $i <= $n; $i++) {
        $output = '';

        if ($i % 3 == 0) {
            $output .= 'Hello';
        }

        if ($i % 5 == 0) {
            $output .= 'World';
        }

        else {
            $output = $i;
        }

        echo $output . "\n";
    }
}

generator(20);