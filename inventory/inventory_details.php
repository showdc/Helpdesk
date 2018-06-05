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

$colname_PC = "-1";
if (isset($_GET['id'])) {
  $colname_PC = $_GET['id'];
}
mysql_select_db($database_IT, $IT);
$query_PC = sprintf("SELECT * FROM table_computer WHERE id = %s", GetSQLValueString($colname_PC, "int"));
$PC = mysql_query($query_PC, $IT) or die(mysql_error());
$row_PC = mysql_fetch_assoc($PC);
$totalRows_PC = mysql_num_rows($PC);
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="product" content="Metro UI CSS Framework">
<meta name="keywords" content="Metro, UI, CSS, Framework, jquery">
<meta name="description" content="Simple responsive css framework">
<title>Computer :: Info</title>

<!-- CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
<style type="text/css">
#wrapall {
	width: 85%;
	margin: auto;
	position: static;
}
@media print{
	#wrapall{width:100%;}
	#btnprint{display:none;}
	}
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

<body>
<div id="wrapall">
  <br><table width="100%" border="0" class="table-bordered" align="center">
    <tr>
      <td height="35" colspan="4" align="center" class="btn-success"><strong>แบบบันทึกข้อมูลอุปกรณ์ฝ่ายเทคโนโลยีสารสนเทศ </strong>( IT Depaerment )</td>
    </tr>
    <tr>
      <td height="35" colspan="4" align="left"><button name="btnprint" id="btnprint" class="btn btn-warning" type="button" onClick="window.print()"><i class="icon-print"></i>&nbsp;Print</button></td>
    </tr>
    <tr>
      <td height="35" colspan="4" align="center"><strong>ข้อมูลผู้ใช้งาน</strong></td>
    </tr>
    <tr>
      <td width="23%" align="center">รหัสอุปกรณ์</td>
      <td width="35%"><strong>: </strong><?php echo $row_PC['device_id']; ?></td>
      <td width="13%" align="center">สังกัดแผนก</td>
      <td width="29%"><strong>: </strong><?php echo $row_PC['department']; ?></td>
    </tr>
    <tr>
      <td align="center">ชื่อผู้ใช้งาน </td>
      <td><strong>: </strong><?php echo $row_PC['username']; ?></td>
      <td align="center">IP Address</td>
      <td><strong>: </strong><?php echo $row_PC['ip']; ?></td>
    </tr>
    <tr>
      <td align="center">ตำแหน่งงาน</td>
      <td><strong>: </strong><?php echo $row_PC['position']; ?></td>
      <td align="center">สถานะ</td>
      <td><strong>: </strong>Working</td>
    </tr>
    <tr>
      <td align="center">วันที่ซื้อ</td>
      <td><strong>: </strong><?php echo $row_PC['date_pr']; ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="34" colspan="4" align="center"><strong>ข้อมูลด้าน Hardware</strong></td>
    </tr>
    <tr>
      <td align="center"><strong>Hardware</strong></td>
      <td align="center"><strong>Specification</strong></td>
      <td align="center"><strong>Checked</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center">CPU</td>
      <td><strong>: </strong><?php echo $row_PC['cpu']; ?></td>
      <td align="center">Pass</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center">Mainboard</td>
      <td><strong>: </strong><?php echo $row_PC['mainboard']; ?></td>
      <td align="center">Pass</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center">Ram</td>
      <td><strong>: </strong><?php echo $row_PC['ram']; ?></td>
      <td align="center">Pass</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center">VGA Adapter</td>
      <td><strong>: </strong><?php echo $row_PC['vga']; ?></td>
      <td align="center">Pass</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center">Harddisk</td>
      <td><strong>: </strong><?php echo $row_PC['harddisk']; ?></td>
      <td align="center">Pass</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center">Optical Drive</td>
      <td><strong>: </strong><?php echo $row_PC['optical_drive']; ?></td>
      <td align="center">Pass</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center">Ploppy Drive</td>
      <td><strong>:</strong> N/A</td>
      <td align="center">Pass</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center">Monitor</td>
      <td><strong>: </strong><?php echo $row_PC['monitor']; ?></td>
      <td align="center">Pass</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center">Mouse</td>
      <td><strong>: </strong><?php echo $row_PC['mouse']; ?></td>
      <td align="center">Pass</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center">Keyboard</td>
      <td><strong>: </strong><?php echo $row_PC['keyboard']; ?></td>
      <td align="center">Pass</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center">Network Adapter</td>
      <td><strong>: </strong><?php echo $row_PC['network']; ?></td>
      <td align="center">Pass</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="37" colspan="4" align="center"><strong>ข้อมูลระบบ</strong></td>
    </tr>
    <tr>
      <td align="center">Operating System</td>
      <td><strong>: </strong><?php echo $row_PC['os']; ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center">License</td>
      <td><strong>: </strong><?php echo $row_PC['license']; ?></td>
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
      <td colspan="2" align="center">&nbsp;</td>
      <td colspan="2" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center">&nbsp;</td>
      <td colspan="2" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><strong>..........................................................</strong></td>
      <td colspan="2" align="center"><strong>..........................................................</strong></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><strong>Mr. Mana Duangsri</strong></td>
      <td colspan="2" align="center"><strong><?php echo $row_PC['username']; ?></strong></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><strong>IT Supervisor</strong></td>
      <td colspan="2" align="center"><strong><?php echo $row_PC['position']; ?></strong></td>
    </tr>
    <tr>
      <td colspan="2" align="center">ผู้บันทึก</td>
      <td colspan="2" align="center">ผู้ถือครอง</td>
    </tr>
    <tr>
      <td></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
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
mysql_free_result($PC);
?>
