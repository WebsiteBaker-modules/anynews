<?php
/**
 * English language file for the code snippet: anynews
 *
 * This code snippets grabs news from the WB news module database
 * and displays them on any page you want by invoking the function
 * displayNewsItems() via a page of type code or the index.php 
 * file of the template.
 *
 * This file contains the English language output.
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

// English module description
$module_description	= 'Snippet to display news items on any page you want. Function can be invoked from the template or a code section. Details can be found in the module <a href="{WB_URL}/modules/anynews/help/help_en.html" target="_blank">README</a> file';

// declare module language array
$LANG = array();

// Text outputs for the frontend
$LANG[0] = array(
	'TXT_HEADER'		=> 'Latest News', 
	'TXT_READMORE'		=> 'read more', 
	'TXT_NO_NEWS'		=> 'No news available yet.',
	'TXT_NEWS'			=> 'News', 
	// English date/time format: (9:12 PM, 10/20/2008)
	'DATE_FORMAT'		=> ' (g:i A, m/d/Y)',		
	'TXT_REQUIREMENTS'	=> 'Sorry, Anynews requires Website Baker 2.7 or higher.',		
);

?>