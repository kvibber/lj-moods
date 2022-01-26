<?php

add_action( 'admin_init', 'lj_moods_settings_init' );

function lj_moods_settings_init(  ) { 

	register_setting( 'reading', 'lj_moods_settings', 'lj_moods_settings_validate' );
	// todo use activation hook
	if( false === get_option( 'lj_moods_settings' ) ) { 
	
		add_option( 'lj_moods_settings' , array('link_to_map'=>1));
	} 

	add_settings_section(
		'lj_moods_settings', 
		__( 'LJ-Moods', 'wordpress' ), 
		'lj_moods_settings_section_callback', 
		'reading'
	);

	add_settings_field( 
		'link_to_map_setting_id', 
		__( 'Link Location to Google Maps', 'wordpress' ), 
		'lj_moods_link_to_map_render', 
		'reading', 
		'lj_moods_settings' 
	);
}

function lj_moods_get_options() {
	$options = get_option( 'lj_moods_settings', array());
	$defaults = array('link_to_map' => 0);
	return array_merge( $defaults, $options );
}

function lj_moods_settings_validate($input) {
    $input['link_to_map'] = ( $input['link_to_map'] == 1 ? 1 : 0 );
    return $input;
}

function lj_moods_link_to_map_render(  ) { 

	$options = lj_moods_get_options();
	?>
	<input type='checkbox' name='lj_moods_settings[link_to_map]' <?php checked( $options['link_to_map'], 1); ?> value='1'>
	<?php

}


function lj_moods_settings_section_callback(  ) { 
	//echo __( 'LJ-Moods Settings', 'wordpress' );
}



?>
