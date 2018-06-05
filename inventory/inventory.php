<?php require_once('../Connections/peace.php'); ?>
<?php require_once('../Connections/peace.php'); ?>
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
	
  $logoutGoTo = "../inventory_login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_PC = 10;
$pageNum_PC = 0;
if (isset($_GET['pageNum_PC'])) {
  $pageNum_PC = $_GET['pageNum_PC'];
}
$startRow_PC = $pageNum_PC * $maxRows_PC;

mysql_select_db($database_peace, $peace);
$query_PC = "SELECT * FROM table_computer";
$query_limit_PC = sprintf("%s LIMIT %d, %d", $query_PC, $startRow_PC, $maxRows_PC);
$PC = mysql_query($query_limit_PC, $peace) or die(mysql_error());
$row_PC = mysql_fetch_assoc($PC);

if (isset($_GET['totalRows_PC'])) {
  $totalRows_PC = $_GET['totalRows_PC'];
} else {
  $all_PC = mysql_query($query_PC);
  $totalRows_PC = mysql_num_rows($all_PC);
}
$totalPages_PC = ceil($totalRows_PC/$maxRows_PC)-1;

$maxRows_Printer = 10;
$pageNum_Printer = 0;
if (isset($_GET['pageNum_Printer'])) {
  $pageNum_Printer = $_GET['pageNum_Printer'];
}
$startRow_Printer = $pageNum_Printer * $maxRows_Printer;

mysql_select_db($database_peace, $peace);
$query_Printer = "SELECT * FROM table_printer";
$query_limit_Printer = sprintf("%s LIMIT %d, %d", $query_Printer, $startRow_Printer, $maxRows_Printer);
$Printer = mysql_query($query_limit_Printer, $peace) or die(mysql_error());
$row_Printer = mysql_fetch_assoc($Printer);

if (isset($_GET['totalRows_Printer'])) {
  $totalRows_Printer = $_GET['totalRows_Printer'];
} else {
  $all_Printer = mysql_query($query_Printer);
  $totalRows_Printer = mysql_num_rows($all_Printer);
}
$totalPages_Printer = ceil($totalRows_Printer/$maxRows_Printer)-1;

$maxRows_WiFi = 10;
$pageNum_WiFi = 0;
if (isset($_GET['pageNum_WiFi'])) {
  $pageNum_WiFi = $_GET['pageNum_WiFi'];
}
$startRow_WiFi = $pageNum_WiFi * $maxRows_WiFi;

mysql_select_db($database_peace, $peace);
$query_WiFi = "SELECT * FROM network_wifi";
$query_limit_WiFi = sprintf("%s LIMIT %d, %d", $query_WiFi, $startRow_WiFi, $maxRows_WiFi);
$WiFi = mysql_query($query_limit_WiFi, $peace) or die(mysql_error());
$row_WiFi = mysql_fetch_assoc($WiFi);

if (isset($_GET['totalRows_WiFi'])) {
  $totalRows_WiFi = $_GET['totalRows_WiFi'];
} else {
  $all_WiFi = mysql_query($query_WiFi);
  $totalRows_WiFi = mysql_num_rows($all_WiFi);
}
$totalPages_WiFi = ceil($totalRows_WiFi/$maxRows_WiFi)-1;

$maxRows_Office = 10;
$pageNum_Office = 0;
if (isset($_GET['pageNum_Office'])) {
  $pageNum_Office = $_GET['pageNum_Office'];
}
$startRow_Office = $pageNum_Office * $maxRows_Office;

mysql_select_db($database_peace, $peace);
$query_Office = "SELECT * FROM network_office";
$query_limit_Office = sprintf("%s LIMIT %d, %d", $query_Office, $startRow_Office, $maxRows_Office);
$Office = mysql_query($query_limit_Office, $peace) or die(mysql_error());
$row_Office = mysql_fetch_assoc($Office);

if (isset($_GET['totalRows_Office'])) {
  $totalRows_Office = $_GET['totalRows_Office'];
} else {
  $all_Office = mysql_query($query_Office);
  $totalRows_Office = mysql_num_rows($all_Office);
}
$totalPages_Office = ceil($totalRows_Office/$maxRows_Office)-1;

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
<title>Inventory</title>

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
                <li><a href="<?php echo $logoutAction ?>"><i class="icon-user"></i></a></li>
              </ul>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
      </div>

      <p>
    <!-- Begin page content -->
      


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
      <p>&nbsp;</p>
      <p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($PC);

mysql_free_result($Printer);

mysql_free_result($WiFi);

mysql_free_result($Office);
?>
