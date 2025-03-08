<?php
$average = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = isset($_POST['number1']) ? (float)$_POST['number1'] : 0;
    $num2 = isset($_POST['number2']) ? (float)$_POST['number2'] : 0;
    $average = ($num1 + $num2) / 2;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Average Calculator</title>
</head>
<body>
    <form method="post" action="">
        <label for="number1">Number 1:</label>
        <input type="text" id="number1" name="number1" required value="<?php echo isset($_POST['number1']) ? htmlspecialchars($_POST['number1']) : ''; ?>">
        <br>
        <label for="number2">Number 2:</label>
        <input type="text" id="number2" name="number2" required value="<?php echo isset($_POST['number2']) ? htmlspecialchars($_POST['number2']) : ''; ?>">
        <br>
        <label for="average">Average:</label>
        <input type="text" id="average" name="average" readonly value="<?php echo htmlspecialchars($average); ?>">
        <br>
        <button type="submit">Calculate</button>
    </form>
</body>
</html>
