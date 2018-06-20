<?php require_once('../Connections/IT.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../inventory.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
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

$maxRows_PC = 10;
$pageNum_PC = 0;
if (isset($_GET['pageNum_PC'])) {
  $pageNum_PC = $_GET['pageNum_PC'];
}
$startRow_PC = $pageNum_PC * $maxRows_PC;

mysql_select_db($database_IT, $IT);
$query_PC = "SELECT * FROM table_computer";
$query_limit_PC = sprintf("%s LIMIT %d, %d", $query_PC, $startRow_PC, $maxRows_PC);
$PC = mysql_query($query_limit_PC, $IT) or die(mysql_error());
$row_PC = mysql_fetch_assoc($PC);

if (isset($_GET['totalRows_PC'])) {
  $totalRows_PC = $_GET['totalRows_PC'];
} else {
  $all_PC = mysql_query($query_PC);
  $totalRows_PC = mysql_num_rows($all_PC);
}
$totalPages_PC = ceil($totalRows_PC/$maxRows_PC)-1;

$maxRows_PR = 10;
$pageNum_PR = 0;
if (isset($_GET['pageNum_PR'])) {
  $pageNum_PR = $_GET['pageNum_PR'];
}
$startRow_PR = $pageNum_PR * $maxRows_PR;

mysql_select_db($database_IT, $IT);
$query_PR = "SELECT * FROM table_printer";
$query_limit_PR = sprintf("%s LIMIT %d, %d", $query_PR, $startRow_PR, $maxRows_PR);
$PR = mysql_query($query_limit_PR, $IT) or die(mysql_error());
$row_PR = mysql_fetch_assoc($PR);

if (isset($_GET['totalRows_PR'])) {
  $totalRows_PR = $_GET['totalRows_PR'];
} else {
  $all_PR = mysql_query($query_PR);
  $totalRows_PR = mysql_num_rows($all_PR);
}
$totalPages_PR = ceil($totalRows_PR/$maxRows_PR)-1;

$maxRows_OF = 5;
$pageNum_OF = 0;
if (isset($_GET['pageNum_OF'])) {
  $pageNum_OF = $_GET['pageNum_OF'];
}
$startRow_OF = $pageNum_OF * $maxRows_OF;

mysql_select_db($database_IT, $IT);
$query_OF = "SELECT * FROM network_office";
$query_limit_OF = sprintf("%s LIMIT %d, %d", $query_OF, $startRow_OF, $maxRows_OF);
$OF = mysql_query($query_limit_OF, $IT) or die(mysql_error());
$row_OF = mysql_fetch_assoc($OF);

if (isset($_GET['totalRows_OF'])) {
  $totalRows_OF = $_GET['totalRows_OF'];
} else {
  $all_OF = mysql_query($query_OF);
  $totalRows_OF = mysql_num_rows($all_OF);
}
$totalPages_OF = ceil($totalRows_OF/$maxRows_OF)-1;

$maxRows_WF = 5;
$pageNum_WF = 0;
if (isset($_GET['pageNum_WF'])) {
  $pageNum_WF = $_GET['pageNum_WF'];
}
$startRow_WF = $pageNum_WF * $maxRows_WF;

mysql_select_db($database_IT, $IT);
$query_WF = "SELECT * FROM network_wifi";
$query_limit_WF = sprintf("%s LIMIT %d, %d", $query_WF, $startRow_WF, $maxRows_WF);
$WF = mysql_query($query_limit_WF, $IT) or die(mysql_error());
$row_WF = mysql_fetch_assoc($WF);

if (isset($_GET['totalRows_WF'])) {
  $totalRows_WF = $_GET['totalRows_WF'];
} else {
  $all_WF = mysql_query($query_WF);
  $totalRows_WF = mysql_num_rows($all_WF);
}
$totalPages_WF = ceil($totalRows_WF/$maxRows_WF)-1;

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

$queryString_WF = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_WF") == false && 
        stristr($param, "totalRows_WF") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_WF = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_WF = sprintf("&totalRows_WF=%d%s", $totalRows_WF, $queryString_WF);

$queryString_PR = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_PR") == false && 
        stristr($param, "totalRows_PR") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_PR = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_PR = sprintf("&totalRows_PR=%d%s", $totalRows_PR, $queryString_PR);

$currentPage = $_SERVER["PHP_SELF"];

$queryString_Computer = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Computer") == false && 
        stristr($param, "totalRows_Computer") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Computer = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Computer = sprintf("&totalRows_Computer=%d%s", $totalRows_Computer, $queryString_Computer);

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

$currentPage = $_SERVER["PHP_SELF"];

$queryString_MA = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_MA") == false && 
        stristr($param, "totalRows_MA") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_MA = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_MA = sprintf("&totalRows_MA=%d%s", $totalRows_MA, $queryString_MA);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>:: Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<script type="text/javascript">

function Nxtpage(){
	
var r=confirm ('Are you sure?');

if(r==true){
	
	window.localtion="admin_index.php";
	}
	else{
		
		return false;
		}	
}
</script>
<!-- Le styles -->
<link href="assets/css/bootstrap.css" rel="stylesheet">
<style type="text/css">
/* Sticky footer styles
      -------------------------------------------------- */

      html, body {
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
      #push, #footer {
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<body background="images/1180422460.gif">

<!-- Part 1: Wrap all page content here -->
<div id="wrap">

<!-- Fixed navbar -->
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="brand" href="#">IT Helpdesk</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li><a href="inventory_index.php"><i class="icon-home"></i>&nbsp;Home</a></li>
          <li><a href="add_computer.php"><i class="icon-file"></i>&nbsp;Add Computer</a></li>
          <li><a href="add_printer.php"><i class="icon-print"></i>&nbsp;Add Printer</a></li>
          <li><a href="add_netwok_office.php"><i class="icon-hdd"></i>&nbsp;Add Network Office</a></li>
          <li><a href="add_network_wifi.php"><i class="icon-hdd"></i>&nbsp;Add Network WiFi</a></li>
          <li><a href="<?php echo $logoutAction ?>"><i class="icon-user"></i>&nbsp;Logout</a></li>
        </ul>
        </li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
  </div>
</div>
<p><br>
<p align="center"></p>
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
    <td width="678" align="center"><strong><img src="http://www.ufocool.com/images/flag/thailand.gif">&nbsp;&nbsp;Welcome to Inventory System&nbsp;&nbsp;<img src="http://www.ufocool.com/images/flag/thailand.gif"></strong></td>
    <td width="361" align="center"><strong>
      <button type="button" class="btn btn-success"><i class="icon-calendar"></i>&nbsp;Date :: Time : <?php echo $date."&nbsp;/&nbsp;".$time;?></strong></button></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="49%" height="46" align="center" class="btn-success"><strong> <i class="icon-tags"></i>&nbsp;Computer Inventory total <?php echo $totalRows_PC ?>&nbsp;Records</strong></td>
    <td width="1%">&nbsp;</td>
    <td width="50%" align="center" class="btn-success"><strong> <i class="icon-tags"></i>&nbsp; Printer Inventory total <?php echo $totalRows_PR ?> &nbsp;Records</strong></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" class="table table-bordered">
        <tr class="btn-success">
          <td width="21%"><strong><i class="icon-file"></i>&nbsp;Device :: ID</strong></td>
          <td width="40%"><strong><i class="icon-user"></i>&nbsp;Username</strong></td>
          <td colspan="3"><strong><i class="icon-cog"></i>&nbsp;Option</strong></td>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_PC['device_id']; ?></td>
            <td><?php echo $row_PC['username']; ?></td>
            <td width="12%"><a href="edit_computer.php?id=<?php echo $row_PC['id']; ?>">
              <button type="button" class="btn btn-mini btn-success"><i class="icon-pencil"></i>&nbsp;Edit&nbsp;&nbsp;</button>
              </a></td>
            <td width="13%"><a href="delete_computer.php?id=<?php echo $row_PC['id']; ?>">
              <button type="button" class="btn btn-mini btn-danger" onClick="Nxtpage()"><i class="icon-trash"></i>&nbsp;Delete</button>
              </a></td>
            <td width="12%"><a href="inventory_details.php?id=<?php echo $row_PC['id']; ?>">
              <button type="button" class="btn btn-mini btn-primary"><i class="icon-file"></i>&nbsp;Details</button>
              </a>&nbsp;</td>
          </tr>
          <?php } while ($row_PC = mysql_fetch_assoc($PC)); ?>
      </table></td>
    <td>&nbsp;</td>
    <td><table width="100%" border="0" class="table table-bordered">
        <tr class="btn-success">
          <td width="21%"><strong><i class="icon-file"></i>&nbsp;Device :: ID</strong></td>
          <td width="43%"><strong><i class="icon-user"></i>&nbsp;Username</strong></td>
          <td colspan="3"><strong><i class="icon-cog"></i>&nbsp;Option</strong></td>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_PR['device_id']; ?></td>
            <td><?php echo $row_PR['username']; ?></td>
            <td width="11%"><a href="edit_printer.php?id=<?php echo $row_PR['id']; ?>">
              <button type="button" class="btn btn-mini btn-success"><i class="icon-pencil"></i>&nbsp;Edit&nbsp;&nbsp;</button>
            </a></td>
            <td width="12%"><a href="delete_printer.php?id=<?php echo $row_PR['id']; ?>">
              <button type="button" class="btn btn-mini btn-danger" onClick="Nxtpage()"><i class="icon-trash"></i>&nbsp;Delete</button>
            </a></td>
            <td width="12%"><a href="inventory_printer.php?id=<?php echo $row_PR['id']; ?>">
              <button type="button" class="btn btn-mini btn-primary"><i class="icon-file"></i>&nbsp;Details</button>
              </a>&nbsp;</td>
          </tr>
          <?php } while ($row_PR = mysql_fetch_assoc($PR)); ?>
      </table></td>
  </tr>
  <tr>
    <td height="48"><table width="200" border="0" align="center" class="table-bordered">
        <tr>
          <td align="center"><?php if ($pageNum_PC > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_PC=%d%s", $currentPage, 0, $queryString_PC); ?>"><img src="First.gif"></a>
          <?php } // Show if not first page ?></td>
          <td align="center"><?php if ($pageNum_PC > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_PC=%d%s", $currentPage, max(0, $pageNum_PC - 1), $queryString_PC); ?>"><img src="Previous.gif"></a>
          <?php } // Show if not first page ?></td>
          <td align="center"><?php if ($pageNum_PC < $totalPages_PC) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_PC=%d%s", $currentPage, min($totalPages_PC, $pageNum_PC + 1), $queryString_PC); ?>"><img src="Next.gif"></a>
          <?php } // Show if not last page ?></td>
          <td align="center"><?php if ($pageNum_PC < $totalPages_PC) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_PC=%d%s", $currentPage, $totalPages_PC, $queryString_PC); ?>"><img src="Last.gif"></a>
          <?php } // Show if not last page ?></td>
        </tr>
      </table></td>
    <td>&nbsp;</td>
    <td><table width="200" border="0" align="center" class="table-bordered">
        <tr>
          <td align="center"><?php if ($pageNum_PR > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_PR=%d%s", $currentPage, 0, $queryString_PR); ?>"><img src="First.gif"></a>
          <?php } // Show if not first page ?></td>
          <td align="center"><?php if ($pageNum_PR > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_PR=%d%s", $currentPage, max(0, $pageNum_PR - 1), $queryString_PR); ?>"><img src="Previous.gif"></a>
          <?php } // Show if not first page ?></td>
          <td align="center"><?php if ($pageNum_PR < $totalPages_PR) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_PR=%d%s", $currentPage, min($totalPages_PR, $pageNum_PR + 1), $queryString_PR); ?>"><img src="Next.gif"></a>
          <?php } // Show if not last page ?></td>
          <td align="center"><?php if ($pageNum_PR < $totalPages_PR) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_PR=%d%s", $currentPage, $totalPages_PR, $queryString_PR); ?>"><img src="Last.gif"></a>
          <?php } // Show if not last page ?></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="48" align="center" class="btn-success"><strong><i class="icon-tags"></i>&nbsp;Network OfficeIn ventory total <?php echo $totalRows_OF ?> &nbsp;Records</strong></td>
    <td>&nbsp;</td>
    <td align="center" class="btn-success"><strong><i class="icon-tags"></i>&nbsp;Network WiFi Inventory total <?php echo $totalRows_WF ?> &nbsp;Records</strong></td>
  </tr>
  <tr>
    <td height="48"><table width="100%" border="0" class="table table-bordered">
        <tr class="btn-success">
          <td width="21%"><strong><i class="icon-file"></i>&nbsp;Device :: ID</strong></td>
          <td width="43%"><strong><i class="icon-home"></i>&nbsp;Localtion</strong></td>
          <td colspan="3"><strong><i class="icon-cog"></i>&nbsp;Option</strong></td>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_OF['device_id']; ?></td>
            <td><?php echo $row_OF['localtion']; ?></td>
            <td width="11%"><a href="edit_network office.php?id=<?php echo $row_OF['id']; ?>">
              <button type="button" class="btn btn-mini btn-success"><i class="icon-pencil"></i>&nbsp;Edit&nbsp;&nbsp;</button>
            </a></td>
            <td width="12%"><a href="delete_network office.php?id=<?php echo $row_OF['id']; ?>">
              <button type="button" class="btn btn-mini btn-danger" onClick="Nxtpage()"><i class="icon-trash"></i>&nbsp;Delete</button>
            </a></td>
            <td width="12%"><a href="inventory_office.php?id=<?php echo $row_OF['id']; ?>">
              <button type="button" class="btn btn-mini btn-primary"><i class="icon-file"></i>&nbsp;Details</button>
              </a> &nbsp;</td>
          </tr>
          <?php } while ($row_OF = mysql_fetch_assoc($OF)); ?>
      </table></td>
    <td>&nbsp;</td>
    <td><table width="100%" border="0" class="table table-bordered">
        <tr class="btn-success">
          <td width="21%"><strong><i class="icon-file"></i>&nbsp;Device :: ID</strong></td>
          <td width="43%"><strong><i class="icon-home"></i>&nbsp;Localtion</strong></td>
          <td colspan="3"><strong><i class="icon-cog"></i>&nbsp;Option</strong></td>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_WF['device_id']; ?></td>
            <td><?php echo $row_WF['localtion']; ?></td>
            <td width="11%"><a href="edit_network wifi.php?id=<?php echo $row_WF['id']; ?>">
              <button type="button" class="btn btn-mini btn-success"><i class="icon-pencil"></i>&nbsp;Edit&nbsp;&nbsp;</button>
            </a></td>
            <td width="12%"><a href="delete_network wifi.php?id=<?php echo $row_WF['id']; ?>">
              <button type="button" class="btn btn-mini btn-danger" onClick="Nxtpage()"><i class="icon-trash"></i>&nbsp;Delete</button>
            </a></td>
            <td width="12%"><a href="inventory_wifi.php?id=<?php echo $row_WF['id']; ?>">
              <button type="button" class="btn btn-mini btn-primary"><i class="icon-file"></i>&nbsp;Details</button>
              </a> &nbsp;</td>
          </tr>
          <?php } while ($row_WF = mysql_fetch_assoc($WF)); ?>
      </table></td>
  </tr>
  <tr>
    <td height="48">&nbsp;
      <table width="200" border="0" align="center">
        <tr>
          <td align="center"><?php if ($pageNum_PC > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_PC=%d%s", $currentPage, 0, $queryString_PC); ?>"><img src="First.gif"></a>
          <?php } // Show if not first page ?></td>
          <td align="center"><?php if ($pageNum_PC > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_PC=%d%s", $currentPage, max(0, $pageNum_PC - 1), $queryString_PC); ?>"><img src="Previous.gif"></a>
          <?php } // Show if not first page ?></td>
          <td align="center"><?php if ($pageNum_PC < $totalPages_PC) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_PC=%d%s", $currentPage, min($totalPages_PC, $pageNum_PC + 1), $queryString_PC); ?>"><img src="Next.gif"></a>
          <?php } // Show if not last page ?></td>
          <td align="center"><?php if ($pageNum_PC < $totalPages_PC) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_PC=%d%s", $currentPage, $totalPages_PC, $queryString_PC); ?>"><img src="Last.gif"></a>
          <?php } // Show if not last page ?></td>
        </tr>
      </table></td>
    <td>&nbsp;</td>
    <td>&nbsp;
      <table width="200" border="0" align="center">
        <tr>
          <td><?php if ($pageNum_WF > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_WF=%d%s", $currentPage, 0, $queryString_WF); ?>"><img src="First.gif"></a>
          <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_WF > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_WF=%d%s", $currentPage, max(0, $pageNum_WF - 1), $queryString_WF); ?>"><img src="Previous.gif"></a>
          <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_WF < $totalPages_WF) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_WF=%d%s", $currentPage, min($totalPages_WF, $pageNum_WF + 1), $queryString_WF); ?>"><img src="Next.gif"></a>
          <?php } // Show if not last page ?></td>
          <td><?php if ($pageNum_WF < $totalPages_WF) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_WF=%d%s", $currentPage, $totalPages_WF, $queryString_WF); ?>"><img src="Last.gif"></a>
          <?php } // Show if not last page ?></td>
        </tr>
      </table></td>
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
<script src="assets/js/bootstrap-typeahead.js"></script>
</body>
</html>
<?php
mysql_free_result($PC);

mysql_free_result($PR);

mysql_free_result($OF);

mysql_free_result($WF);
?>
