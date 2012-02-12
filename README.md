# Anynews code snippet for CMS WebsiteBaker (2.8.x)

The latest version and code changes of the ***wb-anynews*** code snippet can be found at [GitHub](https://github.com/cwsoft/wb-anynews).

## About the Anynews code snippet

The anynews code snippet allows you to fetch news entries from the WebsiteBaker ***news module*** and to display it in various ways. Anynews implements the method `displayNewsItems()`, which can be called from the ***index.php*** file of your template, or from a code section of type code/code2. The output can be customized via the various function parameter or by modifying the template files contained in */modulues/anynews/htt*. 

## Prerequisites

The anynews snippet requires ***WebsiteBaker v2.8.x*** and the WebsiteBaker ***news*** module installed.

## Installation

The installation steps are explained below:

1. download latest archive from [GitHub](https://github.com/cwsoft/wb-anynews/raw/master/wb-anynews-installer.zip)
2. log into your WebsiteBaker backend and go to the Add-ons / Modules section
3. install the downloaded zip archive via the WebsiteBaker installer
4. go to the pages section and create a new page of type ***code***
5. enter the following code to the code page `displayNewsItems();`
6. open the page in the fronten of your WebsiteBaker installation
7. news entries are fetched from the news module, so you need to add news first

## Anynews parameter

Detailed information about the available Anynews parameters and the template files can be found in the HELP file.

***Hint:*** Some browser (e.g. Safari, iPad) are able to render the HTML files from GitHub repositories in raw format, so you may want to give it a try [English Help](https://raw.github.com/cwsoft/wb-anynews/master/help/help_en.html).
