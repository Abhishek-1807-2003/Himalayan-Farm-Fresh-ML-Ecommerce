# compare_api.py
from flask import Flask, request, jsonify
from difflib import SequenceMatcher
from flask_cors import CORS   # allows PHP frontend to call this API

app = Flask(__name__)
CORS(app)

# Example product data (you can replace this with DB data later)
products = {
    "1": {"name": "Organic Wheat", "price": 120, "description": "High-quality wheat rich in fiber"},
    "2": {"name": "Hybrid Wheat", "price": 110, "description": "Affordable hybrid wheat with good yield"},
    "3": {"name": "Premium Rice", "price": 150, "description": "Long-grain rice, high aroma"},
    "4": {"name": "Basmati Rice", "price": 140, "description": "Basmati rice with premium aroma and texture"}
}

@app.route('/')
def home():
    return "✅ Flask AI Comparison API is running. Use POST /compare"

@app.route('/compare', methods=['POST'])
def compare_products():
    data = request.get_json()
    p1 = products.get(data.get('p1'))
    p2 = products.get(data.get('p2'))

    if not p1 or not p2:
        return jsonify({"result": "Invalid product IDs"}), 400

    # Simple “AI” style logic
    price_diff = p1['price'] - p2['price']
    desc_similarity = SequenceMatcher(None, p1['description'], p2['description']).ratio()

    if price_diff < 0:
        better = p1['name']
    elif price_diff > 0:
        better = p2['name']
    else:
        better = "Both are equally priced"

    result = (
        f"🤖 {better} offers better value for money.\n"
        f"💬 Description similarity: {round(desc_similarity*100, 2)}%."
    )
    return jsonify({"result": result})

if __name__ == '__main__':
    app.run(debug=True, port=5000)