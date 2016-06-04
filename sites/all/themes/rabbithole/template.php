<?php

/**
 * Implements hook preprocess page.
 */
function rabbithole_preprocess_page(&$vars, $hook) {
  if (isset($vars['node']->type)) {
    // If the content type's machine name is "my_machine_name" the file
    // name will be "page--my-machine-name.tpl.php".
    $vars['theme_hook_suggestions'][] = 'page__' . $vars['node']->type;
  }

  drupal_add_js(drupal_get_path('theme', 'rabbithole') . '/js/plugins.js',
    array('type' => 'file', 'scope' => 'footer')
      );
  drupal_add_js(drupal_get_path('theme', 'rabbithole') . '/js/rabbithole.js',
    array('type' => 'file', 'scope' => 'footer')
      );
  drupal_add_js(drupal_get_path('theme', 'rabbithole') . '/js/libs/jquery-ui.min.js',
    array('type' => 'file', 'scope' => 'footer')
      );
  drupal_add_js(drupal_get_path('theme', 'rabbithole') . '/Player/build/mediaelement-and-player.min.js',
    array('type' => 'file', 'scope' => 'footer')
      );
  drupal_add_js(drupal_get_path('theme', 'rabbithole') . '/Player/build/mep-feature-playlist.js',
    array('type' => 'file', 'scope' => 'footer')
      );
  drupal_add_js(drupal_get_path('theme', 'rabbithole') . '/js/script.js',
    array('type' => 'file', 'scope' => 'footer')
      );
  $vars['scripts'] = drupal_get_js(); // necessary in D7?

  $vars['primary_nav'] = rabbithole_menu_spit('main');
  $vars['mobile_nav'] = rabbithole_menu_spit('mobile');
}

/**
 * Implements theme_menu_tree on main_nav_menu.
 *
 * @param $variables
 * @return string
 */
function rabbithole_menu_tree__menu_main_nav_menu($variables) {
  if (!strpos($variables['tree'], 'has-submenu')){
    return '<ul id="menu-main-navigation" class="sf-menu">' . $variables['tree'] . '</ul>';
  } elseif (strpos($variables['tree'], 'mobile-menu-progression')) {
    return '<ul class="mobile-menu-progression">' . $variables['tree'] . '</ul>';
  } else {
    return '<ul class="sub-menu">' . $variables['tree'] . '</ul>';
  }
}

/**
 * Renders html output for main_nav_menu.
 *
 * @return string
 */
function rabbithole_menu_spit($screen) {
  $output = '';
  $tree = menu_tree_all_data('menu-main-nav-menu');
  if ($screen == 'main') {
    $tree = rabbithole_menu_tree_output($tree);
  }
  else {
    $tree = rabbithole_mobile_menu_tree_output($tree);
  }
  $output .= drupal_render($tree);

  return $output;
}

/**
 * Implements menu_tree_output customised for screen
 *
 * @param $tree
 * @return array
 */
