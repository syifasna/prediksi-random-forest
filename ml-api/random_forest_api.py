from flask import Flask, request, jsonify
import pickle
import numpy as np
import os

app = Flask(__name__)

# Load model
model_path = os.path.join(os.path.dirname(__file__), 'model_rf.pkl')
model = pickle.load(open(model_path, 'rb'))

@app.route('/predict', methods=['POST'])
def predict():
    data = request.get_json()
    features = [
        data['kognitif'],
        data['motorik'],
        data['bahasa'],
        data['sosial_emosional']
    ]
    prediction = model.predict([features])[0]
    return jsonify({'result': prediction})

if __name__ == '__main__':
    app.run(debug=True)
