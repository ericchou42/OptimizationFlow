    // 監聽輸入框中的 "keydown" 事件，檢查是否按下 Enter 鍵
    document.getElementById('userInput').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {  // 檢查是否按下 Enter 鍵
            event.preventDefault();    // 防止預設行為
            sendData();                // 呼叫送出函式
        }
    });


// 定義函式 sendData，用於將使用者輸入的資料發送到後端 PHP
function sendData() {
    // 取得使用者輸入的內容
    const userInput = document.getElementById('userInput').value;

    // 使用 fetch API 發送 POST 請求
    fetch('process.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `input=${encodeURIComponent(userInput)}`, // 將使用者輸入的資料作為參數傳遞
    })
    .then(response => {
        if (response.ok) {
            return response.text(); // 解析回傳的文本
        } else {
            throw new Error('發生錯誤');
        }
    })
    .then(data => {
        // 將伺服器的響應顯示在前端
        document.getElementById('result').innerHTML = data;
    })
    .catch(error => {
        // 錯誤處理
        console.error('錯誤:', error);
        document.getElementById('result').innerHTML = '發生錯誤';
    });
}

// 定義查詢函式
function fetchDataById(uuid) {
    // // 顯示查詢中的訊息
    // document.getElementById("result").innerHTML = "查詢中，請稍候...";

    // 發送查詢請求到後端
    fetch("process.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `uuid=${uuid}`,
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("result_search").innerHTML = data; // 顯示查詢結果
    })
    .catch(error => {
        console.error("錯誤:", error);
        document.getElementById("result_search").innerHTML = "查詢過程中出現錯誤，請重試。";
    });
}

// 綁定表單提交事件
document.getElementById("queryForm").addEventListener("submit", function(event) {
    event.preventDefault(); // 防止表單默認提交

    // 取得輸入的 UUID 值
    const uuid = document.getElementById("uuid").value;

    // 呼叫查詢函式
    fetchDataById(uuid);
});


document.getElementById("uploadForm").addEventListener("submit", function(event) {
    event.preventDefault(); // 防止表單默認提交

    const formData = new FormData(this); // 取得表單資料

    // 發送上傳請求到後端
    fetch("upload.php", {
        method: "POST",
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("result").innerHTML = data; // 顯示上傳結果
    })
    .catch(error => console.error("錯誤:", error));
});

