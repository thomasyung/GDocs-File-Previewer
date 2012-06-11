<?php

$power_setting = elgg_get_plugin_setting('power', 'gdocs_file_previewer'); 

if ($power_setting == 1){
	include "viewer.php";
}

?>