<?php
date_default_timezone_set("Asia/Kolkata");

$inputFile = "q10.txt";
$errorFile = "errors.log";
$validStudents = [];
$invalidEntries = [];

$emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

if (file_exists($inputFile)) {
    $lines = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        $parts = explode(",", $line);

        if (count($parts) !== 3) {
            $invalidEntries[] = $line . " – Missing fields";
            continue;
        }

        list($name, $email, $dob) = array_map('trim', $parts);

        if (!preg_match($emailPattern, $email)) {
            $invalidEntries[] = $line . " – Invalid email format";
            continue;
        }

        $dobDate = date_create($dob);
        if (!$dobDate) {
            $invalidEntries[] = $line . " – Invalid date format";
            continue;
        }

        $age = date_diff($dobDate, date_create())->y;
        $validStudents[] = ["name" => $name, "email" => $email, "age" => $age];
    }

    if (!empty($invalidEntries)) {
        file_put_contents($errorFile, implode("\n", $invalidEntries));
    }

    echo "<h2>Valid Student Records</h2>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>Name</th><th>Email</th><th>Age</th></tr>";

    foreach ($validStudents as $student) {
        echo "<tr><td>{$student['name']}</td><td>{$student['email']}</td><td>{$student['age']}</td></tr>";
    }

    echo "</table>";
} else {
    echo " File '$inputFile' not found.";
}
?>

