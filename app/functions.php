<?php
/**
  * PASTE GLOBAL FUNCTIONS HERE
  */

// get template norma
function template() {
  global $Prototype;
  return $Prototype->template_name();
}

function only_this_template( $template ) {
  global $Prototype;
  $Prototype->only_template( $template );
}

function get_only_this_template() {
  global $Prototype;
  return $Prototype->get_only_template();
}

// Get template
function get_template( $template ) {
  global $Prototype;
  $Prototype->get_template( $template );
}

function set_maintemplate( $templatename = 'list' ) {
  global $Prototype;
  $Prototype->set_maintemplate( $templatename );
}

// Get a component
// do global $args in file to overgive specific arguments
function get_component( $component_name, $args, $show_code = false ) {
  global $Prototype;
  $Prototype->get_component( $component_name, $args, $show_code );
}

// Get class for Body
function get_page_class() {
  global $Prototype;
  return $Prototype->page_class();
}

// Get the pagetype
function get_page_type() {
  global $Prototype;
  return $Prototype->page_type();
}

// Get dir
function get_dir( $dirname ) {
  global $Prototype;
  return $Prototype->get_dir( $dirname );
}

function set_attributes($attr = false) {
  $cur_attr = false;
  if(is_array($attr) && $attr !== false) {
    $cur_attr = '';
    foreach($attr as $attribute => $value) {
      $cur_attr.= ' ' . $attribute . ' = "' . $value . '"';
    }
  }
  return $cur_attr;
}

// Get an image
function get_image_src($image) {
  return get_dir('images') . $image;
}

function get_image($img,$alt = "",$attr = false) {
  $attr = set_attributes($attr);
  ?>
  <img src="<?= get_image_src($img); ?>" alt="<?= $alt ?>"<?= $attr !== false ? $attr : ''; ?>>
  <?php
}

function get_image_list(){
  $imageDir = get_dir('images');
  $dir = new DirectoryIterator($imageDir);
  $fileList = array();
  foreach ($dir as $fileinfo) {
    if ($fileinfo->isFile()) {
        $filename = $fileinfo->getFilename();
        array_push($fileList, $filename);
    }
  }
  return $fileList;
}

function getImageSelect(){
  $images = get_image_list();
  if(sizeof($images) == 0){
    ?>
    <span class="error">No images found in this prototype.</span>
    <?php
  }
  else {
    ?>
    <select name="set-src" id="set-src" class='helper-tool-set-src' value="src/dist/images/focuspoint-helper/default.jpg">
      <?php foreach($images as $img): ?>
        <option value="<?= get_dir('images').$img; ?>"><?= $img; ?></option>
      <?php endforeach; ?>
    </select>
    <?php
  }
}

function get_focuspoint_picture($image = false,$alt="Bild mit Fokuspunkt",$attr = false,$ratios = [480,768,1280],$focus = ['x' => 0,'y' => 0],$container = []){
  $container[] = 'focuspoint';

  ?>
  <div class="<?= implode(' ',$container) ?>" data-focus-x="<?= $focus['x'] ?>" data-focus-y="<?= $focus['y'] ?>">
  <?php get_picture($image,$alt,$attr,$ratios); ?>
  </div>
  <?php
}

function get_picture($image = false,$alt="Bild Alttext für SEO",$attr = false,$ratios = [480,768,1280]) {
  $attr = set_attributes($attr);
  if(!$image) {
    return false;
  };

  $default = get_dir('images') . $image;
  $new = get_dir('images') . 'new_' . $image;

  $images = array();
  foreach($ratios as $ratio) {
    $images[$ratio] = resize_image($image,$ratio,'auto');
  }
  ?>
  <picture<?= $attr !== false ? $attr : ''; ?>>
    <?php foreach($images as $ratio => $img): ?>
      <source srcset="<?= $img ?>" media="(max-device-width: <?= $ratio ?>px)">
    <?php endforeach; ?>
    <img src="<?= $default ?>" alt="<?= $alt ?>">
  </picture>
  <?php
}

function resize_image($file = false, $w = 'auto', $h = 'auto', $crop = false, $only_filename = false) {
  if(!$file) return false;
  list($width, $height) = getimagesize(get_dir('images') . $file);
  $r = $width / $height;

  $def_w = $w == 'auto' ? $h * $r : $w;
  $def_h = $h == 'auto' ? $w / $r : $h;

  if($crop && (($w != 'auto' && $h == 'auto') || ($w == 'auto' && $h != 'auto'))) $crop = false;

  preg_match("/(.*)\.(.*)/", $file, $filename_arr);
  $def_filename = $filename_arr[1] . '_' . round($def_w) . '_' . round($def_h);
  if($crop != false ) $def_filename.= '_croped';
  $def_filename.= '.'.$filename_arr[2];
  if(file_exists(get_dir('images').$def_filename)) return $only_filename ? $def_filename : get_dir('images') . $def_filename;


  $image = new ImageResize(get_dir('images') . $file);


  if($crop && $w != 'auto' && $h != 'auto') {
    $image->crop($w,$h);
  } else {
    if($w != 'auto' && $h = 'auto') {
      $h = $w / $r;
      $image->resizeToWidth($w);
    } elseif($h != 'auto' && $w = 'auto') {
      $w = $h * $r;
      $image->resizeToHeight($h);
    } elseif($w != 'auto' && $h != 'auto') {
      $image->resize($w,$h);
    } else {
      $h = $w / $r;
      $w = $h * $r;
    }
  }

  $filename = $filename_arr[1] . '_'.round($w) . '_'.round($h);
  if($crop != false ) $filename.= '_croped';
  $filename.= '.'.$filename_arr[2];

  $image->save(get_dir('images') . $filename);
  return $only_filename ? $filename : get_dir('images') . $filename;
}

// addign styles & scripts (musst be called bfore rendering)
function addStyle($style) {
  global $Prototype;
  $Prototype->addStyle($style);
}

function addFooterScript($script) {
  global $Prototype;
  $Prototype->addFooterScript($script);
}

function addHeaderScript($script) {
  global $Prototype;
  $Prototype->addHeaderScript($script);
}

// rendering
function render_styles() {
  global $Prototype;
  $Prototype->render_styles();
}

function render_scripts( $where ) {
  global $Prototype;
  $Prototype->render_scripts( $where );
}

function get_pagetitle() {
  global $Prototype;
  return $Prototype->get_pagetitle();
}

function get_maintemplate() {
  global $Prototype;
  return $Prototype->get_maintemplate();
}

// parse php
function parse_template( $template ) {
  global $Prototype;
  $Prototype->parse_template( $template );
}

function escapeJsonString($value) { # list from www.json.org: (\b backspace, \f formfeed)
    $escapers = array("\\", "/", "\"", "\n", "\r", "\t", "\x08", "\x0c");
    $replacements = array("\\\\", "\\/", "\\\"", "\\n", "\\r", "\\t", "\\f", "\\b");
    $result = str_replace($escapers, $replacements, $value);
    return $result;
}

?>
