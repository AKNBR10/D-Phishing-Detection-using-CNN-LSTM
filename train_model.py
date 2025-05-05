import pandas as pd
import numpy as np
import tensorflow as tf
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import Conv1D, LSTM, Dense, Flatten
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import LabelEncoder
import pickle

# Load CSV dataset
df = pd.read_csv("dataset_phishing.csv")  # Ensure this path is correct

# Extract features (Example: Length of URL, Presence of '@', etc.)
def extract_features(url):
    return [
        len(url),
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

# Convert URLs into feature vectors
X = np.array([extract_features(url) for url in df["url"]])  # Ensure "url" column exists
y = np.array(df["status"])  # Ensure "label" column exists

# Encode labels
le = LabelEncoder()
y = le.fit_transform(y)

# Save label encoder
with open("label_encoder.pkl", "wb") as f:
    pickle.dump(le, f)

# Train-Test Split
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Reshape for CNN-LSTM
X_train = np.expand_dims(X_train, axis=2)
X_test = np.expand_dims(X_test, axis=2)

# Build CNN-LSTM Model
model = Sequential([
    Conv1D(filters=64, kernel_size=3, activation='relu', input_shape=(X_train.shape[1], 1)),
    LSTM(50, return_sequences=True),
    Flatten(),
    Dense(64, activation='relu'),
    Dense(1, activation='sigmoid')  # Binary Classification
])

model.compile(optimizer='adam', loss='binary_crossentropy', metrics=['accuracy'])

# Train the Model
model.fit(X_train, y_train, epochs=10, batch_size=32, validation_data=(X_test, y_test))

# Save Model (Ensure it's saved in the correct format)
model.save("phishing_model.h5")
print("✅ Model Saved Successfully!")
