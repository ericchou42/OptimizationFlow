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
如：feat(生成), fix(修改), wip(半成品), docs, style, refactor, test, chore
scope（可選）：commit 影響的範圍
如：資料庫、控制層、模板層等，視專案不同改變
subject（必要）：commit 的簡短描述
不超過 50 個字元
結尾不加句號
盡量讓 Commit 單一化，一次只更動一個主題
```
