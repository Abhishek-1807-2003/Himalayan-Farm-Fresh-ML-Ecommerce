import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
import pickle

# Apna dataset load karo
data = pd.read_csv("Crop_recommendation.csv")

# Ye 7 features lenge
X = data[['N', 'P', 'K', 'temperature', 'humidity', 'ph', 'rainfall']]
y = data['label']

# Dataset split karna (train aur test me)
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# RandomForest model train karna
model = RandomForestClassifier(n_estimators=100, random_state=42)
model.fit(X_train, y_train)

# Model ko save karna (same folder me)
with open("crop_recommendation_model_fixed.pkl", "wb") as f:
    pickle.dump(model, f)

print("✅ Model retrained and saved successfully as crop_recommendation_model_fixed.pkl")