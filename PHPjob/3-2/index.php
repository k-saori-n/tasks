<?php

$prices = ["りんご" => 100, "みかん" => 50, "もも" => 500];
$amounts = [3, 3, 6];
$i = 0;

function priceCalculate($price, $amount) {
    return $price * $amount;
}

foreach ($prices as $fluit => $price) {
    $sum = priceCalculate($price, $amounts[$i]);
    echo "${fluit}は${sum}円です。<br>";
    $i++;
}

?>