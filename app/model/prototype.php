<?php
class Prototype_Model {
  //dir
  protected $dir = array();

  //vars
  protected $pagetitle = 'PAGETITLE';
  protected $main_template = 'list';
  protected $only_this_template = false;
  protected $styles = array();
  protected $scripts = array();

  function __construct() {
    $this->dir['templates'] = 'templates/';
    $this->dir['components'] = 'src/dist/';
    $this->dir['images'] = $this->dir['components'] . 'images/';
    $this->dir['styles'] = $this->dir['components'] . 'styles/';
    $this->dir['scripts'] = $this->dir['components'] . 'scripts/';
    $this->dir['app'] = 'app/';
    $this->dir['lib'] = 'lib/';
    $this->dir['ptypeUtilities'] = 'templates/prototype-utilities/';
  }
}
?>
