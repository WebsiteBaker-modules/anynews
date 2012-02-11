<?php
/**
 * Code snippet: anynews
 *
 * This code snippets grabs news from the WB news module database
 * and displays them on any page you want by invoking the function
 * displayNewsItems() via a page of type code or the index.php 
 * file of the template.
 *
 * This file defines the variables required for Website Baker.
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

// OBLIGATORY WEBSITE BAKER VARIABLES
$module_directory		= 'anynews';
$module_name			= 'Anynews (displayNewsItems)';
$module_function		= 'snippet';
$module_version			= '2.0.0';
$module_status			= 'stable';
$module_platform		= '2.8.x';
$module_author			= 'cwsoft (http://cwsoft.de)';
$module_license			= '<a href="http://www.gnu.org/licenses/gpl.html">GNU General Public Licencse 3.0</a>';
$module_license_terms	= '-';
$module_requirements	= 'PHP 5.2.17 or higher, WB news module';
$module_description		= 'Snippet to display news items on any page you want. Function can be invoked from the template or a code section. Details can be found in the module <a href="' . WB_URL .'/modules/anynews/help/help_en.html" target="_blank">README</a> file.';

?>
