from flask import Flask, request, jsonify, render_template
import numpy as np
import tensorflow as tf
from tensorflow.keras.models import load_model
import pickle
import matplotlib.pyplot as plt
import io
import base64

app = Flask(__name__)

# Load trained model
try:
    model = load_model("phishing_model.h5")
    print("✅ Model Loaded Successfully!")
except Exception as e:
    print(f"❌ Error loading model: {e}")

# Load label encoder
try:
    with open("label_encoder.pkl", "rb") as f:
        le = pickle.load(f)
    print("✅ Label Encoder Loaded Successfully!")
except Exception as e:
    print(f"❌ Error loading label encoder: {e}")


# Feature Extraction Function
def extract_features(url):
    return [
        len(url),  # URL Length
        url.count('.'),
        url.count('-'),
        url.count('@'),
        url.count('?'),
        url.count('='),
        url.count('/'),
        url.count('https'),
        url.count('http'),
        url.count('www')
    ]


@app.route("/", methods=["GET"])
def home():
    return render_template("index.html")


@app.route("/predict", methods=["POST"])
def predict():
    url = request.form.get("url")

    if not url:
        return render_template("index.html", error="No URL provided")

    try:
        # Extract features
        features = np.array([extract_features(url)])
        features = np.expand_dims(features, axis=2)

        # Predict
        prediction = model.predict(features)
        probability = float(prediction[0][0])
        result = "Phishing" if probability > 0.5 else "Legitimate"

        # Generate Pie Chart
        img = io.BytesIO()
        categories = ["Legitimate", "Phishing"]
        probabilities = [1 - probability, probability]

        # Create a pie chart
        plt.figure(figsize=(5, 4))
        plt.pie(probabilities, labels=categories, autopct='%1.1f%%', colors=["green", "red"], startangle=90,
                wedgeprops={'edgecolor': 'black'})
        plt.title(f"Phishing Probability: {probability:.2f}")
        plt.axis('equal')  # Equal aspect ratio ensures that pie is drawn as a circle.
        plt.savefig(img, format='png')
        img.seek(0)
        plot_url = base64.b64encode(img.getvalue()).decode()

        return render_template("result.html", url=url, result=result, plot_url=plot_url)
    except Exception as e:
        return render_template("index.html", error=str(e))


if __name__ == "__main__":
    app.run(debug=True, port=5001)
