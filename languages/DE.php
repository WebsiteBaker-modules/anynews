<?php
/**
 * German language file for the code snippet: anynews
 *
 * This code snippets grabs news from the WB news module database
 * and displays them on any page you want by invoking the function
 * displayNewsItems() via a page of type code or the index.php 
 * file of the template.
 *
 * This file contains the German language output.
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

// German module description
$module_description	= 'Die Zusatzfunktion Anynews erlaubt das anzeigen von Beitr&auml;gen des News-Moduls auf beliebigen Seiten. Die Funktion kann im Template oder von einer Seite/Abschnitt des Typs Code aufgerufen werden. Weitere Informationen finden sich in der <a href="{WB_URL}/modules/anynews/help/help_en.html" target="_blank">README</a> Datei.';

// declare module language array
$LANG = array();

// Text outputs for the frontend
$LANG[0] = array(
	'TXT_HEADER'		=> 'Aktuelle Nachrichten', 
	'TXT_READMORE'		=> 'weiter lesen', 
	'TXT_NO_NEWS'		=> 'Keine Nachrichten vorhanden.',
	'TXT_NEWS'			=> 'News', 
	// German date/time format: (21:12, 20.10.2008)
	'DATE_FORMAT'		=> ' (H:i, d.m.Y)',
	'TXT_REQUIREMENTS'	=> 'Anynews ben&ouml;tigt Website Baker 2.7 oder h&ouml;her.',		
);

?>