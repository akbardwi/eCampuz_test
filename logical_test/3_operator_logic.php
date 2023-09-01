<?php
function pembagian($angka, $pembagi) {
    if ($pembagi === 0) {
        throw new InvalidArgumentException("Cannot divide by zero");
    }

    $quotient = 0;
    while ($angka >= $pembagi) {
        $angka -= $pembagi;
        $quotient++;
    }

    return $quotient;
}

// Contoh penggunaan
$angka = 25;
$pembagi = 5;
$result = pembagian($angka, $pembagi);
echo "$angka : $pembagi menghasilkan output $result";