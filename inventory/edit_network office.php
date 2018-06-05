<?php require_once('../Connections/IT.php'); ?>
<?php require_once('../Connections/it.php'); ?>
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
  $updateSQL = sprintf("UPDATE network_office SET device_id=%s, date_pr=%s, localtion=%s, brand=%s, model=%s, status=%s WHERE id=%s",
                       GetSQLValueString($_POST['device_id'], "text"),
                       GetSQLValueString($_POST['date_pr'], "date"),
                       GetSQLValueString($_POST['localtion'], "text"),
                       GetSQLValueString($_POST['brand'], "text"),
                       GetSQLValueString($_POST['model'], "text"),
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_IT, $IT);
  $Result1 = mysql_query($updateSQL, $IT) or die(mysql_error());

  $updateGoTo = "inventory_index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_EOF = "-1";
if (isset($_GET['id'])) {
  $colname_EOF = $_GET['id'];
}
mysql_select_db($database_IT, $IT);
$query_EOF = sprintf("SELECT * FROM network_office WHERE id = %s", GetSQLValueString($colname_EOF, "int"));
$EOF = mysql_query($query_EOF, $IT) or die(mysql_error());
$row_EOF = mysql_fetch_assoc($EOF);
$totalRows_EOF = mysql_num_rows($EOF);

$currentPage = $_SERVER["PHP_SELF"];

$queryString_PC = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_PC") == false && 
        stristr($param, "totalRows_PC") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_PC = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_PC = sprintf("&totalRows_PC=%d%s", $totalRows_PC, $queryString_PC);

$queryString_Printer = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Printer") == false && 
        stristr($param, "totalRows_Printer") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Printer = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Printer = sprintf("&totalRows_Printer=%d%s", $totalRows_Printer, $queryString_Printer);

$queryString_Office = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Office") == false && 
        stristr($param, "totalRows_Office") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Office = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Office = sprintf("&totalRows_Office=%d%s", $totalRows_Office, $queryString_Office);

$queryString_WiFi = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_WiFi") == false && 
        stristr($param, "totalRows_WiFi") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_WiFi = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_WiFi = sprintf("&totalRows_WiFi=%d%s", $totalRows_WiFi, $queryString_WiFi);
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="product" content="Metro UI CSS Framework">
<meta name="keywords" content="Metro, UI, CSS, Framework, jquery">
<meta name="description" content="Simple responsive css framework">
<title>Edit :: Network Office</title>

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

<body background="images/1180422460.gif">

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
            <a class="brand" href="#">IT HelpDesk :: Edit Inventory</a>
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li><a href="inventory.php"><i class="icon-home"></i>&nbsp;</a></li>
                <li><a href="add_computer.php"><i class="icon-off"></i></a></li>
                <li><a href="add_printer.php"><i class="icon-print"></i>&nbsp;</a></li>
                <li><a href="add_network_wifi.php"><i class="icon-hdd"></i></a></li>
                <li><a href="add_netwok_office.php"><i class="icon-hdd"></i>&nbsp;</a></li>
                <li><i class="icon-user"></i></li>
              </ul>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
      </div>

      <p>
    <!-- Begin page content -->
      
<?
  date_default_timezone_set("Asia/Bangkok");
 
    $date = date("d-m-Y");
    $time = date("H:i");
    ?>
<p>
<table width="100%" border="0">
  <tr>
    <td width="300" height="109" align="left"><img src="../images/helpdesk logo.png" width="300" height="72"></td>
    <td width="678" align="center"><strong><img src="http://www.ufocool.com/images/flag/thailand.gif">&nbsp;&nbsp;Welcome to Inventory System&nbsp;&nbsp;<img src="http://www.ufocool.com/images/flag/thailand.gif"></strong></td>
    <td width="361" align="center"><strong>
      <button type="button" class="btn btn-success"><i class="icon-calendar"></i>&nbsp;Date :: Time : <?php echo $date."&nbsp;/&nbsp;".$time;?></strong></button></td>
  </tr>
</table>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
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
    <script src="assets/js/bootstrap-typeahead.js"></script></p>
      <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
        <table align="center">
          <tr valign="baseline">
            <td height="33" align="left" nowrap><span class="label label-success"><strong>Update Inventory</strong></span>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr valign="baseline">
            <td height="31" align="left" nowrap>Device : ID</td>
            <td>Brand</td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="left"><input type="text" name="device_id" value="<?php echo htmlentities($row_EOF['device_id'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            <td><input type="text" name="brand" value="<?php echo htmlentities($row_EOF['brand'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td height="31" align="left" nowrap>Date : PR</td>
            <td>Model</td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="left"><input type="text" name="date_pr" value="<?php echo htmlentities($row_EOF['date_pr'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            <td><input type="text" name="model" value="<?php echo htmlentities($row_EOF['model'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td height="31" align="left" nowrap>Localtion</td>
            <td>Status</td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="left"><input type="text" name="localtion" value="<?php echo htmlentities($row_EOF['localtion'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            <td><input type="text" name="status" value="<?php echo htmlentities($row_EOF['status'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr valign="baseline">
            <td colspan="2" align="left" nowrap>
            <button type="submit" class="btn btn-success"><i class="icon-upload"></i>&nbsp;Save&nbsp;</button>
            <a href="inventory_index.php"><button type="button" class="btn btn-danger"><i class="icon-remove"></i>&nbsp;Cancel</button></a>
            </td>
          </tr>
        </table>
        <input type="hidden" name="MM_update" value="form1">
        <input type="hidden" name="id" value="<?php echo $row_EOF['id']; ?>">
</form>
      <p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($EOF);
?>
