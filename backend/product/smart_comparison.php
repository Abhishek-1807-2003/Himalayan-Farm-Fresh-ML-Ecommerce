<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>🤖 Smart Product Comparison</title>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f7f7f7;
      padding: 40px;
    }
    .container {
      max-width: 800px;
      margin: auto;
      background: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 25px;
    }
    select, button {
      padding: 10px;
      margin: 10px;
      border-radius: 8px;
      font-size: 16px;
    }
    button {
      background: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
    button:hover {
      background: #45a049;
    }
    #result {
      margin-top: 20px;
      padding: 15px;
      background: #e9f7ef;
      border-radius: 10px;
      font-size: 18px;
      white-space: pre-line;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>🤖 Smart Product Comparison</h2>
    <p>Select any two products:</p>

    <select id="product1">
      <option value="1">Organic Wheat</option>
      <option value="2">Hybrid Wheat</option>
      <option value="3">Premium Rice</option>
      <option value="4">Basmati Rice</option>
    </select>

    <select id="product2">
      <option value="1">Organic Wheat</option>
      <option value="2">Hybrid Wheat</option>
      <option value="3">Premium Rice</option>
      <option value="4">Basmati Rice</option>
    </select>

    <button onclick="compareProducts()">Compare</button>

    <div id="result"></div>
  </div>

  <script>
    async function compareProducts() {
      const p1 = document.getElementById('product1').value;
      const p2 = document.getElementById('product2').value;
      try {
        const res = await axios.post('http://127.0.0.1:5000/compare', { p1, p2 });
        document.getElementById('result').innerText = res.data.result;
      } catch (err) {
        document.getElementById('result').innerText = "❌ Error connecting to AI server.";
      }
    }
  </script>
</body>
</html>