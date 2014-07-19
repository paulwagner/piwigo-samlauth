<?php
/*
Plugin Name: samlAuth
Version: 1.1
Description: Allow piwigo users to authenticate through SAML as well as the local authentication
Plugin URI: 
Author: cyph0r
Author URI: http://cyph0r.com
*/
if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

// +-----------------------------------------------------------------------+
// | Define plugin constants                                               |
// +-----------------------------------------------------------------------+
define('SAMLAUTH_ID',      basename(dirname(__FILE__)));
define('SAMLAUTH_PATH' ,   PHPWG_PLUGINS_PATH . SAMLAUTH_ID . '/');
define('SAMLAUTH_PATH_PUBLIC',  get_absolute_root_url() . ltrim(SAMLAUTH_PATH,'./'));
define('SAMLAUTH_ADMIN',   get_root_url() . 'admin.php?page=plugin-' . SAMLAUTH_ID);
define('SAMLAUTH_VERSION', '1.1');

include_once(SAMLAUTH_PATH.'/class.samlauth.php');

global $samlauth;
$samlauth = new SAMLAuth();
set_plugin_data($plugin['id'], $samlauth);

include_once(SAMLAUTH_PATH . 'include/functions.inc.php');
include_once(SAMLAUTH_PATH . 'include/public_events.inc.php');

// +-----------------------------------------------------------------------+
// | Event handlers                                                        |
// +-----------------------------------------------------------------------+

add_event_handler('init', 'samlauth_init');

add_event_handler('try_log_user','login', EVENT_HANDLER_PRIORITY_NEUTRAL + 1, 4);
add_event_handler('get_admin_plugin_menu_links', array(&$samlauth, 'admin_menu'));

add_event_handler('loc_begin_identification', 'samlauth_begin_identification');
add_event_handler('blockmanager_apply', 'samlauth_blockmanager');

// +-----------------------------------------------------------------------+
// | functions                                                             |
// +-----------------------------------------------------------------------+

function samlauth_init(){
	load_language('plugin.lang', SAMLAUTH_PATH);
}

function login($success, $username, $password, $remember_me){
  global $samlauth;
  $authenticated = $samlauth->is_authenticated();
  if($username != '' || !$authenticated)
    return pwg_login(false, $username, $password, $remember_me); // No SAML authentication, so go back to normal Piwigo behavior.

  // SAML authentication is done, so get metadata
  $key_uid = $samlauth->config['s_uid'];
  if($key_uid == '') {
    if($samlauth->config['enable_debug'])
      log_message('Tried to authenticate with SAML, but the username key is not set in the SAMLAuth configuration!');
    return false;
  }    
  $auth_data = $samlauth->get_attributes();
  if(empty($auth_data) || !isset($auth_data[$key_uid])  || $auth_data[$key_uid] == '') {
    if($samlauth->config['enable_debug'])
      log_message('Tried to authenticate with SAML, but the returned username entry was empty!');  
    return false;
  }
  $username = $auth_data[$key_uid][0]; 
  
  global $conf;
  // Search and login user.
  $query = 'SELECT '.$conf['user_fields']['id'].' AS id FROM '.USERS_TABLE.' WHERE '.$conf['user_fields']['username'].' = \''.pwg_db_real_escape_string($username).'\' ;';
  
  $row = pwg_db_fetch_assoc(pwg_query($query));

  // If query is not empty the authenticated user already exists, and we can log him in. 
  if (!empty($row['id'])) {
    log_user($row['id'], $remember_me);
    trigger_action('login_success', stripslashes($username));
    return true;
  }

  // Otherwise we might add the user
  if ($samlauth->config['create_user']) {
    // Try to get mail of user
    $key_mail = $samlauth->config['s_mail'];
    $mail = '';    
    if($key_mail != '')
      if(isset($auth_data[$key_mail]))
        $mail = $auth_data[$key_mail][0];
      else
        if($samlauth->config['enable_debug'])
          log_message('Tried to retrieve mail address from metadata, but it is not set for user ' . $username);
    
    // Register and login the user
    $new_id = register_user($username,random_password(8),$mail);
    log_user($new_id, False);
    trigger_action('login_success', stripslashes($username));
    redirect('profile.php');
    return true;
  } else {
    // Otherwise the login attempt is failed
    if($samlauth->config['enable_debug'])
      log_message('User ' . $username . ' was authenticated but does not exist in the Piwigo database.');
    trigger_action('login_failure', stripslashes($username));
    return false;  
  }
}

?>