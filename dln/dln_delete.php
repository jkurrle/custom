<?php

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

$table = $_POST['deltable'];
//recordfield is the table field that identifies a unique field
$recordfield = $_POST['delrecordfield'];
//record is the actual record
$record=$_POST['delrecord'];
$pw = $_POST['delpw'];

if($pw == md5(date('Ddw')) && isset($_POST['deltable']) && isset($_POST['delrecordfield']) && isset($_POST['delrecord']))
  {
  $result=db_delete($table)
    ->condition($recordfield,$record)
    ->execute();
  }
