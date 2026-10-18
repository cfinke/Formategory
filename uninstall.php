<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit;

delete_option( 'formategory_version' );

// Delete all Formategory templates.
global $wpdb;

$formategory_template_ids = $wpdb->get_col( "SELECT ID FROM {$wpdb->posts} WHERE post_type = 'formategory_template'" );

foreach ( $formategory_template_ids as $template_id ) {
	wp_delete_object_term_relationships( $template_id, array( 'category' ) );

	wp_delete_post( $template_id, true );
}
