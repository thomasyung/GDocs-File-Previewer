<?php
	$zip_setting = elgg_get_plugin_setting('zip', 'gdocs_file_previewer'); 

	if ($zip_setting == 1){
		include "viewer.php";
	}
?>