import pandas as pd
import matplotlib.pyplot as plt
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import accuracy_score
import os

# --- Load dataset (adjust path if needed) ---
csv_path = "Crop_recommendation.csv"   # if you run from project root this is fine
save_path = "accuracy_graph.png"       # will be saved into project folder

data = pd.read_csv(csv_path)

X = data[['N','P','K','temperature','humidity','ph','rainfall']]
y = data['label']

# Train-test split
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Train model
model = RandomForestClassifier(n_estimators=100, random_state=42)
model.fit(X_train, y_train)

# Accuracy
y_pred = model.predict(X_test)
accuracy = accuracy_score(y_test, y_pred)

# Format for printing and annotation
acc_percent = accuracy * 100
acc_text = f"{accuracy:.3f} ({acc_percent:.1f}%)"

# Plot with annotation
plt.figure(figsize=(5,5))
bars = plt.bar(['Accuracy'], [accuracy])
plt.ylim(0,1)
plt.title('Model Accuracy')
plt.ylabel('Accuracy Score')

# put a text label above the bar
bar = bars[0]
height = bar.get_height()
plt.text(
    bar.get_x() + bar.get_width()/2,
    height + 0.02,            # small offset above the bar
    acc_text,
    ha='center',
    va='bottom',
    fontsize=12,
    fontweight='bold'
)

# Save and show
plt.tight_layout()
plt.savefig(save_path, dpi=150)
plt.show()

# Print to terminal so you definitely see it
print("Model Accuracy:", acc_text)
print("Saved plot to:", os.path.abspath(save_path))