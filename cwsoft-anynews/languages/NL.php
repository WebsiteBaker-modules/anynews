<?php
/**
 * Code snippet: cwsoft-anynews
 *
 * This code snippets grabs news entries from the WebsiteBaker news
 * module and displays them on any page you want by invoking the function
 * getNewsItems() via a page of type code or the index.php
 * file of the template.
 *
 * This file contains the Dutch language output.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS WebsiteBaker 2.8.x
 * @package     cwsoft-anynews
 * @author      cwsoft (http://cwsoft.de)
 * @translation	Dutch translation by forum members D72, Argos
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/

// Dutch module description
$module_description	= 'Snippet om nieuwsberichten te tonen op elke pagina die u maar wilt. Functie kan opgeroepen worden vanuit de template of een code-sectie. Meer informatie is te vinden op <a href="https://github.com/cwsoft/websitebaker-anynews#readme" target="_blank">GitHub</a>.';

// initialize global $LANG variable as array if needed
global $LANG;
if (! isset($LANG) || (isset($LANG) && ! is_array($LANG))) {
	$LANG = array();
}

$LANG['ANYNEWS'][0] = array(
	// text outputs for the frontend
	'TXT_HEADER'             => 'Laatste nieuws',
	'TXT_READMORE'           => 'Lees meer',
	'TXT_NO_NEWS'            => 'Geen nieuws beschikbaar.',
	'TXT_NEWS'               => 'Nieuws',
	'TXT_NUMBER_OF_COMMENTS' => 'Aantal reakties',
	
	// date/time format: (31-12-2012, 09:12)
	'DATE_FORMAT'            => 'd-m-Y, H:i'
);