<?php

$str = 'It was first suggested by Tom Boyd then afterwords by William H
John Smith on Monday. But on Wednesday Simon Nixon did not agree stating
that he and Terry Wallace OBE, Joan C and K. Harris categorically
disagreed with Tom Boyd and William H John Smith. K. Harris is a long term
business partner of Terry Wallace OBE. Tom Boyd and William Smith have no
relations to each other. Sir Wallace can be reached at
t.wallace@olord.com';
preg_match_all("/[A-Z]([a-z]+|\.)(?:\s+[A-Z]([a-z]+|\.)*)\s+([A-Z]([A-Za-z])*)*/",$str,$matches);
$toRemove = array(
    "Wednesday ",
    "Sir "
    );

foreach ($matches[0] as &$match) {
    $match = str_replace($toRemove, '', $match);
    $match = str_replace(PHP_EOL, ' ', $match);
}
print_r($matches[0]);
$matches = array_unique($matches[0]);

$sentences = preg_split('/(?<=[^A-Z][.?!;:])\s+/', $str, -1,
PREG_SPLIT_NO_EMPTY);
//print_r($sentences);

foreach($sentences as &$sentence) {
  foreach ($matches as &$match) {
    $sentence = str_replace($match, '<b>'.$match.'</b>', $sentence);
  }
}
print_r($sentences);


$article = implode(" ", $sentences);
echo $article;
