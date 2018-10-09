<?php
return [
  0 => [
    'item' => [
      'openTag' => '<li ###ID### class="level1">',
      'closeTag' => '</li>'
    ],
    'link' => [
      'openTag' => '<a ###HREF### class="link">',
      'closeTag' => '</a>'
    ],
    'children' => [
      'openTag' => '<ul ###ID### class="ul_sub">',
      'closeTag' => '</ul>'
    ]
  ],
  1 => [
    'item' => [
      'openTag' => '<li ###ID### class="level2">',
      'closeTag' => '</li>'
    ],
    'link' => [
      'openTag' => '<a ###HREF### class="link">',
      'closeTag' => '</a>'
    ],
    'children' => [
      'openTag' => '<ul ###ID### class="ul_sub2">',
      'closeTag' => '</ul>'
    ]
  ],
  2 => [
    'item' => [
      'openTag' => '<li ###ID### class="level3">',
      'closeTag' => '</li>'
    ],
    'link' => [
      'openTag' => '<a ###HREF### class="link">',
      'closeTag' => '</a>'
    ],
    'children' => [
      'openTag' => '<ul ###ID### class="ul_sub3">',
      'closeTag' => '</ul>'
    ]
  ]
];
