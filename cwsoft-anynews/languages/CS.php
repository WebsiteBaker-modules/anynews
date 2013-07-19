<?php
/**
 * Code snippet: cwsoft-anynews
 *
 * This code snippets grabs news entries from the WebsiteBaker news
 * module and displays them on any page you want by invoking the function
 * getNewsItems() via a page of type code or the index.php
 * file of the template.
 *
 * This file contains the Czech language output.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS WebsiteBaker 2.8.x
 * @package     cwsoft-anynews
 * @author      cwsoft (http://cwsoft.de)
 * @translation Czech translation by forum member dana
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/

// Czech module description
$module_description = 'Tento modul cwsoft-anynews umožňuje zobrazovat vaše aktuality ze systému Websitebaker na jakémkoliv místě. Funkci můžete použít v sekci Code na jakékoliv stránce nebo ve vaší šabloně v souboru index.php. Detaily viz <a href="https://github.com/cwsoft/wb-cwsoft-anynews#readme" target="_blank">GitHub</a>.';

// initialize global $LANG variable as array if needed
global $LANG;
if (! isset($LANG) || (isset($LANG) && ! is_array($LANG))) {
	$LANG = array();
}

$LANG['ANYNEWS'][0] = array(
	// text outputs for the frontend
	'TXT_HEADER'             => 'Aktuality',
	'TXT_READMORE'           => 'číst více',
	'TXT_NO_NEWS'            => 'Nejsou k dispozici žádné aktuality.',
	'TXT_NEWS'               => 'Novinky',
	'TXT_NUMBER_OF_COMMENTS' => 'Počet komentářů',
	
	// date/time format: (9:12 PM, 12/31/2012)
	'DATE_FORMAT'            => 'H:i, j.n.Y'
);