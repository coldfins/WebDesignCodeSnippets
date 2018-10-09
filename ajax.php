<?php
require_once('config.php');

$return = 0;
switch ($_POST['action']) {
	case 'sample':
		$return = sample();
		break;
}

switch ($_GET['action']) {
	case 'sample':
		$return = sample();
		break;

  case 'component':
    $return = component($_GET['component'], $_GET['args']);
    break;
}

print_r($return);
die();

//functions
function sample() {
	return "HELLO WORLD!";
}

function component($component_name, $arguments) {
  $arguments = json_decode(json_encode($arguments), false);
  get_component($component_name, $arguments);
}
?>
