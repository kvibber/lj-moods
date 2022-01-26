# LJ-Moods

Displays the mood, music, and location fields as imported by the LiveJournal importer at the end of each WordPress post.

Author: [Kelson Vibber](https://kvibber.com)
License: [GPLv2 or later](http://www.gnu.org/licenses/gpl-2.0.html)
[At the WordPress Plugin Repository](https://wordpress.org/plugins/lj-moods/)

Current version: 0.5.1
Current stable version: 0.5
Runs on Wordpress 3.0 through at least 5.9!

## Description

The LiveJournal importer (Tools/Import/LiveJournal) saves LJ-specific post info to a set of custom fields. This plugin reads those fields and adds any that are present to a block at the end of the post.

## Installation

Install the plugin and activate it. If you want location tags to link to Google Maps, you can find a checkbox in the Reading section of your WordPress Settings.

## Frequently Asked Questions

### What icons will the moods use?

In current versions of WordPress, it will use the viewer's emoji set. On an iPhone it will use Apple's emoji, on a Galaxy phone it will use Samsung's emoji, etc. On desktop systems, they may use system emoji or may be converted to images using WordPress' built-in conversion map.

On older versions of WordPress (before 4.2), most of the mood icons appear as WordPress smilies. There are a few LJ moods that don't quite line up with the old smiley set, so I've mapped them directly to emoji. The icons for those moods (sleepy, thoughtful, sick, drunk, excited and their synonyms) will show up on phones, but may or may not appear on all desktops.

### How can I customize the appearance?

The text will pick up your post formatting, but if you want to change it, you can use custom CSS matching on `.lj-moods-metabox`

### What about userpics?

That's a little more complicated, because you need to export your userpics as well, upload them, and match the keywords. I might get to it eventually, but it's not in my current plans.

### What if I want to change the status?

You can edit the custom fields lj_current_mood, lj_current_music, and lj_current_location in the post editor.

