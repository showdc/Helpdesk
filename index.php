<?php require_once('Connections/IT.php'); ?>
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






$currentPage = $_SERVER["PHP_SELF"];

$maxRows_AJ = 10;
$pageNum_AJ = 0;
if (isset($_GET['pageNum_AJ'])) {
  $pageNum_AJ = $_GET['pageNum_AJ'];
}
$startRow_AJ = $pageNum_AJ * $maxRows_AJ;

mysql_select_db($database_IT, $IT);
$query_AJ = "SELECT * FROM addjob ORDER BY id DESC";
$query_limit_AJ = sprintf("%s LIMIT %d, %d", $query_AJ, $startRow_AJ, $maxRows_AJ);
$AJ = mysql_query($query_limit_AJ, $IT) or die(mysql_error());
$row_AJ = mysql_fetch_assoc($AJ);

if (isset($_GET['totalRows_AJ'])) {
  $totalRows_AJ = $_GET['totalRows_AJ'];
} else {
  $all_AJ = mysql_query($query_AJ);
  $totalRows_AJ = mysql_num_rows($all_AJ);
}
$totalPages_AJ = ceil($totalRows_AJ/$maxRows_AJ)-1;

$queryString_AJ = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_AJ") == false && 
        stristr($param, "totalRows_AJ") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_AJ = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_AJ = sprintf("&totalRows_AJ=%d%s", $totalRows_AJ, $queryString_AJ);


$currentPage = $_SERVER["PHP_SELF"];

$maxRows_AND = 10;
$pageNum_AND = 0;
if (isset($_GET['pageNum_AND'])) {
  $pageNum_AND = $_GET['pageNum_AND'];
}
$startRow_AND = $pageNum_AND * $maxRows_AND;

mysql_select_db($database_IT, $IT);
$query_AND = "SELECT * FROM addjob";
$query_limit_AND = sprintf("%s LIMIT %d, %d", $query_AND, $startRow_AND, $maxRows_AND);
$AND = mysql_query($query_limit_AND, $IT) or die(mysql_error());
$row_AND = mysql_fetch_assoc($AND);

if (isset($_GET['totalRows_AND'])) {
  $totalRows_AND = $_GET['totalRows_AND'];
} else {
  $all_AND = mysql_query($query_AND);
  $totalRows_AND = mysql_num_rows($all_AND);
}
$maxRows_AND = 10;
$pageNum_AND = 0;
if (isset($_GET['pageNum_AND'])) {
  $pageNum_AND = $_GET['pageNum_AND'];
}
$startRow_AND = $pageNum_AND * $maxRows_AND;

mysql_select_db($database_IT, $IT);
$query_AND = "SELECT * FROM addjob ORDER BY id DESC";
$query_limit_AND = sprintf("%s LIMIT %d, %d", $query_AND, $startRow_AND, $maxRows_AND);
$AND = mysql_query($query_limit_AND, $IT) or die(mysql_error());
$row_AND = mysql_fetch_assoc($AND);

if (isset($_GET['totalRows_AND'])) {
  $totalRows_AND = $_GET['totalRows_AND'];
} else {
  $all_AND = mysql_query($query_AND);
  $totalRows_AND = mysql_num_rows($all_AND);
}
$totalPages_AND = ceil($totalRows_AND/$maxRows_AND)-1;

$queryString_AND = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_AND") == false && 
        stristr($param, "totalRows_AND") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_AND = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_AND = sprintf("&totalRows_AND=%d%s", $totalRows_AND, $queryString_AND);
?>





?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>:: Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
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

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<body background="images/1180422460.gif">

<!-- Part 1: Wrap all page content here -->
<div id="wrap">

<!-- Fixed navbar -->
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
    <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
         <a class="brand" href="#"><font color="#660033"> <b>IT Helpdesk</b></font></a>  
          <div class="nav-collapse collapse">
        <ul class="nav">

              <li><a href="index.php"><i class="icon-home"></i>&nbsp; <font color="#ooooFF"><b>Home</a></b></font></li>
              <li><a href="addjob.php"><i class="icon-file"></i>&nbsp;Add Job</a></li>
            
            
              <li><a href="user_menu_report.php"><i class="icon-book"></i>&nbsp;Report</a></li> <!--  +Reportuser+ -->


              <li><a href="indexlogin.php"><i class="icon-user"></i>&nbsp; <font color="red"><b>Logout</a></font></b></font></li>

            </ul>
        </li>
        </ul>
      </div>
<!--/.nav-collapse --> 
        </div>
  </div>
    </div>
<p><br>
  <?
     
     date_default_timezone_set("Asia/Bangkok");
 
    $date = date("d-m-Y");
    $time = date("H:i");
    ?>
