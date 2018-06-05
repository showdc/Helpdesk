<?php require_once('../../../Connections/IT.php'); ?>
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
  $updateSQL = sprintf("UPDATE table_printer SET device_id=%s, date_pr=%s, username=%s, `position`=%s, brand=%s, model=%s, department=%s, status=%s, images=%s WHERE id=%s",
                       GetSQLValueString($_POST['device_id'], "text"),
                       GetSQLValueString($_POST['date_pr'], "date"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['position'], "text"),
                       GetSQLValueString($_POST['brand'], "text"),
                       GetSQLValueString($_POST['model'], "text"),
                       GetSQLValueString($_POST['department'], "text"),
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['images'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_IT, $IT);
  $Result1 = mysql_query($updateSQL, $IT) or die(mysql_error());

  $updateGoTo = "../inventory-admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_PrinterEdit = "-1";
if (isset($_GET['id'])) {
  $colname_PrinterEdit = $_GET['id'];
}
mysql_select_db($database_IT, $IT);
$query_PrinterEdit = sprintf("SELECT * FROM table_printer WHERE id = %s", GetSQLValueString($colname_PrinterEdit, "int"));
$PrinterEdit = mysql_query($query_PrinterEdit, $IT) or die(mysql_error());
$row_PrinterEdit = mysql_fetch_assoc($PrinterEdit);
$totalRows_PrinterEdit = mysql_num_rows($PrinterEdit);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asset Printer</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
$(function() {
    $( "#datepicker" ).datepicker({dateFormat:'yy-mm-dd'});
  });
</script> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body bgcolor="#FFFFFF" background="../images/1180422460.gif" text="#000000">

<table width="100%" border="0">
  <tr>
    <td width="4%" class="btn-success">&nbsp;</td>
    <td width="96%" height="49" class="btn-success"><img src="icon/chart.png" width="24" height="24"> &nbsp;<font size="+1"> Asset Printer IT ( Edit )</font></td>
  </tr>
</table>
<p>
  <marquee bgcolor="#00a651" border="0" align="middle" scrollamount="2"  scrolldelay="90" behavior="scroll"  width="100%" height="20" style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 16">
    <strong>** Asset Inventory by IT Peace Resort ** </strong>
  </marquee>
</p>
<p>&nbsp;</p>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table width="683" align="center">
    <tr valign="baseline">
      <td height="38" colspan="4" align="center" nowrap><img src="../icon/pencil.png" width="32" height="32"> <strong>Edit Asset Printer</strong></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td width="133" align="right" nowrap>&nbsp;</td>
      <td width="226"><strong><img src="../icon/id_card.png" width="32" height="32"> Device ID :</strong></td>
      <td width="23">&nbsp;</td>
      <td width="397"><strong><img src="../icon/briefcase.png" width="32" height="32"> Brand:</strong></td>
    </tr>
    <tr valign="baseline">
      <td height="35" align="right" nowrap>&nbsp;</td>
      <td><input type="text" name="device_id" value="<?php echo htmlentities($row_PrinterEdit['device_id'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      <td>&nbsp;</td>
      <td><input type="text" name="brand" value="<?php echo htmlentities($row_PrinterEdit['brand'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><strong><img src="../icon/calendar.png" width="32" height="32"> Date PR :</strong></td>
      <td>&nbsp;</td>
      <td><strong><img src="../icon/newsletter.png" width="32" height="32"> Model :</strong></td>
    </tr>
    <tr valign="baseline">
      <td height="35" align="right" nowrap>&nbsp;</td>
      <td><input type="text" name="date_pr" value="<?php echo htmlentities($row_PrinterEdit['date_pr'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      <td>&nbsp;</td>
      <td><input type="text" name="model" value="<?php echo htmlentities($row_PrinterEdit['model'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><strong><img src="../icon/business_user.png" width="32" height="32"> Username :</strong></td>
      <td>&nbsp;</td>
      <td><strong><img src="../icon/home.png" width="32" height="32"> Department :</strong></td>
    </tr>
    <tr valign="baseline">
      <td height="36" align="right" nowrap>&nbsp;</td>
      <td><input type="text" name="username" value="<?php echo htmlentities($row_PrinterEdit['username'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      <td>&nbsp;</td>
      <td><input type="text" name="department" value="<?php echo htmlentities($row_PrinterEdit['department'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><strong><img src="../icon/dollar_currency_sign.png" width="32" height="32"> Position :</strong></td>
      <td>&nbsp;</td>
      <td><strong><img src="../icon/cut.png" width="32" height="32"> Status :</strong></td>
    </tr>
    <tr valign="baseline">
      <td height="32" align="right" nowrap>&nbsp;</td>
      <td><input type="text" name="position" value="<?php echo htmlentities($row_PrinterEdit['position'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
      <td>&nbsp;</td>
      <td><input type="text" name="status" value="<?php echo htmlentities($row_PrinterEdit['status'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" class="btn-success" value="Update record"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="id" value="<?php echo $row_PrinterEdit['id']; ?>">
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
mysql_free_result($PrinterEdit);
?>
