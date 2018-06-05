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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "network_office")) {
  $insertSQL = sprintf("INSERT INTO network_wifi (device_id, date_pr, localtion, brand, model, status) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['device_id'], "text"),
                       GetSQLValueString($_POST['date_pr'], "date"),
                       GetSQLValueString($_POST['localtion'], "text"),
                       GetSQLValueString($_POST['brand'], "text"),
                       GetSQLValueString($_POST['model'], "text"),
                       GetSQLValueString($_POST['status'], "text"));

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
    <title>Network WiFi</title>
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

      html,  body {
	height: 100%;/* The html and body elements cannot have any padding or margin. */
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
      #push,  #footer {
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
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
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
      </div>
          <!--/.nav-collapse --> 
        </div>
  </div>
    </div>

<!-- Begin page content --> 

<br>
<?
 date_default_timezone_set("Asia/Bangkok");
    $date = date("d-m-Y");
    $time = date("H:i");
    ?>
<p>
    <table width="100%" border="0">
      <tr>
        <td width="300" height="109" align="left"><img src="../images/helpdesk logo.png" width="300" height="72"></td>
        <td width="678" align="center"><strong><img src="http://www.ufocool.com/images/flag/thailand.gif">&nbsp;&nbsp; Add your Network WiFi informetion&nbsp;&nbsp;<img src="http://www.ufocool.com/images/flag/thailand.gif"></strong></td>
        <td width="361" align="center"><strong>
          <button type="button" class="btn btn-success"><i class="icon-calendar"></i>&nbsp;Date :: Time : <?php echo $date."&nbsp;/&nbsp;".$time;?></strong></button></td>
      </tr>
    </table>
<form action="<?php echo $editFormAction; ?>" method="POST" name="network_office">
      <table width="50%" border="0" align="center">
    <tr></td>
        </tr>
    <tr>
          <td width="49%" height="33"><strong> <i class="icon-picture"></i>&nbsp;Device ID</strong></td>
          <td width="51%"><strong> <i class="icon-info-sign"></i>&nbsp;Brand</strong></td>
        </tr>
    <tr>
          <td height="52"><input type="text" name="device_id" id="textfield2"></td>
          <td><select name="brand" id="select2">
              <option>** Select **</option>
              <option>Cisco</option>
              <option>D-Link</option>
              <option>HP</option>
            </select></td>
        </tr>
    <tr>
          <td height="31"><strong> <i class="icon-calendar"></i>&nbsp;Date PR</strong></td>
          <td><strong> <i class="icon-th-list"></i>&nbsp;Model</strong></td>
        </tr>
    <tr>
          <td height="35"><input type="text" name="date_pr" id="datepicker"></td>
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
          <td height="37"><strong> <i class="icon-home"></i>&nbsp;Localtion</strong></td>
          <td><strong> <i class="icon-time"></i>&nbsp;Status</strong></td>
        </tr>
    <tr>
          <td><select name="localtion" id="select">
              <option>** Select **</option>
              <option>Room 112</option>
              <option>Room 153</option>
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
        </tr>
    <tr>
          <td colspan="2" align="left"><button name="button" type="submit" class="btn btn-success" id="button" ><i class="icon-check"></i>&nbsp;&nbsp;Save!&nbsp;&nbsp;</button>
        <button name="button2" type="reset" class="btn btn-danger" id="button2"><i class="icon-remove"></i>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button></td>
        </tr>
  </table>
      <input type="hidden" name="MM_insert" value="network_office">
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