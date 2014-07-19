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
$lang['SAMLAuth Plugin Configuration'] = 'SAMLAuth Pluginkonfiguration';
$lang['Status of SimpleSAML connection'] = 'Status der SimpleSAML Verbindung';
$lang['Or use single sign login'] = 'Oder verwende Single-Sign-Login';
$lang['Single-Sign-Login'] = 'Single-Sign-Login';
$lang['Please check SAMLAuth configuration.'] = 'Bitte &uuml;berpr&uuml;fe die SAMLAuth Konfiguration.';
$lang['Not connected. Please check settings.'] = 'Nicht verbunden. Bitte Einstellungen &uuml;berpr&uuml;fen.';
$lang['Connected successfully.'] = 'Verbindung erfolgreich.';
$lang['SAML connection settings'] = 'SAML Verbindungseinstellungen';
$lang['SimpleSAML base url'] = 'Pfad zum SimpleSAML Ordner';
$lang['The path to the SimpleSAML SP directory. Can be absolute or relative. Default: /var/simplesaml/'] = 'Der Pfad zum SimpleSAML SP Ordner. Kann absolut oder relativ sein. Standard: /var/simplesaml/';
$lang['Add a trailing path seperator!'] = 'Pfad muss mit einem Trennzeichen enden!';
$lang['SimpleSAML service point id'] = 'SimpleSAML Service Point Id';
$lang['Id of used service point. Default: default-sp'] = 'Id des zu verwendenden Service Point. Standard: default-sp';
$lang['Metadata settings'] = 'Metadateneinstellungen';
$lang['Attriute to be used as username'] = 'Attribut zur Verwendung als Benutzername';
$lang['Attribute key of username (uid) in IDP metadata. Default: uid'] = 'Schl&uuml;ssel des Attributs in den IPD Metadaten, das als Benutzername verwendet werden soll. Standard: uid';
$lang['Attriute to be used as mail address'] = 'Attribut zur Verwendung als Mailadresse';
$lang['Attribute key of mail address in IDP metadata. Default: mail'] = 'Schl&uuml;ssel des Attributs in den IPD Metadaten, das als Mailadresse verwendet werden soll. Standard: mail';
$lang['Attriute to be used as first name'] = 'Attribut zur Verwendung als Vorname';
$lang['Attribute key of first name in IDP metadata. Default: firstname'] = 'Schl&uuml;ssel des Attributs in den IPD Metadaten, das als Vorname verwendet werden soll. Standard: firstname';
$lang['Attriute to be used as last name'] = 'Attribut zur Verwendung als Nachname';
$lang['Attribute key of last name in IDP metadata. Default: lastname'] = 'Schl&uuml;ssel des Attributs in den IPD Metadaten, das als Nachname verwendet werden soll. Standard: lastname';
$lang['Username and mail address is mandatory. First and last name can be left empty if not available in your IPD configuration.'] = 'Benutzername ist verpflichtend. Mailadresse, Vor- und Nachname können auch leer gelassen werden, wenn der verwendete IPD dies nicht unterst&uuml;tzt.';
$lang['SAMLAuth configuration'] = 'SAMLAuth Konfiguration';
$lang['Automatically create new piwigo users'] = 'Erstelle neue Piwigo Benutzer automatisch';
$lang['Automatically create piwigo user with random password if authenticated username is not existing. Default: enabled'] = 'Erstelle automatisch einen neuen Piwigo Benutzer mit zuf&auml;lligem Passwort, wenn ein authenifizierter Benutzername noch nicht existiert. Standard: aktiviert';
$lang['Send password for new piwigo users by mail'] = 'Sende Passwort neu erstellter Piwigo Benutzer per Mail';
$lang['Send randomly generated password to automatically generated user by mail. Password is sent in plain text, thus discouraged! Default: disabled'] = 'Versende das zuf&auml;llige Passwort von automatisch erstellten Benutzern per Mail. Das Passwort wird im Klartext versendet, daher ist diese Option im Allgemeinen nicht zu empfehlen! Standard: deaktiviert';
$lang['Instead you can safely change the generated password to something else in the Piwigo admin panel, if local authentication to Piwigo is still needed.'] = 'Du kannst allerdings das generierte Passwort problemlos &uuml;ber die Profileinstellungen wieder &auml;ndern, wenn die lokale Authentifizierung an Piwigo ben&ouml;tigt wird.';
$lang['Enable verbose debug mode'] = 'Aktiviere Debug Modus';
$lang['Log debug messages. Logfile is stored at logs/logfile.txt. Default: disabled'] = 'Schreibe Debugnachichten nach logs/logfile.txt. Standard: deaktiviert';
?>