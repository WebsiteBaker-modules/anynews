/**
 * Code snippet: cwsoft-anynews
 *
 * This code snippets grabs news entries from the WebsiteBaker news
 * module and displays them on any page you want by invoking the function
 * getNewsItems() via a page of type code or the index.php
 * file of the template.
 *
 * User defined JavaScript settings for the thirdparty jQuery plugin Liquid Slider.
 * Detailed information about the jQuery Liquid Slider plugin and it's settings can
 * be found on website of the author: http://liquidslider.com
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS WebsiteBaker 2.8.x
 * @package     cwsoft-anynews
 * @author      cwsoft (http://cwsoft.de)
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl-3.0.html
*/

$(document).ready(function() {
	// Customize Liquid Slider settings to your needs
	// Defaults: https://github.com/KevinBatdorf/liquidslider#default-settings
	$('#anynews-liquid-slider').liquidSlider({
		autoSlide: true,
		autoSlideInterval: 5000,
		slideEaseDuration: 1500
	});
});