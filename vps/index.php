<?php include("../includes/head.php") ?>

    <title>Інструкція по розгортанню віртуальних машин</title>
  </head>
<body>

<?php include("../includes/header.php"); ?>

<h2 class="title_h2">Інструкція по розгортанню віртуальних машин</h2>
<span>Це вже по дорослому! Досить гвалтувати свої домашні ПК та класти свою локальну мережу, розгорніть хочаб 5 віртуальних машин, а я підкажу, як це зробити</span>

<ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="hetzner-tab" data-toggle="tab" href="#hetzner" role="tab" aria-controls="hetzner" aria-selected="true">VPS на Hetzner</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="digitalOcean-tab" data-toggle="tab" href="#digitalOcean" role="tab" aria-controls="digitalOcean" aria-selected="false">VPS на Digital Ocean</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="azure-tab" data-toggle="tab" href="#azure" role="tab" aria-controls="azure" aria-selected="false">VPS на Azure</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="aws-tab" data-toggle="tab" href="#aws" role="tab" aria-controls="aws" aria-selected="false">VPS на AWS</a>
  </li>
</ul>

<div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active" id="hetzner" role="tabpanel" aria-labelledby="hetzner-tab">
        <ol>
            <li>
                Перейдіть на сайт: <a href="https://hetzner.cloud/?ref=aPwGy6QQWsMH" target="_blank">https://www.hetzner.com/</a>
            </li>

            <li>
                Зареєструйте акаунт. Для цього натисніть Login → Cloud
                <img src="/image/hetzner/hetzner_1.jpg" alt="">
            </li>
            
            <li>
                Щоб зареєструватися, натисніть "Register Now"
                <img src="/image/hetzner/hetzner_2.jpg" alt="">
            </li>
            <li>
                Заповніть необхідні дані, та підтвердіть свою електронну адресу
            </li>
            
            <li>
                Запоніть всі дані про себе латиницею. Обов'язково потрібно заповнювати свої реальні дані, оскільки на подальших кроках Вам потрібно буде підтверджувати особу прикріплюючи свої документи.
                <p>Окрім ім'я та прізвища, Вам потрібно буде написати свою адресу прописки</p>
                    Як приклад (VAT ID не заповнювати):
                <img src="/image/hetzner/hetzner_3.jpg" alt="">
            </li>
            <li>
                На наступному кроці, Вам потрібно прикрипіти платіжну картку. Тут можете оформити віртуальну картку в ПриватБанку, закинути на неї 30 грн і спокійно прикріплювати.
                <p>Хецнер знімає оплату через місяць використання.</p>
                <p>Про всяк випадок: CARD HOLDER це Ваше ім'я та прізвище латиницею</p>
                <img src="/image/hetzner/hetzner_4.jpg" alt="">
            </li>
            
            <li>
                Після прикріплення картки, Вам потрібно пройти процедуру підтвердження особи. Для цього натисніть кнопку "NEW PROJECT", та в модальному вікні відкрийте посилання accounts.hetzner.com
                <img src="/image/hetzner/hetzner_5.jpg" alt="">
            </li>
            <li>
                За цим посилання Вам потрібно буде прикріпити свої документи і щоб в цих документах ім'я і призвище співпадало з даними які Ви вводили на попередніх кроках.
                <p>Нажаль, я не можу супроводжувати Вас по прикріпленню документів, оскільки мій акаунт вже підтверджений, а новий з таким ж даними зарєструвати не вдалось</p>
                <div class="alert alert-warning">
                    <b>Увага!</b> Прикріплюйте документ або водійське посвідчення або закордонний паспорт. Звичайний паспорт старого зразка чомусь не підходить.
                </div>
                <p>Просто слідуйте інструкціям, я прикріплювання документів робив з мібільного телефона</p>
            </li>
            
            <li>
                Процес підтвердження документів відбується автоматично і займає до 20 хвилин. У мене це зайняло хвилин 5.
                <p>Теперь безпосередньо переходимо до створення машин</p>
                Для цього повертаєтесь в Cloud і у Вас повинен бути створений за замовчуванням проект під назвою: Default.
                <img src="/image/hetzner/hetzner_6.jpg" alt="">
                <p>Якщо його немає, то створіть новий</p>
            </li>
            <li>
                Далі заходьте в проект, просто клікнувши на нього і натискайте ADD SERVER, для створення нової машини
                <img src="/image/hetzner/hetzner_7.jpg" alt="">
            </li>
            <li>
                Потім обирайте місцерозташування машини (Оберайте Європейську частину).
                <p>Image - Ubuntu</p>
                <p>Type - перше значення</p>
                <img src="/image/hetzner/hetzner_8.jpg" alt="">
            </li>
            <li>
                Далі всі кроки пропускаєте і знаходите пункт під номером 8 - SSH Key
                <p>Для цього кроку Вам потрібно завантажити Putty. Переходьте за посиланням скачуйте та встановлюйте → <a href="https://the.earth.li/~sgtatham/putty/latest/w64/putty-64bit-0.76-installer.msi" target="_blank">Завантажити Putty</a></p>
                <p>
                    Запустіть PuttyGen, для цього натисніть пуск та почніть вводити puttyGen
                </p>
                <img src="/image/hetzner/hetzner_9.jpg" alt="">
            </li>
            <li>
                Натисніть кнопку Generate і водіть мишкої по інтерфейсу puttyGen для генерування ключа
                <img src="/image/hetzner/hetzner_10.jpg" alt="">
            </li>
            <li>
                Далі на hetzner натисніть на кнопку + ADD SSH KEY Та у перше поле вставьте згенерований ключ і натисніть ADD SSH KEY.
                <img src="/image/hetzner/hetzner_11.jpg" alt="">
            </li>
            
            <li>
                Останнім кроком. Натисніть CREATE & BUY NOW
            </li>
            <li>
                Після створення кожної машини, на Вашу пошту повинен приходити лист з даними цієї машини і паролем від неї. 
                <img src="/image/hetzner/hetzner_12.jpg" alt="">
                <p>Якщо не прийшов лист, таке іноді буває при створенні тільки першої машини, то Вам потрібно видалити машину, натиснувши три крапки,а потім обрати Delete</p>
                <img src="/image/hetzner/hetzner_13.jpg" alt="">
            </li>
            
            <li>
                Якщо Ви отримали лист з паролем, то переходимо до Putty (не PuttyGen, а саме Putty). Доречі, збережіть ярлик десь на робочому столі. Ця программа Вам постійно буде потрібна.
                <p>Скопіюйте ip-адресу Вашої машини (просто натиснувши на неї), та вставьте в поле, як показано на скріні низче та натисніть З'єднатися</p>
                <img src="/image/hetzner/hetzner_14.jpg" alt="">
            </li>
            
            <li>
                Скопіюйте пароль з листа (уважно, без пробілів, просто натисніть два рази по паролю, щоб виділити)
            </li>
            <li>
                У Вікні термінала введіть на запит login as: <code>root</code>, а на запит password - вставте скопійований пароль (натиснувши праву кнопку миші). Пароль не буде відображатись (навіть зірочками), тому сміливо натискайте enter.
            </li>
            <li>
                Пілся авторизації машина Вас попросить змінити пароль, для цього знову запитає Вас цей же пароль, який Ви щойно вводили. На запит current password: Знову повторіть процедуру - натисніть праву кнопку миші і натисніть enter.
            </li>
            <li>
                Наступний крок, на запит: New password - введіть новий пароль, який ви будете пам'ятати і натисніть enter. На наступний запит: Retype new password: повторіть щойно введений пароль і також натисніть enter
                <img src="/image/hetzner/hetzner_15.jpg" alt="">
            </li>
            <li>
                Все, машину створено. Далі Ви можете перейти до встановлення ПО для атаки, для цього скористайтесь інструкцією за посиланням → <a href="https://ddosukraine.com.ua/instruction/" target="_blank">Інструкція</a>
            </li>
            <li>
                Коли все встановите, поверніться сюди, я покажу Вам круту можливість, як швидко розвернути, ще 4 машини (на одному акаунті можна використовувати 5 машин), не повторюючі встановлення ПО для кожної.
            </li>
            <li>
                І так, Ви вже встановили на машину ПО і воно успішно працює. Тепер Ви можете створити SNAPSHOT цієї машини і вже з нього створити ще 4 копії цієї машини.
                <p>Для цього натискаєте на Вашу машину в будь-якому місці, окрім ip-адреси</p>
                <img src="/image/hetzner/hetzner_16.jpg" alt="">
            </li>
            
            <li>
                Далі обираєте в меню зліва пункт SNAPSHOT і натискаєте кнопку TAKESNAPSHOT
                <img src="/image/hetzner/hetzner_17.jpg" alt="">
            </li>
            <li>
                Погоджуєтесь з запропонованою назвою і натискаєте CREATE & BUY NOW і чекаєте поки снепшот створиться
            </li>
            <li>
                Коли Ваш снепшот створився, натискаєте три крапочки і обираєте пункт create new server
                <img src="/image/hetzner/hetzner_18.jpg" alt="">
            </li>
            <li>
                Далі знову ж такі повторюєте вибір місцерозташування машини, систему (Ubuntu), тариф (обирайте самий перший зверху), SSH KEY вже не потрібно генерувати і прикріплювати і натискаєте CREATE & BUY NOW
            </li>
            <li>
                Все. Новий сервер вже з встановленим ПО встановиться самостійно. Вам потрібно буде повторити процедуру заміни пароль, пароль від нового сервера також прийже на пошту, і зможете одразу запустити атаку.
            </li>
            <li>
                Для створення ще додаткових машин, переходите до першого сервера, в меню SNAPSHOT і з того ж SNAPSHOT'а розгортаєте таким же чином ще 3 машини.
            </li>
        </ol>
    </div>


    <!-- Digital Ocean -->

    <div class="tab-pane fade show" id="digitalOcean" role="tabpanel" aria-labelledby="digitalOcean-tab">
        <a target="_blank" href="https://telegra.ph/Digital-Ocean-02-27">Інструкції налаштування DigitalOcean</a>
    </div>

    <!-- Azure -->

    <div class="tab-pane fade show" id="azure" role="tabpanel" aria-labelledby="azure-tab">
        <a target="_blank" href="https://dou.ua/forums/topic/36795/?from=tg">Інструкції налаштування Azure</a>
    </div>

    <!-- AWS -->

    <div class="tab-pane fade show" id="aws" role="tabpanel" aria-labelledby="aws-tab">
        <a target="_blank" href="https://telegra.ph/DDOS-SEPAR-02-26">Інструкції налаштування AWS</a>
    </div>
</div>



<?php include("../includes/footer.php"); ?>