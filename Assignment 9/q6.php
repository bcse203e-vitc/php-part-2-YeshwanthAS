<?php
date_default_timezone_set("Asia/Kolkata");

function daysUntilNextBirthday($dob) {
    $today = new DateTime();
    $birthDate = DateTime::createFromFormat('Y-m-d', $dob);

    if (!$birthDate) {
        return "Invalid date format. Please use YYYY-MM-DD.";
    }

    $currentYear = $today->format('Y');
    $nextBirthday = DateTime::createFromFormat('Y-m-d', $currentYear . '-' . $birthDate->format('m-d'));

    if ($nextBirthday < $today) {
        $nextBirthday->modify('+1 year');
    }

    $interval = $today->diff($nextBirthday);
    return $interval->days;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Birthday Countdown</title>
</head>
<body>
    <h2> Current Date and Time</h2>
    <p><?php echo date("d-m-Y H:i:s"); ?></p>

    <h2>Find Days Until Your Next Birthday</h2>
    <form method="post">
        <label for="dob">Enter your Date of Birth (YYYY-MM-DD):</label><br>
        <input type="date" name="dob" required><br><br>
        <button type="submit">Calculate</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $dob = $_POST["dob"];
        $days = daysUntilNextBirthday($dob);

        if (is_numeric($days)) {
            echo "<p>Your next birthday is in <strong>$days</strong> day(s)!</p>";
        } else {
            echo "<p style='color:red;'>❌ $days</p>";
        }
    }
    ?>
</body>
</html>

