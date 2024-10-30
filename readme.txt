=== htmltidy for WordPress ===
Contributors: benjaminwittorf
Donate link:
Tags: Formatting, html, tidy
Requires at least: 2.5
Tested up to: 3.2.1
Stable tag: 0.1.29

Runs "htmltidy" over the complete output of the blog (excluding feeds) and makes it XHTML 1.0 Transitional compliant.

== Description ==

Runs [htmltidy](http://tidy.sourceforge.net/ "HTML Tidy Library Project") over the complete output of the blog (excluding feeds) and makes it `XHTML 1.0 Transitional` compliant. Important: please slowly prepare to switch to [WP-Beautifier](http://wordpress.org/extend/plugins/wp-beautifier/) as I will discontinue this plugin by the end of 2011.

* Requires "php-tidy" to be installed to work.
* Please understand that this currently is more of a hack than a plugin, see the FAQ.
* That's why this description needs some more elaboration, too.
* Still, it works pretty well. Production environment well.
* Also, this plugin doesn't do magic - please refer to [the Tidy Project Page](http://tidy.sourceforge.net/ "HTML Tidy Library Project").
* Supports [Hyper Cache](http://www.satollo.net/plugins/hyper-cache).
* Works well with WP Super Cache, too.
* Caching is recommended anyway.
* Works with Google ModPageSpeed.

== Installation ==

1. Upload the `htmltidy-for-wordpress` directory to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Visit http://validator.w3.org and enjoy your beautifully beautified source code.

== Frequently Asked Questions ==

= I have php-tidy installed, but now my blog doesn't work anymore =
Please make sure you have disabled any theme-based gzip-compression (e.g. in Headway or Thesis).
Compression in caching is fine!

= Where are the buttons and the knobs? I can't configure anything! =
That's because this is more of a hack than a real plugin. As yet. Want to help? You're welcome!

= What are you currently working on this plugin? =
* Removing dependancy on php-tidy
* A real configuration pane for this plugin which features...
* …options which files/directories/user level to exclude from being tidied up
* …options for tidy itself

== Changelog ==

The current version is 0.1.29 (2011.07.19).

= 0.1.29 (2011.07.19) =
* Changed: tweaked some Tidy settings for more pretty printing
* New: compatible with WordPress 3.2.1

= 0.1.28 (2011.06.04) =
* New: compatible with WordPress 3.1.3

= 0.1.27 (2011.02.27) =
* Changed: updated readme.txt to WordPress plugin readme file standard
* New: compatible with WordPress 3.1.1

= 0.1.26 (2011.02.27) =
* New: compatible with WordPress 3.1
* Changed: code changed according to the WordPress Coding Standards

= 0.1.25 (2010.12.30) =
* New: compatible with WordPress 3.0.4

= 0.1.24 (2010.12.14) =
* New: compatible with WordPress 3.0.3

= 0.1.23 (2010.05.29) =
* New: compatible with WordPress 3.0
* Changed: updated FAQ

= 0.1.22 (2010.05.15) =
* New: removes first line if (almost) empty

= 0.1.21 (2010.05.15) =
* New: won't activate unless `php-tidy` is installed
* New: won't interfere with Headway visual editor anymore
* Changed: way `maketidy` is called, should increase performance slightly

= 0.1.20 (2010.01.06) =
* New: Compatible up to WordPress 2.9.1.
* Changed: tweaked minor settings
* Changed: new plugin URI

= 0.1.19 (2009.12.24) =
* Changed: There was a bug that sometimes prevented the feed from being displayed correctly.

= 0.1.18 (2009.12.24) =
* Changed: There was a bug that prevented login to WordPress 2.9 on some machines (thanks to [Rahim Sonawalla](http://hirahim.com "Rahim Sonawalla") for the fix).

= 0.1.17 (2009.12.22) =
* New: Compatible up to WordPress 2.9.
* New: Makes sure no `<?xml…` is added to the header.

= 0.1.16 (2009.11.11) =
* New: Added filter to support Hyper Cache.

= 0.1.15 (2009.08.10) =
* New: Compatible up to WordPress 2.8.5.
* Changed: Better check for valid pages to be tidied.

= 0.1.14 (2009.08.10) =
* New: Compatible up to WordPress 2.8.4.

= 0.1.13 (2009.08.10) =
* New: Compatible up to WordPress 2.8.3.

= 0.1.13 (2009.06.11) =
* New: Compatible up to WordPress 2.8.

= 0.1.12 (2009.01.28) =
* New: The plugin now forces a doctype.

= 0.1.11 (2009.01.02) =
* New: Added an exception for the virtual robots.txt.

= 0.1.10 (2009.01.01) =
* Changed: The plugin URI points to the new plugin homepage.

= 0.1.9 (2008.12.11) =
* New: Compatible up to WordPress 2.7.

= 0.1.8 (2008.10.24) =
* New: Compatible up to WordPress 2.6.3.

= 0.1.7 (2008.10.02) =
* Changed: No more problems with feeds that don't end in a slash.

= 0.1.6 (2008.09.09) =
* New: Compatible up to WordPress 2.6.2.

= 0.1.5 (2008.08.31) =
* New: Compatible up to WordPress 2.6.1.
* Changed: Small layout errors in the source code (!).

= 0.1.4 (2008.07.15) =
* New: Compatible up to WordPress 2.6.
* Changed: There was a typo that prevented version 0.1.3 from working.
* Changed: Clarified a comment in the source.

= 0.1.3 (2008.07.09) =
* Changed: Moved xmlrpc.php exception to where it belongs.
* Changed: Commented the exceptions.

= 0.1.2 (2008.07.07) =
* Changed: Gave the source code style for easier understanding.
* Removed: Removed the “donate” link.

= 0.1.1 (2008.06.25) =
* New: Added an exception to not tidy xmlrpc.php output.
* Changed: Fixed a typo in the readme.txt.

= 0.1.0 (2008.06.23) =
* Initial release

== To do ==
* There really should be a fancy options page.
* Remove dependancy on `php-tidy`.