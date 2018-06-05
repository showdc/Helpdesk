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

mysql_select_db($database_IT, $IT);
$query_SR = "SELECT * FROM addjob";
$SR = mysql_query($query_SR, $IT) or die(mysql_error());
$row_SR = mysql_fetch_assoc($SR);
$totalRows_SR = mysql_num_rows($SR);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<title>Summary Resort</title>
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
<script src="js/bootstrap.min.js"></script>
<table width="100%" border="0" class="table">
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" align="center"><strong>** Report by Summary Report **&nbsp;&nbsp;&nbsp;</strong></td>
    <td align="center">
    <button name="btnprint" id="btnprint" class="btn btn-warning" type="button" onClick="window.print()">&nbsp;Print&nbsp;
    </button>
    </td>
  </tr>
  <tr>
    <td width="10%" align="center"><strong>ชื่อผู้แจ้ง</strong></td>
    <td width="9%" align="center"><strong>วันที่แจ้ง</strong></td>
    <td width="11%" align="center"><strong>แผนกที่แจ้ง</strong></td>
    <td width="33%" align="center"><strong>รายละเอียด</strong></td>
    <td width="7%" align="center"><strong>สถานะงาน</strong></td>
    <td width="30%" align="center"><strong>ข้อคิดเห็น</strong></td>
  </tr>
  </thead>
  <?php do { ?>
  <tbody>
    <tr>
      <td align="center"><?php echo $row_SR['name']; ?></td>
      <td align="center"><?php echo $row_SR['datepicker']; ?></td>
      <td><?php echo $row_SR['department']; ?></td>
      <td><?php echo $row_SR['details']; ?></td>
      <td align="center"><?php echo $row_SR['status']; ?></td>
      <td><?php echo $row_SR['comment']; ?></td>
    </tr>
    <?php } while ($row_SR = mysql_fetch_assoc($SR)); ?>
    </tbody>
</table>
<p>&nbsp;</p>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</body>
</html>
<?php
mysql_free_result($SR);
?>
