# train_model.py
import pandas as pd
from sklearn.ensemble import RandomForestClassifier
import pickle

data = {
    'kognitif': [0.80, 0.60, 0.45, 0.75, 0.50],
    'motorik': [0.90, 0.70, 0.50, 0.80, 0.55],
    'bahasa': [0.75, 0.65, 0.40, 0.70, 0.50],
    'sosial_emosional': [0.85, 0.60, 0.50, 0.78, 0.52],
    'label': ['Sesuai Usia', 'Perlu Pendampingan', 'Di Bawah Usia', 'Sesuai Usia', 'Di Bawah Usia']
}

# Konversi ke DataFrame
# df = pd.read_csv('nama_dataset.csv')
df = pd.DataFrame(data)

# Pisahkan fitur dan label
X = df[['kognitif', 'motorik', 'bahasa', 'sosial_emosional']]
y = df['label']

# Buat model Random Forest
model = RandomForestClassifier(n_estimators=100, random_state=42)
model.fit(X, y)

# Simpan model ke file .pkl
with open('model_rf.pkl', 'wb') as f:
    pickle.dump(model, f)

print("Model berhasil dilatih dan disimpan sebagai model_rf.pkl")
