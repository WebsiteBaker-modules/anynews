<?php
/**
 * Code snippet: anynews
 *
 * This code snippets grabs news entries from the WebsiteBaker news
 * module and displays them on any page you want by invoking the function
 * displayNewsItems() via a page of type code or the index.php
 * file of the template.
 *
 * This file checks the installation requirements atinstallation
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

/**
 * Check if minimum requirements for this module are fullfilled
 * Only excecuted from WebsiteBaker 2.8 onwards
 */
$PRECHECK = array( 
	// requires WebsiteBaker 2.8.x (from 2.8.2 onwards)
	'WB_VERSION' => array('VERSION' => '2.8.2', 'OPERATOR' => '>='), 

	// ensure WebsiteBaker news module is installed
	'WB_ADDONS' => array('news'),

	// make sure PHP version is 5.2.2 or higher
	'PHP_VERSION' => array('VERSION' => '5.2.2', 'OPERATOR' => '>=')
);