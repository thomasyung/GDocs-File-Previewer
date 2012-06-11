<?php 

$pdf_setting = $vars['entity']->pdf;
$wordc_setting = $vars['entity']->wordc;
$power_setting = $vars['entity']->power;
$excel_setting = $vars['entity']->excel;
$pages_setting = $vars['entity']->ipages;
$zip_setting = $vars['entity']->zip;
$eps_setting = $vars['entity']->eps;

?>

<p>
  <b>Do you want to preview PDF files?</b>

<?php

echo elgg_view('input/dropdown',array(
'name' => 'params[pdf]', 
'options_values'=> array('1'=>'Yes','2'=>'No'),
'value'=> $pdf_setting));

?>
</p>

<p>
  <b>Do you want to preview MS Word files?</b>

<?php

echo elgg_view('input/dropdown',array(
'name' => 'params[wordc]', 
'options_values'=> array('1'=>'Yes','2'=>'No'),
'value'=> $wordc_setting));

?>
</p>

<p>
  <b>Do you want to preview MS Powerpoint files?</b>

<?php

echo elgg_view('input/dropdown',array(
'name' => 'params[power]', 
'options_values'=> array('1'=>'Yes','2'=>'No'),
'value'=> $power_setting));

?>
</p>

<p>
  <b>Do you want to preview MS Excel files?</b>

<?php

echo elgg_view('input/dropdown',array(
'name' => 'params[excel]', 
'options_values'=> array('1'=>'Yes','2'=>'No'),
'value'=> $excel_setting));

?>
</p>

<p>
  <b>Do you want to preview Apple iWork Pages files?</b>

<?php

echo elgg_view('input/dropdown',array(
'name' => 'params[ipages]', 
'options_values'=> array('1'=>'Yes','2'=>'No'),
'value'=> $pages_setting));

?>
</p>

<p>
  <b>Do you want to preview Zip files?</b>

<?php

echo elgg_view('input/dropdown',array(
'name' => 'params[zip]', 
'options_values'=> array('1'=>'Yes','2'=>'No'),
'value'=> $zip_setting));

?>
</p>

<p>
  <b>Do you want to preview Postscript EPS files?</b>

<?php

echo elgg_view('input/dropdown',array(
'name' => 'params[eps]', 
'options_values'=> array('1'=>'Yes','2'=>'No'),
'value'=> $eps_setting));

?>
</p>