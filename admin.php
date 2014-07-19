<?php
defined('SAMLAUTH_PATH') or die('Hacking attempt!');
 
global $template, $page;

// get current tab
$page['tab'] = (isset($_GET['tab'])) ? $_GET['tab'] : $page['tab'] = 'configuration';

// tabsheet
include_once(PHPWG_ROOT_PATH.'admin/include/tabsheet.class.php');
$tabsheet = new tabsheet();
$tabsheet->set_id('samlauth');

$tabsheet->add('configuration', l10n('Configuration'), SAMLAUTH_ADMIN . '-configuration');
$tabsheet->select($page['tab']);
$tabsheet->assign();
  
// include page
include(SAMLAUTH_PATH . 'admin/' . $page['tab'] . '.php');
// assign template vars
$template->assign('SAMLAUTH_PATH', get_root_url() . SAMLAUTH_PATH);
  
?>