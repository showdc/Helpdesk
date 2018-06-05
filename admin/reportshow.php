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

$colname_RS = "-1";
if (isset($_POST['datestart'])) {
  $colname_RS = $_POST['datestart'];
}
$colname2_RS = "-1";
if (isset($_POST['datestop'])) {
  $colname2_RS = $_POST['datestop'];
}
mysql_select_db($database_IT, $IT);
$query_RS = sprintf("SELECT * FROM addjob WHERE datepicker >= %s and datepicker<=%s", GetSQLValueString($colname_RS, "date"),GetSQLValueString($colname2_RS, "date"));
$RS = mysql_query($query_RS, $IT) or die(mysql_error());
$row_RS = mysql_fetch_assoc($RS);
$totalRows_RS = mysql_num_rows($RS);
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
<script src="js/bootstrap.min.js"></script>
<table width="87" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="163" border="0" align="center">
  <tr>
    <td align="center"><strong>** Report by date **</strong></td>
  </tr>
</table>
<p>&nbsp;&nbsp;<input name="btnprint2" id="btnprint" class="btn btn-warning" type="button" onclick="window.print()" value="Print" /></p>
<table width="100%" border="0" class="table">
  <tr>
    <td width="9%" align="center"><strong>ชื่อผู้แจ้ง</strong></td>
    <td width="9%" align="center"><strong>วันที่แจ้ง</strong></td>
    <td width="13%" align="center"><strong>แผนกที่แจ้ง</strong></td>
    <td width="33%" align="center"><strong>รายละเอียด</strong></td>
    <td width="9%" align="center"><strong>สถานะงาน</strong></td>
    <td width="27%" align="center"><strong>ข้อคิดเห็น</strong></td>
  </tr>
  <?php do { ?>
    <tr>
      <td align="center"><?php echo $row_RS['name']; ?></td>
      <td align="center"><?php echo $row_RS['datepicker']; ?></td>
      <td><?php echo $row_RS['department']; ?></td>
      <td><?php echo $row_RS['details']; ?></td>
      <td align="center"><?php echo $row_RS['status']; ?></td>
      <td><?php echo $row_RS['comment']; ?></td>
    </tr>
    <?php } while ($row_RS = mysql_fetch_assoc($RS)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($RS);
?>
