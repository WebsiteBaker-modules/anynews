# cwsoft-anynews module for CMS WebsiteBaker 2.8.x
The code snippet `cwsoft-anynews` (short form Anynews) is designed to fetch news entries from the [WebsiteBaker CMS](http://www.websitebaker2.org) news module. Just call the cwsoft-anynews function `displayNewsItems();` where you want the news output to appear on your frontend. Optional function parameters, HTML templates, content placeholders and CSS definitions allows you to style the news output the way you want. The cwsoft-anynews snippet ships with four templates - including two jQuery sliding effects - ready to use out of the box.

Power users define their own placeholders containing information extracted from the short and/or long news module description. Mastering cwsoft-anynews is possible - but requires you to study the information provided in the section [Customize](https://github.com/cwsoft/wb-cwsoft-anynews#customize).

## Download
The released stable `cwsoft-anynews` installation packages for the WebsiteBaker CMS can be found in the [GitHub download area](https://github.com/cwsoft/wb-cwsoft-anynews/downloads). It is recommended to install/update to the latest available version listed. Older versions are provided for compatibility reasons with older WebsiteBaker versions and may contain bugs or security issues. The development history of Anynews can be tracked via [GitHub](https://github.com/cwsoft/wb-cwsoft-anynews).

## License
The `cwsoft-anynews` code snippet is licensed under the [GNU General Public License (GPL) v3.0](http://www.gnu.org/licenses/gpl-3.0.html).

## Requirements
The minimum requirements to get cwsoft-anynews running on your WebsiteBaker installation are as follows:

- WebsiteBaker ***2.8.2*** or higher (recommended last stable 2.8.x version)
- WebsiteBaker news module
- PHP ***5.2.2*** or higher (recommended last stable PHP 5.3.x version)
- Optional: small modification of your template file to enable jQuery support

## Installation
1. download the [cwsoft-anynews v2.6.0](https://github.com/downloads/cwsoft/wb-cwsoft-anynews/cwsoft-anynews-v2.6.0.zip) WebsiteBaker installation package
2. log into your WebsiteBaker backend and go to the `Add-ons/Modules` section
3. install the downloaded zip archive via the WebsiteBaker installer

### Enable jQuery support (optional)
If you want to use JavaScript effects or jQuery plugins with cwsoft-anynews, you need to add one code line to your frontend template. Open your WebsiteBaker frontend template file ***index.php*** in the [cwsoft-addon-file-editor](https://github.com/cwsoft/wb-cwsoft-addon-file-editor#readme) and search for the following lines. 

	if (function_exists('register_frontend_modfiles')) {
		register_frontend_modfiles('css');
		register_frontend_modfiles('js');
	}

Change the code lines above as follows:

	if (function_exists('register_frontend_modfiles')) {
		register_frontend_modfiles('css');
		register_frontend_modfiles('jquery');
		register_frontend_modfiles('js');
	}

If you can't find the code above in the index.php of your template, simply at the last code block to the end of your &lt;head&gt;&lt;/head&gt; section.	
	
## Usage
As `cwsoft-anynews` is designed to fetch news items from the WebsiteBaker news module, you need to add some news entries with the news module **before** you can use cwsoft-anynews. If no news are available, the message "No news available yet" is shown. Follow the steps below to add some news entries with the WebsiteBaker news module.

1. log into your WebsiteBaker backend and go to the `Pages` section
2. create a new page or section of type `News` (set visibility to None)
3. add some news entries (2-3) from the news page in the WebsiteBaker backend

### Use Anynews from a page or section
Create a new page or section of type `Code` in the WebsiteBaker backend and enter the following code to it.

	if (function_exists('displayNewsItems')) {
		displayNewsItems();
	}

The cwsoft-anynews output is only visible at the pages/sections of your frontend, which contain the code above.

### Use Anynews from your template
To display news items at a fixed position on every page of your frontend, open the ***index.php*** file of your default frontend template with the [cwsoft-addon-file-editor](https://github.com/cwsoft/wb-cwsoft-addon-file-editor#readme). Then add the code below to the position in your template where you want the news output to appear.

	<?php
		if (function_exists('displayNewsItems')) {
			displayNewsItems();
		}
	?>

Visit the frontend of your website and check the cwsoft-anynews output. 

Depending on the Anynews function parameters defined, the output may look as follows.

![](https://github.com/cwsoft/wb-cwsoft-anynews/raw/master/.screenshots/anynews.png) 

## Customize
The cwsoft-anynews output can be customized to your needs by three methods:

1. parameters of the cwsoft-anynews ***displayNewsItems()*** function
2. customized cwsoft-anynews template files ***templates/display_mode_X.htt***
3. customized CSS definitions in file ***/css/anynews.css***
	
### Anynews Parametes
When you call Anynews without any parameter like `displayNewsItems();`, the following default parameters will be used:

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
		$not_older_than = 0,
		$group_id_type = 'group_id',
		$lang_filter = false
	);

***Function parameters explained:***

- **$group_id**: only show news which IDs match given *$group_id_type* (default 'group_id')  
	[0:all news, 1..N, or array(2,4,5,N) to limit news to single Id or multiple Ids, matching *$group_id_type*]
	
- **$max_news_items**: max. number of news entries to show  
	[valid: 1..999]
	
- **$max_news_length**: max. news length to be shown  
	[-1:= full length]
	
- **$display_mode**: ID of the Anynews template to use (/templates/display_mode_X.htt)  
	[1:details, 2:list, 3:better-coda-slider, 4:flexslider, 5..98 custom template *display_mode_X.htt*]  
	Hint: 99:cheat sheet with ALL Anynews placeholders available in the template files
	
- **$lang_id**: mode to detect language file to use  
	[allowed: 'AUTO', or a valid WB language file ID: 'DE', 'EN', ...]
	
- **$strip_tags**: flag to strip tags from news short/long text ***not*** contained in *$allowed_tags*  
	[true:strip tags, false:don't strip tags]
	
- **$allowed_tags**: tags to keep if *$strip_tags = true*
	[default: '&lt;p&gt;&lt;a&gt;&lt;img&gt;']

- **$custom_placeholder**: create own placeholders for usage in template files  
	**Example:** $custom\_placeholder = array('MY\_IMG' => '%img%', 'MY\_TAG' => '%author%', 'MY\_REGEX' => '#(test)#i')  
	
	Stores all image URLs, all text inside &lt;author&gt;&lt;/author&gt; tags and all matches of "test" in placeholders:  {PREFIX\_MY\_IMG\_#}, {PREFIX\_MY\_TAG\_#}, {PREFIX\_MY\_REGEX\_#}, where ***PREFIX*** is either "SHORT" or "LONG", depending if the match was found in the short/long news text and ***#*** is a number between 1 and the number of matches found
	
- **$sort_by**: defines the sort criteria for the news items returned  
	[1:position, 2:posted_when, 3:published_when, 4:random order, 5:number of comments]
	
- **$sort_order**: defines the sort order of the returned news items  
	[1:descending, 2:=ascending]
	
- **$not_older_than**: skips all news items which are older than X days  
	[0:don't skip news items, 0...999: skip news items older than x days (hint: 0.5 --> 12 hours)]

- **$group_id_type**: sets type used by group_id to extract news entries from  
	[supported: 'group_id', 'page_id', 'section_id', 'post_id')]

- **$lang_filter**: flag to enable language filter   
	[default:= false, true:=only show news added from news pages, which page language match $lang_id]
	
***Tip:*** 
You can output a list with all *group_ids* and the *group titles* created by the WebsiteBaker news module, by adding the following code into a page/section of type code.

	require_once(WB_PATH . '/modules/cwsoft-anynews/code/anynews_functions.php');
	print_r(getNewsGroupTitles());

Visit the created page/section in your frontend and search for the *group_id(s)* you want to use in the Anynews function call. 
	
### Anynews Templates
The HTML skeleton of the Anynews output is defined by template files **display_mode_X.htt** stored in the Anynews subfolder **templates**. The template file used is defined by the Anynews function parameter **$display_mode**, which defaults to 1 if no valid input is defined. To create your own Anynews template, create a new file in the Anynews template folder and rename it to **templates/display_mode_5.htt**. You can use the [cwsoft-addon-file-editor](https://github.com/cwsoft/wb-cwsoft-addon-file-editor#readme) to create and edit this file via the WebsiteBaker backend.

#### Step 1:
Add the HTML skeleton below to your custom template file. All Anynews output should be wrapped in a div with class "mod_anynews" to prevent CSS clashes with other modules, templates or the WebsiteBaker core. 

	<div class="mod_anynews">
		<h1>Anynews Header (shown only once)</h1>
		
		<!-- next three lines will be repeated for each existing news entry -->
		<h2>News Title (repeated for each news item)</h2>
		<p>Dummy news text </p>
		<em>Dummy news author</em>

		<!-- this line should only show up if no news item exists -->
		<p>No news available yet</p>
	</div>

#### Step 2:
Now we add control statements for the template parser [Twig](http://twig.sensiolabs.org/) used by Anynews. The line `{% for news in newsItems %}` loops over all news defined in the variable `newsItems` created by Anynews. Inside the loop, news data extracted from the WebsiteBaker news module is accessible from the variable `news` created by Twig. Outputs enclosed in `{% else %}` and `{% endfor %}` is only displayed if no news exist at all.

	<div class="mod_anynews">
		<h1>Anynews Header (shown only once)</h1>
		
		{% for news in newsItems %}		
			<h2>News Title (repeated for each news item)</h2>
			<p>Dummy news text </p>
			<em>Dummy news author</em>
			
		{% else %}
			<p>No news available yet</p>
		{% endfor %}
	</div>


#### Step 3:	
Finally we replace the dummy text with placeholders provided by cwsoft-anynews. Data from the WebsiteBaker news module is stored in the placeholder `newsItems`. Text outputs from Anynews language files is stored in the placeholder `lang`. Review the template file ***display_mode_99.htt*** (cheat sheet) to get a list of all available Anynews placeholders. Remember to wrap your placeholders with double currly brackets {{ placeholder }}.

	<div class="mod_anynews">
		<h1>{{ lang.TXT_HEADER }}</h1>
		
		{% for news in newsItems %}		
			<h2>{{ news.TITLE }}</h2>
			{{ news.CONTENT_LONG }}
			<em>{{ news.POSTED_BY }}</em>
			
		{% else %}
			<p>{{ lang.TXT_NO_NEWS }}</p>
		{% endfor %}
	</div>

If you want to create a custom template with jQuery effects, look at the template files ***display_mode_3.htt*** and ***display_mode_4.htt***, which implement 3rd party jQuery sliding effects.
To learn more about the possibilities of the template parser Twig, please have a look at the excellent [Twig user manual](http://twig.sensiolabs.org/doc/templates.html).

### Anynews CSS
The Anynews default templates (*/templates/display_mode_X.htt*) wrap the Anynews output in a div container as shown below.

	<div class="mod_anynews">
		<h2>Dummy Header</h2>
		<p>Dummy news text to explain</p>
	</div>
	
To change the news header of aboves example to green and the news text to blue, open the ***css/anynews.css*** file in the [Addon File Editor](https://github.com/cwsoft/wb-cwsoft-addon-file-editor#readme) and add the following CSS definitions.

	div.mod_anynews h2 {
		color: green;
	}

	div.mod_anynews p {
		color: blue;
	}

***Note:*** It is common practice to limit the scope of the CSS defintions to the div mod_anynews. This practice ensures that your CSS definitions do not overwrite styles defined in other modules, templates or the WebsiteBaker core. You should stick to this good practice when creating your own template files.
	
## Known Issues
You can track the status of known issues or report new issues found in cwsoft-anynews via GitHubs [issue tracking service](https://github.com/cwsoft/wb-cwsoft-anynews/issues). If you run into any issues with Anynews, please visit this page first and check if this issue is already known.

## Questions
If you have questions or issues with Anynews, please visit the [English](http://www.websitebaker2.org/forum/index.php/topic,23355.0.html) WebsiteBaker forum support threads and ask for feedback.

***Always provide the following information with your support request:***

 - detailed error description (what happens, what have you already tried ...)
 - the Anynews version (go to WebsiteBaker section Add-ons / Info / Anynews)
 - your PHP version (use phpinfo(); or ask your provider if in doubt)
 - WebsiteBaker version, Service Pack number and build number of your version
 - name of the WebsiteBaker frontent template used (e.g. round, allcss ...)
 - information about your operating system (e.g. Windows, Mac, Linux) incl. version
 - information of your browser and browser version used
 - information about changes you made to WebsiteBaker (if any)

## Credits
Credits go to the WebsiteBaker forum member [BlackBird](http://www.websitebaker2.org/forum/index.php?action=profile;u=14154), who maintained the cwsoft-anynews snippet between July 2009 and March 2010 and the following users for providing translations.

- **Dutch (NL.php):** forum members [D72](http://www.websitebaker2.org/forum/index.php?action=profile;u=7298), [Argos](http://www.websitebaker2.org/forum/index.php?action=profile;u=153)
- **French (FR.php):** by Guillaume Vielliard
- **Estonia (EE.php):** forum member [eazybaker](http://www.websitebaker2.org/forum/index.php?action=profile;u=11394)
- **Serbian (RS.php):** forum member [Mirens](http://www.websitebaker2.org/forum/index.php?action=profile;u=13226)