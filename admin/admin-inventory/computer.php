<?php require_once('../../Connections/IT.php'); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "computer")) {
  $insertSQL = sprintf("INSERT INTO table_computer (device_id, date_pr, username, `position`, department, images, ip, cpu, mainboard, ram, vga, harddisk, optical_drive, monitor, mouse, keyboard, network, os, license) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['device_id'], "text"),
                       GetSQLValueString($_POST['date_pr'], "date"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['position'], "text"),
                       GetSQLValueString($_POST['department'], "text"),
                       GetSQLValueString(dwUpload($_FILES['images']), "text"),
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
                       GetSQLValueString($_POST['license'], "text"));

  mysql_select_db($database_IT, $IT);
  $Result1 = mysql_query($insertSQL, $IT) or die(mysql_error());

  $insertGoTo = "inventory-admin.php";
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
    <td width="96%" height="49" class="btn-success"><img src="icon/chart.png" width="24" height="24"> &nbsp;<font size="+1">Asset Computer IT</font></td>
  </tr>
</table>
<p>
  <marquee bgcolor="#00a651" border="0" align="middle" scrollamount="2"  scrolldelay="90" behavior="scroll"  width="100%" height="20" style="font-family: Arial, Helvetica, sans-serif; color: #FFFFFF; font-size: 16">
    <strong>** Asset Inventory by IT Peace Resort ** <br>
    </strong>
  </marquee>
</p>
<form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="computer" >
<table width="100%" border="0" align="left">
  <tr>
    <td width="10%" height="49">&nbsp;</td>
    <td width="20%" align="center"><img src="icon/monitor.png" width="32" height="32"> <strong>Computer Asset</strong></td>
    <td width="20%" align="center"><strong><a href="inventory-admin.php"><img src="icon/back.png" width="32" height="32"> Back Home Page</a></strong></td>
    <td width="20%">&nbsp;</td>
    <td width="30%">&nbsp;</td>
  </tr>
  <tr>
    <td height="38">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="38">&nbsp;</td>
    <td align="center" class="btn-success"><strong>User informaton</strong></td>
    <td align="center" class="btn-success"><strong>Hardware information</strong></td>
    <td align="center" class="btn-success"><strong>Network information</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="38">&nbsp;</td>
    <td><img src="icon/id_card.png" width="32" height="32"> <strong>Device ID</strong></td>
    <td><img src="icon/star.png" width="32" height="32"> CPU</td>
    <td><strong><img src="icon/tag.png" width="32" height="32"> IP </strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="38">&nbsp;</td>
    <td><input type="text" name="device_id" id="textfield"></td>
    <td><select name="cpu" id="select2">
      <option>** Select **</option>
      <option>Intel Core i5 3570 @ 3.4 GHz</option>
      <option>intel Core i3 3220 @3.3 Ghz</option>
      <option>AMD Athlon II x2 250 @ 3.0 GHz</option>
      <option>Intel Core 2 Duo E7500  @ 2.9 GHz</option>
      <option>AMD Sempron SI 46 @2.1 GHz</option>
      <option>Intel Pentium E2140  @ 1.6 GHz</option>
      <option>Intel Pentiun E2160 @1.8 GHz</option>
      <option>Intel Xeon X3340 @ 2.5 GHz</option>
      <option>Intel Xeon 5148 @ 2.3 GHz</option>
      <option>Intel Celeron @ 2.7 GHz</option>
      <option>AMD Turion™ II Model Neo N54L</option>
      <option></option>
    </select></td>
    <td><strong>
      <input type="text" name="ip" id="textfield3">
    </strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="38">&nbsp;</td>
    <td><strong><img src="icon/calendar.png" width="32" height="32"> Date PR</strong></td>
    <td><img src="icon/settings.png" width="32" height="32"><strong> Mainboard</strong></td>
    <td><img src="icon/flag.png" width="32" height="32"><strong> Mouse</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td><input type="text" name="date_pr" id="datepicker" class="form-control"></td>
    <td><select name="mainboard" id="select3">
      <option>** Select **</option>
      <option>Lenovo Unspecified</option>
      <option>Asus P5KPL-AM</option>
      <option>Asus M5A78L-M LE</option>
      <option>PEGATRON 2AC2</option>
      <option>Asus P5G41T-M LX</option>
      <option>Asus P8H61-M LX</option>
      <option>Asustek VIA P4X600</option>
      <option>Acer EG43M</option>
      <option>Lenovo to be filled By O.E.M</option>
      <option>Asus P8H67-M Pro</option>
      <option>PEGATRON 2AD5</option>
      <option>FOXCONN 2A8C</option>
      <option>Asus P5GC-MX</option>
      <option>Dell 05XKKK</option>
      <option>Unspecified Unspecified</option>
      <option>MSI 0A90</option>
      <option>Asus P5KPL-AM</option>
      <option>Mobile Intel? HM55 Express</option>
      <option>Intel HM55</option>
      <option>Model Neo N54L</option>
    </select></td>
    <td><select name="mouse" id="select8">
      <option>** Select **</option>
      <option>None</option>
      <option>Lenovo</option>
      <option>Logitech</option>
      <option>HP</option>
      <option>Microsoft</option>
      <option>Acer</option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td><strong><img src="icon/users.png" width="32" height="32"> Username</strong></td>
    <td><strong><img src="icon/exclamination_mark.png" width="32" height="32"> Ram</strong></td>
    <td><img src="icon/euro_currency_sign.png" width="32" height="32"> <strong>Keyboard</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td><input type="text" name="username" id="username"></td>
    <td><select name="ram" id="select4">
      <option>** Select **</option>
      <option>Kingston 6 GB DDR3</option>
      <option>Kingston 4 GB DDR3</option>
      <option>Kingston 3 GB DDR3</option>
      <option>Kingston 2 GB DDR3</option>
      <option>Kingston 1 GB DDR3</option>
      <option>Kingston 16 GB</option>
      <option>2 GB DDR2 FB-DIMM</option>
      <option>512 MB DDR2</option>
      <option>4GB (1x4GB) UDIMM</option>
      <option></option>
    </select></td>
    <td><select name="keyboard" id="select9">
      <option>** Select **</option>
      <option>None</option>
      <option>Lenovo</option>
      <option>Logitech</option>
      <option>HP</option>
      <option>Microsoft</option>
      <option>Acer</option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td><img src="icon/business_user.png" width="32" height="32"><strong> Position</strong></td>
    <td><img src="icon/tools.png" width="32" height="32"> <strong>VGA</strong></td>
    <td><img src="icon/network.png" width="32" height="32"> <strong>Network adapter</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td><input type="text" name="position" id="textfield2"></td>
    <td><select name="vga" id="select">
    <option>** select **</option>
    <option>AMD Redeon HD 7450</option>
    <option>NVIDIA Geforce GT 630</option>
    <option>ATI Radeon HD 3200</option>
    <option>ATI Mobility Radeon HD 5470</option>
    <option>ATI Radeon HD4500</option>
    <option>On Board</option>
    <option></option>
    <option></option>
    <option></option>
    <option></option>
    <option></option>
    </select>    
    </td>
    <td><select name="network" id="select10">
      <option>** Select **</option>
      <option>On Board</option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td><strong><img src="icon/home.png" width="32" height="32"> Department</strong></td>
    <td><img src="icon/database.png" width="32" height="32"><strong> Harddisk</strong></td>
    <td><img src="icon/world.png" width="32" height="32"> <strong>Operting System</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td><select name="department" id="department">
      <option>** Select **</option>
      <option>Administrator</option>
      <option>Accounting</option>
      <option>Front Office</option>
      <option>Food & Beverage</option>
      <option>Engineering</option>
      <option>Human resource</option>
      <option>Housekeeping</option>
      <option>Laundry</option>
      <option>Main Kitchen</option>
      <option>Purchasing</option>
      <option>Sales</option>
      <option>Reservation</option>
    </select></td>
    <td><select name="harddisk" id="select5">
      <option>** Select **</option>
      <option>Seagate 1 TB </option>
      <option>Seagate 750 GB </option>
      <option>Seagate 500 GB </option>
      <option>Seagate 320 GB</option>
      <option>Seagate 250 GB</option>
      <option>Seagate 160 GB </option>
      <option>Seagate 80 GB</option>
      <option>HITACHI 1 TB </option>
      <option>HITACHI 250 GB</option>
      <option>HITACHI 150 GB </option>
      <option>Western Digital 1 TB </option>
      <option>Western Digital 160 GB </option>
      <option>Dell PERC H700 SCSI 599 GB</option>
      <option>HP Logical SCSI 294 GB</option>
      <option>Supports up to (4) LFF SATA </option>
    </select></td>
    <td><select name="os" id="select11">
      <option>** Select **</option>
      <option>Linux</option>
      <option>Windows 8</option>
      <option>Windows 7</option>
      <option>Windows XP</option>
      <option>Windows Server 2003</option>
      <option>Free BSD</option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td><img src="icon/attachment.png" width="32" height="32"> <strong>Picture</strong></td>
    <td><strong><img src="icon/briefcase.png" width="32" height="32"> Optical drive</strong></td>
    <td><img src="icon/dollar_currency_sign.png" width="32" height="32"><strong> License</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td><input type="file" name="images" id="fileField"></td>
    <td><select name="optical_drive" id="select6">
      <option>** Select **</option>
      <option>HL-DT-ST DVD GH82N</option>
      <option>ASUS CB-5216A</option>
      <option>Samsung CDDVDW TS-H653G</option>
      <option>Packard DVD-RAM GH80N</option>
      <option>TOHIBA-SAMSUNG CDDVD-SH</option>
      <option>Packard DVD A GH16ACSHR</option>
      <option>CDDVDW TS-L633M</option>
      <option>Asus DRW-24B3ST</option>
      <option>Delux CDW/DVD SH-M522C</option>
      <option>PLDS DVD+RW DS-8A5SH</option>
      <option>TOCHIBA-SAMSUNG CD-ROM</option>
      <option>HL-DT-ST DVD GSA-H60L</option>
    </select></td>
    <td><select name="license" id="select12">
      <option>** Select **</option>
      <option>Yes</option>
      <option>No</option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td>&nbsp;</td>
    <td><img src="icon/monitor.png" width="32" height="32"> <strong>Monitor</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><select name="monitor" id="select7">
      <option>** Select **</option>
      <option>None</option>
      <option>Lenovo LEN D186wa  19"</option>
      <option>Lenovo G4  14"</option>
      <option>Packard HP W2072B  20"</option>
      <option>BEN Q T52W  15"</option>
      <option>Samsung Syn 17"</option>
      <option>Samaung SME1920  19"</option>
      <option>Samsung SA300  19"</option>
      <option>Philips 19"</option>
      <option>Acer X193HQ - 19"</option>
      <option>Compaqq S2021  20"</option>
      <option>Samsung SA300/SA350  19"</option>
      <option>View Sonic VA1703WB-2  17"</option>
      <option>Samsung SyncMaster   20"</option>
      <option>14 inch WXGA (1366x768) LED</option>
      <option>14″ (1366*768)</option>
    </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><input name="button" type="submit" class="btn-success" id="button" value="Save !"></td>
    <td><input name="button2" type="reset" class="btn-danger" id="button2" value="Cancel"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="39">&nbsp;</td>
    <td colspan="3" class="btn-success">&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
</table>
<input type="hidden" name="MM_insert" value="computer">
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