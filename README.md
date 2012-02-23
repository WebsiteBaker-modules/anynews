# Anynews code snippet for CMS WebsiteBaker (2.8.x)

Anynews allows you to display news entries from the [WebsiteBaker CMS](http://www.websitebaker2.org) news module where you want them to be. Anynews provides the function `displayNewsItems()`, which can be invoked from the ***index.php*** file of your template, or from a code page/section. 

The Anynews output can be modified by various function parameters. You can style the appearance of the news outputs by adjusting the Anynews template files located in */modulues/anynews/templates* and/or by CSS style definitions located in */modules/anynews/csss*.

## Download
The latest stable Anynews [installation package](https://github.com/cwsoft/wb-anynews/raw/master/wb-anynews-installer.zip) for the WebsiteBaker CMS is included in the GitHub master branch. Older versions are available as [archives](https://github.com/cwsoft/wb-anynews/tags), but are ***NOT*** directly installable in the WebsiteBaker CMS. The history of the Addon File Editor module can be tracked via [GitHub](https://github.com/cwsoft/wb-anynews).

## License
The Addon File Editor module is licensed under the [GNU General Public License (GPL) v3.0](http://www.gnu.org/licenses/gpl-3.0.html).

## Requirements

The minimum requirements to get Anynews running are as follows:

- WebsiteBaker CMS v2.8.x series (requiring ***v2.8.2 or higher***)
- PHP 5.2.2 (recommended: last stable version of the PHP 5.3.x series)
- News entries created by the WebsiteBaker news module

## Installation

1. download latest stable [WebsiteBaker installation package](https://github.com/cwsoft/wb-anynews/raw/master/wb-anynews-installer.zip)
2. log into your WebsiteBaker backend and go to the `Add-ons/Modules` section
3. install the downloaded zip archive via the WebsiteBaker installer
4. go to the `Pages` section and create a new page of type `code`
5. enter the following code into the code section `displayNewsItems();`
6. visit the frontent of your website and view the output

## Usage
The function `displayNewsItems()` provided by the Anynews snippet can either be called in a code page/section of type code, or from the ***index.php*** of your frontend template. The function `displayNewsItems` can have various parameters, which alter the news output. Details can be found in the next section.

## Function Parameter

The function call `displayNewsItems();` executes Anynews with the following default parameters:

<pre>
displayNewsItems(
   $group_id = 0,
   $max_news_items = 10,
   $max_news_length = -1,
   $display_mode = 1,
   $lang_id = 'AUTO',
   $strip_tags = true,
   $allowed_tags = '&lt;p&gt;&lt;a&gt;&lt;img&gt;',
   $custom_placeholder = false,
   $sort_by = 1,
   $sort_order = 1,
   $not_older_than = 0
);
</pre>

***Optional Parameters:***
<pre>
  group_id...        group to show news from (default:= 0 all groups, X:= group X, for multiple groups: array(2,4,5) )
  max_news_items...  maximal number of news shown (default:= 10, min:=1, max:= 999)
  max_news_length... maximal length of the short news text shown (default:=-1 for full news length)
  display_mode...    1:=details (default); 2:=unsorted list; 3:=coda slider; 4-99 (custom template: custom_output_display_mode_X.htt)
  lang_id...         module language file ID (default:= 'auto', examples: 'auto', 'DE', 'EN')

  strip_tags...      true:=remove all tags not allowed via variable $allowed_tags (default:=true); false:=don´t strip tags
  allowed_tags...    allowed tags (default:='&lt;p&gt;&lt;a&gt;&lt;img&gt;')
  custom_placeholder false:= none (default), array('MY_VAR_1' => '%TAG%', ... 'MY_VAR_N' => '#regex_N#' ...)

  sort_by...         1:=position (default), 2:=posted_when, 3:=published_when, 4:= random order, 5:= number of comments
  sort_order...      1:=descending (default), 2:=ascending
  not_older_than..   0:=disabled (default), 0-999 (only show news `published_when` date <=x days; 12 hours:=0.5)
</pre>

***Custom placeholders (experienced users):***
You can use regular expressions to extract data from the short or long news text fields and to assign them to a variable usable in the template files. 

The short hand regular expressions `%TAG%` can be used when dealing with inputs enclosed in HTML tags. For images, the full image tag is returned, for other tags, only the text between opening and closing pairs (<TAG>...</TAG>) is returned. 

You can also provide your own regular expression. With `#(test)#i`, all matches of the word test (case insensitiv) are returned. Only one capturing group () can be used. The regular expression needs to be enclosed in #.

The match(es) of the regular expression will be stored in placeholder variables usable in the Anynews template files (templates/*.htt). The naming convention of the placeholders is as follows:
`MY_VAR` will be translated into `PREFIX_MY_VAR_NUMBER`, where PREFIX becomes SHORT|LONG, identifying if the regular expression matched in short or long news text. NUMBER is a counter which starts with 1 and will be increased for each match found by the regular expression.

*Example*:
`custom_placeholder = array('IMG_LINK' => '%img%', 'MY_VAR' => '#(test)#i')`

## Needing help ??
If you run into problems with the Anynews snippet, please visit the [English](http://www.websitebaker2.org/forum/index.php/topic,23355) WebsiteBaker forum support threads and ask for feedback. 

***Always provide the following information with your support request:***

 - detailed error description (what happens, what have you tried ...)
 - the Anynews version (see /modules/anynews/index.php on your server)
 - your PHP version (use phpinfo(); or ask your provider if in doubt)
 - WebsiteBaker version, Service Pack number and build number of your version
 - name of the WebsiteBaker backend theme used (e.g. wb_theme, argos_theme ...)
 - information about changes you made to WebsiteBaker (if any)

## Credits
Credits goes to the WebsiteBaker forum member [Blackbird](http://www.websitebaker2.org/forum/index.php?action=profile;u=14154), who maintained the Anynews module between July 2009 and March 2010 and to the following users for providing `Anynews` language files.

- **Dutch (NL.php):** forum member [D72](http://www.websitebaker2.org/forum/index.php?action=profile;u=7298)
- **French (FR.php):** by Guillaume Vielliard
- **Estonia (EE.php):** forum member [eazybaker](http://www.websitebaker2.org/forum/index.php?action=profile;u=11394)
- **Serbian (RS.php):** forum member [Mirens](http://www.websitebaker2.org/forum/index.php?action=profile;u=13226)