<?php
/**
 * Code snippet: cwsoft-anynews
 *
 * This code snippets grabs news entries from the WebsiteBaker news
 * module and displays them on any page you want by invoking the function
 * displayNewsItems() via a page of type code or the index.php
 * file of the template.
 *
 * This file contains the English language output.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS WebsiteBaker 2.8.x
 * @package     cwsoft-anynews
 * @author      cwsoft (http://cwsoft.de)
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/

// English module description
$module_description = 'The snippet cwsoft-anynews allows to display news entries from the WebsiteBaker news module at any place you want. Invoke the function from a code section or your template index.php file. For details see <a href="https://github.com/cwsoft/wb-cwsoft-anynews#readme" target="_blank">GitHub</a>.';

// initialize global $LANG variable as array if needed
global $LANG;
if (! isset($LANG) || (isset($LANG) && ! is_array($LANG))) {
	$LANG = array();
}

$LANG['ANYNEWS'][0] = array(
	// text outputs for the frontend
	'TXT_HEADER'             => 'Latest News',
	'TXT_READMORE'           => 'read more',
	'TXT_NO_NEWS'            => 'No news available yet.',
	'TXT_NEWS'               => 'News',
	'TXT_NUMBER_OF_COMMENTS' => 'Number of comments',
	
	// date/time format: (9:12 PM, 12/31/2012)
	'DATE_FORMAT'            => 'g:i A, m/d/Y'
);