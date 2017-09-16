<?php

namespace Roots\Sage\Panels;

function get_unique_panel_id() {
  if (function_exists('get_row_index')) {
    return get_row_index();
  } else {
    return mt_rand(100000, 999999);
  }
}

function get_panel_classes($panel, $index, $prefix='cptr--') {
  $base = $prefix . 'panel';

  return (object) [
    'base' => $base,
    'unique' => $base . '--' . $index,
    'modifier' => $index === 1 ? $base . '--top' : '',
    'panel' => $prefix . $panel,
    'bs4' => 'col-12',
  ];
}

function get_panel_styles($img_array, $className, $overlay = 0) {

  // Weâ€™re going to add all rules to this string.
  $styles = '';

  // Shortcut for the hi-res media query.
  $hiRes = '(-webkit-min-device-pixel-ratio: 2),  (min-resolution: 192dpi)';

  // Start with the smallest image.
  $sm_template = '.%s{background-image:url(%s)}';
  $styles .= sprintf($sm_template, $className, $img_array['1024w']);

  // Next, add the overlay.
  $ov_template = '.%s::before{background: rgba(0,0,0,%02.2f)}';
  $styles .= sprintf($ov_template, $className, ($overlay / 100));

  // Now set up all the media queries for larger and higher-resolution screens.
  $mq_template = '@media %s { .' . $className . ' {background-image: url(%s)}}';

  // To make it less verbose, weâ€™ll loop over these values.
  $media_queries = [
    [
      'query' => $hiRes,
      'image' => $img_array['1024w'],
    ],
    [
      'query' => '(min-width: 600px)',
      'image' => $img_array['1024w'],
    ],
    [
      'query' => "(min-width: 600px), $hiRes",
      'image' => $img_array['1024w'],
    ],
    [
      'query' => "(min-width: 992px)",
      'image' => $img_array['1024w'],
    ],
    [
      'query' => "(min-width: 992px), $hiRes",
      'image' => $img_array['1440w'],
    ],
    [
      'query' => "(min-width: 1200px)",
      'image' => $img_array['1440w'],
    ],
    [
      'query' => "(min-width: 1200px), $hiRes",
      'image' => $img_array['2880w'],
    ],
  ];

  foreach ($media_queries as $q) {
    $styles .= sprintf($mq_template, $q['query'], $q['image']);
  }

  // Finally, wrap that shit in a style tag and return it.
  return sprintf('<style>%s</style>', $styles);
}
