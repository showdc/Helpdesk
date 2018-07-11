
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
$emailto='it-support@showdc.co.th'; //อีเมล์ผู้รับ
$subject='$header'; //หัวข้อ
$header.= "Content-type: text/html; charset=windows-620\n";
$header.="from: ".$name."E-mail :".$mail; //ชื่อและอีเมลผู้ส่ง
$messages.= "$text</br>"; //ข้อความ
$messages.= "จาก $sender<br>"; //ข้อความ

$send_mail = mail($emailto,$subject,$messages,$header);

if(!$send_mail)
{
echo"ยังไม่สามารถส่งเมลล์ได้ในขณะนี้";
}
else
{
echo "ส่งเมลล์สำเร็จ";
}
?>
<body>


</body>
</html>