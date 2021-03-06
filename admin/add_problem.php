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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "adduser")) {
  $insertSQL = sprintf("INSERT INTO problem (problem) VALUES (%s)",
                       GetSQLValueString($_POST['problem'], "text"));

  mysql_select_db($database_IT, $IT);
  $Result1 = mysql_query($insertSQL, $IT) or die(mysql_error());

  $insertGoTo = "add_problem.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$maxRows_PB = 10;
$pageNum_PB = 0;
if (isset($_GET['pageNum_PB'])) {
  $pageNum_PB = $_GET['pageNum_PB'];
}
$startRow_PB = $pageNum_PB * $maxRows_PB;

mysql_select_db($database_IT, $IT);
$query_PB = "SELECT * FROM problem";
$query_limit_PB = sprintf("%s LIMIT %d, %d", $query_PB, $startRow_PB, $maxRows_PB);
$PB = mysql_query($query_limit_PB, $IT) or die(mysql_error());
$row_PB = mysql_fetch_assoc($PB);

if (isset($_GET['totalRows_PB'])) {
  $totalRows_PB = $_GET['totalRows_PB'];
} else {
  $all_PB = mysql_query($query_PB);
  $totalRows_PB = mysql_num_rows($all_PB);
}
$totalPages_PB = ceil($totalRows_PB/$maxRows_PB)-1;
?>
<!DOCTYPE html>
<tml lang="en">
<head>
<meta charset="utf-8">
<title>:: Problem</title>
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
<link rel="stylesheet" href="css/jquery-ui.css">
</head>

<body background="images">

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


 		 <li><button name="button" class="btn btn-warning">
          <a href="index.php"><i class="icon-home"></i><font color="#ooooFF"><b> &nbsp; Home&nbsp; &nbsp; </a></b></font></a></button></li>
          <li><button name="button" class="btn btn-warning">
          <a href="adduser.php"><i class="icon-user"></i><font color="#ooooFF"><b>&nbsp;Add_User</b>&nbsp; &nbsp;</a></font></button></li>
          <li><button name="button" class="btn btn-warning">
          <a href="add_department.php"><i class="icon-cog"></i><font color="#ooooFF">&nbsp;<b>Add_Department</b>&nbsp; &nbsp;</a></font></button></li>
          <li><button name="button" class="btn btn-warning">
          <a href="add_priority.php"><i class="icon-cog"></i><font color="#ooooFF">&nbsp;<b>Add_Priority</b>&nbsp; &nbsp;</a></font></button></li>
          <li><button name="button" class="btn btn-warning">
          <a href="add_problem.php"><i class="icon-cog"></i><font color="#ooooFF">&nbsp;<b>Add_Problem</b>&nbsp; &nbsp;</a></font></button></li>
          <li><button name="button" class="btn btn-warning">  
          <a href="menu_report.php"><i class="icon-book"></i><font color="#ooooFF">&nbsp;<b>Report</b></a></font></button></li>
          <li><button name="button" class="btn btn-">
          <a href="../indexlogin.php"><i class="icon-user"></i>&nbsp; <font color="red"><b>&nbsp;Logout&nbsp; &nbsp;</a></b></font></li>

         
        </ul>
        </li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
  </div>
</div>
<p>&nbsp;</p>
<p><br>
  <?
 date_default_timezone_set("Asia/Bangkok");
    $date = date("d-m-Y");
    $time = date("H:i");
    ?>
</p>
<table width="100%" border="0">
  <tr>
    <td width="240" height="34" align="left"><img src="../images/helpdesk logo.png" width="300" height="72"></td>
    <td width="753" align="center"><p><strong><font color="#ooooFF"><h3>&nbsp;&nbsp;Add your Problem</h3></font></strong><strong>&nbsp;&nbsp;</strong></p></td>
    <td width="329" align="center"><strong>
      <button type="button" class="btn btn-success"><i class="icon-calendar"></i>&nbsp;Date :: Time : <?php echo $date."&nbsp;/&nbsp;".$time;?></strong></button></td>
  </tr>
</table>
<hr/>
<script src="js/bootstrap.min.js"></script>
<form action="<?php echo $editFormAction; ?>" name="adduser" method="POST">
  <table width="315" border="0" align="center">
    <tr>
      <td width="214"><strong><i class="icon-"></i><font color ="#ooooFF">&nbsp;<h5>Add Problem</h5></font></strong></td>
      <td width="166" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td><input type="text" name="problem" id="textfield"></td>
      <td align="center"><button type="submit" class="btn btn-success"><i class="icon-check"></i>&nbsp;Save</button></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="adduser">
</form>
<table width="80%" border="0" align="center">
  <tr>
    <td>
      <table width="80%" border="0" align="center" class="table table-bordered">
        <tr class="btn-success">
          <td width="18%"><strong><i class="icon-file"></i>&nbsp;Problem :: ID</strong></td>
          <td width="66%"><strong><i class="icon-wrench"></i>&nbsp;Problem</strong></td>
          <td colspan="2"><strong><i class="icon-cog"></i>&nbsp;Option</strong></td>
        </tr>
        <?php do { ?>
          <tr>
            <td><strong>PB-ID000<?php echo $row_PB['id']; ?></strong></td>
            <td><strong><?php echo $row_PB['problem']; ?></strong></td>
            <td width="8%">
              <a href="edit_problem.php?id=<?php echo $row_PB['id']; ?>">
              <button type="button" class="btn btn-mini btn-success"><i class="icon-pencil"></i>&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;</button>
            </a></td>
            <td width="9%">
              <a href="delete_problem.php?id=<?php echo $row_PB['id']; ?>">
              <button type="button" class="btn btn-mini btn-danger" onClick="Nxtpage()"><i class="icon-trash"></i>&nbsp;&nbsp;Delete</button>
            </a></td>
          </tr>
          <?php } while ($row_PB = mysql_fetch_assoc($PB)); ?>
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
<script src="js/bootstrap.min.js"></script>
</body>
</html><?php
mysql_free_result($PB);
?>
