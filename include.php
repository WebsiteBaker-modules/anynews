<?php
/**
 * Code snippet: anynews
 *
 * This code snippets grabs news entries from the WebsiteBaker news
 * module and displays them on any page you want by invoking the function
 * displayNewsItems() via a page of type code or the index.php
 * file of the template.
 *
 * This file implements the Anynews function displayNewsItems.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS WebsiteBaker 2.8.x
 * @package     anynews
 * @author      cwsoft (http://cwsoft.de)
 * @version     2.1.0
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/

// prevent this file from being accessed directly
if (!defined('WB_PATH')) die(header('Location: ../../index.php'));

// function to display news items on every page via (invoke function from template or code page)
if (!function_exists('displayNewsItems')) {
	function displayNewsItems(
		$group_id           = 0,
		$max_news_items     = 10,
		$max_news_length    = -1,
		$display_mode       = 1,
		$lang_id            = 'AUTO',
		$strip_tags         = true,
		$allowed_tags       = '<p><a><img>',
		$custom_placeholder = false,
		$sort_by            = 1,
		$sort_order         = 1,
		$not_older_than     = 0
  )	{
		// group_id... 			group to show news from (default:= 0 all groups, X:= group X, for multiple groups: array(2,4,5) )
		// max_news_items... 	maximal number of news shown (default:= 10, min:=1, max:= 999)
		// max_news_length... 	maximal length of the short news text shown (default:=-1 => full news length)
		// display_mode... 		1:=details (default); 2:=unsorted list; 3:=coda slider; 4-99 (custom template: custom_output_display_mode_X.htt)
		// lang_id...			module language file ID (default:= auto, examples: AUTO, DE, EN)

		// strip_tags... 		true:=remove tags from short and long text (default:=true); false:=don´t strip tags
		// allowed_tags...		tags not striped off (default:='<p><a><img>')
		// $custom_placeholder	false:= none (default), array('MY_VAR_1' => '%TAG%#', ... 'MY_VAR_N' => '#regex_N#' ...)

		// sort_by..			1:=position (default), 2:=posted_when, 3:=published_when (WB 2.7), 4:= random order, 5:=number of comments
		// sort_order..			1:=descending (default), 2:=ascending
		// not_older_than..		0:=disabled (default), 0-999 (only show news `published_when` date <=x days; 12 hours:=0.5)

		// register outside variables
		global $wb, $database;

		/**
		 * Include module function and language file
		 */
		require_once(dirname(__FILE__) . '/functions.inc.php');

		// load module language file
		if (!isset($LANG)) global $LANG;
		loadLanguageFile($lang_id);

		// output message for outdated Website Baker versions
		if ((double) WB_VERSION < 2.7) {
			echo $LANG[0]['TXT_REQUIREMENTS'];
			return;
		}

		/**
		 * Sanitize user specified function parameters
		 */
		sanitizeUserInputs($group_id, 'i{0;0;999}');
		sanitizeUserInputs($max_news_items, 'i{10;1;999}');
		sanitizeUserInputs($max_news_length, 'i{-1;0;250}');
		sanitizeUserInputs($display_mode, 'i{1;1;99}');
		sanitizeUserInputs($strip_tags, 'b');
		sanitizeUserInputs($allowed_tags, 's{TRIM}');
		sanitizeUserInputs($sort_by, 'i{1;1;5}');
		sanitizeUserInputs($sort_order, 'i{1;1;2}');
		sanitizeUserInputs($not_older_than, 'd{0;0;999}');

		/**
		 * Work out SQL query for the group_id
		 * $sql_group_id:= ($group_id:=0 => '1'; $group_id:=X => `group_id` = 'X'; $group_id:=array(2,3) => `group_id` IN ('2,3'))
		 */
		// show all groups if group_id is array which contains 0
		if (is_array($group_id) && in_array(0, $group_id)) $group_id = 0;

		// check for multiple groups or single group values
		if (is_array($group_id)) {
			// SQL query for multiple groups
			$sql_group_id = '`group_id` IN (' . implode(',', $group_id) . ')';
		} else {
			// SQL query for single or empty groups
			$sql_group_id = ($group_id) ? '`group_id` = \'' . $group_id . '\'' : '1';
		}

		/**
		 * Work out SQL query for the not older than option
		 * This options allows to restrict the matches to news not older than X days
		 */
		// work out current server time (also used for published_when and published_until checks)
		$server_time = time();

		// additional query string to consider not older than settings
		$sql_not_older_than = '1';
		if ($not_older_than > 0) {
			$sql_not_older_than = ' (`published_when` >= \'' . ($server_time - ($not_older_than * 24 * 60 * 60)) . '\')';
		}

		/**
		 * Work out SQL sort by and sort order query string
		 */
		// creates SQL query for sort by option
		$order_by_options = array('`position`', '`posted_when`', '`published_when`', 'RAND()', '`comment_count`');
		$sql_order_by = $order_by_options[$sort_by -1];
		
		// creates SQL query for sort order option
		$sql_sort_order = ($sort_order == 1) ? 'DESC' : 'ASC';
		
		/**
		 * v1.15 - option to sort by number of comments
		 **/
		$join   = NULL;
		$fields = '*';
		$group  = NULL;
		
    if ( $sort_by == 5 ) {
        $join = ' LEFT JOIN '.TABLE_PREFIX.'mod_news_comments AS t2 ON t1.post_id=t2.post_id ';
        $fields = 't1.*, count(comment_id) AS comment_count';
        $group  = 'GROUP BY t1.post_id';
    }

		/**
		 * Perform SQL database query for Anynews
		 */
		$table = TABLE_PREFIX . 'mod_news_posts';
		$sql = "SELECT $fields FROM `$table` AS t1 $join
			WHERE `active` = '1'
			AND $sql_group_id 
			AND (`published_when` = '0' OR `published_when` <= '$server_time')
			AND (`published_until` = '0' OR `published_until` >= '$server_time')
			AND $sql_not_older_than
			$group
			ORDER BY $sql_order_by $sql_sort_order
			LIMIT 0, $max_news_items";

		// fetch data from the database
		$results = $database->query($sql);

		/**
		 * Process database query and output the template files
		 */
		// check if at least one news article was found
		if ($results && $results->numRows() > 0) {
			/**
			 * Include Website Baker template parser and configure it
			*/
			// include template class and initiate object (set template folder: "./templates")
			require_once(WB_PATH . '/include/phplib/template.inc');
			$tpl = new Template(dirname(__FILE__) . '/templates');

			// configure handling of unknown {variables} (remove:=default, keep, comment)
			$tpl->set_unknowns('remove');

			// configure debug mode (0:= default, 1:=variable assignments, 2:=calls to get variable, 4:=show internals)
			$tpl->debug = 0;

			// set template file depending on $display_mode
			if ($display_mode > 3 && file_exists(dirname(__FILE__) . '/templates/custom_output_display_mode_' . $display_mode . '.htt')) {
				// assign custom template file: 'custom_output_display_mode_X.htt' [X:=4..99] to variable/handle page
				$tpl->set_file('page', 'custom_output_display_mode_' . $display_mode . '.htt');
			} else {
				// assign one of the standard template files to variable/handle page
				switch($display_mode) {
					case 2:
						$tpl->set_file('page', 'list_output.htt');
						break;
						
					case 3:
						$tpl->set_file('page', 'coda_slider_output.htt');
						break;

					default:
						$tpl->set_file('page', 'detailed_output.htt');
						break;
				}
			}
			
			// set link block required for the coda slider (can be used in custom templates where a second block is required)
			$tpl->set_block('page', 'link_block', 'link_block_handle');

			// set news block (variable/handle of file including the block, block name in file, new variable/handle for block)
			$tpl->set_block('page', 'news_block', 'news_block_handle');

      // "read more" link block
      $tpl->set_block('news_block', 'readmore_link_block', 'readmore_link_block_handle');

			/**
			 * Replace template placeholders with values from language file or database query
			 */
			// replace placeholders with values from language file
			foreach($LANG[0] as $key => $value) {
				$tpl->set_var($key, $value);
			}

			// fetch news group titles from news database table
			$news_group_titles = getNewsGroupTitles();

			// fetch user names from users database table
			$user_list = getUserNames();

			// loop through all news articles found
			$news_counter = 1;
			while ($row = $results->fetchRow()) {

				// build absolute links from [wblink] tags found in news short or long text database field
				$wb->preprocess($row['content_short']);
				$wb->preprocess($row['content_long']);

				/**
				 * fetch custom placeholders from short/long text fields and replace template placeholders with values
				 */
				$custom_vars_short_text = getCustomOutputVariables($row['content_short'], $custom_placeholder, 'SHORT');
				$custom_vars_long_text = getCustomOutputVariables($row['content_long'], $custom_placeholder, 'LONG');
				$custom_vars = array_merge($custom_vars_short_text, $custom_vars_long_text);

				// replace custom placeholders in template with values
				foreach($custom_vars as $key => $value) {
					$tpl->set_var($key, $value);
				}

				// remove tags from short and long text if defined
				$row['content_short'] = ($strip_tags) ? strip_tags($row['content_short'], $allowed_tags) : $row['content_short'];
				$row['content_long'] = ($strip_tags) ? strip_tags($row['content_long'], $allowed_tags) : $row['content_long'];

				// shorten news text to defined news length (-1 for full text length)
				if ($max_news_length != -1 && strlen($row['content_short']) > $max_news_length) {
					// consider start position if short content starts with <p> or <div>
					$start_pos = (preg_match('#^(<(p|div)>)#', $row['content_short'], $match)) ? strlen($match[0]) : 0;
// Original line; break content_short after $max_news_length; breaks
// in the middle of a word!
//					$row['content_short'] = substr($row['content_short'], $start_pos, $max_news_length) . '...';
// New code; break at word boundary
          $row['content_short']
              = truncate(
                    substr( $row['content_short'], $start_pos ),
                    $max_news_length,
                    '...',
                    false,
                    true
                );
				}
				
        $group_id = $row['group_id'];
        $image = '';
        if(file_exists(WB_PATH.MEDIA_DIRECTORY.'/.news/image'.$group_id.'.jpg'))
        {
            $image = '<img src="'.WB_URL.MEDIA_DIRECTORY.'/.news/image'.$group_id.'.jpg'.'" alt="" />';
        }

				// replace the news article dependend template placeholders
				$tpl->set_var(array(
					'WB_URL'		   	  => WB_URL,
					'GROUP_IMAGE'     => $image,
					'NEWS_ID'			    => $news_counter,
					'POST_ID'			    => (int) $row['post_id'],
					'SECTION_ID'		  => (int) $row['section_id'],
					'PAGE_ID'			    => (int) $row['page_id'],
					'GROUP_ID'			  => (int) $row['group_id'],
					'GROUP_TITLE'		  => array_key_exists($row['group_id'], $news_group_titles)
											      ? htmlentities($news_group_titles[$row['group_id']])
                            : '',
					'POSTED_BY'			  => (int) $row['posted_by'],
					'USERNAME'			  => array_key_exists($row['posted_by'], $user_list)
											      ? htmlentities($user_list[$row['posted_by']]['USERNAME'])
                            : '',
					'DISPLAY_NAME'		=> array_key_exists($row['posted_by'], $user_list) 
											      ? htmlentities($user_list[$row['posted_by']]['DISPLAY_NAME'])
                            : '',
					'TITLE'				    => ($strip_tags) ? strip_tags($row['title']) : $row['title'],
					'COMMENTS'        => isset( $row['comment_count'] ) ? $row['comment_count'] : NULL,
					'LINK'				    => WB_URL . PAGES_DIRECTORY . $row['link'] . PAGE_EXTENSION,
					'CONTENT_SHORT'		=> $image.$row['content_short'],
					'CONTENT_LONG'		=> $row['content_long'],
					'POSTED_WHEN'		  => date($LANG[0]['DATE_FORMAT'], $row['posted_when']),
					'PUBLISHED_WHEN'	=> date($LANG[0]['DATE_FORMAT'], $row['published_when']),
					'PUBLISHED_UNTIL'	=> date($LANG[0]['DATE_FORMAT'], $row['published_until']),
				));

				// add template values in news block in append mode (add per loop)
				$tpl->parse('link_block_handle', 'link_block', true);

				// remove "read more" from template if no long content is available
				$tpl->parse( 'readmore_link_block_handle', 'readmore_link_block', false );
				if (
             ! isset( $row['content_long'] )
             ||
             ! strlen( $row['content_long'] ) > 0
        ) {
            $tpl->set_var( 'readmore_link_block_handle', '' );
        }

				$tpl->parse('news_block_handle', 'news_block', true);

				// remove custom variables to start blank for the next news entry
				foreach($custom_vars as $key => $value) {
					$tpl->set_var($key, '');
				}

				$news_counter++;
			}

			// ouput the final template
			$tpl->pparse('output', 'page');
		
		} else {
			// output no news message
			echo $LANG[0]['TXT_NO_NEWS'];
		}
	}
}

