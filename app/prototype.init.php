<?php
  global $Prototype;
  require_once( $app_dir . 'model/prototype.php' );
  require_once( $app_dir . 'controller/prototype.controller.php' );
  $Prototype = new Prototype();

  if( isset( $pagetitle ) && !empty( $pagetitle ) )
    $Prototype->set_pagetitle( $pagetitle );
?>
