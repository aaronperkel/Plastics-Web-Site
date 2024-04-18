<!-- Connecting -->
<?php
$databaseName = 'APERKEL_labs';
$dsn = 'mysql:host=webdb.uvm.edu;dbname=' . $databaseName;
$username = 'aperkel_writer';
$password = 'A<_QNc.Hd[.W!IFS3[,t';

$pdo = new PDO($dsn, $username, $password);
if ($pdo) print '<!-- Connection complete -->';
?>