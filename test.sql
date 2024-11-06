-- 表單名稱
CREATE TABLE test1_data (
    -- ID
    id INT AUTO_INCREMENT PRIMARY KEY,
    -- UUID
    uuid CHAR(36) NOT NULL,
    -- 日期、時間
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    -- 品項名稱
    project_name VARCHAR(255) NOT NULL,
    -- 數量
    quantity INT(100) NOT NULL,
    -- 料號
    -- 檢查人員
    -- 後續單位
    -- 每箱淨重
    -- 備註
    -- HSF
    -- 異常色（紅色）
);