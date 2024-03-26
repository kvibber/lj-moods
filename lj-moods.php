<?php
/*
 Plugin Name: LJ-Moods
 Plugin URI: https://codeberg.org/kvibber/lj-moods
 Description: Display the current mood, music, and location on a blog imported from LiveJournal using the WordPress LiveJournal importer.
 Version: 0.6.3
 Requires at least: 3.0
 Requires CP: 1.0
 Requires PHP: 7.0
 Author: Kelson Vibber
 Author URI: https://kvibber.com
 Text Domain: ktv-lj-moods
 License: GPLv2 or later  
 License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

include( "lj-moods-options.php" );

// Display imported LiveJournal mood, music and location.
function lj_moods_metablock( $post_id ) {
	load_plugin_textdomain('ktv-lj-moods');
	$mood =  get_post_meta( $post_id, 'lj_current_mood', true );
	$location =  get_post_meta( $post_id, 'lj_current_location', true );
	$music =  get_post_meta( $post_id, 'lj_current_music', true );

	// If they're all empty, don't even return a placeholder div.
	if ( empty($mood) && empty($location) && empty ($music) ) {
		return '';
	}

	$return = "<div class='lj-moods-meta'>";
	if ( !empty($mood) ) {
	
	// Map moods to equivalent WordPress smilies
	// TODO wrap in a class so this only needs to be instantiated once

	
	$mood_map = array(
		// Old-school WordPress smilies
		'aggravated' => ':-x',
		'amused' => ':-)',
		'angry' => ':-x',
		'annoyed' => ':-x',
		'anxious' => '8-O',
		'apathetic' => ':-|',
		'bitchy' => ':-x',
		'blah' => ':-|',
		'blank' => ':-|',
		'bored' => ':-(',
		'calm' => ':-)',
		'cheerful' => ':-)',
		'chipper' => ':-)',
		'cold' => ':-(',
		'complacent' => ':-)',
		'confused' => ':-?',
		'content' => ':-)',
		'cranky' => ':-x',
		'crappy' => ':-(',
		'crazy' => ';-)',
		'crushed' => ':-(',
		'curious' => ':-?',
		'cynical' => ':-x',
		'depressed' => ':-(',
		'devious' => ':twisted:',
		'dirty' => ':-(',
		'disappointed' => ':-(',
		'discontent' => ':-(',
		'distressed' => '8-O',
		'ditzy' => ';-)',
		'drained' => ':-(',
		'ecstatic' => ':-)',
		'embarrassed' => ':oops:',
		'enraged' => ':-x',
		'envious' => ':-(',
		'exanimate' => ':-|',
		'excited' => ':-)',
		'exhausted' => ':-(',
		'flirty' => ';-)',
		'frustrated' => ':-x',
		'full' => ':-)',
		'giddy' => ';-)',
		'giggly' => ';-)',
		'gloomy' => ':-(',
		'good' => ':-)',
		'grateful' => ':-)',
		'grumpy' => ':-x',
		'guilty' => ':-(',
		'happy' => ':-)',
		'high' => ':-)',
		'hopeful' => ':-)',
		'horny' => ':-)',
		'hot' => ':-(',
		'hungry' => ':-(',
		'impressed' => ':-)',
		'indifferent' => ':-)',
		'infuriated' => ':-x',
		'intimidated' => '8-O',
		'irate' => ':-x',
		'irritated' => ':-x',
		'jealous' => ':-(',
		'jubilant' => ':-)',
		'lazy' => ':-|',
		'lethargic' => ':-|',
		'listless' => ':-|',
		'lonely' => ':-(',
		'loved' => ':-)',
		'melancholy' => ':-(',
		'mellow' => ':-)',
		'mischievous' => ';-)',
		'moody' => ':-x',
		'morose' => ':-(',
		'naughty' => ';-)',
		'nervous' => '8-O',
		'numb' => ':-(',
		'okay' => ':-|',
		'optimistic' => ':-)',
		'peaceful' => ':-)',
		'pessimistic' => ':-(',
		'pissed off' => ':-x',
		'pleased' => ':-)',
		'quixotic' => ';-)',
		'recumbent' => ':-)',
		'refreshed' => ':-)',
		'rejected' => ':-(',
		'rejuvenated' => ':-)',
		'relaxed' => ':-)',
		'relieved' => ':-)',
		'restless' => ':-(',
		'rushed' => ':-x',
		'sad' => ':-(',
		'satisfied' => ':-)',
		'scared' => '8-O',
		'shocked' => '8-O',
		'silly' => ';-)',
		'sore' => ':-(',
		'stressed' => ':-x',
		'surprised' => ':-)',
		'sympathetic' => ':-(',
		'thankful' => ':-)',
		'thirsty' => ':-(',
		'touched' => ':-)',
		'uncomfortable' => ':-(',
		'weird' => ';-)',
		'worried' => ':-(',
		
		// Emoji. TODO How to handle these on older setups? Or make 4.2 required?
		
		'groggy' => '&#x1F634;', // sleeping face
		'sleepy' => '&#x1F634;',
		'tired' => '&#x1F634;',
		
		'nauseated' => '&#x1F912;', // todo replace with actual nauseated face emoji at U+1F922 once supported widely
		'sick' => '&#x1F912;', // face with thermometer.
		
		'contemplative' => '&#x1F914;', // thinking face
		'nostalgic' => '&#x1F914;',
		'pensive' => '&#x1F914;',
		'thoughtful' => '&#x1F914;',
		
		'drunk' => '&#x1F635;', // dizzy face. LJ default is closer to nauseated face

		'bouncy' => '&#x1F604;', // bouncing smiley isn't available, so let's use a smiling face with open mouth and smiling eyes.
		'energetic' => '&#x1F604;',
		'hyper' => '&#x1F604;'
		
		/* TODO: Add remaining LJ moods that don't have default icons?
		accomplished
		artistic
		awake
		busy
		creative
		determined
		dorky
		enthralled
		geeky
		indescribable
		nerdy
		predatory
		productive
		working
		*/

	);
	
		$return .= '<b>' . __('Current Mood', 'ktv-lj-moods') . ':</b> ' .
			convert_smilies( $mood_map[sanitize_key( $mood )] ) .
			esc_html( wptexturize ( $mood ) ) . '<br/>';
	}
	if ( !empty($music) ) {
		$return .= '<b>' . __('Current Music', 'ktv-lj-moods') . ':</b> ' . esc_html( wptexturize ( $music ) ) . '<br/>';
	}
	if ( !empty($location) ) {
		$return .= '<b>' . __('Current Location', 'ktv-lj-moods') . ':</b> ';
		$locationFormatted = esc_html( wptexturize( $location ) );
		
		$options = get_option('lj_moods_settings', array());
		switch($options['link_to_map']) {
			case 'google':
			case 1:
				$return .= "<a href='https://www.google.com/maps/search/" . rawurlencode(wp_strip_all_tags( $location)) . "'>" . $locationFormatted . "</a>";
				break;
			case 'openstreetmap':
				$return .= "<a href='https://www.openstreetmap.org/search?query=" . rawurlencode(wp_strip_all_tags( $location)) . "'>" . $locationFormatted . "</a>";
				break;
			case 'bing':
				$return .= "<a href='https://www.bing.com/maps?q=" . rawurlencode(wp_strip_all_tags( $location)) . "'>" . $locationFormatted . "</a>";
				break;
			case 'duckduckgo':
				$return .= "<a href='https://duckduckgo.com/?ia=web&iaxm=places&q=" . rawurlencode(wp_strip_all_tags( $location)) . "'>" . $locationFormatted . "</a>";
				break;
			default:
			$return .= $locationFormatted;
		}
	}
	$return .= "</div>";
	return $return;

}

// Add LiveJournal metadata to the content if it's not a password-protected post
// or if the password has been entered.
function lj_moods_add_metablock( $content ) {
	if ( !post_password_required() ) {
		$content .= lj_moods_metablock( get_the_ID() );
	}
	return $content;
}


add_filter( 'the_content', 'lj_moods_add_metablock' );

?>
