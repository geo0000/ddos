<?php $lang = (isset($_GET['lang']) && $_GET['lang'] == 'en' ? 'en' : 'ua'); ?>

<?php include("../includes/head.php") ?>

    <title>Інструкції з налаштування DDOS атак по країні-агресору</title>
  </head>
<body>


<?php include("../includes/header.php"); ?>

<?php
 if ($lang == 'en') {
 include("page_en.php");
 }
 else {
  include("page_ua.php");
 }
?>

<?php include("../includes/footer.php"); ?>