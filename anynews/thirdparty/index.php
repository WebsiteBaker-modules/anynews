<?php
/**
 * Code snippet: anynews
 *
 * This code snippets grabs news entries from the WebsiteBaker news
 * module and displays them on any page you want by invoking the function
 * displayNewsItems() via a page of type code or the index.php
 * file of the template.
 *
 * This file prevents directory listing.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS WebsiteBaker 2.8.x
 * @package     anynews
 * @author      cwsoft (http://cwsoft.de)
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/

// prevent this file from being accessed directly
if (defined('WB_PATH') == false) {
	exit("Cannot access this file directly");
}
