## 需求
```mermaid
graph LR;

A[產品投入]
B[清洗機<br>清洗]
C[脫油機<br>脫油]
D[秤重]
E[列印標籤]

A --> |列印barcode|B
B --> |掃描barcode|C
C --> |掃描barcode|D
D --> |掃描barcode|E
```
## 技術
```mermaid
graph TD;

A[現場]
subgraph "流程"
    B[流程A網站]
    C[流程B網站]
end
D[資料庫]
E[barcord]

A --> |掃描barcord|B
B --> |後端帶A流程資料|D
A --> |掃描barcord|C
C --> |後端帶B流程資料|D
D --> |回傳對應的資料列|B
D --> |回傳對應的資料列|C
D --> |列印|E
```
```
使用說明：換行<br>、直式TD
```
[Markdown 教學](https://gist.github.com/christech1117/6dc5221c177104990767d6490ad8c7ba)
# OptimizationFlow
- **author:`Eric`**


# 開發環境
Herd(PHP)
DBngin(MySQL)TablePles

```
// 上傳execl
composer require phpoffice/phpspreadsheet
// 使用UUID
composer require ramsey/uuid
```

# commit 規範
```
Message Header: <type>(<scope>): <subject>
type（必要）：commit 的類別
如：feat, fix, docs, style, refactor, test, chore
scope（可選）：commit 影響的範圍
如：資料庫、控制層、模板層等，視專案不同改變
subject（必要）：commit 的簡短描述
不超過 50 個字元
結尾不加句號
盡量讓 Commit 單一化，一次只更動一個主題
```

[MySQL](https://note.drx.tw/2012/12/mysql-syntax.html)
```
常用資料庫資料型態
1. INT (整數)
2. CHAR (1~255字元字串)
3. VARCHAR (不超過255字元不定長度字串)
4. TEXT (不定長度字串最多65535字元)
```
