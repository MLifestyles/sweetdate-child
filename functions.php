<?php
/**
 * @package WordPress
 * @subpackage Sweetdate
 * @author SeventhQueen <themesupport@seventhqueen.com>
 * @since Sweetdate 1.0
 */


/**
 * Sweetdate Child Theme Functions
 * Add extra code or replace existing functions
*/ 

/*
ADD MEMBER PAGE FIELDS
*/

//members page fields 
add_action('after_setup_theme','kleo_my_member_data');
function kleo_my_member_data() 
{
global $kleo_config;
//this is the details field, right now it take the "About me" field content 
$kleo_config['bp_members_details_field'] = 'Sexual Orientation';
//this display the fields under the name, eq: 36 / Woman / Divorced / Berlin. Modify with the names of the fields you want to appear there
$kleo_config['bp_members_loop_meta'] = array(
'I am a',
'Marital status',
'City'
);

}

/*
ADD NEW PANEL IN THEME OPTIONS
*/
add_filter('squeen-opts-sections-sweetdate', 'sq_customise_theme_options');
function sq_customise_theme_options( $sections ) {

	$sections[] = array(
		'icon' => 'adjust',
		'icon_class' => 'icon-large',
		'title' => __('NEW SECTION', 'kleo_framework'),
		'desc' => '<p class="description">Customize theme appearance</p>',
		'fields' => array(

			//header
			array(
				'id' => 'info_header',
				'type' => 'info',
				'desc' => 'Add Custom Settings to Theme Options'
			),
		)
	);
	return $sections;
}
?>