</p>
<table width="100%" border="0">
      <tr>
    <td width="300" height="109" align="left"><img src="images/helpdesk logo.png" width="300" height="72"></td>
    <td width="678" align="center">
    &nbsp;<br><h5>Total tickets on system &nbsp; <?php echo $totalRows_AJ ?> &nbsp; Tickets</h5></br>&nbsp;&nbsp;</strong></td>

    <td width="361" align="center"><strong><button type="button" class="btn btn-success"><i class="icon-calendar"></i>&nbsp;Date :: Time : <?php echo $date."&nbsp;/&nbsp;".$time;?></strong></button></td>
  </tr>
</table>

<script src="js/bootstrap.min.js"></script>
<table width="100%" border="0" class="table table-bordered"  >
  <tr class="btn-success">
    <td width="8%" align="center"><strong><i class="icon-user"></i>&nbsp;Name</strong></td>
    <td width="11%" align="center"><strong><i class="icon-calendar"></i>&nbsp;Date :: Time</strong></td>
    <td width="11%" align="center"><strong><i class="icon-home"></i>&nbsp;Department</strong></td>
    <td width="30%" align="center"><strong><i class="icon-file"></i>&nbsp;Details</strong></td>
    <td width="8%" align="center"><strong><i class="icon-time"></i>&nbsp;Status</strong></td>
    <td width="15%" align="center"><strong><i class="icon-comment"></i>&nbsp;Commen</strong></td>
    <td colspan="10"><strong><i class="icon-cog"></i>&nbsp;Option</strong></td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_AJ ['name']; ?></td>
      <td><?php echo $row_AJ['datepicker']; ?> <strong>/ </strong><?php echo $row_AJ['time']; ?></td>
      <td><?php echo $row_AJ['department']; ?></td>
      <td><a href="sendoutsite_report.php?id=<?php echo $row_AJ['id']; ?>"><?php echo $row_AJ['details']; ?></a></td>
      <td><?php echo $row_AJ['status']; ?></td>
      <td><?php echo $row_AJ['comment']; ?></td>

       <td width="6%"><a href="editjob.php?id=<?php echo $row_AND['id']; ?>">
        <button type="button" name="btnsubmit" class="btn btn-mini btn-success"><i class="icon-pencil"></i>&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;</button>
      </a></td>

     

    </tr>
    <?php } while ($row_AJ = mysql_fetch_assoc($AJ));($row_AND = mysql_fetch_assoc($AND)); ?>

   
</table>
<strong>&nbsp;&nbsp;<i class="icon-home"></i>&nbsp;ค้นหาข้อมูลเป็นแผนก</strong>
  </p>
<div class="row">
  <div class="span4" align="left">
    <form action="search.php" method="post" name="search">
    &nbsp;&nbsp;<input name="search" type="text" class="form-control" id="textfield" value="front office" /><br/>
    &nbsp;&nbsp;<button name="btnSeacrch" type="submit" class="btn btn-success" id="btnSeacrch"><i class="icon-search"></i>&nbsp;ค้นหาข้อมูล</button>
  </form>
  </div>
  <div class="span5" align="center">
  <table width="38%" height="46" border="0" align="center">
      <tr>
      	
    <td height="42" align="center"><?php if ($pageNum_AJ > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_AJ=%d%s", $currentPage, 0, $queryString_AJ); ?>"><button type="button" class="btn btn-mini btn-success">&nbsp;&nbsp;<i class="icon-fast-backward"></i>&nbsp;&nbsp;</button></a>
        <?php } // Show if not first page ?></td>


    <td align="center"><?php if ($pageNum_AJ > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_AJ=%d%s", $currentPage, max(0, $pageNum_AJ - 1), $queryString_AJ); ?>"><button type="button" class="btn btn-mini btn-success">&nbsp;&nbsp;<i class="icon-backward"></i>&nbsp;&nbsp;</button></a>
        <?php } // Show if not first page ?></td>


    <td align="center"><?php if ($pageNum_AJ < $totalPages_AJ) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_AJ=%d%s", $currentPage, min($totalPages_AJ, $pageNum_AJ + 1), $queryString_AJ); ?>"><button type="button" class="btn btn-mini btn-success">&nbsp;&nbsp;<i class=" icon-forward"></i>&nbsp;&nbsp;</button></a>
        <?php } // Show if not last page ?></td>


    <td align="center"><?php if ($pageNum_AJ < $totalPages_AJ) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_AJ=%d%s", $currentPage, $totalPages_AJ, $queryString_AJ); ?>"><button type="button" class="btn btn-mini btn-success">&nbsp;&nbsp;<i class="icon-fast-forward"></i>&nbsp;&nbsp;</button></a>
        <?php } // Show if not last page ?></td>
  </tr>
    </table>
  </div>
</div>

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
mysql_free_result($AJ);
?>
