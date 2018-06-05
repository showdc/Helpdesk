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
</script>
<style type="text/css">
@media print{
	#wrapall{width:100%;}
	#btnprint{display:none;}
	}
	</style>
</head>

<body>
<p>
<script src="js/bootstrap.min.js"></script></p>
<div id="wrapall">
<table width="100%" border="0">
  <tr>
    <td height="43" colspan="3"><p align="center">
    <p align="center"><img src="images/R24pic.gif" width="89" height="67"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="51%">&nbsp;</td>
    </tr>
  <tr>
    <td width="37%">&nbsp;</td>
    <td colspan="2" align="center"><p><strong><font size="4">**ใบส่งซ่อม **</font></strong></p></td>
    </tr>
  <tr>
    <td height="47">&nbsp;</td>
    <td><strong>วันที่ส่งซ่อม</strong></td>
    <td><strong>: 
    </strong><!-- #BeginDate format:fcIt1m -->Wednesday, 1-10-2014  17:37<!-- #EndDate --></td>
    </tr>
  <tr>
    <td height="46">&nbsp;</td>
    <td> <strong>ชื่อผู้แจ้ง</strong></td>
    <td><strong>: </strong><?php echo $row_Details['name']; ?></td>
    </tr>
  <tr>
    <td height="45">&nbsp;</td>
    <td> <strong>วันที่แจ้งงาน</strong></td>
    <td><strong>: </strong><?php echo $row_Details['datepicker']; ?></td>
    </tr>
  <tr>
    <td height="45">&nbsp;</td>
    <td><strong>แผนกที่แจ้ง</strong></td>
    <td><strong>:</strong> <?php echo $row_Details['department']; ?></td>
    </tr>
  <tr>
    <td height="42">&nbsp;</td>
    <td><strong>ปัญหา</strong></td>
    <td><strong>: </strong><?php echo $row_Details['hardware_software']; ?></td>
    </tr>
  <tr>
    <td height="31" align="center">&nbsp;</td>
    <td height="31" align="left"><strong>รายละเอียด</strong></td>
    <td height="31" align="left"><strong>: </strong><?php echo $row_Details['details']; ?></td>
    </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td><strong>สถานะงาน</strong></td>
    <td><strong>: </strong><?php echo $row_Details['status']; ?></td>
    </tr>
  <tr>
    <td height="34">&nbsp;</td>
    <td><strong>ข้อคิดเห็น IT</strong></td>
    <td><strong>: </strong><?php echo $row_Details['comment']; ?></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>................................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.................................................</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="btnprint" id="btnprint" type="button" onClick="window.print()" value="Print" /></td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>หัวหน้าแผนก&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;แผนก IT</strong></td>
    </tr>
</table>
</div>
</body>
</html>
<?php
mysql_free_result($Details);
?>
