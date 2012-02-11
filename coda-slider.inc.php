<?php
/**
 * Code snippet: anynews
 *
 * This code snippets grabs news from the WB news module database
 * and displays them on any page you want by invoking the function
 * displayNewsItems() via a page of type code or the index.php 
 * file of the template.
 *
 * This file contains the code to initialize the Anynews Coda Slider routines.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS Websitebaker 2.8.x
 * @package     anynews
 * @author      cwsoft (http://cwsoft.de)
 * @version     2.0.0
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl.html
*/

// prevent this file from being accessed directly
if (!defined('WB_PATH')) die(header('Location: ../../index.php'));

// include Anynews coda-slider code to the head section of your template
$wb_url = WB_URL;
$output = <<< EOT
<!-- Include Anynews coda-slider CSS and Javascript code -->
<link rel="stylesheet" type="text/css" href="$wb_url/modules/anynews/coda-slider.css" media="screen" />
<script type="text/javascript"> var WB_URL = "$wb_url";</script>
<script type="text/javascript" src="$wb_url/modules/anynews/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="$wb_url/modules/anynews/js/jquery.scrollTo-min.js"></script>
<script type="text/javascript" src="$wb_url/modules/anynews/js/jquery.localscroll-min.js"></script>
<script type="text/javascript" src="$wb_url/modules/anynews/js/jquery.serialScroll-min.js"></script>
<script type="text/javascript" src="$wb_url/modules/anynews/js/coda-slider.js"></script>
EOT;
echo $output;
?>