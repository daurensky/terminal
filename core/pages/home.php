<?php

$slides = [
    ['src' => 'slide1.webp', 'title' => 'Платежные терминалы'],
    ['src' => 'slide2.webp', 'title' => 'Банковские терминалы'],
    ['src' => 'slide3.webp', 'title' => 'Комплектующие'],
    ['src' => 'slide4.webp', 'title' => 'Запасные части'],
    ['src' => 'slide5.webp', 'title' => 'Сервисное обслуживание'],
];

$scripts = ['home'];

?>

<main class="home">
    <section class="slider">
        <div class="glide">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <?php foreach ($slides as $slide) { ?>
                        <li class="glide__slide">
                            <div class="content">
                                <p class="title"><?= $slide['title'] ?></p>
                                <button class="btn-outlined">Перейти в каталог</button>
                            </div>
                            <img src="assets/img/<?= $slide['src'] ?>" alt="Slide">
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="material-icons-outlined">chevron_left</i></button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="material-icons-outlined">chevron_right</i></button>
            </div>

            <div class="glide__bullets" data-glide-el="controls[nav]">
                <?php foreach ($slides as $index => $_) { ?>
                    <button class="glide__bullet" data-glide-dir="=<?= $index ?>"></button>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="top-sells">
        <h2>Топ продаж</h2>

        <div class="container">
            <div class="card">
                <a href="#">
                    <img src="https://cashmaster.kz/public/storage/images/qrX3MmJHGZj0zm3TmdgHXv6yb77dTjz5lzr6Lo2j.webp" alt="Card">
                </a>
                <a href="#" class="price">2500 ₸</a>
                <a href="#" class="title">ААА</a>
            </div>
            <div class="card">
                <a href="#">
                    <img src="https://cashmaster.kz/public/storage/images/qrX3MmJHGZj0zm3TmdgHXv6yb77dTjz5lzr6Lo2j.webp" alt="Card">
                </a>
                <a href="#" class="price">2500</a>
                <a href="#" class="title">ААА</a>
            </div>
            <div class="card">
                <a href="#">
                    <img src="https://cashmaster.kz/public/storage/images/qrX3MmJHGZj0zm3TmdgHXv6yb77dTjz5lzr6Lo2j.webp" alt="Card">
                </a>
                <a href="#" class="price">2500</a>
                <a href="#" class="title">ААА</a>
            </div>
            <div class="card">
                <a href="#">
                    <img src="https://cashmaster.kz/public/storage/images/qrX3MmJHGZj0zm3TmdgHXv6yb77dTjz5lzr6Lo2j.webp" alt="Card">
                </a>
                <a href="#" class="price">2500</a>
                <a href="#" class="title">ААА</a>
            </div>
        </div>
    </section>

    <section class="about">
        <h2>О компании</h2>

        <div class="container">
            <p>
                Компания «<?= $contacts['company_name'] ?>» была образована в 2009 году. Мы занимаемся производством, продажей и сервисным обслуживанием
                банковских и платежных терминалов. Мы являемся официальными дистрибьюторами и вендорами основных мировых
                производителей комплектующих - Crane Payment Innovations (MEI, CashCode, NRI), ICT, Custom, Suzohapp, Newland,
                ZaagTech, IRZ, Glory, MasterTouch, KeeTouch и другие. Мы поставляли оборудования собственного производства в такие
                страны: Малайзия, Вьетнам, ОАЭ, Индия, Кыргызстан, Узбекистан, Туркменистан.
            </p>
            <p>
                С 2009 года нашей компанией было реализовано более 30 000 платежных терминалов на рынке Казахстана. Среди корпоративных
                клиентов крупнейшие компании и банки Казахстана
            </p>
        </div>
    </section>

    <?php require_once __DIR__ . '/../components/partners.php' ?>
</main>