/**
 * http://www.gsdesign.ro/blog/cut-html-string-without-breaking-the-tags/
 *
 * Truncates text.
 *
 * Cuts a string to the length of $length and replaces the last characters
 * with the ending if the text is longer than length.
 *
 * @param string  $text String to truncate.
 * @param integer $length Length of returned string, including ellipsis.
 * @param string  $ending Ending to be appended to the trimmed string.
 * @param boolean $exact If false, $text will not be cut mid-word
 * @param boolean $considerHtml If true, HTML tags would be handled correctly
 * @return string Trimmed string.
 */
	function truncate($text, $length = 100, $ending = '...', $exact = true, $considerHtml = false) {
		if ($considerHtml) {
			// if the plain text is shorter than the maximum length, return the whole text
			if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
				return $text;
			}
			// splits all html-tags to scanable lines
			preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
			$total_length = strlen($ending);
			$open_tags = array();
			$truncate = '';
			foreach ($lines as $line_matchings) {
				// if there is any html-tag in this line, handle it and add it (uncounted) to the output
				if (!empty($line_matchings[1])) {
					// if it's an "empty element" with or without xhtml-conform closing slash (f.e. <br/>)
					if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
						// do nothing
					// if tag is a closing tag (f.e. </b>)
					} else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
						// delete tag from $open_tags list
						$pos = array_search($tag_matchings[1], $open_tags);
						if ($pos !== false) {
							unset($open_tags[$pos]);
						}
					// if tag is an opening tag (f.e. <b>)
					} else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
						// add tag to the beginning of $open_tags list
						array_unshift($open_tags, strtolower($tag_matchings[1]));
					}
					// add html-tag to $truncate'd text
					$truncate .= $line_matchings[1];
				}
				// calculate the length of the plain text part of the line; handle entities as one character
				$content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
				if ($total_length+$content_length> $length) {
					// the number of characters which are left
					$left = $length - $total_length;
					$entities_length = 0;
					// search for html entities
					if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
						// calculate the real length of all entities in the legal range
						foreach ($entities[0] as $entity) {
							if ($entity[1]+1-$entities_length <= $left) {
								$left--;
								$entities_length += strlen($entity[0]);
							} else {
								// no more characters left
								break;
							}
						}
					}
					$truncate .= substr($line_matchings[2], 0, $left+$entities_length);
					// maximum lenght is reached, so get off the loop
					break;
				} else {
					$truncate .= $line_matchings[2];
					$total_length += $content_length;
				}
				// if the maximum length is reached, get off the loop
				if($total_length>= $length) {
					break;
				}
			}
		} else {
			if (strlen($text) <= $length) {
				return $text;
			} else {
				$truncate = substr($text, 0, $length - strlen($ending));
			}
		}
		// if the words shouldn't be cut in the middle...
		if (!$exact) {
			// ...search the last occurance of a space...
			$spacepos = strrpos($truncate, ' ');
			if (isset($spacepos)) {
				// ...and cut the text in this position
				$truncate = substr($truncate, 0, $spacepos);
			}
		}
		// add the defined ending to the text
		$truncate .= $ending;
		if($considerHtml) {
			// close all unclosed html-tags
			foreach ($open_tags as $tag) {
				$truncate .= '</' . $tag . '>';
			}
		}
		return $truncate;
	}
?>