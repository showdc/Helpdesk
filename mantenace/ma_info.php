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

$colname_MA = "-1";
if (isset($_GET['id'])) {
  $colname_MA = $_GET['id'];
}
mysql_select_db($database_IT, $IT);
$query_MA = sprintf("SELECT * FROM mantenace WHERE id = %s", GetSQLValueString($colname_MA, "int"));
$MA = mysql_query($query_MA, $IT) or die(mysql_error());
$row_MA = mysql_fetch_assoc($MA);
$totalRows_MA = mysql_num_rows($MA);

$colname_MAR = "-1";
if (isset($_GET['id'])) {
  $colname_MAR = $_GET['id'];
}
mysql_select_db($database_IT, $IT);
$query_MAR = sprintf("SELECT * FROM mantenace WHERE id = %s", GetSQLValueString($colname_MAR, "int"));
$MAR = mysql_query($query_MAR, $IT) or die(mysql_error());
$row_MAR = mysql_fetch_assoc($MAR);

mysql_select_db($database_IT, $IT);
$query_MAR = "SELECT * FROM addjob";
$MAR = mysql_query($query_MAR, $IT) or die(mysql_error());
$row_MAR = mysql_fetch_assoc($MAR);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
#wrapall {
	font-family: "Angsana New";
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
	font-size: 22px;
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
  <?
  date_default_timezone_set("Asia/Bangkok");
 
    $date = date("d-m-Y");
    $time = date("H:i");
    ?>
<div id="wrapall">
  <table width="100%" border="0">
    <tr>
      <td width="25%" rowspan="4" align="center"><img src="../images/rws_logo.png" width="163" height="111" /></td>
      <td width="60%" align="center"><h2><strong>** Maintenance Plan **</strong></h2></td>
      <td width="15%" align="center">  <div class="data_line">
    <input name="btnprint" id="btnprint" type="button" onClick="window.print()" value="Print" />
  </div></td>
    </tr>
    <tr>
      <td align="center">178 MOO 1, BOPHUT BEACH, KOH SAMUI</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center">SURATTHANI 84320 THAILAND </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="24" align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tel </strong>: +66 77 425 357 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Fax</strong> : +66 77 425 343</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <div class="data_line">&nbsp;&nbsp;<strong>Date/Time ::</strong> <?php echo $row_MA['datepicker']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Job ID ::</strong> IT-JOB00<?php echo $row_MA['id']; ?></div>
  <div class="data_line">&nbsp;&nbsp;<strong>Username ::&nbsp;</strong><?php echo $row_MA['username']; ?></div>
  <div class="data_line">&nbsp;&nbsp;<strong>Department ::</strong> <?php echo $row_MA['department']; ?></div>
  <div class="data_line">&nbsp;&nbsp;<strong>Position &nbsp;::</strong> <?php echo $row_MA['position_user']; ?></div>
  <div class="data_line">&nbsp;&nbsp;<strong>Devi ID ::</strong>&nbsp;<?php echo $row_MA['device_id']; ?></div>
  <div class="data_line">&nbsp;<strong>&nbsp;Detail ::</strong>&nbsp;<?php echo $row_MA['details']; ?></div>
  <div class="data_line">&nbsp;</div>
  <div class="data_line">&nbsp;&nbsp;<strong>Repair by ::</strong>&nbsp;<?php echo $row_MA['repair_by']; ?></div>
  <div class="data_line">&nbsp;&nbsp;<strong>Position ::</strong>&nbsp;<?php echo $row_MA['position']; ?></div>
  <div class="data_line">&nbsp;&nbsp;<strong>Comment ::</strong>&nbsp;<?php echo $row_MA['coment']; ?></div>
  <div class="data_line">&nbsp;&nbsp;
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.........................................................
</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $row_MA['username']; ?></strong></p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $row_MA['position_user']; ?></strong></p>
    <p>&nbsp;</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Date/Time ::</strong> <? echo $date."&nbsp;/&nbsp;".$time?></p>
  </div>
</div>
</body>
</html>
<?php
mysql_free_result($MA);
?>
