<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>📦 Inventory Prediction & Alerts</title>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f5f7fa;
      padding: 30px;
    }
    .card {
      background: white;
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      max-width: 700px;
      margin: auto;
    }
    input, button {
      padding: 10px;
      margin: 5px;
      border-radius: 8px;
      border: 1px solid #ccc;
    }
    button {
      background: #4CAF50;
      color: white;
      cursor: pointer;
    }
    button:hover { background: #43a047; }
    #result {
      margin-top: 20px;
      padding: 15px;
      border-radius: 10px;
      font-size: 16px;
      background: #e8f5e9;
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>📦 Inventory Prediction Tool</h2>
    <p>Enter recent monthly sales (comma separated) and current stock:</p>

    <input type="text" id="sales" placeholder="e.g., 30, 45, 50, 70, 90" size="40">
    <input type="number" id="stock" placeholder="Current stock">
    <button onclick="predict()">Predict & Check Alert</button>

    <div id="result"></div>
  </div>

  <script>
    async function predict() {
      const sales = document.getElementById('sales').value.split(',').map(Number);
      const stock = Number(document.getElementById('stock').value);
      const resultBox = document.getElementById('result');
      try {
        const res = await axios.post('http://127.0.0.1:5001/predict_inventory', {
          sales: sales,
          current_stock: stock
        });
        const data = res.data;
        resultBox.innerHTML = `
          <b>Predicted Sales (next month):</b> ${data.predicted_sales}<br>
          <b>Current Stock:</b> ${data.current_stock}<br>
          <b>Alert:</b> ${data.alert}
        `;
      } catch (e) {
        resultBox.innerText = "❌ Server connection error.";
      }
    }
  </script>
</body>
</html>