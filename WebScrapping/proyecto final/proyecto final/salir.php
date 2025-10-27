<!DOCTYPE html>
<html>
<head>
<title>GameScraping</title>
<!-- Basic -->
<meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

</head>
<body>
</body>
</html>
<?php
session_start();
session_unset();
session_destroy();
header("location: index.html");
exit();
?>