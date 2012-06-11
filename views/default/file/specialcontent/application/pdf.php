<?php

$pdf_setting = elgg_get_plugin_setting('pdf', 'gdocs_file_previewer'); 

if ($pdf_setting == 1){
	include "viewer.php";
}

?>
