
<?php 

include_once($_SERVER['DOCUMENT_ROOT']."bd/connection.php");

    $ip = $_SERVER['REMOTE_ADDR'];

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
      <a href="/">
      <div class="main-logo text-center">
        Русский сайт <span>иди на х@й</span>
      </div>
      </a>
    </div>

    <ul class="right-btn">
      <li>
        <div class="d-flex flex-column align-items-center" data-toggle="tooltip" data-title="Це кількість унікальних користувачів, які ведуть активну роботу, а от же ми - сила! Слава Україні!"><span class="visitors-text">Кількість користувачів:</span> <b><?php echo ip::getVisitors(); ?></b></div>
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

    <ul class="menu">

      <li class="active">
        <a href="/">
          <i class="fas fa-puzzle-piece"></i>
          <span>Сервіс для команд</span>
        </a>
      </li>

      <li class="">
        <a href="/instruction/">
          <i class="fas fa-tools"></i>
          <span>Інструкції старту DDOS</span>
        </a>
      </li>

      <li class="">
        <a href="/vps/">
          <i class="fas fa-server"></i>
          <span>Інструкції з розгортання VPS</span>
        </a>
      </li>

      <li class="">
        <a href="/check/">
          <i class="fas fa-bullseye"></i>
          <span>Статуси цілей</span>
        </a>
      </li>

    </ul>
    
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