<?php

namespace Roots\Sage\Assets;

/**
 * Get paths for assets
 */
class JsonManifest {
  private $manifest;

  public function __construct($manifest_path) {
    if (file_exists($manifest_path)) {
      $this->manifest = json_decode(file_get_contents($manifest_path), true);
    } else {
      $this->manifest = [];
    }
  }

  public function get() {
    return $this->manifest;
  }

  public function getPath($key = '', $default = null) {
    $collection = $this->manifest;
    if (is_null($key)) {
      return $collection;
    }
    if (isset($collection[$key])) {
      return $collection[$key];
    }
    foreach (explode('.', $key) as $segment) {
      if (!isset($collection[$segment])) {
        return $default;
      } else {
        $collection = $collection[$segment];
      }
    }
    return $collection;
  }
}

function asset_path($filename) {
  $dist_path = get_template_directory_uri() . '/dist/';
  $directory = dirname($filename) . '/';
  $file = basename($filename);
  static $manifest;

  if (empty($manifest)) {
    $manifest_path = get_template_directory() . '/dist/' . 'assets.json';
    $manifest = new JsonManifest($manifest_path);
  }

  if (array_key_exists($file, $manifest->get())) {
    return $dist_path . $directory . $manifest->get()[$file];
  } else {
    return $dist_path . $directory . $file;
  }
}

function create_srcset_chunks($key, $val) {
  return $val . ' ' . $key;
}

function create_srcset($chunks) {
  return implode(', ', $chunks);
}

function get_srcset($img_array) {
  $chunks = array_map(__NAMESPACE__.'\create_srcset_chunks', array_keys($img_array), $img_array);
  return create_srcset($chunks);
}



function get_image_size_array_by_id($image_id, $sizes_to_return = [
  '1440w',
  '1440w_2x',

  '1200w',
  '1200w_2x',

  // Breakpoint: lg
  '992w',
  '992w_2x',

  // Breakpoint: md
  '768w',
  '768w_2x',

  // Breakpoint: sm
  '576w',
  '576w_2x',

  // iPhone Plus
  '414w',
  '414w_2x',

  // iPhone
  '375w',
  '375w_2x',

  // iPhone 5
  '320w',
  '320w_2x'
]) {
  $img_array = [];
  foreach ($sizes_to_return as $size) {
    $size_array = wp_get_attachment_image_src($image_id, $size);
    $img_array[$size] = $size_array[0];
  }
  return $img_array;
}


function get_acf_image_size_array($acf_image_array, $sizes_to_return = [
  '1440w',
  '1440w_2x',

  '1200w',
  '1200w_2x',

  // Breakpoint: lg
  '992w',
  '992w_2x',

  // Breakpoint: md
  '768w',
  '768w_2x',

  // Breakpoint: sm
  '576w',
  '576w_2x',

  // iPhone Plus
  '414w',
  '414w_2x',

  // iPhone
  '375w',
  '375w_2x',

  // iPhone 5
  '320w',
  '320w_2x'
]) {
  $img_array = [];

  if ($acf_image_array && array_key_exists('sizes', $acf_image_array)) {
    foreach ($sizes_to_return as $size) {
      $key = str_replace('_cropped', '', $size);
      $img_array[$key] = $acf_image_array['sizes'][$size];
    }
  }

  return $img_array;
}




function get_img_markup_with_srcset($img_array, $attrs = [
  'class' => '',
  'alt' => '',
]) {
  if ($img_array) {
    return sprintf(
      '<img class="%s" src="%s" srcset="%s" alt="%s">',
      $attrs['class'],
      array_values($img_array)[0], // Get the first element without removing it.
      get_srcset($img_array),
      $attrs['alt']
    );
  } else {
    return '';
  }
}
