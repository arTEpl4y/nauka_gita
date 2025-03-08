<?php
$weighted_average = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numbers = [
        isset($_POST['number1']) ? (float)$_POST['number1'] : 0,
        isset($_POST['number2']) ? (float)$_POST['number2'] : 0,
        isset($_POST['number3']) ? (float)$_POST['number3'] : 0,
        isset($_POST['number4']) ? (float)$_POST['number4'] : 0,
        isset($_POST['number5']) ? (float)$_POST['number5'] : 0
    ];
    
    $weights = [
        isset($_POST['weight1']) ? (float)$_POST['weight1'] : 1,
        isset($_POST['weight2']) ? (float)$_POST['weight2'] : 1,
        isset($_POST['weight3']) ? (float)$_POST['weight3'] : 1,
        isset($_POST['weight4']) ? (float)$_POST['weight4'] : 1,
        isset($_POST['weight5']) ? (float)$_POST['weight5'] : 1
    ];
    
    $weighted_sum = 0;
    $weight_total = 0;
    
    for ($i = 0; $i < 5; $i++) {
        $weighted_sum += $numbers[$i] * $weights[$i];
        $weight_total += $weights[$i];
    }
    
    $weighted_average = $weight_total > 0 ? $weighted_sum / $weight_total : 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weighted Average Calculator</title>
</head>
<body>
    <form method="post" action="">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <label for="number<?= $i ?>">Number <?= $i ?>:</label>
            <input type="text" id="number<?= $i ?>" name="number<?= $i ?>" required value="<?php echo isset($_POST['number'.$i]) ? htmlspecialchars($_POST['number'.$i]) : ''; ?>">
            
            <label for="weight<?= $i ?>">Weight <?= $i ?>:</label>
            <input type="text" id="weight<?= $i ?>" name="weight<?= $i ?>" required value="<?php echo isset($_POST['weight'.$i]) ? htmlspecialchars($_POST['weight'.$i]) : '1'; ?>">
            <br>
        <?php endfor; ?>
        
        <label for="weighted_average">Weighted Average:</label>
        <input type="text" id="weighted_average" name="weighted_average" readonly value="<?php echo htmlspecialchars($weighted_average); ?>">
        <br>
        <button type="submit">Calculate</button>
    </form>
</body>
</html>
