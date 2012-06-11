<?php

$excel_setting = elgg_get_plugin_setting('excel', 'gdocs_file_previewer'); 

if ($excel_setting == 1){
	include "viewer.php";
}

?>