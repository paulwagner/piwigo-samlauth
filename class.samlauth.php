<?php

include_once(SAMLAUTH_PATH . 'include/functions.inc.php');

class SAMLAuth {
  public $auth;
  public $config;

  function __construct() {
    // Load config
    $conf_file = @file_get_contents(SAMLAUTH_PATH.'data.dat');
    if($conf_file != false) {
      $this->config = unserialize($conf_file);
    } else {
      $this->load_default_config();
      $this->save_config();
    }
    // Try to connect to SP
    $this->auth_connect(); 
  }

  public function admin_menu($menu) {
    array_push($menu,
    array(
      'NAME' => 'SAMLAuth',
      'URL' => get_admin_plugin_menu_link(SAMLAUTH_PATH.'/admin.php') )
    );
    return $menu;
  }
  
  public function save_config() {
    $file = fopen(SAMLAUTH_PATH.'/data.dat', 'w');
    fwrite($file, serialize($this->config) );
    fclose( $file );
  }
  
  public function is_connected() {
    return is_object($this->auth);
  }
  
  public function get_login_url() {
    if(!$this->is_connected()) {
      if($this->config['enable_debug'])
        log_message('Trying to get login url, but not connection has been established.');      
      return '';
    }
    $return_url = get_absolute_root_url() . 'identification.php?saml_redirect=1';
    if(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != '')
       $return_url .= '&' . $_SERVER['QUERY_STRING'];
    return $this->auth->getLoginURL($return_url);
  }

  public function auth_connect() {
    $this->auth = 0;
    if($this->config['enable_debug'])
      log_message('Trying to establish SAML connection...');

    $filepath = $this->config['base_path'] . 'lib/_autoload.php';
    if(is_file($filepath)) {    
      if($this->config['enable_debug'])
        log_message('Trying to connect to service provider in ' . $filepath . ' ...');

      require_once($filepath);
      $this->auth = new SimpleSAML_Auth_Simple($this->config['sp_id']);

      if($this->config['enable_debug']) {
        if(is_object($this->auth))      
          log_message('...SUCCESS!');
        else
          log_message('...FAILED!');
      }        
    } else {
      if($this->config['enable_debug'])
        log_message('Invalid path to service provider: ' . $filepath);
    }
  }
  
  private function load_default_config() {
    $this->config['base_path'] = '/var/simplesaml/';
    $this->config['sp_id'] = 'default-sp';
    $this->config['s_uid'] = 'uid';
    $this->config['s_first'] = 'firstname';
    $this->config['s_last'] = 'lastname';
    $this->config['s_mail'] = 'mail';
    $this->config['create_user'] = True;
    $this->config['send_mail'] = False;
    $this->config['enable_debug'] = False;
  }

}
?>