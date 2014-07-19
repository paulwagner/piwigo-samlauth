<?php
defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');

/**
* This class is used to expose maintenance methods to the plugins manager
* It must extends PluginMaintain and be named "PLUGINID_maintain"
* where PLUGINID is the directory name of your plugin
*/
class samlAuth_maintain extends PluginMaintain {

  private $installed = false;
  
  /**
   * plugin installation
   *
   * perform here all needed step for the plugin installation
   * such as create default config, add database tables,
   * add fields to existing tables, create local folders...
   */
  function install($plugin_version, &$errors=array()) {
    $this->installed = true;
  }

  /**
   * plugin activation
   *
   * this function is triggered after installation, by manual activation
   * or after a plugin update
   * for this last case you must manage updates tasks of your plugin in this function
   */
  function activate($plugin_version, &$errors=array()) {  
    if (!$this->installed) {
      $this->install($plugin_version, $errors);
    }
  }
  
  function deactivate() {
  }

  function uninstall() {
  }

}