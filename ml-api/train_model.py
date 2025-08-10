import pandas as pd
from sklearn.ensemble import RandomForestClassifier
import pickle

data = {
    'kognitif': [0.95, 0.75, 0.50, 0.85, 0.60],
    'motorik': [0.96, 0.78, 0.45, 0.88, 0.55],
    'bahasa': [0.94, 0.77, 0.48, 0.80, 0.52],
    'sosial_emosional': [0.95, 0.79, 0.42, 0.82, 0.50],
    'label': [
        'Sangat Baik',        # capaian tertinggi, indikator ✔ banyak
        'Sesuai Usia',        # capaian cukup baik, ada variasi
        'Perlu Pendampingan', # capaian rendah, banyak kosong
        'Sesuai Usia',
        'Perlu Pendampingan'
    ]
}

df = pd.DataFrame(data)

X = df[['kognitif', 'motorik', 'bahasa', 'sosial_emosional']]
y = df['label']

model = RandomForestClassifier(n_estimators=100, random_state=42)
model.fit(X, y)

with open('model_rf.pkl', 'wb') as f:
    pickle.dump(model, f)

print("Model berhasil dilatih dan disimpan sebagai model_rf.pkl")