function rabbithole_menu_tree_output($tree) {
  $build = array();
  $items = array();

  // Pull out just the menu links we are going to render so that we
  // get an accurate count for the first/last classes.
  foreach ($tree as $data) {
    if ($data['link']['access'] && !$data['link']['hidden']) {
      $items[] = $data;
    }
  }

  $router_item = menu_get_item();
  $num_items = count($items);
  foreach ($items as $i => $data) {
    $class = array();
    if ($i == 0) {
      $class[] = 'first';
    }
    if ($i == $num_items - 1) {
      $class[] = 'last';
    }
    // Set a class for the <li>-tag. Since $data['below'] may contain local
    // tasks, only set 'expanded' class if the link also has children within
    // the current menu.
    if ($data['link']['has_children'] && $data['below']) {
      $class[] = 'menu-item';
      $data['link']['localized_options']['attributes']['class'][] = 'sf-with-ul';
    }
    elseif ($data['link']['has_children']) {
      $class[] = 'menu-item';
      $data['link']['localized_options']['attributes']['class'][] = 'sf-with-ul';
    }
    else {
      $class[] = 'menu-item';
    }

    if ($data['link']['title'] == 'Give') {
      $class[] = 'sf-menu-button-progression';
    }

    if (($data['link']['href'] == '<front>' && drupal_is_front_page()) || ($data['link']['href'] == $_GET['q'])) {
      $class[] = 'current-menu-item';
    }

    // Allow menu-specific theme overrides.
    $element['#theme'] = 'menu_link__' . strtr($data['link']['menu_name'], '-', '_');
    $element['#attributes']['class'] = $class;
    $element['#title'] = $data['link']['title'];
    $element['#href'] = $data['link']['href'];
    $element['#localized_options'] = !empty($data['link']['localized_options']) ? $data['link']['localized_options'] : array();
    $element['#below'] = $data['below'] ? rabbithole_menu_tree_output($data['below']) : $data['below'];
    $element['#original_link'] = $data['link'];
    // Index using the link's unique mlid.
    $build[$data['link']['mlid']] = $element;
  }

  if ($build) {
    // Make sure drupal_render() does not re-order the links.
    $build['#sorted'] = TRUE;
    // Add the theme wrapper for outer markup.
    // Allow menu-specific theme overrides.
    $build['#theme_wrappers'][] = 'menu_tree__' . strtr($data['link']['menu_name'], '-', '_');
  }

  return $build;
}

/**
 * Implements menu_tree_output customised for mobile
 *
 * @param $tree
 * @return array
 */
function rabbithole_mobile_menu_tree_output($tree) {
  $build = array();
  $items = array();

  // Pull out just the menu links we are going to render so that we
  // get an accurate count for the first/last classes.
  foreach ($tree as $data) {
    if ($data['link']['access'] && !$data['link']['hidden']) {
      $items[] = $data;
    }
  }

  $router_item = menu_get_item();
  $num_items = count($items);
  foreach ($items as $i => $data) {
    $class = array();
    if ($i == 0) {
      $class[] = 'first';
    }
    if ($i == $num_items - 1) {
      $class[] = 'last';
    }
    // Set a class for the <li>-tag. Since $data['below'] may contain local
    // tasks, only set 'expanded' class if the link also has children within
    // the current menu.
    if ($data['link']['has_children'] && $data['below']) {
      $class[] = 'mobile-menu-progression';
      $data['link']['localized_options']['attributes']['class'][] = 'has-submenu';
    }
    elseif ($data['link']['has_children']) {
      $class[] = 'mobile-menu-progression';
      $data['link']['localized_options']['attributes']['class'][] = 'has-submenu';
    }
    else {
      $class[] = 'mobile-menu-progression';
    }

    // Allow menu-specific theme overrides.
    $element['#theme'] = 'menu_link__' . strtr($data['link']['menu_name'], '-', '_');
    $element['#attributes']['class'] = $class;
    $element['#title'] = $data['link']['title'];
    $element['#href'] = $data['link']['href'];
    $element['#localized_options'] = !empty($data['link']['localized_options']) ? $data['link']['localized_options'] : array();
    $element['#below'] = $data['below'] ? rabbithole_menu_tree_output($data['below']) : $data['below'];
    $element['#original_link'] = $data['link'];
    // Index using the link's unique mlid.
    $build[$data['link']['mlid']] = $element;
  }
  if ($build) {
    // Make sure drupal_render() does not re-order the links.
    $build['#sorted'] = TRUE;
    // Add the theme wrapper for outer markup.
    // Allow menu-specific theme overrides.
    $build['#theme_wrappers'][] = 'menu_tree__' . strtr($data['link']['menu_name'], '-', '_');
  }

  return $build;
}

/**
 * Implements hook_preprocess_comment().
 */
function rabbithole_preprocess_comment(&$vars) {
  // Change the Permalink to display #1 instead of 'Permalink'
  $comment = $vars['comment'];
  $uri = entity_uri('comment', $comment);
  $uri['options'] += array('attributes' => array(
    'class' => 'permalink',
    'rel' => 'bookmark',
  ));
  $vars['permalink'] = l('#' . $vars['id'], $uri['path'], $uri['options']);
}