
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>::LOGIN</title>
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
</head>


<body background="images">     <!--blakkground -->




<!-- Part 1: Wrap all page content here -->
<div id="wrap">

<!-- Fixed navbar -->
<div class="navbar navbar-fixed-top">

      <div class="navbar-inner">
    <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="brand" href="#"><font color="#660033"> <b>IT Services Helpdesk</b></font></a>  
          <div class="nav-collapse collapse">



        <ul class="nav">
            
               <li><button name="button" class="btn btn-warning">  
				  
				  	<div class="contact-us-sidebar">
    <div class="sidebar-container" id="sidebarList">
        <div class="sidebar-content" id="sidebar_retail">
         
            <div class="contact-name">
                <span></span>
                <span></span>
                    <a href="mailto:ti-support@showdc.co.th"> <i aria-hidden="true" class="fa fa-envelope-o"></i>sent E-Mail to IT  </a>
            </div>
            <div class="contact-address">
               
            </div>
            <div class="openning-hour">
                
            </div>
        </div>
    </div>   </button>&nbsp;</li>
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


	<!--settame zone -->
  <?
  date_default_timezone_set("Asia/Bangkok"); 
 
    $date = date("d-m-Y");
    $time = date("H:i:s");
    ?>
  
</p>
<table width="100%" border="0">
      <tr>
    <td width="240" height="34" align="left"><img src="images/helpdesk logo.png" width="300" height="72"></td>

    <td width="753" align="center"><p><strong><font color="#ooooFF">
    	<b><H1>  Welcome  to  IT  Services Helpdesk</H1></b></font></strong></p><a class="brand" href="https://accounts.google.com/signin/v2/identifier?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&service=mail&sacu=1&rip=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin"><font color="#660033"> <b>contact us :: it-support@showdc.co.th</b></font></a>  
          <div class="nav-collapse collapse"></td>

 
    <td width="329" align="center"><strong><button type="button" class="btn btn-success"><i class="icon-calendar"></i>&nbsp;Date :: Time : <?php echo $date."&nbsp;/&nbsp;".$time;?></strong></button></td>
  </tr>
    </table>    
<hr/>

 <table border ="1">
 <form ACTION="<?php echo $loginFormAction; ?>" name="login_user" method="POST">
 <table width="20%" border="0" align="center">

   <tr> <td height="43" align="center" class="btn-success"><strong>Please Login</strong> !</td> </tr>

  

   <tr><td height="20" align="center">

  
 						
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
 

   	 <button  class="btn btn-primary"><i class="icon-user"></i>
   	 	<b><h4> <a href="login.php ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ADMIN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></b></a></button> 

  <p>&nbsp;</p>
   	 	 <button  class="btn btn-success"><i class="icon-user"></i>
        	 <h4><a href="managelogin.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MANAGE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h4></b></a></button> 
   	 		
   <p>&nbsp;</p>
   	 	 <button  class="btn btn-warning"><i class="icon-user"></i>
        	 <h4><a href="userlogin.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; USER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h4></b></a></button> 
   	 		

   	 		  
            


            
 

        	
      

   </tr>
 </table>
</form>
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