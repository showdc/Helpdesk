<?php require_once('../Connections/IT.php'); ?>
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

$colname_RD = "-1";
if (isset($_POST['search'])) {
  $colname_RD = $_POST['search'];
}
mysql_select_db($database_IT, $IT);
$query_RD = sprintf("SELECT * FROM addjob WHERE department LIKE %s", GetSQLValueString("%" . $colname_RD . "%", "text"));
$RD = mysql_query($query_RD, $IT) or die(mysql_error());
$row_RD = mysql_fetch_assoc($RD);
$totalRows_RD = mysql_num_rows($RD);
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<p>&nbsp;</p>
<table width="100" border="0" align="center">
  <tr>
    <td><img src="../images/R24pic.gif" width="73" height="71" /></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="250" border="0" align="center">
  <tr>
    <td width="99" align="center"><strong>** Report by Department **</strong></td>
  </tr>
</table>
<p>&nbsp;&nbsp;<input name="btnprint" id="btnprint" class="btn btn-warning" type="button" onClick="window.print()" value="Print" /></p>
<table width="100%" border="0" class="table">
  <tr>
    <td width="9%" align="center"><strong>ชื่อผู้แจ้ง</strong></td>
    <td width="9%" align="center"><strong>วันที่แจ้ง</strong></td>
    <td width="13%" align="center"><strong>แผนกที่แจ้ง</strong></td>
    <td width="34%" align="center"><strong>รายละเอียด</strong></td>
    <td width="7%" align="center"><strong>สถานะงาน</strong></td>
    <td width="28%" align="center"><strong>ข้อคิดเห็น</strong></td>
  </tr>
  <?php do { ?>
    <tr>
      <td align="center"><?php echo $row_RD['name']; ?></td>
      <td align="center"><?php echo $row_RD['datepicker']; ?></td>
      <td align="center"><?php echo $row_RD['department']; ?></td>
      <td><?php echo $row_RD['details']; ?></td>
      <td align="center"><?php echo $row_RD['status']; ?></td>
      <td><?php echo $row_RD['comment']; ?></td>
    </tr>
    <?php } while ($row_RD = mysql_fetch_assoc($RD)); ?>
</table>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<p>
  <script src="js/bootstrap.min.js"></script>
</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($RD);
?>
