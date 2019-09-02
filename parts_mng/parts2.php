<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>parts2.php</title>
</head>
<body bgcolor=lightblue>
<?php
//postで渡されるのは連想配列
//ここでは変数名を日本語にさせて
$商品番号=$_POST["商品番号"];

//数値チェック
if (is_numeric($商品番号)) {
    if (!($商品番号>=0 and $商品番号<=999)) {
        echo "商品番号は０～９９９にしてね<br><br>";
        echo "<a href='parts2.html' onClick='history.back();return false;'>戻る</a><br>";
        exit;
    }
}else{
    echo "数値を入力してね<br><br>";
    echo "<a href='parts2.html' onClick='history.back();return false;'>戻る</a><br>";
    exit;
}

$商品名=$_POST["商品名"];

 ?>
