<?php
/**
 * Dutch language file for the code snippet: anynews
 *
 * This code snippets grabs news from the WB news module database
 * and displays them on any page you want by invoking the function
 * displayNewsItems() via a page of type code or the index.php 
 * file of the template.
 *
 * This file contains the Dutch language output.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS Websitebaker 2.8.x
 * @package     anynews
 * @author      cwsoft (http://cwsoft.de)
 * @translation	forum Dave (ak D72)
 * @version     2.0.0
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl.html
*/

// English module description
$module_description	= 'Snippet om nieuws items te tonen op elke pagina die u maar wilt. Functie kan opgeroepen worden vanuit de template of een code sectie. Meer informatie is te vinden in de module <a href="{WB_URL}/modules/anynews/help/help_nl.html" target="_blank">LEESMIJ</a> file';

// declare module language array
$LANG = array();

// Text outputs for the frontend
$LANG[0] = array(
	'TXT_HEADER'		=> 'Laatste nieuws', 
	'TXT_READMORE'		=> 'lees meer', 
	'TXT_NO_NEWS'		=> 'Nog geen nieuws beschikbaar.',
	'TXT_NEWS'			=> 'Nieuws', 
	// English date/time format: (9:12 PM, 10/20/2008)
	'DATE_FORMAT'		=> ' (g:i A, d-m-Y)',		
	'TXT_REQUIREMENTS'	=> 'Helaas, Anynews vereist Website Baker 2.7 of hoger.',		
);

?>