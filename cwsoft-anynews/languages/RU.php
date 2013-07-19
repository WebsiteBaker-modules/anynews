<?php
/**
 * Code snippet: cwsoft-anynews
 *
 * This code snippets grabs news entries from the WebsiteBaker news
 * module and displays them on any page you want by invoking the function
 * getNewsItems() via a page of type code or the index.php
 * file of the template.
 *
 * This file contains the Russian language output.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS WebsiteBaker 2.8.x
 * @package     cwsoft-anynews
 * @author      cwsoft (http://cwsoft.de)
 * @translation Russian translation by forum member owk444
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/

// Russian module description
$module_description = 'Сниппет cwsoft-anynews позволяет отображать записи из модуля новостей WebsiteBaker в любом месте по вашему желанию. Функция вызывается из секции типа "Code" или вашего файла шаблона index.php. Подробнее см. <a href="https://github.com/cwsoft/wb-cwsoft-anynews#readme" target="_blank">GitHub</a>.';

// initialize global $LANG variable as array if needed
global $LANG;
if (! isset($LANG) || (isset($LANG) && ! is_array($LANG))) {
	$LANG = array();
}

$LANG['ANYNEWS'][0] = array(
	// text outputs for the frontend
	'TXT_HEADER'             => 'Последние новости',
	'TXT_READMORE'           => 'читать дальше',
	'TXT_NO_NEWS'            => 'На сегодня новостей нет.',
	'TXT_NEWS'               => 'Новсоти',
	'TXT_NUMBER_OF_COMMENTS' => 'Комментариев',
	
	// date and time format in PHP date format
	'DATE_FORMAT'            => 'H:i , d.m.Y'
);
