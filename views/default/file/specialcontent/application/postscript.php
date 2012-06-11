<?php
	$eps_setting = elgg_get_plugin_setting('eps', 'gdocs_file_previewer'); 

	if ($eps_setting == 1){
		include "viewer.php";
	}
?>