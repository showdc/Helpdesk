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

mysql_select_db($database_IT, $IT);
$query_MAR = "SELECT * FROM addjob";
$MAR = mysql_query($query_MAR, $IT) or die(mysql_error());
$row_MAR = mysql_fetch_assoc($MAR);
$totalRows_MAR = mysql_num_rows($MAR);$colname_MAR = "-1";
if (isset($_GET['id'])) {
  $colname_MAR = $_GET['id'];
}
mysql_select_db($database_IT, $IT);
$query_MAR = sprintf("SELECT * FROM addjob WHERE id = %s", GetSQLValueString($colname_MAR, "int"));
$MAR = mysql_query($query_MAR, $IT) or die(mysql_error());
$row_MAR = mysql_fetch_assoc($MAR);
$totalRows_MAR = mysql_num_rows($MAR);
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
  date_default_timezone_set("Asia/Bangkok"); //cord date and time.. 
 
    $date = date("d-m-Y"); //cord date and time.. 
    $time = date("H:i");   //cord date and time.. 
    ?>

<div id="wrapall">
  <table width="100%" border="0">
    <tr>
      <td width="25%" rowspan="4" align="center"><img src="images/New Logo SDC.jpg" width="100" height="50" /></td>
      <td width="60%" align="center"><h2><strong>Reques From</strong></h2></td>
      <td width="15%" align="center">  

    <input name="btnprint" id="btnprint" type="button" onClick="window.print()" value="Print" >

 </td>
    </tr>


    <tr>
      <td align="center"> IT SUPPORT SHOWDC</td>
      <td>&nbsp;</td>
    </tr>


    <tr>
      <td align="center"> </td>
      <td>&nbsp;</td>
    </tr>


    <tr>
      <td height="24" align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tel:0648025947 &nbsp;&nbsp;0648025903</strong> :</td>
      <td>&nbsp;</td>
    </tr>


  </table>
  <div class="data_line">&nbsp;&nbsp;<strong>Date/Time ::</strong> &nbsp;<?php echo $row_MAR['datepicker']; ?>:<?php echo $row_MAR['time']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Job ID ::</strong> IT-JOB00<?php echo $row_MAR['id']; ?></div>
  <div class="data_line">&nbsp;&nbsp;<strong>Username ::&nbsp;</strong><?php echo $row_MAR['name']; ?></div>
  <div class="data_line">&nbsp;&nbsp;<strong>Department ::</strong> <?php echo $row_MAR['department']; ?></div>
  <div class="data_line">&nbsp;&nbsp;<strong>Priority &nbsp;::</strong> <?php echo $row_MAR['piority']; ?></div>
  <div class="data_line">&nbsp;&nbsp;<strong>Problem ::</strong>&nbsp;<?php echo $row_MAR['problem']; ?></div>
  <div class="data_line">&nbsp;&nbsp;<strong>Subject ::</strong> <?php echo $row_MAR['subject']; ?></div>
  <div class="data_line">&nbsp;<strong>&nbsp;Detail ::</strong>&nbsp;<?php echo $row_MAR['details']; ?></div>
  <div class="data_line">&nbsp;</div>
  <div class="data_line">&nbsp;&nbsp;<strong>Status ::</strong>&nbsp;<?php echo $row_MAR['status']; ?></div>
  <div class="data_line">&nbsp;&nbsp;<strong>Comment ::</strong>&nbsp;<?php echo $row_MAR['comment']; ?></div>
  <div class="data_line">&nbsp;&nbsp;<strong>On site By ::_______________________________________(IT SUPPORT) </strong>&nbsp; 
  <div class="data_line">&nbsp;&nbsp;</div>
  

    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;.....................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...................................
</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp;หัวหน้าแผนก			</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>หัวหน้าแผนก IT</strong>&nbsp;&nbsp;&nbsp;</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Date/Time ::</strong> <? echo $date."&nbsp;/&nbsp;".$time?></p>
  </div>
</div>
</body>
</html>
<?php
mysql_free_result($MAR);
?>
