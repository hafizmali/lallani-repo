<?php // Classic Editor

if (!defined('ABSPATH')) exit;

function disable_gutenberg_remove() {
	
	$gutenberg = function_exists('gutenberg_can_edit_post_type');
	
	$block_editor = has_action('enqueue_block_assets');
	
	if (!$gutenberg && $block_editor === false) return;
	
	if ($block_editor) {
		
		add_filter('use_block_editor_for_post_type', '__return_false', 100, 2);
		
	}
	
	if ($gutenberg) {
		
		add_filter('gutenberg_can_edit_post_type', '__return_false', 100, 2);
		
		disable_gutenberg_hooks();
		
	}
	
}

function disable_gutenberg_hooks() {
	
	// synced w/ Classic Editor plugin
	
	remove_action('admin_menu', 'gutenberg_menu');
	remove_action('admin_init', 'gutenberg_redirect_demo');

	remove_filter('wp_refresh_nonces', 'gutenberg_add_rest_nonce_to_heartbeat_response_headers');
	remove_filter('get_edit_post_link', 'gutenberg_revisions_link_to_editor');
	remove_filter('wp_prepare_revision_for_js', 'gutenberg_revisions_restore');

	remove_action('rest_api_init', 'gutenberg_register_rest_routes');
	remove_action('rest_api_init', 'gutenberg_add_taxonomy_visibility_field');
	remove_filter('rest_request_after_callbacks', 'gutenberg_filter_oembed_result');
	remove_filter('registered_post_type', 'gutenberg_register_post_prepare_functions');

	remove_action('do_meta_boxes', 'gutenberg_meta_box_save', 1000);
	remove_action('submitpost_box', 'gutenberg_intercept_meta_box_render');
	remove_action('submitpage_box', 'gutenberg_intercept_meta_box_render');
	remove_action('edit_page_form', 'gutenberg_intercept_meta_box_render');
	remove_action('edit_form_advanced', 'gutenberg_intercept_meta_box_render');
	remove_filter('redirect_post_location', 'gutenberg_meta_box_save_redirect');
	remove_filter('filter_gutenberg_meta_boxes', 'gutenberg_filter_meta_boxes');

	remove_action('admin_notices', 'gutenberg_build_files_notice');
	remove_filter('body_class', 'gutenberg_add_responsive_body_class');
	remove_filter('admin_url', 'gutenberg_modify_add_new_button_url'); // old
	remove_action('admin_enqueue_scripts', 'gutenberg_check_if_classic_needs_warning_about_blocks');
	remove_filter('register_post_type_args', 'gutenberg_filter_post_type_labels');
	
	//
	
	remove_action('admin_init', 'gutenberg_add_edit_link_filters');
	remove_action('admin_print_scripts-edit.php', 'gutenberg_replace_default_add_new_button');
	remove_filter('redirect_post_location', 'gutenberg_redirect_to_classic_editor_when_saving_posts');
	remove_filter('display_post_states', 'gutenberg_add_gutenberg_post_state');
	remove_action('edit_form_top', 'gutenberg_remember_classic_editor_when_saving_posts');
	
	//
	
	// Keep
	// remove_filter('wp_kses_allowed_html', 'gutenberg_kses_allowedtags', 10, 2); // not needed in 5.0
	// remove_filter('bulk_actions-edit-wp_block', 'gutenberg_block_bulk_actions');
	// remove_filter('wp_insert_post_data', 'gutenberg_remove_wpcom_markdown_support');
	// remove_filter('the_content', 'do_blocks', 9);
	// remove_action('init', 'gutenberg_register_post_types');

	// Continue to manage wpautop for posts that were edited in Gutenberg.
	// remove_filter('wp_editor_settings', 'gutenberg_disable_editor_settings_wpautop');
	// remove_filter('the_content', 'gutenberg_wpautop', 8);
	
}
