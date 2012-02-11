<?php
/**
 * Fichier de langue en français pour le code snippet: anynews
 *
 * Ce code snippet récupère les news dans la base de donnée du module de news
 * et affiche les news sur n'importe quelle autre page là où la fonction
 * displayNewsItems() est appellée via une page de code ou via le template index.php 
  *
 * Ce fichier contient la langue française
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS Websitebaker 2.8.x
 * @package     anynews
 * @author      cwsoft (http://cwsoft.de)
 * @translation Guillaume Vielliard
 * @version     2.0.0
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl.html
 */

// Description du module
$module_description	= 'Code pour afficher des news sur différentes pages . Cette fonction peut être apellée depuis le template ou dans une section de code. Plus de détails sur ce module dans le fichier suivant <a href="{WB_URL}/modules/anynews/help/help_en.html" target="_blank">LISEZMOI</a> ';

// Declaration du tableau
$LANG = array();

// Affichage du texte dans le frontoffice
$LANG[0] = array(
	'TXT_HEADER'		=> 'Dernière news', 
	'TXT_READMORE'		=> 'Lire la suite', 
	'TXT_NO_NEWS'		=> 'Pas encore de news.',
	'TXT_NEWS'			=> 'News', 
	// format français de la  date/time format: (9:12 PM, 20/10/2008)
	'DATE_FORMAT'		=> ' (H:i A, d/m/Y)',		
	'TXT_REQUIREMENTS'	=> 'Désolé, Anynews nécessite Website Baker 2.7 ou plus.',		
);

?>