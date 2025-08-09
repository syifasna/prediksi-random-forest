from flask import Flask, request, jsonify
import joblib
import numpy as np

app = Flask(__name__)

# Load model Random Forest yang sudah dilatih
model = joblib.load('model_rf.pkl')

@app.route('/predict', methods=['POST'])
def predict():
    try:
        data = request.get_json()

        # Ambil nilai dari request
        kognitif = float(data.get('kognitif', 0))
        motorik = float(data.get('motorik', 0))
        bahasa = float(data.get('bahasa', 0))
        sosial_emosional = float(data.get('sosial_emosional', 0))

        # Bentuk array untuk prediksi
        features = np.array([[kognitif, motorik, bahasa, sosial_emosional]])

        # Lakukan prediksi
        prediksi_label = model.predict(features)[0]

        # Kirim balik response JSON
        return jsonify({
            "prediksi": str(prediksi_label),
            "status": "success"
        })

    except Exception as e:
        return jsonify({
            "prediksi": None,
            "status": "error",
            "message": str(e)
        })

if __name__ == '__main__':
    app.run(debug=True, port=5000)
