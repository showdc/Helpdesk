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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "network_office")) {
  $insertSQL = sprintf("INSERT INTO ``table_network office`` (device_id, date_pr, localtion, brand, model, status) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['device_id'], "text"),
                       GetSQLValueString($_POST['date_pr'], "date"),
                       GetSQLValueString($_POST['localtion'], "text"),
                       GetSQLValueString($_POST['brand'], "text"),
                       GetSQLValueString($_POST['model'], "text"),
                       GetSQLValueString($_POST['status'], "text"));

  mysql_select_db($database_IT, $IT);
  $Result1 = mysql_query($insertSQL, $IT) or die(mysql_error());

  $insertGoTo = "../inventory-admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Network Office</title>

    <!-- Bootstrap -->
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

<body bgcolor="#FFFFFF" background="../images/1180422460.gif" text="#000000">

<table width="100%" border="0">
  <tr>
    <td width="4%" class="btn-success">&nbsp;</td>
    <td width="96%" height="49" class="btn-success"><img src="icon/chart.png" width="24" height="24"> &nbsp;<strong>Network Office Asset </strong></td>
  </tr>
</table>
<p>
  <marquee bgcolor="#00a651" border="0" align="middle" scrollamount="2"  scrolldelay="90" behavior="scroll"  width="100%" height="20" style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 16">
    <strong>** Asset Inventory by IT Peace Resort ** </strong>
  </marquee>
</p>
<form action="<?php echo $editFormAction; ?>" method="POST" name="network_office">
  <table width="100%" border="0">
    <tr>
      <td>&nbsp;</td>
      <td align="center" class="btn-info"><strong><img src="icon/network.png" width="32" height="32"> Network Office</strong></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><a href="../inventory-admin.php"><img src="icon/back.png" width="32" height="32"> กลับหน้าหลัก</a></strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="9%">&nbsp;</td>
      <td width="22%">&nbsp;</td>
      <td width="69%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong><img src="icon/id_card.png" width="32" height="32"> Device ID</strong></td>
      <td> <strong><img src="icon/briefcase.png" width="32" height="32"> Brand</strong></td>
    </tr>
    <tr>
      <td height="40">&nbsp;</td>
      <td><input type="text" name="device_id" id="textfield2"></td>
      <td><select name="brand" id="select2">
      <option>** Select **</option>
      <option>Cisco</option>
      <option>D-Link</option>
      <option>HP</option>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong><img src="icon/calendar.png" width="32" height="32"> Date PR</strong></td>
      <td><strong><img src="icon/euro_currency_sign.png" width="32" height="32"> Model</strong></td>
    </tr>
    <tr>
      <td height="35">&nbsp;</td>
      <td><input type="text" name="date_pr" id="datepicker"></td>
      <td><select name="model" id="select3">
      <option>** Select **</option>
      <option>hp procurve v1910-24g</option>
      <option>Cisco SG200-26P 26-port</option>
      <option>Switch D-link 16 port
      <option>Hub D-link 8 port</option>
      <option>Hub D-link 5 port</option>
      <option>Hub D-link 4 port</option>
      <option></option>
      </select></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td><strong><img src="icon/home.png" width="32" height="32"> Localtion</strong></td>
      <td><strong><img src="icon/newsletter.png" width="32" height="32"> Status</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><select name="localtion" id="select">
      <option>** Select **</option>
      <option>Administrator</option>
      <option>Accounting</option>
      <option>Front Office</option>
      <option>Food & Beverage</option>
      <option>Engineering</option>
      <option>Human resource</option>
      <option>Housekeeping</option>
      <option>Main Kitchen</option>
      <option>Canteen</option>
      <option>MA Room</option>
      <option>Server Room</option>
      <option>Seawrap Restaurant</option>
      </select></td>
      <td><select name="status" id="select4">
      <option>** Select **</option>
      <option>Working</option>
      <option>Retest</option>
      <option>Repair</option>
      <option>Rejected</option>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Save !"> &nbsp;
      <input type="reset" name="button2" id="button2" value="Cancel"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="network_office">
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br/>
</p>
<form name="login_sys" method="post">
  <label for="textfield"></label>
</form>
<p>
  <script src="js/jquery-1.10.2.min.js"></script>
</p>
<p>&nbsp;</p>
<p>
  <script src="js/bootstrap.min.js"></script>
</p>
</body>
</html>