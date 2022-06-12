<?php

add_action( 'admin_init', 'lj_moods_settings_init' );

function lj_moods_settings_init(  ) { 
	load_plugin_textdomain('ktv-lj-moods');
	register_setting( 'reading', 'lj_moods_settings', 'lj_moods_settings_validate' );
	// todo use activation hook
	if( false === get_option( 'lj_moods_settings' ) ) { 
		add_option( 'lj_moods_settings' , array('link_to_map' => 'none'));
	}
	// todo update settings on upgrade/install

	add_settings_section(
		'lj_moods_settings', 
		__( 'LJ-Moods', 'ktv-lj-moods' ), 
		'lj_moods_settings_section_callback', 
		'reading'
	);

	add_settings_field( 
		'link_to_map_setting_id', 
		__( 'Link Location to Map', 'ktv-lj-moods' ), 
		'lj_moods_link_to_map_render', 
		'reading', 
		'lj_moods_settings' 
	);
}

// Merge current options with defaults
function lj_moods_get_options() {
	$options = get_option( 'lj_moods_settings', array());
	$defaults = array('link_to_map' => 'none');
	return array_merge( $defaults, $options );
}

// If the value is allowed, keep it, otherwise set it to 'none'
function lj_moods_settings_validate($input) {
    switch($input['link_to_map']) {
	case 'bing':
	case 'duckduckgo':
	case 'google':
	case 'openstreetmap':
		break;
	default:
		$input['link_to_map'] = 'none';
    }
    return $input;
}

function lj_moods_link_to_map_render(  ) { 

	$options = lj_moods_get_options();
	?>
	<label><input type='radio' name='lj_moods_settings[link_to_map]' <?php checked( $options['link_to_map'] == 'none'); ?> value='none'><?php echo __('Do not link', 'ktv-lj-moods'); ?></label><br/>
	<label><input type='radio' name='lj_moods_settings[link_to_map]' <?php checked( $options['link_to_map'] == 'openstreetmap'); ?> value='openstreetmap'><?php echo __('OpenStreetMap', 'ktv-lj-moods'); ?></label><br/>
	<label><input type='radio' name='lj_moods_settings[link_to_map]' <?php checked( $options['link_to_map'] == 'bing'); ?> value='bing'><?php echo __('Bing Maps', 'ktv-lj-moods'); ?></label><br/>
	<label><input type='radio' name='lj_moods_settings[link_to_map]' <?php checked( $options['link_to_map'] == 'duckduckgo'); ?> value='duckduckgo'><?php echo __('DuckDuckGo', 'ktv-lj-moods'); ?></label><br/>
	<label><input type='radio' name='lj_moods_settings[link_to_map]' <?php checked( $options['link_to_map'] == 'google' || $options['link_to_map'] == 1); ?> value='google'><?php echo __('Google Maps', 'ktv-lj-moods'); ?></label><br/>
	<?php

}


function lj_moods_settings_section_callback(  ) { 
	//echo __( 'LJ-Moods Settings', 'ktv-lj-moods' );
}



?>
