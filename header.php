<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PHP Sample Programs</title>
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php
$host='localhost';
$dbname='shop';
$user='kenji sugawara';
$pswd='suga3515';
$pdo=new
PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$pswd);
?>

<?php
function h($request){
  return htmlspecialchars($request ,ENT_QUOTES);
}
?>