<?php
/**
 * Code snippet: cwsoft-anynews
 *
 * This code snippets grabs news entries from the WebsiteBaker news
 * module and displays them on any page you want by invoking the function
 * getNewsItems() via a page of type code or the index.php
 * file of the template.
 *
 * This file contains the Serbian language output.
 *
 * LICENSE: GNU General Public License 3.0
 *
 * @platform    CMS WebsiteBaker 2.8.x
 * @package     cwsoft-anynews
 * @author      cwsoft (http://cwsoft.de)
 * @translation	Serbian translation by forum member Mirens
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/

// Serbian module description
$module_description	= 'WebsiteBaker modul za prikazivanje novosti na bilo kojoj stranici va&scaron;eg web site-a. Funkcija modula mo&#0158;e biti implementirana u sam template ili putem code sekcije. Detalji i pomo&#263; oko kori&scaron;&#263;enja ovog modula mogu se na&#263;i u samom modulu na linku <a href="https://github.com/cwsoft/websitebaker-anynews#readme" target="_blank">GitHub</a>.';

// initialize global $LANG variable as array if needed
global $LANG;
if (! isset($LANG) || (isset($LANG) && ! is_array($LANG))) {
	$LANG = array();
}

$LANG['ANYNEWS'][0] = array(
	// text outputs for the frontend
	'TXT_HEADER'             => 'Najnovije vesti',
	'TXT_READMORE'           => 'detaljnije',
	'TXT_NO_NEWS'            => 'Vesti ne postoje u bazi.',
	'TXT_NEWS'               => 'Novosti',
	'TXT_NUMBER_OF_COMMENTS' => 'Number of comments',
	
	// date/time format: (9:12 PM, 10/20/2008)
	'DATE_FORMAT'            => 'd.m.Y. - H:i'
);