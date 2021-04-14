<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

</head>
<body> 
    <header>
        <div class = 'header'>
            <img src="img/logo3.png" alt="" class = 'logo'>
            <div class = 'navigation'>
                <button onclick="location.href = 'index.php'">Главная</button>
                <button onclick="location.href = 'tours.php'">Туры</button>
                <button onclick="location.href = 'galery.php'">Галерея</button>
                <button onclick="location.href = 'burning_tours.php'">Горящие туры</button>
                <?php if ($_COOKIE['login'] == ''): ?>
                    <button onclick="location.href = 'auth.php'">Войти</button>
                <?php else: ?>
                    <button onclick="location.href = 'auth.php'"><?=$_COOKIE['login']?></button>   
                <?php endif ?> 
            </div>
        </div>
    </header>
    <div class = 'content'>
        <p class = 'header_about'>Все еще не знаете где отдохнуть?</p>
        <nav id="nav_arrow_down">
            <a href="#anchor"><img class = 'arrow_down' src="img/arrow.png" alt=""></a>
        </nav>
            
           
            <!-- <p class = 'arrow_down'>🠗</p> -->
        <div class = 'div_for_video'>
            <video class = "video" src="img/videoplayback.webm" controls autoplay loop muted ></video>
        </div>
        <p id = 'anchor' class = 'header_text_in_content'>Мальдивы</p>
        <p class = 'text_in_content'>Отдых на Мальдивах - это праздник для души и тела, наслаждайтесь ими во всей полноте, берите все, что предлагает Вам этот воистину райский уголок, наполните свои воспоминания необычайными впечатлениями и новыми открытиями.</p>
        <img src="img/2.jpg" class="img_first" alt="">
        <p class = 'header_text_in_content'>Швейцария</p>
        <p class = 'text_in_content'>Швейцария — направление для ценителей безупречности во всем. Лучшие горнолыжные курорты Альп, безукоризненный сервис в высококлассных отелях и отличная «экскурсионка» по старинным городам и замкам.</p>
        <img src="img/3.jpg" class="img_first" alt="">
        <p class = 'header_text_in_content'>Сейшелы</p>
        <p class = 'text_in_content'>Сейшельские острова — потерянный и обретенный рай в сердце Индийского океана: 115 чудных островов, из которых только 30 обитаемы. Пляжи здесь как на подбор: белопесчаные, широкие и уединенные, отели также соответствуют парадизу. </p>
        <img src="img/4.jpg" class="img_first" alt="">
        <p class = 'header_text_in_content'>Аризона</p>
        <p class = 'text_in_content'>Аризона — почему бы и не побывать здесь во время отпуска. Это — достаточно необычное и интересное место, где можно не только отдохнуть с комфортом, но и посетить удивительные места.</p>
        <img src="img/5.jpg" class="img_first" alt="">
        <p class = 'header_text_in_content'>Тайланд</p>
        <p class = 'text_in_content'>Таиланд - это прекрасный отдых в сочетании с развлечениями и экскурсиями на морском побережье в районах Паттайа, Районг, Хуа-Хин, отдых наедине с девственной экзотической природой на островах  Самуи, Самет, Пхи-Пхи, Ко-Панган, возможность совместить активную вечернюю жизнь с отдыхом на белоснежных пляжах острова Пхукет</p>
        <img src="img/6.jpg" class="img_first" alt="">
        <p class = 'header_text_in_content'>Париж</p>
        <p class = 'text_in_content'>Побывать в Париже — мечта многих. Столица моды и один из красивейших городов мира поражает многогранностью, и увидеть всё за короткое время просто невозможно.</p>
        <img src="img/7.jpg" class="img_first" alt="">
    </div>
    <footer>
        <div class = 'contact_information'>
            <p class = 'header_contact'>Контактная информация</p>
            <a class='contact_text' href="tel:+380985757913">+380-98-575-791-3</a>
            <a class='contact_text' href="tel:+380507151093">+380-50-715-109-3</a>
            <p class='p_logo'>
            <a href="https://t.me/artem_maksimovich"><img class='contact_img' src="img/telegram.png" alt=""></a>
            <a href="viber://chat?number=380985757913"><img class='contact_img' src="img/viber.png" alt=""></a>
            <a href="https://m.me/artem.maksimovich22"><img class='contact_img' src="img/messenger.png" alt=""></a>
            </p>
        </div>
        <div class = 'teams_information'>
            <p class = 'header_contact'>Наши партнеры</p>
            <p class = 'p_logo'><img class='logo_team' src="img/coral.png" alt=""></p>
            <p class = 'p_logo'><img class='logo_team' src="img/tui.jpg" alt=""></p>
            <p class = 'p_logo'><img class='logo_team' src="img/join-up.png" alt=""></p>
        </div>
        <div class = 'adress_information'>
            <p class = 'header_contact'>Мы находимся</p>
            <p class = 'adress_text'>ул.Пятницкая 102</p>
            <p class = 'adress_text'>ул.Мира 79</p>
            <p class = 'adress_text'>ул.Защитников Украины 81</p>
        </div>
    </footer>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#nav_arrow_down").on("click","a", function (event) {
                //отменяем стандартную обработку нажатия по ссылке
                //console.log(event);
                event.preventDefault();

                //забираем идентификатор бока с атрибута href
                let id = $(this).attr('href'),

                //узнаем высоту от начала страницы до блока на который ссылается якорь
                top = $(id).offset().top;

                //анимируем переход на расстояние - top за 1500 мс
                $('body,html').animate({scrollTop: top}, 3000);
            });
        });
    </script>
</body>
</html>