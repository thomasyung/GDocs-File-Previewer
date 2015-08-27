<?php

elgg_register_event_handler('init', 'system', 'gdocs_file_previewer_init');

function gdocs_file_previewer_init() {
	// We will create a special publicly accessible URL that Google Docs Viewer
	// can use to preview the file temporarily.
	elgg_register_page_handler('gdocspreview','page_handler_gdocs_preview');
	elgg_register_plugin_hook_handler('public_pages', 'walled_garden', 'expages_public_pages');
}

function expages_public_pages($hook, $type, $return_value, $params) {
	$allowed_pages = array();
	$allowed_pages[] = 'gdocspreview/*.*/*.*';
	return $allowed_pages; 
}

function page_handler_gdocs_preview($page) {
	// Read the URI parameters based on <siteurl>/gdocspreview/param1/param2
	$file_guid = $page[0];
	$token = $page[1];
	$timestamp = intval($page[2]);
	
	$ia = elgg_set_ignore_access(true);
	$file = get_entity($file_guid);
	if (!($file instanceof \ElggFile)) {
		elgg_set_ignore_access($ia);
		register_error(elgg_echo("file:downloadfailed"));
		forward();
	}
	
	// validate timestamp
	$date = new DateTime();
	$diff = $date->format('U') - $timestamp;
	$timeout = (int) elgg_get_plugin_setting('timeout', 'gdocs_file_previewer');
	if ($timeout === 0) {
		$timeout = 180; // 3 min is plenty for a default
	}
	
	if ($diff > $timeout) {
		elgg_set_ignore_access($ia);
		register_error(elgg_echo("file:downloadfailed"));
		forward();
	}
	
	// validate token
	if (!gdocs_file_previewer_validate_token($token, $file, $timestamp)) {
		elgg_set_ignore_access($ia);
		register_error(elgg_echo("file:downloadfailed"));
		forward();
	}
	
	$mime = $file->getMimeType();
	if (!$mime) {
		$mime = "application/octet-stream";
	}
	$filename = $file->originalfilename;
	// fix for IE https issue
	header("Pragma: public");
	header("Content-type: $mime");
	if (strpos($mime, "image/") !== false || $mime == "application/pdf") {
		header("Content-Disposition: inline; filename=\"$filename\"");
	} else {
		header("Content-Disposition: attachment; filename=\"$filename\"");
	}
	ob_clean();
	flush();
	readfile($file->getFilenameOnFilestore());
	// restore the access level
	elgg_set_ignore_access($ia);
	exit;
}


function gdocs_file_previewer_get_token($file, $timestamp) {
	if (!elgg_instanceof($file) || !is_numeric($timestamp)) {
		return false;
	}
	
	$secret = get_site_secret();
	return sha1($file->guid . $secret . $timestamp);
}


function gdocs_file_previewer_validate_token($token, $file, $timestamp) {
	return $token === gdocs_file_previewer_get_token($file, $timestamp);
}