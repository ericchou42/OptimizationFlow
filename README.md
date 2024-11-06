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
graph LR;
subgraph "網站"
    B
    E
    F
end

A[成品部]
B[barcode網站]
C[資料庫]
D[生產負責]
E[流程網站A<br>顯示]
F[流程網站B]
G[印製機]

A-->|生產文件|B
B-->|輸入資料|C
D-->|掃描barcord|E
D-->|掃描barcord|F
F<-->|更新資料<br>回傳資料|C
E<-->|更新資料<br>回傳資料|C
C-->|印製|G
```
```
使用說明：換行<br>、直式TD
```
[Markdown 教學](https://gist.github.com/christech1117/6dc5221c177104990767d6490ad8c7ba)

[VScode 套件:Markdown Preview Mermaid Support教學](https://aa333536.pixnet.net/blog/post/119862210)
```
command + k ,v
```
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
