<?php

$str = 'It was first suggested by Tom Boyd then afterwords by William H
John Smith on Monday. But on Wednesday Simon Nixon did not agree stating
that he and Terry Wallace, Joan C and K. Harris categorically disagreed
with Tom Boyd and William H John Smith.';

// William H John Smith, Joan C or K. Harris
/*
Array
(
    [0] => Array
        (
            [1] => Tom Boyd
            [2] => William
            [3] => John Smith
            [6] => Wednesday Simon Nixon
            [7] => Terry Wallace
            [8] => Joan
            [9] => Harris
            [10] => Tom Boyd
            [11] => William
            [12] => John Smith
        )

)

   [0] => Array
        (
            [0] => Tom Boyd
            [1] => John Smith on Monday
            [2] => But on Wednesday
            [3] => Simon Nixon
            [4] => Terry Wallace
            [5] => K. Harris
            [6] => Tom Boyd and William
            [7] => John Smith
        )


           [0] => Tom Boyd
            [1] => William H
John Smith
            [2] => Wednesday Simon Nixon
            [3] => Terry Wallace
            [4] => K. Harris
            [5] => Tom Boyd
            [6] => William H John Smith

  [0] => Array
        (
            [0] => Tom Boyd
            [1] => William H
John Smith
            [2] => Wednesday Simon Nixon
            [3] => Terry Wallace
            [4] => Joan C
            [5] => K. Harris
            [6] => Tom Boyd
            [7] => William H John Smith.


*/


preg_match_all("/[A-Z]([a-z]+|\.)(?:\s+[A-Z]([a-z]+|\.)*)*\s+[A-Z]([a-z]+|\.)*/",$str,$matches);

$toRemove = array("Wednesday ");

foreach ($matches[0] as &$match) {
    $match = str_replace($toRemove, '', $match);
    $match = str_replace(PHP_EOL, ' ', $match);
}

print_r($matches[0]);
