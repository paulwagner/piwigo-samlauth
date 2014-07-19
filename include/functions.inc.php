<?php
defined('SAMLAUTH_PATH') or die('Hacking attempt!');

function random_password( $length = 8 ) {
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
  $password = substr( str_shuffle( $chars ), 0, $length );
  return $password;
}

function log_message($message) {
  $logfile=fopen(SAMLAUTH_PATH . "logs/logfile.txt","a");
  fputs($logfile,
      date("d.m.Y, H:i:s",time()) .
      ", " . $_SERVER['REMOTE_ADDR'] .
      //", " . $_SERVER['REQUEST_METHOD'] .
      ", " . $_SERVER['PHP_SELF'] .
      //", " . $_SERVER['HTTP_USER_AGENT'] .
      //", " . $_SERVER['HTTP_REFERER'] .
      ", " . $message ."\n"
      );
  fclose($logfile);
}

?>