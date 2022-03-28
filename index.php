<?php include("includes/head.php") ?>

    <title>Сервіс-перетворювач ip-адрес для DDOS атак</title>
  </head>
<body>


<?php include("includes/header.php"); ?>

<div class="alert alert-danger" role="alert">
  <b>Увага!</b> Не використовуйте адреси для атак з неперевірених пабліків. Вас можуть використовувати "в сліпу" надаючі адреси Українських сервісів. 
  Якщо Ви не впевнені в джерелі інформації, то використовуйте офіційний паблік <a href="https://t.me/itarmyofukraine2022" target="_blank" class="alert-link">IT Army of Ukraine</a> для свої атак → 
  <a href="https://t.me/itarmyofukraine2022" target="_blank" class="alert-link">Паблік It Army</a>
</div>

  <div class="image mt-3 mb-3">
    <div style="margin: 30px auto; text-align: center">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-screwdriver-wrench"></i> відеоінструкція роботи</button>
    </div>



  <h2 class="text-center">Робоча зона</h2>

  <div class="container mb-5">
      <a href="#ip_result" id="addTarget" class="btn btn-sm btn-danger mb-3">Автоматично додати актуальні цілі з ItArmy</a>

      <div class="mt-3">
        <textarea rows="7" style="height: 150px" class="form-control" id="ip_enter" placeholder="Вставте текст з задачею"></textarea>
        </div>
        
        <!--<div class="alert alert-warning d-flex align-items-center mt-3" role="alert">
          <i class="fa-solid fa-triangle-exclamation"></i><span>Рекомендую використовувати одночасно для атаки не більше 15 адрес, бо може тупо не запуститись</span>
        </div>-->
        <div class="position-relative mt-3 mb-5">
          <hr>
          <h5>Функції з форматування адрес:</h5>
          <button id="addTcp" class="btn btn-sm btn-primary mb-3" data-toggle="tooltip" title="Функція перебирає всі адреси з протоколами і залишає лише адреси з протоколом TCP і форматує все таким чином: tcp://{IP}:{PORT}">Додати тільки TCP</button>
          <button id="addProtocol" class="btn btn-sm btn-primary mb-3" data-toggle="tooltip" title="Функція самостійно підвставить потрібний протокол з задачі, наприклад: після натискання кнопки всі айпі адреси отримають формат: {PROTOCOL}://{IP}:{PORT}">Додати Протоколи</button>
          <button id="newLine" class="btn btn-sm btn-primary mb-3" data-toggle="tooltip" data-title="Важливо! Використовуй цюй функцію останньої, бо після неї не працють інші функції форматування">Адреси з нової строки</button>
          <button id="bombardir" class="btn btn-sm btn-primary mb-3" data-toggle="tooltip" data-title="Функція перебере всі адреси та відформатує їх за вказаним в назві конпки форматом">формат: 111.222.33.44:888/tcp</button>
          <button id="addPort" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#addPorts">Додати портів для кожної адреси</button>
            <hr>
            <h6>Фунції для готової команди (спочатку скористайтесь функціями форматування команд):</h6>
            <button id="addMhddos_proxy" class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#mhddos_proxy">Готова команда для mhddos_proxy через Docker</button>
            <button id="addMhddos_proxy_python" class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#mhddos_proxy_python"><span data-toggle="tooltip" data-title="Для Windows">Готова команда для mhddos_proxy через python</span></button>
            
            <hr>
            <div class="position-relative">
              <div class="bd-clipboard"><button type="button" class="btn-clipboard">Копіювати</button></div>
              <textarea rows="7" readonly class="form-control" id="ip_result"></textarea>
            </div>
        </div>
    </div>


    
    <!-- Modal add command mhddos_proxy Docker -->
    <div class="modal fade" id="mhddos_proxy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Додавання команди для Docker</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3>Як це працює?</h3>
            <p>Ця фунуція формую вже готову команду для запуску атаки mhddos_proxy, ви можете обрати або змінити основні параметри для запуску низже</p>
            <div class="alert alert-warning d-flex align-items-center mt-3" role="alert">
              <span>Важливо! Спочатку скорестайтесь фунціями з форматування адрес, наприклад "Додати тільки TCP", щоб всі адреси з завдання отримали потрібний формат</span>
            </div>
            <form id="mhddos_proxyForm" method="post" style="max-width: 600px; text-align: center">
            <label for="streams">Змініть кількість потоків, або залиште 2000</label>
              <input type="text" class="form-control" name="ports" id="streams" placeholder="Ведіть ціле число" value="2000">

              <div class="form-group form-check mt-3">
                <input type="checkbox" class="form-check-input" id="addDebug">
                <label class="form-check-label" for="addDebug">Якщо хочете спостерігати за ходом атаки, поставте галочку</label>
              </div>

              <button type="submit" class="btn btn-primary mt-5 mb-5" id="addMhddos_proxyBtn">Створити команду</button>
            </form>
          </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal add command mhddos_proxy Python -->
    <div class="modal fade" id="mhddos_proxy_python" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Додавання команди через Python</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3>Як це працює?</h3>
            <p>Ця фунуція формую вже готову команду для запуску атаки mhddos_proxy, ви можете обрати або змінити основні параметри для запуску низже</p>
            <div class="alert alert-warning d-flex align-items-center mt-3" role="alert">
              <span>Важливо! Спочатку скорестайтесь фунціями з форматування адрес, наприклад "Додати тільки TCP", щоб всі адреси з завдання отримали потрібний формат</span>
            </div>
            <form id="mhddos_proxyForm_python" method="post" style="max-width: 600px; text-align: center">
            <label for="streams">Змініть кількість потоків, або залиште 2000</label>
              <input type="text" class="form-control" id="streams_python" placeholder="Ведіть ціле число" value="2000">

              <div class="form-group form-check mt-3">
                <input type="checkbox" class="form-check-input" id="addDebug_python">
                <label class="form-check-label" for="addDebug_python">Якщо хочете спостерігати за ходом атаки, поставте галочку</label>
              </div>

              <button type="submit" class="btn btn-primary mt-5 mb-5" id="addMhddos_proxyBtn_python">Створити команду</button>
            </form>
          </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal Add Ports -->
    <div class="modal fade" id="addPorts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Додаваня портів</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3>Як це працює?</h3>
            <p>Ця функція додає вказані в поле низче порти до кожної айпі адреси, наприклад: якщо ви вкажете в полі: 80 443, то функція продублює кожну айпі адресу та додасть до них ці порти і на виході ви отримаєте потрібний результат</p>
            <div class="alert alert-warning d-flex align-items-center mt-3" role="alert">
              <i class="fa-solid fa-triangle-exclamation"></i><span>Важливо! Вказуйте порти через один пробіл</span>
            </div>
            <form id="portsForm" method="post" style="max-width: 600px; text-align: center">
            <label for="ports">Введіть порти через пробіл</label>
              <input type="text" class="form-control" name="ports" id="ports" placeholder="Введіть наприклад: 80 443">
              <button type="submit" class="btn btn-primary mt-5 mb-5" id="addPortsBtn">Додати порти</button>
            </form>
          </div>
          </div>
        </div>
      </div>
    </div>


    

    <!-- Modal Інструкція -->
    <div class="modal fade p-0" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog w-100 mw-100 m-0 h-100">
        <div class="modal-content min-vh-100">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Інструкція</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
            <h3>Як це працює?</h3>
              <p>Перегляньте коротку відеоінструкцію низче</p>
    
            <div style="max-width: 100%; width: 650px; margin: 0 auto">
              <video controls="controls" poster="/image/screen_ddos.jpg">
                <source src="/video/DDOS.mp4">
              </video>
            </div>

          </div>
          </div>
        </div>
      </div>
    </div>



<?php include("includes/footer.php"); ?>


<?php

  // $file = file_get_contents("check/address.php");
  $file = file_get_contents("check/targets.php");


    echo '<div style="display: none" class="actualTarget">' . $file . '</div>';
?>;

  <script>
  const actualTarget = document.querySelector('.actualTarget');
  const addTarget = document.getElementById('addTarget');

  addTarget.addEventListener('click', () => {
    alert('Цілі додано в поле результату! Тепер можете скористатись для форматування готової команди!');
    ipResult.value = actualTarget.textContent.trim();
  })

</script>