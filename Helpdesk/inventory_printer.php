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

$colname_Printer = "-1";
if (isset($_GET['id'])) {
  $colname_Printer = $_GET['id'];
}
mysql_select_db($database_IT, $IT);
$query_Printer = sprintf("SELECT * FROM table_printer WHERE id = %s", GetSQLValueString($colname_Printer, "int"));
$Printer = mysql_query($query_Printer, $IT) or die(mysql_error());
$row_Printer = mysql_fetch_assoc($Printer);
$totalRows_Printer = mysql_num_rows($Printer);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Untitled Document</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<style type="text/css">
#wrapall {
	width: 80%;
	margin: auto;
	position: static;
}
@media print{
	#wrapall{width:100%;}
	#btnprint{display:none;}
	}
</style>
</head>

<body>
<div id="wrapall">
  <table width="100%" border="0">
    <tr>
      <td colspan="6" align="center"><table width="100%" border="0">
        <tr>
          <td width="45%" height="89">&nbsp;</td>
          <td width="40%"><strong><img src="images/R24pic.gif" width="95" height="87" /></strong></td>
          <td width="15%">&nbsp;</td>
        </tr>
      </table>
      <p><strong>แบบบันทึกข้อมูลอุปกรณ์ฝ่ายเทคโนโลยีสารสนเทศ ( IT Depaerment )</strong></p></td>
    </tr>
    <tr>
      <td width="11%" height="35">&nbsp;</td>
      <td colspan="4" align="center" class="btn-info"><strong>ข้อมูลผู้ใช้งาน</strong></td>
      <td width="5%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="20%" align="center">รหัสอุปกรณ์</td>
      <td width="26%"><strong>: <?php echo $row_Printer['device_id']; ?></strong></td>
      <td width="12%" align="center">สังกัดแผนก</td>
      <td width="26%"><strong>: <?php echo $row_Printer['department']; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center">ชื่อผู้ใช้งาน </td>
      <td><strong>: <?php echo $row_Printer['username']; ?></strong></td>
      <td align="center">สถานะ</td>
      <td><strong>: Working</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center">ตำแหน่งงาน</td>
      <td><strong>: <?php echo $row_Printer['position']; ?></strong></td>
      <td align="center">วันที่ซื้อ</td>
      <td><strong>: <?php echo $row_Printer['date_pr']; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="36">&nbsp;</td>
      <td colspan="4" align="center" class="btn-info"><strong>ข้อมูลอุปกรณ์</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center">ชื่อเครื่องพิมพ์</td>
      <td><strong>: <?php echo $row_Printer['brand']; ?></strong></td>
      <td align="center">ใช้งานที่แผนก</td>
      <td><strong>: <?php echo $row_Printer['department']; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center">รุ่นเครื่องพิมพ์</td>
      <td><strong>: <?php echo $row_Printer['model']; ?></strong></td>
      <td align="center">สถานะเครื่องพิมพ์</td>
      <td><strong>: <?php echo $row_Printer['status']; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="center">&nbsp;</td>
      <td colspan="2" align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="center">&nbsp;</td>
      <td colspan="2" align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="center">&nbsp;</td>
      <td colspan="2" align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="center">&nbsp;</td>
      <td colspan="2" align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="center">&nbsp;</td>
      <td colspan="2" align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="center">&nbsp;</td>
      <td colspan="2" align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="center">..........................................................</td>
      <td colspan="2" align="center">..........................................................</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="center"><strong>Mr. Mana Duangsri</strong></td>
      <td colspan="2" align="center"><strong><?php echo $row_Printer['username']; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="center"><strong>IT Supervisor</strong></td>
      <td colspan="2" align="center"><strong><?php echo $row_Printer['position']; ?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="center">ผู้บันทึก</td>
      <td colspan="2" align="center">ผู้ถือครอง</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="btnprint" id="btnprint" type="button" onClick="window.print()" value="Print" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
mysql_free_result($Printer);
?>
