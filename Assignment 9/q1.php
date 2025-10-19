<?php

$students = [
    "Rahul" => 85,
    "Priya" => 92,
    "Arun" => 78,
    "Sneha" => 88,
    "Karan" => 95,
    "Meena" => 81
];


arsort($students);

echo "<h2>Top 3 Students</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Name</th><th>Marks</th></tr>";

$counter = 0;
foreach ($students as $name => $marks) {
    if ($counter < 3) {
        echo "<tr><td>$name</td><td>$marks</td></tr>";
        $counter++;
    } else {
        break;
    }
}

echo "</table>";
?>

