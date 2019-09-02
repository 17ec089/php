<?php
print <<< HTML
<html>
<head>
<title>bbsを見る</title>
</head>
<body bgcolor="pink">
<b><h1><center>bbs 閲覧画面</center></h1></b><br>
</body>
</html>
HTML;

$handle = fopen("bbs", "r") ;

while (!feof($handle)) {
    $line=fgets($handle);
    if ($line === false) {
        break;
    }
    $word=explode("%", $line);
    $time=$word[0];
    $name=$word[1];
    $address=$word[2];
    $mail=$word[3];
    $title=$word[4];
    $message=$word[5];
    print <<< HTML
<HTML>
<HEAD>
<TITLE>bbs  の表示</TITLE>
</HEAD>
<BODY bgcolor = "pink">
<TABLE width="1000" cellpadding="10" bgcolor="pink">
<TR>
<TD>
<B>$time</B><B>$title</B><BR>
<FONT color="green">$name $address</FONT><BR>
<A href="mailto:$mail">$mail</A><BR>
<BR>
$message
</TD>
</TR>
</TABLE>
<P>
</BODY>
</HTML>
HTML;
}
fclose($handle);

print <<< HTML
<html>
<head>
    <title>最後のリンク</title>
</head>
<body>
    <a href="bbs_submit.html">bbsに投稿する</a>
    <a href="top.html">トップ画面に戻る</a>
</body>
</html>
HTML;
?>
