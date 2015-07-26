<?php
if($_POST['formdata']): //If post'd from autosaveform.js
	$json = $_POST['formdata'];

	$file = 'data.json';
	// Open the file to get existing content
	//$current = file_get_contents($file);
	// Append a new person to the file
	$current = $json;
	
	// Write the contents back to the file
	file_put_contents($file, $current);
else:
	$file = 'data.json';
	file_put_contents($file, $current);
endif;
?>