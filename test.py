import time

# 模擬條碼掃描結果檢查
def check_barcode(barcode):
    # 假設條碼需要是純數字，且長度在 8 到 13 位之間
    if barcode.isdigit() and 8 <= len(barcode) <= 13:
        return True
    return False

# 主程式
def main():
    print("請按下條碼掃描器按鈕進行掃描...")
    
    # 等待用戶掃描條碼
    while True:
        barcode = input("掃描結果：")
        
        if barcode:
            # 檢查條碼是否有效
            if check_barcode(barcode):
                print(f"有效條碼：{barcode}")
                break  # 條碼有效，退出循環
            else:
                print(f"無效條碼：{barcode}，請重新掃描")
        else:
            print("沒有掃描到條碼，請再試一次")

# 執行主程式
if __name__ == "__main__":
    main()