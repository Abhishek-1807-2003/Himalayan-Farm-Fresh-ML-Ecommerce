from flask import Flask, request, jsonify
from flask_cors import CORS
import pickle
import numpy as np

app = Flask(__name__)
CORS(app)

# ✅ Load the correct model file
# Make sure this file is in the same folder as app.py
with open("crop_recommendation_model_fixed.pkl", "rb") as f:
    model = pickle.load(f)

@app.route('/')
def home():
    return "🌾 Crop Recommendation API is running successfully!"

@app.route('/predict', methods=['POST'])
def predict():
    try:
        # ✅ Read JSON data from frontend
        data = request.get_json(force=True)

        # ✅ Extract all 7 features safely
        N = float(data.get('N', 0))
        P = float(data.get('P', 0))
        K = float(data.get('K', 0))
        temperature = float(data.get('temperature', 0))
        humidity = float(data.get('humidity', 0))
        ph = float(data.get('ph', 0))
        rainfall = float(data.get('rainfall', 0))

        # ✅ Combine all features into one array (7 features)
        features = np.array([[N, P, K, temperature, humidity, ph, rainfall]])

        # ✅ Make prediction
        prediction = model.predict(features)[0]

        return jsonify({'prediction': str(prediction)})
    
    except Exception as e:
        return jsonify({'error': str(e)})

if __name__ == '__main__':
    # Run Flask app
    app.run(host='0.0.0.0', port=5000, debug=True)