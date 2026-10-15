<?php
$READ = 1;
$WRITE = 2;
$DELETE = 4;

$permission = $READ | $WRITE;
$canRead = ($permission & $READ) !== 0;
$canWrite = ($permission & $WRITE) !== 0;
$canDelete = ($permission & $DELETE) !== 0;

echo "permission = $permission<br>";
echo "canRead: "; var_dump($canRead);
echo "<br>canWrite: "; var_dump($canWrite);
echo "<br>canDelete: "; var_dump($canDelete);