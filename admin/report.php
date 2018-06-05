<!DOCTYPE html>
<tml lang="en">
<head>
<meta charset="utf-8">
<title>:: Priority</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

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
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
$(function() {
    $( "#dateStart" ).datepicker({dateFormat:'yy-mm-dd'});
  });
</script>
<script>
$(function() {
    $( "#dateEnd" ).datepicker({dateFormat:'yy-mm-dd'});
  });
</script>
<SCRIPT TYPE="text/javascript">
<!--
function submitpopup(form1){
window.open('', 'test popup', 'height=100%,width=100%,scrollbars=yes');
myform.target='test popup';
return true;
}
//-->
</SCRIPT>
</head>

<body background="images/1180422460.gif" onload="MM_preloadImages('icon/Back1.png')">
<!-- Part 1: Wrap all page content here -->
<div id="wrap">

<!-- Fixed navbar -->
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="brand" href="#">IT Helpdesk :: Report by Date : Time</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
        </ul>
        </li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
  </div>
</div>
<script src="js/bootstrap.min.js"></script></p>
<p>&nbsp;</p>
<br>
<br>
<form id="form1" name="form1" method="post" action="reportshow.php" onsubmit="submitpopup">
  <table width="774" border="0" align="center">
    <tr>
      <td height="43" colspan="3"><p><strong><i class="icon-search"></i>&nbsp;Report by Date : Time</strong></p></td>
      <td width="280"></td>
    </tr>
    <tr>
      <td width="221"><i class="icon-calendar">&nbsp;</td>
      <td width="30" align="center">&nbsp;</td>
      <td width="225"><i class="icon-calendar"></i>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="text" name="datestart" id="dateStart" class="form-control" /></td>
      <td align="center"><strong>to</strong></td>
      <td><input type="text" name="datestop" id="dateEnd" class="form-control" /></td>
      <td></td>
    </tr>
    <tr>
      <td><button type="submit" name="button" id="button" class="btn btn-success"/><i class="icon-search"></i>&nbsp;Search</button>
      <a href="menu_report.php"><button type="button" class="btn btn-danger"><i class="icon-home"></i>&nbsp;Home</button></strong></a>
      </td>
      <td align="center">&nbsp;</td>
      <td></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>

