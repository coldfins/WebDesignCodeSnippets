<?php
  class Prototype extends Prototype_Model {

    function __construct() {
      parent::__construct();
    }

    function get_dir( $dirname ) {
      return $this->dir[$dirname];
    }

    function set_dir( $dirname, $dir ) {
      $this->dir[$dirname] = $dir;
    }

    function only_template( $template ) {
      $this->only_this_template = $template;
    }

    function get_only_template(){
      return $this->only_this_template;
    }

    function get_template( $templatename ) {
      $dir = $this->dir['templates'];

      if(preg_match("/^([a-zA-Z]+)__(.*)/", $templatename, $sub_template)) :
        if( !is_file( $dir . $sub_template[1] . '/' . $sub_template[2] . '.php' ) ) {
          include( $dir . $this->main_template . '.php' );
          return;
        }
        include( $dir . $sub_template[1] . '/' . $sub_template[2] . '.php' );
      else :
        if( !is_file( $dir . $templatename . '.php' ) ) $templatename = $this->main_template;
        include( $dir . $templatename . '.php' );
      endif;
    }

    function set_maintemplate( $template ) {
      $this->main_template = $template;
    }

    function get_maintemplate() {
      return $this->main_template;
    }

    function set_pagetitle( $title ) {
      $this->pagetitle = $title;
    }

    function get_pagetitle() {
      return $this->pagetitle;
    }

    function template_name() {
      $template = $this->get_maintemplate();
      $dir = $this->get_dir('templates');

      if( isset( $_GET['page'] ) &&  preg_match("/^([a-zA-Z]+)__(.*)/", $_GET['page'], $sub_template) ) :
        if( is_file( $dir . $sub_template[1] . '/' . $sub_template[2] . '.php' ) ) :
          $template = $_GET['page'];
        endif;
      endif;

      if( isset( $_GET['page'] ) && is_file( $dir . $_GET['page'] . '.php' ) ) :
          $template = $_GET['page'];
      endif;
      return $template;
    }

    function page_class() {
      return 'page-' . $this->page_type();
    }

    function page_type() {
      $page_type = 'global';
      if(preg_match("/^([a-zA-Z]+)__(.*)/", template(), $new_page_type))
        return $new_page_type[1];

      return $page_type;
    }

    function addStyle($style) {
      $this->styles['default'][] = $style;
    }

    function addFooterScript($script) {
      $this->scripts['footer'][] = $script;
    }

    function addHeaderScript($script) {
      $this->scripts['header'][] = $script;
    }

    function render_styles() {
      $u_agent = $_SERVER['HTTP_USER_AGENT'];
      $dir = $this->get_dir('styles');
      $styles = '';
      foreach( $this->styles['default'] as $style ) :
        $styles .= '<link href="' . $dir . $style . '.css" rel="stylesheet">';
      endforeach;
      echo $styles;
    }

    function render_scripts($where) {
      $scripts = '';
      $my_scripts = '';
      switch($where){
        case 'header':
        case 'footer':
          $my_scripts = $this->scripts[$where];
          break;
        default:
          return false;
          break;
      }
      $dir = $this->get_dir('scripts');
      if($my_scripts && count($my_scripts) > 0){
        foreach( $my_scripts as $script ) :
          $scripts .= '<script src="' . $dir . $script . '.js"></script>';
        endforeach;
      }

      echo $scripts;
    }

    function parse_template( $template ) {
      $dir = $this->get_dir('templates');
      if( !is_file( $dir . $template . '.php' ) ) return false;
      ob_start();
      require_once( $dir . $template . '.php' );
      $content = ob_get_contents();
      ob_end_clean();
      echo $content;
    }

    function get_component( $_component_name, $_args, $_show_code ) {
      global $args, $component_name, $show_code;
      $args = json_decode( json_encode( $_args ), FALSE );
      $component_name = $_component_name;
      $show_code = $_show_code;

      $this->get_template( 'components/' . $component_name );
    }
  }
?>
