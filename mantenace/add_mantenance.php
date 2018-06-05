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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "mantenace")) {
  $insertSQL = sprintf("INSERT INTO mantenace (datepicker, device_id, username, department, position_user, details, repair_by, `position`, coment) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['datepicker'], "date"),
                       GetSQLValueString($_POST['device_id'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['department'], "text"),
                       GetSQLValueString($_POST['position_user'], "text"),
                       GetSQLValueString($_POST['details'], "text"),
                       GetSQLValueString($_POST['repair_by'], "text"),
                       GetSQLValueString($_POST['position'], "text"),
                       GetSQLValueString($_POST['coment'], "text"));

  mysql_select_db($database_IT, $IT);
  $Result1 = mysql_query($insertSQL, $IT) or die(mysql_error());

  $insertGoTo = "mantenace_index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_IT, $IT);
$query_Dep = "SELECT * FROM department";
$Dep = mysql_query($query_Dep, $IT) or die(mysql_error());
$row_Dep = mysql_fetch_assoc($Dep);
$totalRows_Dep = mysql_num_rows($Dep);
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="product" content="Metro UI CSS Framework">
<meta name="keywords" content="Metro, UI, CSS, Framework, jquery">
<meta name="description" content="Simple responsive css framework">
<title>Mantennance</title>
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
          <?
    date_default_timezone_set("Asia/Bangkok");
    $date = date("d-m-Y");
    $time = date("H:i");
    ?>
  </head>

<body background="../images/1180422460.gif">

 <p>
<!-- Begin page content --> 
<table width="100%" border="0">
     <tr>
    <td width="240" height="34" align="left"><img src="../images/helpdesk logo.png" width="300" height="72"></td>
    <td width="753" align="center"><p><strong><img src="http://www.ufocool.com/images/flag/thailand.gif">&nbsp;&nbsp;Welcome to Mantennace system</strong><strong>&nbsp;&nbsp;<img src="http://www.ufocool.com/images/flag/thailand.gif"></strong></p></td>
    <td width="329" align="center"><strong><button type="button" class="btn btn-success"><i class="icon-calendar"></i>&nbsp;Date :: Time : <?php echo $date."&nbsp;/&nbsp;".$time;?></strong></button></td>
  </tr>
</table>
<form action="<?php echo $editFormAction; ?>" name="mantenace" method="POST">
  <p>&nbsp;</p>
  <table width="40%" border="0" align="center">
  <tr>
    <td width="21%" height="31"> <strong><i class="icon-calendar"></i>&nbsp;Date : Time</strong></td>
    <td width="1%">&nbsp;</td>
    <td width="53%"> <strong><i class="icon-bookmark"></i>&nbsp;Device ID</strong></td>
    </tr>
  <tr>
    <td>
      <input type="text" name="datepicker" id="datepicker" ></td>
    <td>&nbsp;</td>
    <td><input type="text" name="device_id" id="textfield" /></td>
    </tr>
  <tr>
    <td height="30"> <strong><i class="icon-user"></i>&nbsp;Username</strong></td>
    <td>&nbsp;</td>
    <td><strong><i class="icon-eye-open"></i>&nbsp;Repair By</strong></td>
    </tr>
  <tr>
    <td height="32">
      <input type="text" name="username" id="textfield2"/></td>
    <td>&nbsp;</td>
    <td><select name="repair_by" id="select2">
      <option>** Select **</option>
      <option>Mr.Mana Duangsri</option>
      <option>Mr.Chaimas Phanphon</option>
    </select></td>
    </tr>
  <tr>
    <td height="27"> <strong><i class="icon-home"></i>&nbsp;Department</strong></td>
    <td>&nbsp;</td>
    <td> <strong><i class="icon-picture"></i>&nbsp;Position</strong></td>
    </tr>
  <tr>
    <td height="42">
      <select name="department" id="select">
        <?php
do {  
?>
        <option value="<?php echo $row_Dep['department']?>"><?php echo $row_Dep['department']?></option>
        <?php
} while ($row_Dep = mysql_fetch_assoc($Dep));
  $rows = mysql_num_rows($Dep);
  if($rows > 0) {
      mysql_data_seek($Dep, 0);
	  $row_Dep = mysql_fetch_assoc($Dep);
  }
?>
      </select></td>
    <td>&nbsp;</td>
    <td><select name="position" id="select3">
      <option>** Select **</option>
      <option>IT Supervisor</option>
      <option>IT Manager</option>
    </select></td>
    </tr>
  <tr>
    <td height="24"> <strong><i class="icon-picture"></i>&nbsp;Position</strong></td>
    <td>&nbsp;</td>
    <td> <strong><i class="icon-comment"></i>&nbsp;Comment</strong></td>
    </tr>
  <tr>
    <td height="42">
      <input type="text" name="position_user" id="textfield3"></td>
    <td>&nbsp;</td>
    <td><textarea name="coment" id="textarea2" rows="3" ></textarea></td>
    </tr>
  <tr>
    <td height="22"><strong><i class="icon-book"></i>&nbsp;Details</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td colspan="3"><textarea name="details" id="textarea" rows="3" class="form-input"></textarea></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td colspan="3"><button name="button" type="submit" class="btn btn-success" /><i class="icon-check"></i>&nbsp; Save  </button>
      <button name="button2" type="reset" class="btn btn-danger"/><i class="icon-remove"></i>&nbsp; Cancel </button></td>
    </tr>
</table>
  <input type="hidden" name="MM_insert" value="mantenace">
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
<?php
mysql_free_result($Dep);
?>
