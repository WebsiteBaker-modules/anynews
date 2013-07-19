<?php
/**
 * Code snippet: cwsoft-anynews
 *
 * This code snippets grabs news entries from the WebsiteBaker news
 * module and displays them on any page you want by invoking the function
 * displayNewsItems() via a page of type code or the index.php
 * file of the template.
 *
 * This file contains the Danish language output.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS WebsiteBaker 2.8.x
 * @package     cwsoft-anynews
 * @author      cwsoft (http://cwsoft.de)
 * @translation	Danish translation by forum member fordfairlane
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/

// Danish module description
$module_description = 'This kodestump cwsoft-anynews gør det muligt at vise nyheder poster fra WebsiteBaker news modul på ethvert sted, du ønsker. Kalder funktionen fra en kode sektion eller din skabelon index.php fil. For nærmere oplysninger se <a href="https://github.com/cwsoft/wb-cwsoft-anynews#readme" target="_blank">GitHub</a>.';

// initialize global $LANG variable as array if needed
global $LANG;
if (! isset($LANG) || (isset($LANG) && ! is_array($LANG))) {
	$LANG = array();
}

$LANG['ANYNEWS'][0] = array(
	// text outputs for the frontend
	'TXT_HEADER'             => 'Seneste nyheder',
	'TXT_READMORE'           => 'Læs mere',
	'TXT_NO_NEWS'            => 'Ingen nyheder.',
	'TXT_NEWS'               => 'Nyheder',
	'TXT_NUMBER_OF_COMMENTS' => 'Antal kommentar',
	
	// date/time format: (21:12  12/31/2012)
	'DATE_FORMAT'            => 'G:i, d/m/Y'
);