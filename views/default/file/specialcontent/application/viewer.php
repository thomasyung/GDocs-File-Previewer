<?php

if (!elgg_instanceof($vars['entity'])) {
	return;
}

$date = new DateTime();
$token = gdocs_file_previewer_get_token($vars['entity'], $date->format('U'));
if (!$token) {
	// something went wrong
	return;
}

$file_url = elgg_get_site_url() . "gdocspreview/{$vars['entity']->getGUID()}/{$token}/{$date->format('U')}";

	echo <<<HTML
		<div class="file-photo">

<iframe src="https://docs.google.com/viewer?url=$file_url&embedded=true&overridemobile=true" width="100%" height="780" style="border: none;"></iframe> 

		</div>
HTML;
