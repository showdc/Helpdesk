<?php require_once('Connections/iT.php'); ?>
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

mysql_select_db($database_Connect, $Connect);
$query_Recordset1 = "SELECT * FROM addjob";
$Recordset1 = mysql_query($query_Recordset1, $Connect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysql_select_db($database_Connect, $Connect);
$query_Recordset1 = sprintf("SELECT * FROM addjob WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $Connect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
#wrapall {
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	margin: auto;
	width: 800px;
}
#date_reg {
	font-size: 1em;
	font-weight: normal;
	float: left;
	width: 48%;
}
#data_no {
	font-size: 1em;
	font-weight: normal;
	float: right;
	width: 48%;
}
.data_line {
	font-size: 1em;
	font-weight: normal;
	clear: both;
	width: 98%;
	padding-top: 10px;
	border-bottom-width: 1px;
	border-bottom-style: dotted;
	border-bottom-color: #666;
}
@media print{
	#wrapall{width:100%;}
	#btnprint{display:none;}
	}
#sig1 {
	float: left;
	width: 30%;
	border-top-width: thin;
	border-top-style: dotted;
	border-top-color: #333;
}
</style>
</head>

<body>
<div id="wrapall">
  <h3 align="center"><img src="admin/images/R24pic.gif" width="70" height="55" /></h3>
  <h3 align="center">ใบส่งซ่อม<br>
  </h3>
  <div class="data_line">วันที่ส่งซ่อม : <strong>26-09-2014</strong></div>
  <div class="data_line">ชื่อผู้แจ้งซ่อม :</div>
  <div class="data_line">แผนกที่แจ้งซ่อม :</div>
  <div class="data_line">กลุ่มของปัญหา &nbsp;:</div>
  <div class="data_line">รายละเอียด :&nbsp;</div>
  <div class="data_line">สถานะงาน :</div>
  <div class="data_line">ข้อคิดเห็นแผนก IT :&nbsp;</div>
  <div class="data_line">&nbsp;&nbsp;
<p>&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;.....................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...................................
</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หัวหน้าแผนก			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;แผนก IT&nbsp;&nbsp;&nbsp;<br>
</p>
  </div>
  <div class="data_line">
    <input name="btnprint" id="btnprint" type="button" onClick="window.print()" value="Print" />
  </div>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
