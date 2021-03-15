<?php
$partners = [
    'custom.webp',
    'cpi.webp',
    'ict.webp',
    'szzt.webp',
    'citizen.webp',
    'newland.webp',
    'suzohapp.webp',
];

$scripts = ['partners'];
?>

<section class="partners">
    <h2>Наши партнеры</h2>

    <div class="container">
        <div class="partners-carousel">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <?php foreach ($partners as $partner) { ?>
                        <li class="glide__slide">
                            <img src="assets/img/<?= $partner ?>" alt="Partner">
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</section>