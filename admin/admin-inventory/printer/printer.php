<?php require_once('../../../Connections/IT.php'); ?>
<?php include("dw-upload.inc.php"); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "printer")) {
  $insertSQL = sprintf("INSERT INTO table_printer (device_id, date_pr, username, `position`, brand, model, department, status, images) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['device_id'], "text"),
                       GetSQLValueString($_POST['date_pr'], "date"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['position'], "text"),
                       GetSQLValueString($_POST['brand'], "text"),
                       GetSQLValueString($_POST['model'], "text"),
                       GetSQLValueString($_POST['department'], "text"),
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString(dwUpload($_FILES['images']), "text"));

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
    <td width="96%" height="49" class="btn-success"><img src="icon/chart.png" width="24" height="24"> &nbsp;<font size="+1"> Asset Printer IT</font></td>
  </tr>
</table>
<p>
  <marquee bgcolor="#00a651" border="0" align="middle" scrollamount="2"  scrolldelay="90" behavior="scroll"  width="100%" height="20" style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 16">
    <strong>** Asset Inventory by IT Peace Resort ** </strong>
  </marquee>
</p>
<form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="printer">
<table width="100%" border="0">
  <tr>
    <td height="41" rowspan="2">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="27%" height="41">&nbsp;</td>
    <td width="24%" align="left"><strong><a href="../inventory-admin.php"><img src="icon/back.png" width="32" height="32"> Back Home Page</a></strong></td>
    <td width="24%">&nbsp;</td>
    <td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td height="37">&nbsp;</td>
    <td colspan="2" align="center" class="btn-success"><strong><img src="icon/printer.png" width="32" height="32"> Printer</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="42">&nbsp;</td>
    <td> <img src="icon/id_card.png" width="32" height="32"> <strong>Device ID</strong></td>
    <td><img src="icon/briefcase.png" width="32" height="32"> <strong>Brand</strong></td>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td height="34">&nbsp;</td>
    <td><input type="text" name="device_id" id="textfield"></td>
    <td><select name="brand" id="select">
      <option>Select</option>
      <option>Epson</option>
      <option>Canon</option>
      <option>HP</option>
      <option>Brother</option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="44">&nbsp;</td>
    <td> <img src="icon/calendar.png" width="32" height="32"> <strong>Date PR</strong></td>
    <td><img src="icon/euro_currency_sign.png" width="32" height="32"> <strong>Model</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="35">&nbsp;</td>
    <td><input type="text" name="date_pr" id="datepicker"></td>
    <td><select name="model" id="select2">
      <option>** Select **</option>
      <option>HP Leserjet p1102</option>
      <option>HP Leserjet M1319</option>
      <option>HP Leserjet p1006</option>
      <option>HP LASERJET P1101</option>
      <option>HP LASERJET P2015</option>
      <option>Epson L210</option>
      <option>Brother MFC-6910</option>
      <option>Brother MFC 7380</option>
      <option>Canon PIXMA</option>
      <option>Epson TM U220</option>
      <option></option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td><img src="../icon/users.png" width="32" height="32"> <strong>Username</strong></td>
    <td><img src="icon/newsletter.png" width="32" height="32"> <strong>Status</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="text" name="username" id="textfield2"></td>
    <td><select name="status" id="select4">
      <option>** Select **</option>
      <option>Working</option>
      <option>Retest</option>
      <option>Repair</option>
      <option>Rejected</option>
      <option></option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="22">&nbsp;</td>
    <td><img src="../icon/business_user.png" width="32" height="32"> <strong>Position</strong></td>
    <td><img src="../icon/printer.png" width="32" height="32"> <strong>Images</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="text" name="position" id="textfield3"></td>
    <td><input type="file" name="images" id="fileField"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="43">&nbsp;</td>
    <td><img src="icon/home.png" width="32" height="32"> <strong>Department</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><select name="department" id="select3">
      <option>** Select **</option>
      <option>Administrator</option>
      <option>Accouting</option>
      <option>Engineering</option>
      <option>F & B</option>
      <option>Front Office</option>
      <option>HR</option>
      <option>HK</option>
      <option>Purchasing</option>
      <option>Main Kitchen</option>
      <option>Reservation</option>
      <option>Seles</option>
    </select></td>
    <td><input type="submit" name="button" id="button" value="Save !" align="right">
      <input type="reset" name="button2" id="button2" value="Cancel"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="39">&nbsp;</td>
    <td colspan="2" class="btn-success">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<input type="hidden" name="MM_insert" value="printer">
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