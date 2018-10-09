<?php
/**
  * @templatename: Focuspoint Helper
  */
?>

<div class="fp-helper">
	<div id="Frames">
	</div>

	<div id="Info">
		<div class="helper-tool">
			<h1>Click the image to set the FocusPoint.</h1>
			<!-- <img class="focus-target-reticle" src='../img/focuspoint-target.png' /> -->
			<div class="helper-tool-target">
				<img class="helper-tool-img" src="src/prototype-utilities/images/focuspoint-helper/default.jpg">
				<img class="reticle" src="src/prototype-utilities/images/focuspoint-helper/focuspoint-target.png">
				<img class="target-overlay">
			</div>
			<p>
				<label for="set-src">Paste in a URL to change the image</label>
				<?php getImageSelect(); ?>
				<!-- <input name="set-src" id="set-src" class='helper-tool-set-src' type='text' value="src/dist/images/focuspoint-helper/default.jpg"> -->
			</p>
			<p>
				<label for="data-attr">Data-attributes:</label>
				<input type="text" readonly="readonly" class='helper-tool-data-attr' id="data-attr" name="data-attr" value="['x' => '0.00','y' => '0.00']" />
			</p>
		</div><!-- End Helper Tool -->
	</div>
</div>
