<?php
/**
 * Code snippet: anynews
 *
 * This code snippets grabs news from the WB news module database
 * and displays them on any page you want by invoking the function
 * displayNewsItems() via a page of type code or the index.php 
 * file of the template.
 *
 * This file contains the Estonian language output.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS Websitebaker 2.8.x
 * @package     anynews
 * @author      cwsoft (http://cwsoft.de)
 * @translation	forum member eazybaker 
 * @version     2.1.0
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/

// Estonian module description
$module_description	= 'WB Moodul, millega saad kuvada uudiseid igal lehel kus soovid. Detailid mooduli kohta leiad <a href="https://github.com/cwsoft/wb-anynews" target="_blank">GitHub</a>.';

// initialize global $LANG variable as array if needed
if (! isset($LANG) || (isset($LANG) && ! is_array($LANG))) {
	$LANG = array();
}

// Text outputs for the frontend
$LANG['ANYNEWS'][0] = array(
	'TXT_HEADER'		=> 'Viimased Uudised', 
	'TXT_READMORE'		=> 'loe veel', 
	'TXT_NO_NEWS'		=> 'Hetkel pole &uuml;htegi uudist lisatud.',
	'TXT_NEWS'			=> 'News', 
	// date/time format: (9:12 PM, 10/20/2008)
	'DATE_FORMAT'		=> ' (g:i A, m/d/Y)',		
	'TXT_REQUIREMENTS'	=> 'Vabandame, kuid Anynews n&otilde;uab, et omaksid v&auml;hemalt Website Baker 2.7 versiooni v&otilde;i uuemat.',		
);