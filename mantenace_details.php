<?php require_once('Connections/IT.php'); ?>
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

$colname_DMA = "-1";
if (isset($_GET['id'])) {
  $colname_DMA = $_GET['id'];
}
mysql_select_db($database_IT, $IT);
$query_DMA = sprintf("SELECT * FROM mantenace WHERE id = %s", GetSQLValueString($colname_DMA, "int"));
$DMA = mysql_query($query_DMA, $IT) or die(mysql_error());
$row_DMA = mysql_fetch_assoc($DMA);
$totalRows_DMA = mysql_num_rows($DMA);
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
  <p align="center"><strong>** Maintenace Year Plan **</strong></p>
  <h3 align="center">ใบส่งมอบเครื่อง<br>
  </h3>
  <div class="data_line"><strong>วันที่ซ่อมบำรุง</strong> : <?php echo $row_DMA['datepicker']; ?></div>
  <div class="data_line"><strong>รหัสเครื่อง</strong> : <?php echo $row_DMA['device_id']; ?></div>
  <div class="data_line"><strong>ชื่อผู้ใช้งาน</strong> : <?php echo $row_DMA['username']; ?></div>
  <div class="data_line"><strong>แผนก </strong>&nbsp;: <?php echo $row_DMA['department']; ?></div>
  <div class="data_line"><strong>ตำแหน่งงาน</strong> :&nbsp;<?php echo $row_DMA['position_user']; ?></div>
  <div class="data_line"><strong>รายละเอียดการซ่อมบำรุง</strong> : <?php echo $row_DMA['details']; ?></div>
  <div class="data_line"><strong>ผู้ปัฎิบัติงานซ่อม</strong> : <?php echo $row_DMA['repair_by']; ?></div>
  <div class="data_line"><strong>ตำแหน่ง</strong> : <?php echo $row_DMA['position']; ?></div>
  <div class="data_line"><strong>ข้อคิดเห็น IT</strong> : <?php echo $row_DMA['coment']; ?></div>
  <div class="data_line">&nbsp;&nbsp;
  <p>&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;.....................................&nbsp;)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_DMA['username']; ?>			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<?php echo $row_DMA['position_user']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    <p><br>
    </p>
  </div>
  <div class="data_line">
    <input name="btnprint" id="btnprint" type="button" onClick="window.print()" value="Print" />
  </div>
</div>
</body>
</html>
<?php
mysql_free_result($DMA);
?>
