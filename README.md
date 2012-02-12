# Anynews code snippet for CMS WebsiteBaker (2.8.x)

The latest version and code changes of the ***wb-anynews*** code snippet can be found at [GitHub](https://github.com/cwsoft/wb-anynews).

## About the Anynews code snippet

The anynews code snippet allows you to fetch news entries from the WebsiteBaker ***news module*** and to display it in various ways. Anynews implements the method `displayNewsItems()`, which can be called from the ***index.php*** file of your template, or from a code section of type code/code2. The output can be customized via the various function parameter or by modifying the template files contained in */modulues/anynews/htt*. 

## Prerequisites

The anynews snippet requires ***WebsiteBaker v2.8.x*** and the WebsiteBaker ***news*** module installed.

## Installation

The installation steps are explained below:

1. download the latest archive from [GitHub](https://github.com/cwsoft/wb-anynews/downloads)
2. extract the downloaded archive on your local computer and unzip it e.g. with [7-zip](http://7-zip.org)
3. open the extracted archive and search for a file named ***wb-anynews-installer.zip*** inside
4. log into your WebsiteBaker backend and go to the Add-ons / Modules section
5. install the ***wb-anynews-installer.zip*** file via the WebsiteBaker installer
6. now go to the pages section and create a new page of type ***code***
7. enter the following code to the code page `displayNewsItems();`
8. open the page in the fronten of your WebsiteBaker installation
9. news entries are fetched from the news module, so you need to add news first

## Anynews parameter

Detailed information about the available Anynews parameters and the template files can be found in the HELP file.

***Hint:*** Some browser (Safari, iPad) are able to render HTML files from the GitHub repository when delivered in raw format, so you may want to give it a try [English Help](https://raw.github.com/cwsoft/wb-anynews/master/help/help_en.html).
