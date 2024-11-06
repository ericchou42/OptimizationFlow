-- 表單名稱
CREATE TABLE test1_data (
    -- ID
    id INT AUTO_INCREMENT PRIMARY KEY,
    -- UUID
    uuid CHAR(36) NOT NULL,
    -- 日期、時間
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    -- 生產單位
    -- 工單號
    -- 品項名稱
    project_name VARCHAR(255) NOT NULL,
    -- 車台
    -- 工序
    -- 改車人員
    -- 顧車人員
    -- 單重
    -- 淨重
    -- 數量(計算)
    quantity INT NOT NULL,
    -- 作業員
    -- 箱數
    
    -- 料號
    -- 檢查人員
    -- 後續單位
    -- 每箱淨重
    -- 備註
    -- HSF
    -- 異常色（紅色）
);