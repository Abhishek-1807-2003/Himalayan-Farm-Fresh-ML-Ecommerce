# inventory_api.py
from flask import Flask, request, jsonify
from flask_cors import CORS
import numpy as np
import pandas as pd
from sklearn.linear_model import LinearRegression

app = Flask(__name__)
CORS(app)

@app.route('/')
def home():
    return "✅ Inventory Prediction API Running — Use /predict_inventory"

@app.route('/predict_inventory', methods=['POST'])
def predict_inventory():
    """
    Input example (JSON):
    {
      "sales": [30, 45, 40, 60, 70, 80],
      "current_stock": 50
    }
    """
    data = request.get_json()
    sales = np.array(data["sales"]).reshape(-1, 1)
    time = np.arange(len(sales)).reshape(-1, 1)

    model = LinearRegression()
    model.fit(time, sales)

    # Predict next month's demand
    next_month = np.array([[len(sales) + 1]])
    predicted_sales = model.predict(next_month)[0][0]

    current_stock = data["current_stock"]
    shortage = predicted_sales - current_stock

    if shortage > 0:
        alert = f"⚠️ Expected shortage of {int(shortage)} units next month. Restock soon!"
    else:
        alert = "✅ Stock is sufficient for the predicted demand."

    return jsonify({
        "predicted_sales": round(predicted_sales, 2),
        "current_stock": current_stock,
        "alert": alert
    })

if __name__ == '__main__':
    app.run(debug=True, port=5001)