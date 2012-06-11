<?php

$date = new DateTime();
$file_url = elgg_get_site_url() . "gdocspreview/{$vars['entity']->getGUID()}/{$date->format('U')}";

	echo <<<HTML
		<div class="file-photo">

<iframe src="https://docs.google.com/viewer?url=$file_url&embedded=true&overridemobile=true" width="100%" height="780" style="border: none;"></iframe> 

		</div>
HTML;

?>