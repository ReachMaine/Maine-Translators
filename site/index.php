<?php
function obfuscate ($str) { 
     $return = ''; 
     for($i = 0; $i < strlen($str); $i++) 
          $return .= '&#' . (rand(0,1) == 1 ? hexdec(bin2hex(substr($str, $i, 1))) : 'x' . bin2hex(substr($str, $i, 1))) . ';';
     return $return;
}

//error_reporting(0);

$path = (!empty($_GET['path'])) ? explode('/', $_GET['path']) : array('0'=>'');
foreach ($path as $key => $value) {
	if (empty($value)) {
		unset($path[$key]);
	}
}
$section = $path[0];
$path = array_reverse($path);
$page = $path[0];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Association of Maine Interpreters and Translations</title>
<base href="http://www.mainetranslators.org/" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/niftyCorners.css" media="all" type="text/css" />
<link rel="stylesheet" href="css/all.css" media="all" type="text/css" />
<link rel="stylesheet" href="css/screen.css" media="screen,projection" type="text/css" />
<link rel="stylesheet" href="css/print.css" media="print" type="text/css" />
<!--[if lt IE 7]>
<link rel="stylesheet" href="css/ie6.css" media="all" type="text/css" />
<![endif]-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
<script type="text/javascript" src="js/niftycube.js"></script>
<script type="text/javascript" src="js/style.js"></script>
<script type="text/javascript" src="js/sifr.js"></script>
</head>
<body>

<div id="body">

	<div id="page">

		<div id="header">
			<h1><a href="" class="logo"><span>The Association of Maine Interpreters &amp; Translators</span></a></h1>
		</div>
		
		<div id="nav">
			<ul>
				<li><a href="/">Home</a></li>
				<li><a href="about/">About Us</a></li>
				<li><a href="membership-benefits/">Membership Benefits</a></li>
				<li><a href="apply/">Apply for Membership</a></li>
				<li><a href="find-interpreter/">Find an Interpreter or Translator</a></li>
				<li><a href="events/">Upcoming Events</a></li>
				<li class="last"><a href="contact/">Contact Us</a></li>
			</ul>
		</div>
		
		<div id="content">
		<?php
		if (!empty($page) && file_exists($page . '.php')) {
			require($page . '.php');
		}
		else {
			require('home.php');
		}
		?>
		</div>
		
		<div id="footer">
			<p>&copy; <?=date('Y');?> Association of Maine Interpreters &amp; Translators</p>
			<p><?php /*echo implode('', file('http://www.avertismedia.com/credit.php?site=amit'));*/ ?></p>
			<p><?php echo "Website hosted and maintained by <a href='http://www.mainesoft.com'>Maine Software & Internet Solutions</a>"; ?></p>
		</div>

	</div>
	
</div>

</body>
</html>