<?php include("../includes/head.php") ?>

    <title>Потужні інструменти</title>
  </head>
<body>

<?php include("../includes/header.php"); ?>

<?php $lang = (isset($_GET['lang']) && $_GET['lang'] == 'en' ? 'en' : 'ua'); ?>

<?php
if ($lang == 'en') {
  include("page_en.php");
}
else {
  include("page_ua.php");
}
?>

<?php include("../includes/footer.php"); ?>