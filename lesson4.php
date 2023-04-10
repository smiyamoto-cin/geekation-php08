<?php
// ＜アルゴリズムの注意点＞
// アルゴリズムではこれまでのように調べる力ではなく物事を論理的に考える力が必要です。
// 検索して答えを探して解いても考える力には繋がりません。
// まずは検索に頼らずに自分で処理手順を考えてみましょう。


// 以下は自動販売機のお釣りを計算するプログラムです。
// 150円のお茶を購入した際のお釣りを計算して表示してください。
// 計算内容は関数に記述し、関数を呼び出して結果表示すること
// $yen と $product の金額を変更して計算が合っているか検証を行うこと

// 表示例1）
// 10000円札で購入した場合、
// 10000円札x0枚、5000円札x1枚、1000円札x4枚、500円玉x1枚、100円玉x3枚、50円玉x1枚、10円玉x0枚、5円玉x0枚、1円玉x0枚

// 表示例2）
// 100円玉で購入した場合、
// 50円足りません。

$yen = 10000;   // 購入金額
$product = 150; // 商品金額

function calc($yen, $product)
{
    // この関数内に処理を記述
    $money = array(10000,5000,1000,500,100,50,10,5,1);
    $moneyCount =count($money);
    $change =$yen-$product;
    $pages = array(1, 1, 1, 1, 1, 1, 1, 1, 1);
    $total =0;

    if ($yen==$product) { //お釣りなし
        echo "10000円札x0枚、5000円札x0枚、1000円札x0枚、500円玉x0枚、100円玉x0枚、50円玉x0枚、10円玉x0枚、5円玉x0枚、1円玉x0枚";
    } elseif ($yen > $product) { //お釣りあり
        $pages[0] =floor($change/$money[0]);
        $toal =$pages[0]*$money[0]; // 10000円札のお釣りの合計
        for ($i=1; $i< $moneyCount ;$i++){
         $pages[$i] =floor(($change-$total)/$money[$i]);
         $total +=$pages[$i]*$money[$i];
        }
        echo "10000円札x{$pages[0]}枚、5000円札x{$pages[1]}枚、1000円札x{$pages[2]}枚、500円玉x{$pages[3]}枚、100円玉x{$pages[4]}枚、50円玉x{$pages[5]}枚、10円玉x{$pages[6]}枚、5円玉x{$pages[7]}枚、1円玉x{$pages[8]}枚";
    } else { //不足
        $shortfall = $product-$yen;
        echo $shortfall . "円足りません。";
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>お釣り</title>
</head>
<body>
    <section>
        <!-- ここに結果表示 -->
        <?php
        calc(50, $product)
        ?>
    </section>
</body>
</html>


