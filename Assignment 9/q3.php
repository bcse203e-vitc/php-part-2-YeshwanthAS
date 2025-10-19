<?php
$emails = [
    "suraj@gmail.com",
    "virat-email@",
    "singh@site",
    "kumar123@gmail.com",
    "admin@domain.co.in",
    "lab.world@web.org",
    "invalid@.com",
    "noatsymbol.com"
];

$pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

echo "<h2>Valid Email Addresses</h2>";
echo "<ul>";

foreach ($emails as $email) {
    if (preg_match($pattern, $email)) {
        echo "<li>$email</li>";
    }
}

echo "</ul>";
?>

