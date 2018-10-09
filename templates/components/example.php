<?php global $args, $component_name, $show_code; ?>
<article class="container-fluid componentsclass"<?= $show_code ? ' data-comcode="'.$component_name.'" data-args=\''.json_encode($args).'\'' : '' ?>>
  <section class="container pt-5">
    <h1>Example for component</h1>
    <p>First create a file under <code>templates/components/</code>. After you created the file, you must add your arguments like this on top of the file:</p>
    <p>
      <code>
      &#60;?php global $args, $component_name, $show_code; ?&#62;
      </code>
    </p>
    <p>To show up your component just use the get_component function like this</p>
    <p>
      <code>
        $args = [<br>
          &nbsp;&nbsp;'key' => 'value',<br>
          &nbsp;&nbsp;'multiple' => [<br>
            &nbsp;&nbsp;&nbsp;&nbsp;['key' => 'value'],<br>
            &nbsp;&nbsp;&nbsp;&nbsp;['key' => 'value']<br>
          &nbsp;&nbsp;]<br>
        ];<br>
      </code>
    </p>
    <p><code>get_component('component_name', $args)</code></p>
    <hr>
    <h2>How to Output your arguments</h2>
    <p>Key <code>$args->key</code> = key</p>
    <p>Value <code>$args->key</code> = <?= $args->key; ?></p>
    <p>Multiple array <code>$args->multiple</code></p>
    <?php var_dump($args->multiple); ?>
    <hr>
    <h2>Show sourcecode of component for SK-Devs</h2>
    <p>if you do <code>get_component('<?= $component_name ?>', $args, true )</code> it will set for this case <code>data-comcode="<?= $component_name ?>"</code></p>
    <p>The data attribute will then get the component file. In this cas it is <code>templates/components/<?= $component_name ?>.php</code></p>
  </section>
</article>
