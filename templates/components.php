<?php
/**
  * @templatename: 12. Components Example
  */
$args = [
  'key' => 'value',
  'multiple' => [
    [ 'key' => 'value' ],
    [ 'key' => 'value' ]
  ]
];
get_component( 'example', $args, true );
?>
