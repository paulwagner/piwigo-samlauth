<?php
defined('SAMLAUTH_PATH') or die('Hacking attempt!');

/**
 * identification page
 */
function samlauth_begin_identification() {
  echo 'BEGIN_IDENT';
  // If we have a saml redirect, just override the POST login vars and continue to login.
  if(isset($_GET['saml_redirect'])) {
    $_POST['login'] = 1;
    $_POST['username'] = '';
    $_POST['password'] = '';    
    return;
  }
/*
  global $template, $conf, $hybridauth_conf;
  
  if ($hybridauth_conf['enabled'] == 0)
  {
    return;
  }

  $u_redirect = !empty($_GET['redirect']) ? urldecode($_GET['redirect']) : get_gallery_home_url();
  oauth_assign_template_vars($u_redirect);

  */
  //$template->set_prefilter('identification', 'samlauth_add_buttons_prefilter');
}

/**
 * identification menu block
 */
function samlauth_blockmanager($menu_ref_arr) {
  
  global $template, $samlauth;
  
  $menu = &$menu_ref_arr[0];
  if ($menu->get_block('mbIdentification') == null) {
    return;  
  }
  
  $connected = $samlauth->is_connected();
  $link = '';  
  if($connected) {
    $link = $samlauth->get_login_url();
  }
  
  samlauth_assign_template_vars($connected, $link);
  $template->set_prefilter('menubar', 'samlauth_add_menubar_link_prefilter');
}

/*
 * Prefilters
 */ 
  
function samlauth_add_buttons_prefilter($content) {
  $search = '</form>';
  $add = file_get_contents(SAMLAUTH_PATH . 'template/samlauth_identification_page.tpl');
  return str_replace($search, $search.$add, $content);
}

function samlauth_add_menubar_link_prefilter($content) {
  $search = '#({include file=\$block->template\|@?get_extent:\$id ?})#';
  $add = file_get_contents(SAMLAUTH_PATH . 'template/samlauth_menubar.tpl');
  return preg_replace($search, '$1 '.$add, $content);
}

/*
 * Helper
 */ 
 
function samlauth_assign_template_vars($connected, $link='') {
  global $template;
  $template->assign('auth', array(
    'connected' => $connected,
    'login_link' => $link,
    ));
}
