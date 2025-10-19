<?php
class EmptyArrayException extends Exception {}

function calculateAverage($numbers) {
    if (empty($numbers)) {
        throw new EmptyArrayException("No numbers provided");
    }

    $sum = array_sum($numbers);
    $count = count($numbers);
    return $sum / $count;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Average Calculator</title>
</head>
<body>
    <h2> Enter Numbers to Calculate Average</h2>
    <form method="post">
        <label for="numbers">Enter numbers separated by commas:</label><br>
        <input type="text" name="numbers" placeholder="e.g., 10,20,30,40,50" required><br><br>
        <button type="submit">Calculate</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $input = $_POST["numbers"];
        $numberStrings = array_map('trim', explode(",", $input));
        $numbers = array_filter($numberStrings, fn($n) => is_numeric($n));
        $numbers = array_map('floatval', $numbers);

        try {
            $average = calculateAverage($numbers);
            echo "<p>The average is: <strong>" . number_format($average, 2) . "</strong></p>";
        } catch (EmptyArrayException $e) {
            echo "<p style='color:red;'> Error: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }
    ?>
</body>
</html>

