<?php
	$ipages_setting = elgg_get_plugin_setting('ipages', 'gdocs_file_previewer'); 

	if ($ipages_setting == 1){
		include "viewer.php";
	}
?>