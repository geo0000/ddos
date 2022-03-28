
<?php
$lang = (isset($_GET['lang']) && $_GET['lang'] == 'en' ? 'en' : 'ua');

$link_prefix = ($lang == 'en' ? '?lang=en' : '');

    ip::setIpAddr($ip);

    ip::setVisitors();

?>

<header>
  <div class="menu-btn" title="Cжать / расширить меню (z)">
    <i class="far fa-caret-square-left"></i>
    <i class="far fa-caret-square-right" style="display: none;"></i>
  </div>

  <div class="header">

    <div class="logo">
      <a href="/<?php echo $link_prefix;?>">
      <div class="main-logo text-center">
        Русский сайт <span>иди на х@й</span>
      </div>
      </a>
    </div>

    <ul class="lang-menu">
        <li class="<?php echo ($lang == 'ua' ? 'active' : ''); ?>">
            <a href="?lang=ua">UA</a>
        </li>
        <li class="<?php echo ($lang == 'en' ? 'active' : ''); ?>">
            <a href="?lang=en">EN</a>
        </li>
    </ul>

    <ul class="right-btn">
      <li>
        <div class="d-flex flex-column align-items-center" data-toggle="tooltip" data-title="Це кількість унікальних користувачів, які ведуть активну роботу, а от же ми - сила! Слава Україні!">
            <span class="visitors-text">
                <?php echo ($lang == 'en' ? 'Number of users': 'Кількість користувачів'); ?>:
            </span> <b><?php echo ip::getVisitors(); ?></b></div>
      </li>

      <!-- <li data-toggle="tooltip" data-placement="bottom" data-title="Потрібна допомога? Звертайся">
        <a href="https://t.me/ddosukraine_sp" target="_blank"  class="support-button">
          <i class="fas fa-headset"></i>
        </a>
      </li> -->
    </ul>

  </div>
</header>

<div class="body-pane">
  <div class="navbar-left">
    <?php
    if ($lang == 'en') {
      include("menu_en.php");
    }
    else {
      include("menu_ua.php");
    }
    ?>
    
    <ul class="menu position-absolute w-100 fixed-bottom">
    <li>
      <a href="https://t.me/itarmyofukraine2022" target="_blank">
          <i class="fab fa-telegram-plane text-warning"></i>
            <span class="text-warning"><b>Актуальні задачі ItArmy</b></span>
      </a>
    </li>
    </ul>
  </div>

  <div class="main-pane">