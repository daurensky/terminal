<?php
require_once 'blocks/header.php';

$slides = [
    ['src' => 'slide1.webp', 'title' => 'Платежные терминалы'],
    ['src' => 'slide2.webp', 'title' => 'Банковские терминалы'],
    ['src' => 'slide3.webp', 'title' => 'Комплектующие'],
    ['src' => 'slide4.webp', 'title' => 'Запасные части'],
    ['src' => 'slide5.webp', 'title' => 'Сервисное обслуживание'],
];
?>

<main>
    <div class="container">
    </div>

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

        <div class="container">
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="material-icons-outlined">chevron_left</i></button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="material-icons-outlined">chevron_right</i></button>
            </div>
        </div>

        <div class="glide__bullets" data-glide-el="controls[nav]">
            <?php foreach ($slides as $index => $_) { ?>
                <button class="glide__bullet" data-glide-dir="=<?= $index ?>"></button>
            <?php } ?>
        </div>
    </div>

    <div class="container">
    </div>
</main>

<?php require_once 'blocks/footer.php' ?>