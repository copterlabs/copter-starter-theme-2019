<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/panels.php',    // Flex panel setup
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php',// Theme customizer
  'lib/acf-gravity-forms/acf-gravity_forms.php', // Gravity Forms ACF Field
  'lib/navwalker.php'  // Bootstrap Navwalker
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

function prebug($arr) {
  echo '<pre style="background: #eee; padding: 30px"><code>' . print_r($arr,true) . "</code></pre>";
}

function get_field_php($field_names) {
  echo "<pre>";
  foreach ($field_names as $field => $value) {
    echo '$' . $field . " = get_sub_field('" . $field . "');\n";
  }
  foreach ($field_names as $field => $value) { ?>
&#x3C;div class=&#x22;&#x3C;?= $classes-&#x3E;panel ?&#x3E;__<?= $field ?>&#x22;&#x3E;
    &#x3C;?= $<?= $field ?> ?&#x3E;
  &#x3C;/div&#x3E;
  <?php }
  echo "</pre>";
}
