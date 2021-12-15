
<?php

$sql='select pitanje from anketa where prikaz="1"';
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result,MYSQLI_BOTH);
echo $row['pitanje'];
