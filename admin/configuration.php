<?php
if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

global $template, $samlauth;
$template->set_filenames( array('plugin_admin_content' => dirname(__FILE__).'/configuration.tpl') );
$template->assign(
  array(
    'PLUGIN_ACTION' => get_root_url().'admin.php?page=plugin-' . SAMLAUTH_ID . '-configuration',
    )
);

if (isset($_POST['save'])) {
	$samlauth->config['base_path'] 	 = $_POST['BASE_PATH'];
	$samlauth->config['sp_id']    = $_POST['SP_ID'];
	$samlauth->config['s_uid']      = $_POST['S_UID'];
	$samlauth->config['s_first']   = $_POST['S_FIRST'];
	$samlauth->config['s_last'] = $_POST['S_LAST'];
	$samlauth->config['s_mail'] = $_POST['S_MAIL'];

  if (isset($_POST['CREATE_USER'])){
		$samlauth->config['create_user'] = True;
  } else {
		$samlauth->config['create_user'] = False;
	}
  if (isset($_POST['SEND_MAIL'])){
		$samlauth->config['send_mail'] = True;
  } else {
		$samlauth->config['send_mail'] = False;
	}
  if (isset($_POST['ENABLE_DEBUG'])){
		$samlauth->config['enable_debug'] = True;
  } else {
		$samlauth->config['enable_debug'] = False;
	}  
  $samlauth->save_config();
  $samlauth->auth_connect(); 
}

$template->assign('AUTH_CONNECTED', 	$samlauth->is_connected());
$template->assign('BASE_PATH', 	$samlauth->config['base_path']);
$template->assign('SP_ID', 	$samlauth->config['sp_id']);
$template->assign('S_UID', 	$samlauth->config['s_uid']);
$template->assign('S_FIRST', 	$samlauth->config['s_first']);
$template->assign('S_LAST', 	$samlauth->config['s_last']);
$template->assign('S_MAIL', 	$samlauth->config['s_mail']);
$template->assign('CREATE_USER', 	$samlauth->config['create_user']);
$template->assign('SEND_MAIL', 	$samlauth->config['send_mail']);
$template->assign('ENABLE_DEBUG', 	$samlauth->config['enable_debug']);

$template->assign_var_from_handle( 'ADMIN_CONTENT', 'plugin_admin_content');
?>