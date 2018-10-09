<?php
// path
$app_dir = 'app/';
$lib_dir = $app_dir . 'lib/';

// title of project
$pagetitle = 'Caterpillar';

// include app
require_once($app_dir . 'prototype.init.php');

// libs
require_once($lib_dir . 'image_resize/ImageResize.php');

// global functions
require_once($app_dir . 'functions.php');

// Prototype Tools
require_once($app_dir . 'ptools.php');

set_maintemplate('list');
//only_this_template('home');

//add styles
$styles = ['vendor.min','main.min'];
if (isset($_GET['type']) && $_GET['type'] == 'util') {
  $styles[] = '../../prototype-utilities/dist/styles/ptypeUtilities.min';
}

foreach($styles as $style) {
  addStyle($style);
}


//add scripts
$scripts = [
  'header' => [],
  'footer' => ['vendor.min','main.min']
];

if (isset($_GET['type']) && $_GET['type'] == 'util') {
  $scripts['footer'][] = '../../prototype-utilities/dist/scripts/ptypeUtilities.min';
}

if ($scripts['header'] && count($scripts['header']) > 0) {
  foreach($scripts['header'] as $script) {
    addHeaderScript($script);
  }
}

if ($scripts['footer'] && count($scripts['footer']) > 0) {
  foreach($scripts['footer'] as $script) {
    addFooterScript($script);
  }
}
?>
