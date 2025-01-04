<?php

$strings = ["Hello", "World", "PHP", "Programming"];

// Function to count vowels in a string
function countVowels($string) {
    return preg_match_all('/[aeiouAEIOU]/', $string);
}

// Process the strings
foreach ($strings as $string) {
    $vowelCount = countVowels($string); // Count vowels
    $reversedString = strrev($string); // Reverse string

    // Print the results
    echo "Original String: $string\n"; 
    echo "Vowel Count: $vowelCount\n";
    echo "Reversed String: $reversedString\n";

}
?>
