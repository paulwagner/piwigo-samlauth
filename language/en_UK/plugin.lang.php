<?php
// +-----------------------------------------------------------------------+
// | Piwigo - a PHP based photo gallery                                    |
// +-----------------------------------------------------------------------+
// | Copyright(C) 2008-2014 Piwigo Team                  http://piwigo.org |
// | Copyright(C) 2003-2008 PhpWebGallery Team    http://phpwebgallery.net |
// | Copyright(C) 2002-2003 Pierrick LE GALL   http://le-gall.net/pierrick |
// +-----------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify  |
// | it under the terms of the GNU General Public License as published by  |
// | the Free Software Foundation                                          |
// |                                                                       |
// | This program is distributed in the hope that it will be useful, but   |
// | WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU      |
// | General Public License for more details.                              |
// |                                                                       |
// | You should have received a copy of the GNU General Public License     |
// | along with this program; if not, write to the Free Software           |
// | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, |
// | USA.                                                                  |
// +-----------------------------------------------------------------------+
$lang['SAMLAuth Plugin Configuration'] = 'SAMLAuth Plugin Configuration';
$lang['Status of SimpleSAML connection'] = 'Status of SimpleSAML connection';
$lang['Or use single sign login'] = 'Or use single sign login';
$lang['Single-Sign-Login'] = 'Single-Sign-Login';
$lang['Please check SAMLAuth configuration.'] = 'Please check SAMLAuth configuration.';
$lang['Not connected. Please check settings.'] = 'Not connected. Please check settings.';
$lang['Connected successfully.'] = 'Connected successfully.';
$lang['SAML connection settings'] = 'SAML connection settings';
$lang['SimpleSAML base url'] = 'SimpleSAML base url';
$lang['The path to the SimpleSAML SP directory. Can be absolute or relative. Default: /var/simplesaml/'] = 'The path to the SimpleSAML SP directory. Can be absolute or relative. Default: /var/simplesaml/';
$lang['Add a trailing path seperator!'] = 'Add a trailing path seperator!';
$lang['SimpleSAML service point id'] = 'SimpleSAML service point id';
$lang['Id of used service point. Default: default-sp'] = 'Id of used service point. Default: default-sp';
$lang['Metadata settings'] = 'Metadata settings';
$lang['Attriute to be used as username'] = 'Attriute to be used as username';
$lang['Attribute key of username (uid) in IDP metadata. Default: uid'] = 'Attribute key of username (uid) in IDP metadata. Default: uid';
$lang['Attriute to be used as mail address'] = 'Attriute to be used as mail address';
$lang['Attribute key of mail address in IDP metadata. Default: mail'] = 'Attribute key of mail address in IDP metadata. Default: mail';
$lang['Attriute to be used as first name'] = 'Attriute to be used as first name';
$lang['Attribute key of first name in IDP metadata. Default: firstname'] = 'Attribute key of first name in IDP metadata. Default: firstname';
$lang['Attriute to be used as last name'] = 'Attriute to be used as last name';
$lang['Attribute key of last name in IDP metadata. Default: lastname'] = 'Attribute key of last name in IDP metadata. Default: lastname';
$lang['Username and mail address is mandatory. First and last name can be left empty if not available in your IPD configuration.'] = 'Username is mandatory. Mail address, first and last name can be left empty if not available in your IPD configuration.';
$lang['SAMLAuth configuration'] = 'SAMLAuth configuration';
$lang['Automatically create new piwigo users'] = 'Automatically create new piwigo users';
$lang['Automatically create piwigo user with random password if authenticated username is not existing. Default: enabled'] = 'Automatically create piwigo user with random password if authenticated username is not existing. Default: enabled';
$lang['Send password for new piwigo users by mail'] = 'Send password for new piwigo users by mail';
$lang['Send randomly generated password to automatically generated user by mail. Password is sent in plain text, thus discouraged! Default: disabled'] = 'Send randomly generated password to automatically generated user by mail. Password is sent in plain text, thus discouraged! Default: disabled';
$lang['Instead you can safely change the generated password to something else in the Piwigo admin panel, if local authentication to Piwigo is still needed.'] = 'Instead you can safely change the generated password to something else in the Piwigo admin panel, if local authentication to Piwigo is still needed.';
$lang['Enable verbose debug mode'] = 'Enable verbose debug mode';
$lang['Log debug messages. Logfile is stored at logs/logfile.txt. Default: disabled'] = 'Log debug messages. Logfile is stored at logs/logfile.txt. Default: disabled';
$lang['Save'] = 'Save';
?>