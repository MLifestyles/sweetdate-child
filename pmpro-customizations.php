<?php
/*
Plugin Name: PMPro Customizations
Plugin URI: http://www.paidmembershipspro.com/wp/pmpro-customizations/
Description: Customizations for Paid Memberships Pro
Version: .1
Author: Stranger Studios
Author URI: http://www.strangerstudios.com
*/

/*
	Sync PMPro fields to BuddyPress profile fields.
*/
function pmprobuddy_update_user_meta($meta_id, $object_id, $meta_key, $meta_value)
{		
	//make sure buddypress is loaded
	do_action('bp_init');
	//array of user meta to mirror
	$um = array(
		"company" => "Company",			//usermeta field => buddypress profile field
	);		
	//check if this user meta is to be mirrored
	foreach($um as $left => $right)
	{
		if($meta_key == $left)
		{			
			//find the buddypress field
			$field = xprofile_get_field_id_from_name($right);
			//update it
			if(!empty($field))
				xprofile_set_field_data($field, $object_id, $meta_value);
		}
	}
}
add_action('update_user_meta', 'pmprobuddy_update_user_meta', 10, 4);
//need to add the meta_id for add filter
function pmprobuddy_add_user_meta($object_id, $meta_key, $meta_value)
{
	pmprobuddy_update_user_meta(NULL, $object_id, $meta_key, $meta_value);
}
add_action('add_user_meta', 'pmprobuddy_add_user_meta', 10, 3);
