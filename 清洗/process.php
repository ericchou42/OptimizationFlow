<?php
require 'vendor/autoload.php'; // 引入 Composer 自動加載

use Ramsey\Uuid\Uuid; // 引入 UUID 類
use PhpOffice\PhpSpreadsheet\IOFactory;

// 資料庫連線設定
$servername = "test"; // 資料庫主機
$username = "root"; // 資料庫使用者名稱
$password = ""; // 資料庫密碼
$dbname = "my_database"; // 資料庫名稱
$table = "test_data";

// 建立與資料庫的連線
$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連線是否成功
if ($conn->connect_error) {
    die("資料庫連線失敗: " . $conn->connect_error);
}

// 確認前端是否傳遞了 'input' 資料
if (isset($_POST['input'])) {
    $input = $_POST['input'];

    // 生成 UUID
    $uuid = Uuid::uuid4()->toString(); // 生成一個隨機的 UUID

    // 使用準備好的語句來避免 SQL 注入攻擊
    $stmt = $conn->prepare("INSERT INTO $table (uuid, input_data) VALUES (?, ?)");
    $stmt->bind_param("ss", $uuid, $input); // 綁定 UUID 和輸入資料

    // 執行插入操作並檢查是否成功
    if ($stmt->execute()) {
        echo "資料已成功存入資料庫！<br>";
        $stmt->close();

        // 查詢資料庫中的所有記錄
        $result = $conn->query("SELECT * FROM $table ORDER BY created_at DESC");
    } else {
        echo "資料儲存失敗: " . $stmt->error;
    }

    // 顯示所有資料
    if ($result->num_rows > 0) {
        echo "<h2>資料庫中的所有記錄：</h2><ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>ID: " . $row["id"] . " - UUID: " . htmlspecialchars($row["uuid"]) . " - 資料: " . htmlspecialchars($row["input_data"]) . " - 時間: " . $row["created_at"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "目前沒有資料。";
    }
} else {
    echo "沒有接收到任何資料。";
}

if (isset($_POST['uuid'])) {
    $uuid = $_POST['uuid'];

    // 準備 SQL 語句以避免 SQL 注入
    $stmt = $conn->prepare("SELECT * FROM $table WHERE uuid = ?");
    $stmt->bind_param("i", $uuid);
    $stmt->execute();
    $result = $stmt->get_result();

    // 檢查是否找到資料
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "UUID: " . $row["uuid"] . " - 資料: " . htmlspecialchars($row["input_data"]) . " - 時間: " . $row["created_at"];
    } else {
        echo "找不到指定 UUID 的資料。";
    }
    $stmt->close();
} else {
    echo "請輸入有效的 UUID。";
}

// 檢查是否有文件上傳
if (isset($_FILES['file'])) {
    $file = $_FILES['file']['tmp_name'];
    
    // 使用 PhpSpreadsheet 讀取 Excel 文件
    $spreadsheet = IOFactory::load($file);
    $sheet = $spreadsheet->getActiveSheet();
    $data = $sheet->toArray();

    // 遍歷資料並插入資料庫
    foreach ($data as $row) {
        // 假設 Excel 中的資料結構為 [input_data]
        $input_data = $row[0]; // 根據實際資料結構調整索引

        // 準備 SQL 語句以避免 SQL 注入
        $stmt = $conn->prepare("INSERT INTO user_data (input_data) VALUES (?)");
        $stmt->bind_param("s", $input_data);
        $stmt->execute();
    }
    echo "資料成功上傳！";
} else {
    echo "沒有上傳任何文件。";
}

// 關閉資料庫連線
$conn->close();
?>