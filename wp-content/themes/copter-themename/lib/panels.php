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
  $hiRes1 = '(-webkit-min-device-pixel-ratio: 2)';
  $hiRes2 = '(min-resolution: 192dpi)';
  $hiRes3 = '(min-resolution: 2dppx)';

  // Start with the smallest image.
  $sm_template = '.%s{ background-image:url(%s) }';

  $styles .= sprintf($sm_template, $className, $img_array['1440w']);

  // Next, add the overlay.
  $ov_template = '.%s::before{background: rgba(0,0,0,%02.2f)}';
  $styles .= sprintf($ov_template, $className, $overlay);

  // Now set up all the media queries for larger and higher-resolution screens.
  $mq_template = '@media %s { .' . $className . ' {background-image: url(%s)}}';

  /*
    // Breakpoint: xl
    add_image_size('1200w', 1200);
    add_image_size('1200w_2x', 2400);

    // Breakpoint: lg
    add_image_size('992w', 992);
    add_image_size('992w_2x', 992*2);

    // Breakpoint: md
    add_image_size('768w', 768);
    add_image_size('768w_2x', 768*2);

    // Breakpoint: sm
    add_image_size('576w', 576);
    add_image_size('576w_2x', 576*2);

    // iPhone Plus
    add_image_size('414w', 414);
    add_image_size('414w_2x', 414*2);

    // iPhone
    add_image_size('375w', 375);
    add_image_size('375w_2x', 375*2);
  */

  $media_queries = [
    [
      'query' => "(max-width: 375px)",
      'image' => $img_array['375w'],
    ],
    [
      'query' => "(max-width: 375px) and $hiRes1, (max-width: 375px) and $hiRes2, (max-width: 375px) and $hiRes3",
      'image' => $img_array['375w_2x'],
    ],
    [
      'query' => "(min-width: 376px) and (max-width: 414px)",
      'image' => $img_array['414w'],
    ],
    [
      'query' => "(min-width: 376px) and (max-width: 414px) and $hiRes1, (min-width: 376px) and (max-width: 414px) and $hiRes2, (min-width: 376px) and (max-width: 414px) and $hiRes3",
      'image' => $img_array['414w_2x'],
    ],
    [
      'query' => "(min-width: 415px) and (max-width: 576px)",
      'image' => $img_array['576w'],
    ],
    [
      'query' => "(min-width: 415px) and (max-width: 576px) and $hiRes1, (min-width: 415px) and (max-width: 576px) and $hiRes2, (min-width: 415px) and (max-width: 576px) and $hiRes3",
      'image' => $img_array['576w_2x'],
    ],
    [
      'query' => "(min-width: 577px) and (max-width: 768px)",
      'image' => $img_array['768w'],
    ],
    [
      'query' => "(min-width: 577px) and (max-width: 768px) and $hiRes1, (min-width: 577px) and (max-width: 768px) and $hiRes2, (min-width: 577px) and (max-width: 768px) and $hiRes3",
      'image' => $img_array['768w_2x'],
    ],
    [
      'query' => "(min-width: 769px) and (max-width: 992px)",
      'image' => $img_array['992px'],
    ],
    [
      'query' => "(min-width: 769px) and (max-width: 992px) and $hiRes1, (min-width: 769px) and (max-width: 992px) and $hiRes2, (min-width: 769px) and (max-width: 992px) and $hiRes3",
      'image' => $img_array['992w_2x'],
    ],
    [
      'query' => "(min-width: 993px) and (max-width: 1200px)",
      'image' => $img_array['1200w'],
    ],
    [
      'query' => "(min-width: 993px) and (max-width: 1200px) and $hiRes1, (min-width: 993px) and (max-width: 1200px) and $hiRes2, (min-width: 993px) and (max-width: 1200px) and $hiRes3",
      'image' => $img_array['1200w_2x'],
    ],
    [
      'query' => "(min-width: 1201px)",
      'image' => $img_array['1440w'],
    ],
    [
      'query' => "(min-width: 1201px) and $hiRes1, (min-width: 1201px) and $hiRes2, (min-width: 1201px) and $hiRes3",
      'image' => $img_array['1440w_2x'],
    ]
  ];

  foreach ($media_queries as $q) {
    $styles .= sprintf($mq_template, $q['query'], $q['image']);
  }

  // Finally, wrap that shit in a style tag and return it.
  return sprintf('<style>%s</style>', $styles);
}
