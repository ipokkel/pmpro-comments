<?php
/*
Plugin Name: Paid Memberships Pro - Comments
Description: Display comments for members only.
Version: .1
Author: Paid Memberships Pro
Author URI: https://www.paidmembershipspro.com
Text Domain: pmpro-comments
Domain Path: /languages
*/

/*
	Only show comments on a page if the user has a membership level.
*/
function custom_comments_template( $comment_template ) {

	// Let's only do this if PMPro is active
	if ( ! function_exists( 'pmpro_hasMembershipLevel' ) ) {
		return $comment_template;
	}

	if ( ! pmpro_hasMembershipLevel() ) {
		// Return a blank template if the user doesn't have the desired membership level
		return dirname( __FILE__ ) . '/templates/blank-comments-template.php';
	}
	return $comment_template;
}
add_filter( 'comments_template', 'custom_comments_template' );

/*
	Change the text for non-members.
*/
function pmpro_comments_non_member_text() {
	$pmpro_comments_non_member_text = pmpro_get_no_access_message( null, null, null );
	$pmpro_comments_non_member_text = str_replace( __( 'This content is', 'pmpro-comments' ), __( 'Comments are', 'pmpro-comments' ), $pmpro_comments_non_member_text );
	return $pmpro_comments_non_member_text;
}



