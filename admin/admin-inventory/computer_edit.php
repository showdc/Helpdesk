<?php require_once('../../Connections/IT.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE table_computer SET device_id=%s, date_pr=%s, username=%s, `position`=%s, department=%s, images=%s, ip=%s, cpu=%s, mainboard=%s, ram=%s, vga=%s, harddisk=%s, optical_drive=%s, monitor=%s, mouse=%s, keyboard=%s, network=%s, os=%s, license=%s WHERE id=%s",
                       GetSQLValueString($_POST['device_id'], "text"),
                       GetSQLValueString($_POST['date_pr'], "date"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['position'], "text"),
                       GetSQLValueString($_POST['department'], "text"),
                       GetSQLValueString($_POST['images'], "text"),
                       GetSQLValueString($_POST['ip'], "text"),
                       GetSQLValueString($_POST['cpu'], "text"),
                       GetSQLValueString($_POST['mainboard'], "text"),
                       GetSQLValueString($_POST['ram'], "text"),
                       GetSQLValueString($_POST['vga'], "text"),
                       GetSQLValueString($_POST['harddisk'], "text"),
                       GetSQLValueString($_POST['optical_drive'], "text"),
                       GetSQLValueString($_POST['monitor'], "text"),
                       GetSQLValueString($_POST['mouse'], "text"),
                       GetSQLValueString($_POST['keyboard'], "text"),
                       GetSQLValueString($_POST['network'], "text"),
                       GetSQLValueString($_POST['os'], "text"),
                       GetSQLValueString($_POST['license'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_IT, $IT);
  $Result1 = mysql_query($updateSQL, $IT) or die(mysql_error());

  $updateGoTo = "inventory-admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Computer = "-1";
if (isset($_GET['id'])) {
  $colname_Computer = $_GET['id'];
}
mysql_select_db($database_IT, $IT);
$query_Computer = sprintf("SELECT * FROM table_computer WHERE id = %s", GetSQLValueString($colname_Computer, "int"));
$Computer = mysql_query($query_Computer, $IT) or die(mysql_error());
$row_Computer = mysql_fetch_assoc($Computer);
$totalRows_Computer = mysql_num_rows($Computer);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asset Computer</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
$(function() {
    $( "#datepicker" ).datepicker({dateFormat:'yy-mm-dd'});
  });
</script> 
</head>

<body bgcolor="#FFFFFF" background="images/1180422460.gif" text="#000000">

<table width="100%" border="0">
  <tr>
    <td width="4%" class="btn-success">&nbsp;</td>
    <td width="96%" height="49" class="btn-success"><img src="icon/chart.png" width="24" height="24"> &nbsp;<font size="+1">Asset Computer IT ( Edit )</font></td>
  </tr>
</table>
<p>
  <marquee bgcolor="#00a651" border="0" align="middle" scrollamount="2"  scrolldelay="90" behavior="scroll"  width="100%" height="20" style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 16">
    <strong>** Asset Inventory by IT Peace Resort ** <br>
    </strong>
  </marquee>
</p>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table width="100%" align="center">
    <tr valign="baseline">
      <td width="29%" height="39" align="right" nowrap><strong>ID :</strong></td>
      <td width="19%"><?php echo $row_Computer['id']; ?></td>
      <td width="52%">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td height="22" align="right" nowrap>&nbsp;</td>
      <td>Device ID :</td>
      <td>CPU :</td>
    </tr>
    <tr valign="baseline">
      <td height="34" align="right" nowrap>&nbsp;</td>
      <td><input type="text" name="device_id" value="<?php echo htmlentities($row_Computer['device_id'], ENT_COMPAT, ''); ?>" size="32"></td>
      <td><input type="text" name="cpu" value="<?php echo htmlentities($row_Computer['cpu'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td height="22" align="right" nowrap>&nbsp;</td>
      <td>Date PR :</td>
      <td>Mainboard :</td>
    </tr>
    <tr valign="baseline">
      <td height="35" align="right" nowrap>&nbsp;</td>
      <td><input type="text" name="date_pr" value="<?php echo htmlentities($row_Computer['date_pr'], ENT_COMPAT, ''); ?>" size="32"></td>
      <td><input type="text" name="mainboard" value="<?php echo htmlentities($row_Computer['mainboard'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td height="22" align="right" nowrap>&nbsp;</td>
      <td>Username :</td>
      <td>Ram :</td>
    </tr>
    <tr valign="baseline">
      <td height="37" align="right" nowrap>&nbsp;</td>
      <td><input type="text" name="username" value="<?php echo htmlentities($row_Computer['username'], ENT_COMPAT, ''); ?>" size="32"></td>
      <td><input type="text" name="ram" value="<?php echo htmlentities($row_Computer['ram'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td>Position :</td>
      <td>VGA :</td>
    </tr>
    <tr valign="baseline">
      <td height="34" align="right" nowrap>&nbsp;</td>
      <td><input type="text" name="position" value="<?php echo htmlentities($row_Computer['position'], ENT_COMPAT, ''); ?>" size="32"></td>
      <td><input type="text" name="vga" value="<?php echo htmlentities($row_Computer['vga'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td>Department :</td>
      <td>Harddisk :</td>
    </tr>
    <tr valign="baseline">
      <td height="33" align="right" nowrap>&nbsp;</td>
      <td><input type="text" name="department" value="<?php echo htmlentities($row_Computer['department'], ENT_COMPAT, ''); ?>" size="32"></td>
      <td><input type="text" name="harddisk" value="<?php echo htmlentities($row_Computer['harddisk'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td>IP :</td>
      <td>Optical drive :</td>
    </tr>
    <tr valign="baseline">
      <td height="33" align="right" nowrap>&nbsp;</td>
      <td><input type="text" name="ip" value="<?php echo htmlentities($row_Computer['ip'], ENT_COMPAT, ''); ?>" size="32"></td>
      <td><input type="text" name="optical_drive" value="<?php echo htmlentities($row_Computer['optical_drive'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td>Monitor :</td>
      <td>Mouse :</td>
    </tr>
    <tr valign="baseline">
      <td height="33" align="right" nowrap>&nbsp;</td>
      <td><input type="text" name="monitor" value="<?php echo htmlentities($row_Computer['monitor'], ENT_COMPAT, ''); ?>" size="32"></td>
      <td><input type="text" name="mouse" value="<?php echo htmlentities($row_Computer['mouse'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td>Network :</td>
      <td>Keyboard : </td>
    </tr>
    <tr valign="baseline">
      <td height="32" align="right" nowrap>&nbsp;</td>
      <td><input type="text" name="network" value="<?php echo htmlentities($row_Computer['network'], ENT_COMPAT, ''); ?>" size="32"></td>
      <td><input type="text" name="keyboard" value="<?php echo htmlentities($row_Computer['keyboard'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td>License :</td>
      <td>Os :</td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="text" name="license" value="<?php echo htmlentities($row_Computer['license'], ENT_COMPAT, ''); ?>" size="32"></td>
      <td><input type="text" name="os" value="<?php echo htmlentities($row_Computer['os'], ENT_COMPAT, ''); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" class="btn-success" value="Update record"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="id" value="<?php echo $row_Computer['id']; ?>">
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br/>
</p>
<p>
</p>
<p>&nbsp;</p>
<p>
<script src="js/bootstrap.min.js"></script>
</p>
</body>
</html>
<?php
mysql_free_result($Computer);
?>
