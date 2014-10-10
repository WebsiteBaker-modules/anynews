<?php
/**
 * Code snippet: cwsoft-anynews
 *
 * This code snippets grabs news entries from the WebsiteBaker news
 * module and displays them on any page you want by invoking the function
 * getNewsItems() via a page of type code or the index.php
 * file of the template.
 *
 * This file contains the Slovenian language output.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS WebsiteBaker 2.8.x
 * @package     cwsoft-anynews
 * @author      cwsoft (http://cwsoft.de)
 * @translation	Slovenian translation by forum member Roych
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/

// Slovenian module description
$module_description = 'Dodatek cwsoft-anynews omogoča prikaz novic iz WebsiteBaker News modula, na katerem koli mestu na strani. Funkcijo prikličete iz oddelka kode ali vaše predloge index.php datoteke. Za podrobnosti glej <a href="https://github.com/cwsoft/websitebaker-anynews#readme" target="_blank">GitHub</a>.';

// initialize global $LANG variable as array if needed
global $LANG;
if (! isset($LANG) || (isset($LANG) && ! is_array($LANG))) {
	$LANG = array();
}

$LANG['ANYNEWS'][0] = array(
	// text outputs for the frontend
	'TXT_HEADER'             => 'Zadnje Novice',
	'TXT_READMORE'           => 'beri več',
	'TXT_NO_NEWS'            => 'Trenutno ni novic.',
	'TXT_NEWS'               => 'Novice',
	'TXT_NUMBER_OF_COMMENTS' => 'Število komentarjev',
	
	// date/time format: (21:12, 31/10/2012)
	'DATE_FORMAT'            => 'G:i, d/m/Y'
);