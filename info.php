<?php
/**
 * Code snippet: anynews
 *
 * This code snippets grabs news entries from the WebsiteBaker news
 * module and displays them on any page you want by invoking the function
 * displayNewsItems() via a page of type code or the index.php
 * file of the template.
 *
 * This file defines the variables required for WebsiteBaker.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS WebsiteBaker 2.8.x
 * @package     anynews
 * @author      cwsoft (http://cwsoft.de)
 * @version     2.3.0
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/

// set WebsiteBaker module variables
$module_directory     = 'anynews';
$module_name          = 'Anynews';
$module_function      = 'snippet';
$module_version       = '2.3.0';
$module_status        = 'STABLE';
$module_platform      = '2.8.x';
$module_author        = 'cwsoft (http://cwsoft.de)';
$module_license       = '<a href="http://www.gnu.org/licenses/gpl.html">GNU General Public Licencse 3.0</a>';
$module_license_terms = '-';
$module_requirements  = 'PHP>=5.2.2, WB>=2.8.2, WB news module';
$module_description   = 'Call displayNewsItems(); from the index.php of your template or a code section to display news entries where you want them to be. For details see <a href="https://github.com/cwsoft/wb-anynews">GitHub</a>.';
