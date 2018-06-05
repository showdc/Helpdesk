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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "computer")) {
  $insertSQL = sprintf("INSERT INTO table_computer (device_id, date_pr, username, `position`, department, ip, cpu, mainboard, ram, vga, harddisk, optical_drive, monitor, mouse, keyboard, network, os, license) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['device_id'], "text"),
                       GetSQLValueString($_POST['date_pr'], "date"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['position'], "text"),
                       GetSQLValueString($_POST['department'], "text"),
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

  $insertGoTo = "inventory_index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="product" content="Metro UI CSS Framework">
<meta name="keywords" content="Metro, UI, CSS, Framework, jquery">
<meta name="description" content="Simple responsive css framework">
<title>:: Add Computer</title>
</script>
<link rel="stylesheet" href="../css/jquery-ui.css">
<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/jquery-ui.js"></script>
<script>
$(function() {
    $( "#datepicker" ).datepicker({dateFormat:'yy-mm-dd'});
  });
</script>
<!-- CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">

      /* Sticky footer styles
      -------------------------------------------------- */

      html,
      body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 60px;
      }
      #footer {
        background-color: #f5f5f5;
      }

      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }



      /* Custom page CSS
      -------------------------------------------------- */
      /* Not required for template or sticky footer method. */

      #wrap > .container {
        padding-top: 60px;
      }
      .container .credit {
        margin: 20px 0;
      }

      code {
        font-size: 80%;
      }

    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
  </head>

<body background="../images/1180422460.gif">

 <!-- Part 1: Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li><a href="inventory_index.php"><i class="icon-home"></i>&nbsp;Home</a></li>
                <li><a href="add_computer.php"><i class="icon-off"></i>&nbsp;Add Computer</a></li>
                <li><a href="add_printer.php"><i class="icon-print"></i>&nbsp;Add Printer</a></li>
                <li><a href="add_network_wifi.php"><i class="icon-hdd"></i>&nbsp;Add Network WiFi</a></li>
                <li><a href="add_netwok_office.php"><i class="icon-hdd"></i>&nbsp;Add Network Office</a></li>
                 </ul>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
      </div>
      <p><br> 
      </p>
      <?
 date_default_timezone_set("Asia/Bangkok");
    $date = date("d-m-Y");
    $time = date("H:i");
    ?>
      <p>
      <table width="100%" border="0">
      <tr>
    <td width="300" height="109" align="left"><img src="../images/helpdesk logo.png" width="300" height="72"></td>
    <td width="678" align="center"><strong><img src="http://www.ufocool.com/images/flag/thailand.gif">&nbsp;&nbsp; Add your computer informetion&nbsp;&nbsp;<img src="http://www.ufocool.com/images/flag/thailand.gif"></strong></td>
    <td width="361" align="center"><strong><button type="button" class="btn btn-success"><i class="icon-calendar"></i>&nbsp;Date :: Time : <?php echo $date."&nbsp;/&nbsp;".$time;?></strong></button></td>
  </tr>
</table>
<form action="<?php echo $editFormAction; ?>" method="POST" name="computer" >
  <table width="61%" border="0" align="center">
  <tr>
    </tr>
  <tr>
    <td width="20%" height="38"><strong><i class="icon-picture"></i>&nbsp;Device ID</strong></td>
    <td width="20%"> <strong><i class="icon-leaf"></i>&nbsp;CPU</strong></td>
    <td width="20%"><strong><i class="icon-globe"></i>&nbsp; IP </strong></td>
  </tr>
  <tr>
    <td height="38"><input type="text" name="device_id" id="textfield"></td>
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
    </tr>
  <tr>
    <td height="38"><strong><i class="icon-calendar"></i>&nbsp; Date PR</strong></td>
    <td><strong><i class="icon-list-alt"></i>&nbsp; Mainboard</strong></td>
    <td><strong> <i class="icon-plane"></i>&nbsp;Mouse</strong></td>
    </tr>
  <tr>
    <td height="31"><input type="text" name="date_pr" id="datepicker" class="form-control"></td>
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
    </tr>
  <tr>
    <td height="32"><strong><i class="icon-user"></i>&nbsp; Username</strong></td>
    <td><strong> <i class="icon-tasks"></i>&nbsp;Ram</strong></td>
    <td><strong><i class="icon-list"></i>&nbsp;Keyboard</strong></td>
    </tr>
  <tr>
    <td height="32"><input type="text" name="username" id="username"></td>
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
    </tr>
  <tr>
    <td height="29"><strong><i class="icon-star"></i>&nbsp; Position</strong></td>
    <td><strong><i class="icon-facetime-video"></i>&nbsp;VGA</strong></td>
    <td><strong><i class="icon-random"></i>&nbsp;Network adapter</strong></td>
    </tr>
  <tr>
    <td height="32"><input type="text" name="position" id="textfield2"></td>
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
    </tr>
  <tr>
    <td height="31"><strong><i class="icon-home"></i>&nbsp; Department</strong></td>
    <td><strong> <i class="icon-hdd"></i>&nbsp;Harddisk</strong></td>
    <td><strong><i class="icon-cog"></i>&nbsp;Operting System</strong></td>
    </tr>
  <tr>
    <td height="32"><select name="department" id="department">
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
    </tr>
  <tr>
    <td height="31"><strong><i class="icon-th"></i>&nbsp;Monitor</strong></td>
    <td><strong> <i class="icon-hdd"></i>&nbsp;Optical drive</strong></td>
    <td><strong> <i class="icon-shopping-cart"></i>&nbsp;License</strong></td>
    </tr>
  <tr>
    <td height="31"><select name="monitor" id="select7">
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
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="left"><button name="button" type="submit" class="btn btn-success" id="button" ><i class="icon-check"></i>&nbsp;&nbsp;Save!&nbsp;&nbsp;</button>      <button name="button2" type="reset" class="btn btn-danger" id="button2"><i class="icon-remove"></i>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button></td>
    </tr>
</table>
  <input type="hidden" name="MM_insert" value="computer">
</form>

<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
</body>
</html>