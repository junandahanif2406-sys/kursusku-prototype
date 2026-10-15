<?php

$quota = 30;
$registered = 18;

$isFull = $registered >= $quota;
$hasSeat = $registered < $quota;

echo "Is Full: ";
var_dump($isFull);

echo "Has Seat: ";
var_dump($hasSeat);

?>