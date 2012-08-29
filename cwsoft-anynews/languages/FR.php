<?php
/**
 * Code snippet: cwsoft-anynews
 *
 * This code snippets grabs news entries from the WebsiteBaker news
 * module and displays them on any page you want by invoking the function
 * displayNewsItems() via a page of type code or the index.php
 * file of the template.
 *
 * This file contains the French language output.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS WebsiteBaker 2.8.x
 * @package     cwsoft-anynews
 * @author      cwsoft (http://cwsoft.de)
 * @translation French translation by forum member Guillaume Vielliard
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
 */

// French module description
$module_description	= 'Code pour afficher des news sur diff&egrave;rentes pages . Cette fonction peut &ecirc;tre apell&egrave;e depuis le template ou dans une section de code. Plus de d&egrave;tails sur ce module dans le fichier suivant <a href="https://github.com/cwsoft/wb-cwsoft-anynews#readme" target="_blank">GitHub</a>.';

// initialize global $LANG variable as array if needed
global $LANG;
if (! isset($LANG) || (isset($LANG) && ! is_array($LANG))) {
	$LANG = array();
}

$LANG['ANYNEWS'][0] = array(
	// text outputs for the frontend
	'TXT_HEADER'             => 'Derni&egrave;re news',
	'TXT_READMORE'           => 'Lire la suite',
	'TXT_NO_NEWS'            => 'Pas encore de news.',
	'TXT_NEWS'               => 'News',
	'TXT_NUMBER_OF_COMMENTS' => 'Number of comments',
	
	// date/time format: (9:12 PM, 31/12/2012)
	'DATE_FORMAT'            => 'H:i A, d/m/Y'
);