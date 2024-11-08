from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
import pymysql

# 初始化 Flask 應用
app = Flask(__name__)

# 資料庫配置
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql://root:@localhost/my_database'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

# 初始化資料庫
db = SQLAlchemy(app)

# 資料表模型
class Barcode(db.Model):
    __tablename__ = 'barcodes'
    id = db.Column(db.Integer, primary_key=True, autoincrement=True)
    barcode_data = db.Column(db.String(255), nullable=False)

    def __init__(self, barcode_data):
        self.barcode_data = barcode_data

# 建立資料表（如果沒有的話）
with app.app_context():
    db.create_all()

# API 端點接收條碼數據
@app.route('/barcode', methods=['POST'])
def save_barcode():
    barcode_data = request.json.get('barcode_data')
    
    if not barcode_data:
        return jsonify({"error": "No barcode data provided"}), 400

    new_barcode = Barcode(barcode_data=barcode_data)
    db.session.add(new_barcode)
    db.session.commit()

    return jsonify({"status": "Barcode saved successfully"}), 201

if __name__ == '__main__':
    app.run(debug=True)