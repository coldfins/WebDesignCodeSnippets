<?php
  get_template( 'page/header' );
  $page = get_maintemplate();
  if( isset( $_GET['page'] ) ) :
    $page = $_GET['page'];
    if( isset($_GET['type']) && $_GET['type'] == 'util'){
      $page = "prototype-utilities/".$page;
    }
  endif;
  get_template( $page );
  get_template( 'page/footer' );
?>
