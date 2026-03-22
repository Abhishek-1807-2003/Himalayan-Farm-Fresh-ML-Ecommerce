<?php
// When form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        "N" => $_POST["N"],
        "P" => $_POST["P"],
        "K" => $_POST["K"],
        "temperature" => $_POST["temperature"],
        "humidity" => $_POST["humidity"],
        "ph" => $_POST["ph"],
        "rainfall" => $_POST["rainfall"]
    ];

    $json_data = json_encode($data);

    // Connect to Flask API
    $ch = curl_init("http://localhost:5000/predict");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crop Prediction</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; background: #f9f9f9; }
        form { background: #fff; padding: 25px; border-radius: 10px; width: 350px; box-shadow: 0 0 10px #ccc; }
        input { width: 100%; padding: 8px; margin-bottom: 10px; }
        button { background: green; color: white; border: none; padding: 10px; width: 100%; border-radius: 5px; }
        h3 { color: darkgreen; margin-top: 20px; }
    </style>
</head>
<body>

<h2>🌾 Crop Recommendation Tool</h2>

<form method="POST">
    <input type="number" name="N" placeholder="Nitrogen (N)" required>
    <input type="number" name="P" placeholder="Phosphorus (P)" required>
    <input type="number" name="K" placeholder="Potassium (K)" required>
    <input type="number" name="temperature" placeholder="Temperature (°C)" required>
    <input type="number" name="humidity" placeholder="Humidity (%)" required>
    <input type="number" name="ph" placeholder="Soil pH" step="0.1" required>
    <input type="number" name="rainfall" placeholder="Rainfall (mm)" required>
    <button type="submit">Predict Crop</button>
</form>

<?php if (!empty($result)) { ?>
    <?php if (isset($result['prediction'])) { ?>
        <h3>Recommended Crop: 🌱 <b><?php echo htmlspecialchars($result['prediction']); ?></b></h3>
    <?php } elseif (isset($result['error'])) { ?>
        <h3 style="color:red;">Error: <?php echo htmlspecialchars($result['error']); ?></h3>
    <?php } ?>
<?php } ?>

</body>
</html>