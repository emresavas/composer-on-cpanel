<?php
require __DIR__ . '/../vendor/autoload.php';

use Carbon\Carbon;

declare(strict_types=1);

// formatted server time
$time = Carbon::now()->toDayDateTimeString();
$phpVersion = phpversion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Composer on cPanel</title>
</head>
<body>
  <h1>Composer on cPanel</h1>
  <p>Current time: <strong><?= $time ?></strong></p>
  <p>PHP version: <strong><?= $phpVersion ?></strong></p>
</body>
</html>
