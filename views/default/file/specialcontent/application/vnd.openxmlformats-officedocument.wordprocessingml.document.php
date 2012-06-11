<?php

$wordc_setting = elgg_get_plugin_setting('wordc', 'gdocs_file_previewer'); 

if ($wordc_setting == 1){
	include "viewer.php";
}

?>