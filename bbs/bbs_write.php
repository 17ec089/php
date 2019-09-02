<?php
//データを取得する
$name=$_POST["name"];
$address=$_POST["address"];
$mail=$_POST["mail"];
$title=$_POST["title"];
$message=$_POST["message"];

//日本語表記の日時を得る
$time=date("Y/m/d l H:i:s");
//データを１行にまとめる　「%」は項目の区切り
$data=$time."%".$name."%".$address."%".$mail."%".$title."%".$message."\n";

/*
以下はファイル操作を行う
*/
//読み込みモード
$hdl=fopen("bbs", "r");
while (!feof($hdl)) {
    $line=fgets($hdl);
    $data=$data.$line;
}
fclose($hdl);
//書き込みモード
$hdl=fopen("bbs", "w");
flock($hdl, LOCK_EX);
fwrite($hdl, $data);
flock($hdl, LOCK_UN);
fclose($hdl);

//以下は書き込みの終了メッセージ
print <<< HTML
<html>
<head>
<meta charset="utf-8">
<title>書き込み完了</title>
</head>
<body bgcolor="lightblue">
<center>
<b><font size="6" color="green">
<br>
メッセージは<br>
bbsに書き込まれました
</font><p>
<a href="bbs_view.php">bbsを読む</a>
<a href="top.html">トップに戻る</a>
</b>
</center>
</body>
</html>
HTML;
