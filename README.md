# LJ-Moods

Stable tag: 0.6.3  
Tags: livejournal, customfields, mood  
Tested up to: 6.6  
Contributors: Kelson  
License: GPLv2 or later  

Displays the mood, music, and location fields as imported by the LiveJournal importer at the end of each post.

## Description

The LiveJournal importer (Tools/Import/LiveJournal) saves LJ-specific post info to a set of custom fields. This plugin reads those fields and adds any that are present to a block at the end of the post.

## Installation

Install the plugin and activate it. If you imported your blog from LiveJournal, it should find your mood, music and locations. If you want location tags to link to Google Maps, you can find a checkbox in the Reading section of your WordPress Settings.

## Frequently Asked Questions

### What icons will the moods use?

In current versions of WordPress, it will use the viewer's emoji set. On an iPhone it will use Apple's emoji, on a Galaxy phone it will use Samsung's emoji, etc. On desktop systems, they may use system emoji or may be converted to images using WordPress' built-in conversion map.

On older versions of WordPress (before 4.2), most of the mood icons appear as WordPress smilies. There are a few LJ moods that don't quite line up with the old smiley set, so I've mapped them directly to emoji. The icons for those moods (sleepy, thoughtful, sick, drunk, excited and their synonyms) should display on phones and modern desktop systems, but may not appear on older desktops.

### How can I customize the appearance?

The text will pick up your post formatting, but if you want to change it, you can use custom CSS matching on `.lj-moods-metabox`

### What about userpics?

That's a little more complicated, because you need to export your userpics as well, upload them, and match the keywords. I might get to it eventually, but it's not in my current plans.

### What if I want to change the status?

You can edit the custom fields lj_current_mood, lj_current_music, and lj_current_location in the post editor.

### What about compatibility?

It should work with any theme.

It's also compatible with [ClassicPress](https://www.classicpress.net/).

## Changelog

### [0.6.3] - 2024-03-25
* Don't add an empty div when there's nothing to put in it.

### [0.6.2] - 2022-10-28
* Clean up headers, test with WordPress 6.1. No functional changes.

### [0.6.1] - 2022-09-02
* Update headers for new ClassicPress plugin directory.

### [0.6.0] - 2022-06-02
* Option to link location to OpenStreetMap, Bing or DuckDuckGo Maps instead of Google Maps.

[Source on Codeberg](https://codeberg.org/kvibber/lj-moods).  
[Mirror on GitHub](https://github.com/kvibber/lj-moods).  
[Plugin page at WordPress](https://wordpress.org/plugins/lj-moods/).  
[Plugin page at ClassicPress](https://directory.classicpress.net/plugins/lj-moods).

(c) 2016-2024 [Kelson Vibber](https://kvibber.com/)
