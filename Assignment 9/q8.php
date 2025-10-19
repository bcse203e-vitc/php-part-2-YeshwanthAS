<?php
$inputFile = "q8.txt";
$outputFile = "numbers.txt";

if (file_exists($inputFile)) {
    $content = file_get_contents($inputFile);

    preg_match_all("/\b\d{10}\b/", $content, $matches);

    $mobileNumbers = array_unique($matches[0]);

    file_put_contents($outputFile, implode("\n", $mobileNumbers));

    echo "<h2>Extracted Mobile Numbers</h2>";
    echo "<ul>";
    foreach ($mobileNumbers as $number) {
        echo "<li>$number</li>";
    }
    echo "</ul>";
} else {
    echo "Input file '$inputFile' not found.";
}
?>

