<?php require_once('../Connections/Connect.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_Details = "-1";
if (isset($_GET['id'])) {
  $colname_Details = $_GET['id'];
}
mysql_select_db($database_Connect, $Connect);
$query_Details = sprintf("SELECT * FROM addjob WHERE id = %s", GetSQLValueString($colname_Details, "int"));
$Details = mysql_query($query_Details, $Connect) or die(mysql_error());
$row_Details = mysql_fetch_assoc($Details);
$totalRows_Details = mysql_num_rows($Details);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<title>หน้าหลัก</title>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>

<body background="images/1180422460.gif" onload="MM_preloadImages('icon/Back1.png')">
<table width="100%" border="0">
  <tr>
    <td class="btn-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="icon/Tools.png" width="32" height="32" /> &nbsp;<strong>ระบบแจ้งซ่อมออนไลน์ ( Peaceresort )</strong></td>
    <td width="7%" height="43" class="btn-success">&nbsp;&nbsp;&nbsp;<img src="images/R24pic.gif" width="70" height="60" /></td>
  </tr>
</table>

<p>
<script src="js/bootstrap.min.js"></script></p>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td height="43" colspan="5" align="center" class="alert-info"><strong>** รายละเอียดการแจ้งงานของพนักงาน **</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="8%">&nbsp;</td>
    <td width="9%">&nbsp;</td>
    <td width="27%">&nbsp;</td>
    <td width="11%">&nbsp;</td>
    <td width="45%">&nbsp;</td>
    <td width="0%">&nbsp;</td>
  </tr>
  <tr>
    <td height="47">&nbsp;</td>
    <td><img src="icon/Tag.png" width="32" height="32" /> ลำดับที่</td>
    <td><strong>: <?php echo $row_Details['id']; ?></strong></td>
    <td><img src="icon/Stationery.png" width="32" height="32" /> ระดับความเร่งด่วน</td>
    <td><strong>: <?php echo $row_Details['piority']; ?></strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="46">&nbsp;</td>
    <td><img src="icon/User.png" width="32" height="32" /> ชื่อผู้แจ้ง</td>
    <td><strong>: <?php echo $row_Details['name']; ?></strong></td>
    <td><img src="icon/Stationery.png" width="32" height="32" /> ปัญหาเกียวกับ</td>
    <td><strong>: <?php echo $row_Details['hardware_software']; ?></strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="45">&nbsp;</td>
    <td><img src="icon/Calender.png" width="32" height="32" /> วันที่แจ้งงาน</td>
    <td><strong>: <?php echo $row_Details['datepicker']; ?></strong></td>
    <td><img src="icon/Stationery.png" width="32" height="32" /> ลักษณะของปัญหา</td>
    <td><strong>: <?php echo $row_Details['problem']; ?></strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="45">&nbsp;</td>
    <td><img src="icon/Home.png" width="32" height="32" /> แผนกที่แจ้ง</td>
    <td><strong>: <?php echo $row_Details['department']; ?></strong></td>
    <td><img src="icon/Stationery.png" width="32" height="32" /> รายละเอียด</td>
    <td><strong>: <?php echo $row_Details['details']; ?></strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="36" colspan="5" align="center" class="alert-info"><strong>** ส่วนของผู้ดูแลระบบ **</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><img src="icon/Tools.png" width="32" height="32" /> สถานะงาน</td>
    <td><strong>: <?php echo $row_Details['status']; ?></strong></td>
    <td><img src="icon/Stationery.png" width="32" height="32" /> ข้อคิดเห็น</td>
    <td><strong>: <?php echo $row_Details['comment']; ?></strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><a href="../index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image13','','icon/Back1.png',1)"><img src="icon/Back.png" name="Image13" width="32" height="32" border="0" id="Image13" />กลับหน้าหลัก</a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Details);
?>
