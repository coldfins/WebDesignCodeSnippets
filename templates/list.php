<div class="container pt-5">
  <h1>Pages</h1>
  <ul>
    <?php
    $templatedir = get_dir('templates');
    $dir = new DirectoryIterator($templatedir);
    $templates = array();

    foreach ($dir as $fileinfo) {
      if (!$fileinfo->isDot()) {
        $filename = $fileinfo->getFilename();
        $source = file_get_contents($templatedir.$filename);

        if (preg_match("/\*\s?@templatename:\s?(.*)/", $source, $templatename)) {
          $template = preg_replace("/\.php/", "", $filename);
          $templatename = $templatename[1];
          $templates[$template] = $templatename;
        }
      }
    }
    asort($templates);

    foreach ($templates as $key => $value):
    ?>
    <li><a href="?page=<?= $key ?>"><?= $value ?></a></li>
    <?php
    endforeach;
    ?>

  </ul>

  <h2>Tools</h2>
  <ul>
    <?php
    $templatedir = get_dir('ptypeUtilities');
    $dir = new DirectoryIterator($templatedir);
    $templates = array();

    foreach ($dir as $fileinfo) {
      if (!$fileinfo->isDot()) {
          $filename = $fileinfo->getFilename();
          $source = file_get_contents($templatedir.$filename);

        if (preg_match("/\*\s?@templatename:\s?(.*)/", $source, $templatename)) {
          $template = preg_replace("/\.php/", "", $filename);
          $templatename = $templatename[1];
          $templates[$template] = $templatename;
        }
      }
    }
    asort($templates);

    foreach ($templates as $key => $value):
    ?>
    <li><a href="?page=<?= $key ?>&type=util"><?= $value ?></a></li>
    <?php
    endforeach;
    ?>

    <li><a href="styleguide/">Styleguide</a></li>
  </ul>
</div>
