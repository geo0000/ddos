<h2 class="title_h2">Інструкція по застозуванню кастомних рішень</h2>
<span>Справжні професіонали свого діла присилають нам свої рішення, які базуються на різних технологіях. Виберіть для себе потужний інструмент</span>

<ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="vbox-tab" data-toggle="tab" href="#vbox" role="tab" aria-controls="vbox" aria-selected="true">Hack-VM на VirtualBox</a>
  </li>
  <!--<li class="nav-item" role="presentation">
    <a class="nav-link" id="digitalOcean-tab" data-toggle="tab" href="#digitalOcean" role="tab" aria-controls="digitalOcean" aria-selected="false">VPS на Digital Ocean</a>
  </li>-->
</ul>

<div class="tab-content" id="myTabContent">

  <div class="tab-pane fade show active" id="vbox" role="tabpanel" aria-labelledby="vbox-tab">
    Віртуальна машина для запуску Death by 1000 needles.<br>
    Основні переваги моєї віртуальної машини, як оболонки для «Death by 1000 needles»:
    <ol>
      <li>
        Підключає 10 VPN з'єднань одночасно, і запускає окремий процес db1000n для кожного VPN з'єднання
      </li>
      <li>
        Змінює всі VPN підключення кожних 15 хвилин на інші сервери, щоб менше блокувало
      </li>
      <li>
        VPN з'єднання встановлюються лише у віртуальній машині. Ваша основна операційна система (Windows, MacOs) працює без VPN. Тому у Вас не тормозить інтернет
      </li>
      <li>
        Захищає від вірусів (віртуальна машина - це контейнер із якого  вірус не вилізе у вашу операційну систему)
      </li>
      <li>
        Просте встановлення. Потрібно менше 20 кліків мишкою
      </li>
      <li>
        Дозволяє масштабувати нагрузку на Ваш процесор (за допомогою коригування кількості віртуальних процесорів у віртуальній машині)
      </li>
      <li>
        Список цілей автоматично береться з https://github.com/db1000n-coordinators/LoadTestConfig/blob/main/config.v0.7.json
      </li>

      <div class="alert alert-warning d-flex align-items-center mt-3" role="alert">
        <i class="fa-solid fa-triangle-exclamation"></i><span>Системні вимоги до Вашого комп'ютера: наявність двоядерного процесора та 8 гігабайт оперативної пам'яті</span>
      </div>


      Всі інструкції та потрібні файли <a target="_blank" href="https://drive.google.com/drive/folders/1273-asI_FZKYVceXgTytxiHID9CtgIa7">тут</a>


    </ol>
  </div>

</div>
