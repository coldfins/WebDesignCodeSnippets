<?php
/**
  * @templatename: 99. Elements
  */
?>

<section class="container-fluid">
  <div class="container pt-5">
    <h1>Element Code Test</h1>
  </div>
</section>

<?php
$args = [
  'title' => _ptr('title', 'My AWESOME component title'),
  'text' => _ptr('text', 'My cool component text yoyoyoyoyoyoyoyoyoyoyoyoyoyoyoyo'),
  'img' => 'caterpillar_01.jpg',
];
get_component( 'test', $args, true );
?>
