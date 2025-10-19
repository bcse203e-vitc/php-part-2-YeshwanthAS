<?php
$filename = "access.log";
$username = "admin";
$action = "Logged In";
$timestamp = date("Y-m-d H:i:s");

$entry = "$username - $timestamp - $action\n";
file_put_contents($filename, $entry, FILE_APPEND);

if (file_exists($filename)) {
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $lastFive = array_slice($lines, -5);

    echo "<h2>Last 5 Log Entries</h2>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>Username</th><th>Timestamp</th><th>Action</th></tr>";

    foreach ($lastFive as $line) {
        $parts = explode(" - ", $line);
        if (count($parts) === 3) {
            echo "<tr><td>" . htmlspecialchars($parts[0]) . "</td><td>" . htmlspecialchars($parts[1]) . "</td><td>" . htmlspecialchars($parts[2]) . "</td></tr>";
        }
    }

    echo "</table>";
} else {
    echo "Log file not found.";
}
?>

