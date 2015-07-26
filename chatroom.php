<?php
if($_POST['formdata']): //If post'd from autosaveform.js
	$json = $_POST['formdata'];

	$file = 'chat.json';
	// Open the file to get existing content
	//$current = file_get_contents($file);
	// Append a new person to the file
	$current = $json;
	$existing = file_get_contents($file);
	
	// Write the contents back to the file
	file_put_contents($file, $existing.$current);
else:
	$file = 'chat.json';
	file_put_contents($file, $current);
endif;
?>