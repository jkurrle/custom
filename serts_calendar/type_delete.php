<?php
$bounceBack = $_SERVER['HTTP_REFERER'];

$drupalRoot = $_SERVER['DOCUMENT_ROOT'];
if(is_dir($drupalRoot."/drupal")) $drupalRoot .= "/drupal";
$drupalRootArray=explode("/",$drupalRoot);
array_shift($drupalRootArray);
array_unshift($drupalRootArray,"");
$drupalRoot = implode("/",$drupalRootArray);

$myDir = $_SERVER['SCRIPT_FILENAME'];
$myDirArray=explode("/",$myDir);
array_pop($myDirArray);
$myDir = implode("/",$myDirArray);

//echo "attempting to change to $drupalRoot";
chdir($drupalRoot);
define('DRUPAL_ROOT', getcwd());
require_once './includes/bootstrap.inc';
require_once './includes/common.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_DATABASE);

$record=$_POST['eventType'];

$result=db_delete("event_type")
  ->condition('event_type',$record)
  ->execute();

header("location: $bounceBack");
?>