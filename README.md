# Anynews Code Snippet for CMS WebsiteBaker (2.8.x)
The code snippet `Anynews` is designed to fetch news entries from the [WebsiteBaker CMS](http://www.websitebaker2.org) `news` module. Just call the Anynews function ***displayNewsItems();*** where you want the news output to appear on your frontend. Optional function parameters, HTML templates, content placeholders and CSS definitions allows you to style the news output the way you want. Anynews ships with four templates - including two jQuery sliding effects - ready for use out of the box.

Power users define their own placeholders containing information extracted from the short and/or long `news` module description. Mastering Anynews is possible - but requires you to study the information provided in the section ***Customizing Anynews***.

## Download
The latest stable Anynews [installation package](https://github.com/cwsoft/wb-anynews/raw/master/wb-anynews-installer.zip) for the WebsiteBaker CMS is always included in the GitHub master branch. Older versions are available as [archives](https://github.com/cwsoft/wb-anynews/tags), but are ***NOT*** directly installable in the WebsiteBaker CMS. The development history of Anynews can be tracked via [GitHub](https://github.com/cwsoft/wb-anynews).

## License
Anynews is licensed under the [GNU General Public License (GPL) v3.0](http://www.gnu.org/licenses/gpl-3.0.html).

## Requirements
The minimum requirements to get Anynews running on your WebsiteBaker installation are as follows:

- WebsiteBaker ***2.8.2*** or higher (recommended last stable 2.8.x version)
- default WebsiteBaker `news` module
- PHP ***5.2.2*** or higher (recommended last stable PHP 5.3.x version)
- Optional: small modification of your template file to enable jQuery support

## Installation
1. download latest stable [WebsiteBaker installation package](https://github.com/cwsoft/wb-anynews/raw/master/wb-anynews-installer.zip) from GitHub master branch
2. log into your WebsiteBaker backend and go to the `Add-ons/Modules` section
3. install the downloaded zip archive via the WebsiteBaker installer

### Enable jQuery support (optional)
If you want to use jQuery effect with Anynews, you need to add one code line to your frontend template. Open the frontend template file ***index.php*** with the [Addon File Editor](https://github.com/cwsoft/wb-addon-file-editor#readme) and search for the following lines.

<pre>
if (function_exists('register_frontend_modfiles')) {
    register_frontend_modfiles('css');
    register_frontend_modfiles('js');
</pre>

Change the lines above as follows:

<pre>
if (function_exists('register_frontend_modfiles')) {
    register_frontend_modfiles('css');
    register_frontend_modfiles('jquery');
    register_frontend_modfiles('js');
</pre>

## Usage
As Anynews is designed to fetch news items from the WebsiteBaker `news` module, you need to add some news entries with the `news` module **before** you can use Anynews. If no news are available, Anynews just outputs the message "No news available yet". Follow the steps below to add some news entries with the WebsiteBaker `news` module.

1. log into your WebsiteBaker backend and go to the `Pages` section
2. create a new page or section of type `News` (set visibility to None)
3. add some news entries (2-3) from the `news` page in the WebsiteBaker backend

### Use Anynews from a page or section
Create a new page or section of type `Code` in the WebsiteBaker backend and enter the following code to it.

	if (function_exists('displayNewsItems')) {
		displayNewsItems();
	}

The Anynews output is only visible at the pages/sections of your frontend, which contain the code above.

### Use Anynews from your template
To display news items at a fixed position in your frontend, open the ***index.php*** file of your default frontend template with the [Addon File Editor](https://github.com/cwsoft/wb-addon-file-editor#readme). Then add the code below to the position in your template where you want the news output to appear.

	<?php
		if (function_exists('displayNewsItems')) {
			displayNewsItems();
		}
	?>

Visit the frontend of your webiste and check the Anynews output.

## Customizing Anynews
The Anynews output can be customized to your needs by three methods:

1. parameters of the Anynews ***displayNewsItems()*** function
2. customized Anynews template files ***templates/display_mode_X.htt***
3. customized CSS definitions in file ***/css/anynews.css***
	
### Anynews Parametes
Calling Anynews in it´s easiest form ***displayNewsItems();*** uses the default parameters shown below.

	displayNewsItems(
		$group_id = 0,
		$max_news_items = 10,
		$max_news_length = -1,
		$display_mode = 1,
		$lang_id = 'AUTO',
		$strip_tags = true,
		$allowed_tags = '<p><a><img>',
		$custom_placeholder = false,
		$sort_by = 1,
		$sort_order = 1,
		$not_older_than = 0
	);

***Function parameters explained:***

- **$group_id**: only show news from defined group(s)

	[0:all groups, N:group N, array(2,4,5): groups 2,4 and 5]
	
- **$max_news_items**: max. number of news entries to show

	[allowed: 1..999]
	
- **$max_news_length**: max. news length to be shown

	[-1:= full length]
	
- **$display_mode**: ID of the Anynews template to use (/templates/display_mode_X.htt)

	[1:details, 2:list, 3:better-coda-slider, 4:flexslider, 5..98 custom template *display_mode_X.htt*]
	Note: 99 shows a cheat sheet with ALL Anynews placeholders available in template files
	
- **$lang_id**: mode to detect language file to use

	[allowed: 'AUTO', any WB language ID: 'DE', 'EN', ...]
	
- **$strip_tags**: flag to strip tags from news short/long text not contained in *$allowed_tags*

	[true:strip tags, false:don't strip tags]
	
- **$allowed_tags**: allowed tags to removed when *$strip_tags = true*

	[default: '&lt;p&gt;&lt;a&gt;&lt;img&gt;']

- **$custom_placeholder**: create own placeholders for usage in template files

	Example: $custom_placeholder = array('MY_IMG' => '%img%', 'MY_TAG' => '%author%', 'MY_REGEX' => '#(test)#i')
	stores all image URLs, text inside <author></author> and all matches of "test" in placeholders:
	{PREFIX_MY_IMG_#}, {PREFIX_MY_TAG_#}, {PREFIX_MY_REGEX_#}
	   where ***PREFIX*** is either "SHORT" or "LONG", depending if the match was found in the short/long news text
	   where ***#*** is a number between 1 and the number of matches found
	
- **$sort_by**: defines the sort criteria for the news items returned

	[1:position, 2:posted_when, 3:published_when, 4:random order, 5:number of comments]
	
- **$sort_order**: defines the sort order of the returned news items

	[1:descending, 2:=ascending]
	
- **$not_older_than**: skips all news items which are older than X days

	[0:don't skip news items, 0...999: skip news items older than x days (hint: 0.5 --> 12 hours)]

### Anynews Templates
The HTML skeleton of the Anynews output is defined by template files ***templates/display_mode_X.htt***. The template used is defined by the Anynews function parameter ***$display_mode***, which defaults to 1 if no valid input is defined. Create a blank template file with the [Addon File Editor](https://github.com/cwsoft/wb-addon-file-editor#readme) and name as follows: **templates/display_mode_5.htt**

#### Step 1:
In a first step, add the HTML markup below, which provides the output for ONE single news entry. Remember to wrap the entire HTML output to a div container with the class "mod_anynews" to prevent CSS clashes with other modules, templates or the WebsiteBaker core.

	<div class="mod_anynews">
		<h1>Dummy page header shown only once</h1>
		
		<h2>Dummy news header</h2>
		<p>Dummy news text </p>
		<em>Dummy news author</em>
	</div>

#### Step 2:
Identify the template part containing the content for the single news item. Wrap the two single HTML comment lines around this block. This tells Anynews to repeat the encapsulated HTML block for EACH news item returned by Anynews. Your template should now look like as follows.

	<div class="mod_anynews">
		<h1>Dummy page header shown only once</h1>
		
		<!-- BEGIN news_block -->
			<h2>Dummy news header</h2>
			<p>Dummy news text </p>
			<em>Dummy news author</em>
		<!-- END news_block -->
	</div>

#### Step 3:	
Finally replace the dummy text with the Anynews content {placeholders}. The {placeholders} are replaced with data from the WebsiteBaker `news` entries. Review the template file ***display_mode_99.htt*** (cheat sheet) to get a list of all available Anynews placeholders. Our final result will look like this.
	
	<div class="mod_anynews">
		<h1>Latest news from our website</h1>
		
		<!-- BEGIN news_block -->
			<h2>{TITLE}</h2>
			<p>{CONTENT_LONG}</p>
			<em>{POSTED_BY}</em>
		<!-- END news_block -->
	</div>

If you want to create a custom template with jQuery effects, look at the template files ***display_mode_3.htt*** and ***display_mode_4.htt***, which implement 3rd party jQuery sliding effects.

### Anynews CSS
The Anynews default templates (*/templates/display_mode_X.htt*) wrap the Anynews output in a div container as shown below.

	<div class="mod_anynews">
		<h2>Dummy Header</h2>
		<p>Dummy news text to explain</p>
	</div>
	
To change the news header of aboves example to green and the news text to blue, open the ***css/anynews.css*** file in the [Addon File Editor](https://github.com/cwsoft/wb-addon-file-editor/raw/master/wb-addon-file-editor-installer.zip) and add the following CSS definitions.

	div.mod_anynews h2 {
		color: green;
	}

	div.mod_anynews p {
		color: blue;
	}

***Note:*** This is common practice to limit the scope of the CSS defintions to the Anynews container. This practice ensures that your CSS definitions do not overwrite styles defined in other modules, templates or the WebsiteBaker core. You should stick to this good practice when creating your own template files.
	
## Known Issues
You can track the status of known issues or report new issues found in Anynews via GitHubs [issue tracking service](https://github.com/cwsoft/wb-anynews/issues). If you run into any issues with Anynews, please visit this page first and check if this issue is already known.

## Questions
If you have questions or issues with Anynews, please visit the [English](http://www.websitebaker2.org/forum/index.php/topic,12122.0.html) WebsiteBaker forum support threads and ask for feedback.

***Always provide the following information with your support request:***

 - detailed error description (what happens, what have you tried ...)
 - the Anynews version (go to WebsiteBaker section Add-ons / Info / Anynews)
 - your PHP version (use phpinfo(); or ask your provider if in doubt)
 - WebsiteBaker version, Service Pack number and build number of your version
 - name of the WebsiteBaker frontent template used (e.g. round, allcss ...)
 - information about changes you made to WebsiteBaker (if any)

## Credits
Credits go to the WebsiteBaker forum member [BlackBird](http://www.websitebaker2.org/forum/index.php?action=profile;u=14154), who maintained the Anynews between July 2009 and March 2010 and the following users who provided translations of the Anynews language file.

- **Dutch (NL.php):** forum member [D72](http://www.websitebaker2.org/forum/index.php?action=profile;u=7298)
- **French (FR.php):** by Guillaume Vielliard
- **Estonia (EE.php):** forum member [eazybaker](http://www.websitebaker2.org/forum/index.php?action=profile;u=11394)
- **Serbian (RS.php):** forum member [Mirens](http://www.websitebaker2.org/forum/index.php?action=profile;u=13226)