<?php
function myFunction() {
    $args = func_get_args();
    $nonNullCount = 0;

    // Loop untuk mengecek apakah argumen tidak null
    foreach ($args as $arg) {
        if ($arg !== null) {
            $nonNullCount++;
        }
    }

    echo "Jumlah argumen yang tidak null: " . $nonNullCount . "<br>";
}

myFunction(1, null, 'Hello', null, 5); // Output: Jumlah argumen yang tidak null: 3 
?>