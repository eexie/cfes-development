=== CodeFlavors Featured Post ===
Contributors: codeflavors,constantin.boiangiu
Donate link: http://codeflavors.com/
Tags: post, featured post, custom post type, visual composer, TinyMCE, featured article, masonry layout, brick layout, jquery masonry plugin, masonry theme, Visual Composer masonry, bootstrap grid
Requires at least: 3.0
Tested up to: 4.7
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Featured Post Plugin for WordPress with custom post type support.

== Description ==

Convert your current theme into a masonry style theme by simply using a shortcode or a widget. You will no longer be tied to a certain theme that implements masonry to get a good looking masonry layout.

https://vimeo.com/174324022

**CodeFlavors Featured Post** allows you to feature any WordPress post type into posts and pages by using the shortcode implemented by the plugin. Besides the featured posts shortcode, the plugin implements a widget that does the exact same thing. 

You can use this plugin to display any post type, be it image, regular post, page, WooCommerce product or whatever else.

To display featured posts into the front-end the plugin uses the templates it implements (by default, only 2 are available Fancy and Default) and also offers the possibility to create custom templates that can be used to display the featured posts.

**Features:**

* Feature **any post type**;
* Responsive options for displaying posts;
* Plenty of options for choosing posts (post type, taxonomy, number of posts, skipped posts, template);
* Compatible with Visual Composer;
* Compatible with any WordPress theme;
* Feature posts by using the shortcode or the widget;
* TinyMCE editor interface for choosing featured posts.

**Links:**

* [Documentation](http://www.codeflavors.com/documents/wordpress-featured-post/?utm_source=wordpressorg&utm_medium=readme&utm_campaign=cf_featured_post "CodeFlavors Featured Post for WordPress documentation") on plugin usage and structure;
* [Forum](http://www.codeflavors.com/codeflavors-forums/forum/codeflavors-featured-post/?utm_source=wordpressorg&utm_medium=readme&utm_campaign=cf_featured_post "CodeFlavors Featured Post Forum") (while we try to keep up with the forums here, please post any requests on our forums for a faster response);


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress

== Screenshots ==

1. The featured post templates available by default (left - template Default, right - template Fancy).
2. WordPress editor button that opens the visual interface.
3. CodeFlavors Featured Post widget.
4. Visual Composer component.

== Changelog ==

= 1.1.1 =
* Enqueue Bootstrap.css before theme styles to avoid changing the styling

= 1.1 =
* Added Bootstrap.css support for responsive layouts;
* Added Masonry.js support;
* Created filter "cfp_bootstrap_css" that when returns "false" will prevent the plugin from loading bootstrap.css from CDN:
	add_filter('cfp_bootstrap_css', '__return_false') // this will prevent the plugin from loading bootstrap;
* Created filter "cfp_enqueue_masonry_js" that when returns "false" will prevent the plugin from loading and using Masonry.js;
	add_filter('cfp_enqueue_masonry_js', '__return_false') // this will prevent the plugin from loading masonry;
* Added new option for widget and shortcode for the number of columns that the posts should be displayed in pages.

= 1.0 =
* Initial release