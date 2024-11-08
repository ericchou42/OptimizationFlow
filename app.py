from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
import pymysql

# 使用 pymysql 替代 MySQLdb
pymysql.install_as_MySQLdb()

app = Flask(__name__)

# 配置 MySQL 連線資訊
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql://root:@test/my_database'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

# 初始化資料庫
db = SQLAlchemy(app)

# 建立資料表模型
class TestData(db.Model):
    __tablename__ = 'usb_data'
    id = db.Column(db.Integer, primary_key=True, autoincrement=True)
    data = db.Column(db.String(255), nullable=False)

    def __init__(self, data):
        self.data = data

# 初始化資料表（僅執行一次）
with app.app_context():
    db.create_all()

# 建立 API 來接收 USB 資料
@app.route('/usb_data', methods=['POST'])
def save_usb_data():
    try:
        usb_data = request.json.get('data')
        
        if not usb_data:
            return jsonify({"error": "No data provided"}), 400
        
        new_data = TestData(data=usb_data)
        db.session.add(new_data)
        db.session.commit()
        
        return jsonify({"status": "Data saved successfully"}), 201
    except Exception as e:
        return jsonify({"error": str(e)}), 500

if __name__ == '__main__':
    app.run(debug=True)