<?php
$lang = (isset($_GET['lang']) && $_GET['lang'] == 'en' ? 'en' : 'ua');

$link_prefix = ($lang == 'en' ? '?lang=en' : '');
?>

<ul class="menu">

  <li class="active">
    <a href="/<?php echo $link_prefix;?>">
      <i class="fas fa-puzzle-piece"></i>
      <span>Service for teams (UA)</span>
    </a>
  </li>

  <li class="">
    <a href="/instruction/<?php echo $link_prefix;?>">
      <i class="fas fa-tools"></i>
      <span>Start DDOS info</span>
    </a>
  </li>

  <li class="">
    <a href="/vps/<?php echo $link_prefix;?>">
      <i class="fas fa-server"></i>
      <span>VPS info (UA)</span>
    </a>
  </li>


  <li class="">
    <a href="/powerful/<?php echo $link_prefix;?>">
      <i class="fas fa-server"></i>
      <span>Powerful tools (UA)</span>
    </a>
  </li>

  <li class="">
    <a href="/check/<?php echo $link_prefix;?>">
      <i class="fas fa-bullseye"></i>
      <span>Target status</span>
    </a>
  </li>

</ul>