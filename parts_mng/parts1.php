<html>
<head>
    <meta http-equiv="content-type" content="text/html"; charset="utf-8">
    <title>parts1.php<title>
    </head>
    <h1><b>商品一覧</b></h1><br>

<?php
//データベースへ接続
$db=new PDO("mysql:host=localhost;dbname=parts_db", "root", "root");
$db->query("select * from parts order by 商品番号");
$r=$db->fetch();
$num=mysqli_num_fields($r);//列数を取得
?>

<body bgcolor="yellow">
<table border=1>

<?php
for ($i=0; $i < $num; $i++) {
    ?>
<!--列名を<td>で囲んで表示-->
<td><?php echo mysqli_fetch_field_direct($r, $i)->name; ?></td>

<?php
}
//テーブルpartsの行数と同じ回数を繰り返す
while ($row=mysql_fetch_array($r)) {
    ?>

<tr>

<?php
//テーブルpartsの列数と同じ回数を繰り返す
for ($j=0;$j<$num;$j++) {
    ?>

<td><?php echo $row[$j]; ?></td>

<?php
} ?>

</tr>

<?php
} ?>

</table>

<?php mysqli_close($db); ?>

<br>

<a href="top.html">トップ画面に戻る</a><br>
