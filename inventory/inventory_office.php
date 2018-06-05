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

$colname_IOF = "-1";
if (isset($_GET['id'])) {
  $colname_IOF = $_GET['id'];
}
mysql_select_db($database_IT, $IT);
$query_IOF = sprintf("SELECT * FROM network_office WHERE id = %s", GetSQLValueString($colname_IOF, "int"));
$IOF = mysql_query($query_IOF, $IT) or die(mysql_error());
$row_IOF = mysql_fetch_assoc($IOF);
$totalRows_IOF = mysql_num_rows($IOF);

mysql_select_db($database_IT, $IT);
$query_OF = "SELECT * FROM network_office";
$OF = mysql_query($query_OF, $IT) or die(mysql_error());
$row_OF = mysql_fetch_assoc($OF);
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="product" content="Metro UI CSS Framework">
<meta name="keywords" content="Metro, UI, CSS, Framework, jquery">
<meta name="description" content="Simple responsive css framework">
<title>Untitled Document</title>

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
	  @media print{
	#wrapall{width:100%;}
	#btnprint{display:none;}
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

<body>

 <p>
   <!-- Part 1: Wrap all page content here -->

 <!-- Fixed navbar -->
 </p>
 <p>&nbsp;</p>
<p><!-- Begin page content -->
   
   
   
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
</p>
<table width="90%" border="0" align="center" class="table-bordered">
  <tr>
    <td height="40" colspan="4" align="center" class="btn-success"><strong>แบบบันทึกข้อมูลอุปกรณ์ฝ่ายเทคโนโลยีสารสนเทศ </strong>( IT Depaerment )</td>
  </tr>
  <tr>
    <td width="26%"><button name="btnprint" id="btnprint" class="btn btn-warning" type="button" onClick="window.print()"><i class="icon-print"></i>&nbsp;Print</button></td>
    <td width="31%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td width="33%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center"><strong>Device Informetion</strong></td>
  </tr>
  <tr>
    <td colspan="4" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="right"><strong>Device ID :</strong></td>
    <td>&nbsp;&nbsp;<?php echo $row_IOF['device_id']; ?></td>
    <td align="right"><strong>Brand :</strong></td>
    <td>&nbsp;&nbsp;<?php echo $row_IOF['brand']; ?></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right"><strong>Date PR :</strong></td>
    <td>&nbsp;&nbsp;<?php echo $row_IOF['date_pr']; ?></td>
    <td align="right"><strong>Model :</strong></td>
    <td>&nbsp;&nbsp;<?php echo $row_IOF['model']; ?></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right"><strong>Localtoin :</strong></td>
    <td>&nbsp;&nbsp;<?php echo $row_IOF['localtion']; ?></td>
    <td align="right"><strong>Status :</strong></td>
    <td>&nbsp;&nbsp;<?php echo $row_IOF['status']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>...........................................................................</strong></td>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>Mana Duangsri</strong></td>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>IT Supervisor</strong></td>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">ผู้บันทึก</td>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($IOF);
?>
