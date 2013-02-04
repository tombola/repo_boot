<?php

/* we are using long/short title fields for page nodes */

/**
 * Override or insert variables into the page template.
 */
function repo_boot_process_page(&$variables) {
  // display suite is handling page-node titles so that I can have short/long versions
  if (isset($variables['node']) && $variables['node']->type == 'page'){
    if (isset($variables['node']->field_longtitle['und'][0]['value'])) {
      $variables['title'] = $variables['node']->field_longtitle['und'][0]['value'];
    }
    if (isset($variables['node']->book) && $variables['node']->book['depth'] == 1) {
      $variables['title'] = NULL;
    } 
  }
  global $user;

  //drupal_set_message($_SESSION['institution']);
  //watchdog('repo_boot', $user->uid.':'. $_SESSION['institution']);
  $variables['catalog_link'] = l('Search Catalogue', 'http://voyager.falmouth.ac.uk/', _get_button_attributes());

}

function repo_boot_menu_link($variables) {
  if ($variables['element']['#original_link']['menu_name'] == 'menu-home-actions') {
    $element = $variables['element'];
    $output = l($element['#title'], $element['#href'], _get_button_attributes($variables['element']['#original_link']));
    return $output."\n";
    // return '<li' . drupal_attributes($element['#attributes']) . '>'.$output."</li>\n";
  }
}

// the call to action buttons on home page are just plain menu links
// they need bootstrap magic
function _get_button_attributes($menu_link = FALSE) {
  if (!$menu_link) {
    $attributes = array('attributes' => array(
      'class' => array('btn', 'btn-info', 'btn-large', 'catalog-link'),
    ));
    return $attributes;
  } else {
    // dpm($menu_link['mlid']);
    if (isset($menu_link['mlid'])) {
      switch($menu_link['mlid']) {
        case('854'): // Search catalog       
          $class = array('class' => array('btn', 'btn-info', 'btn-large'));
          break;
        case('856'): // Search catalog       
          $class = array('class' => array('btn', 'btn-info', 'btn-large'));
          break;
        default: 
          $class = array('class' => array('btn', 'btn-large', 'catalog-link'));
          break;
      }
      $attributes = array('attributes' => $class);
    }
  }
  return $attributes;
}
