from flask import Flask, request, jsonify
import joblib
import traceback

app = Flask(__name__)

# ===== Model Load =====
# Agar aapke model ka naam "model.pkl" hai to same use karo
try:
    model = joblib.load("model.pkl")
    print("✅ Model loaded successfully")
except Exception as e:
    print("❌ Error loading model:", e)
    model = None

# ===== Prediction Route =====
@app.route("/predict", methods=["POST"])
def predict():
    try:
        data = request.json

        soil_ph = float(data.get("soil_ph", 0))
        rainfall_mm = float(data.get("rainfall_mm", 0))
        temperature_c = float(data.get("temperature_c", 0))
        humidity_percent = float(data.get("humidity_percent", 0))

        features = [[soil_ph, rainfall_mm, temperature_c, humidity_percent]]

        if model:
            result = model.predict(features)[0]
            # Agar confidence/probability available hai
            if hasattr(model, "predict_proba"):
                proba = model.predict_proba(features)[0]
                confidence = float(max(proba))
            else:
                confidence = 0.85
        else:
            # Agar model load nahi hua to fallback
            result = "Wheat" if soil_ph > 6.5 else "Rice"
            confidence = 0.70

        return jsonify({
            "crop": str(result),
            "confidence": confidence
        })

    except Exception as e:
        return jsonify({
            "error": str(e),
            "trace": traceback.format_exc()
        })

# ===== Health Check Route =====
@app.route("/health", methods=["GET"])
def health():
    return jsonify({"status": "ok"})

# ===== Run Server =====
if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000, debug=True)