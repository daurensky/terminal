<?php
function currentPage($name)
{
    return $_SERVER['REQUEST_URI'] === "/$name" ? 'class="active"' : '';
}

$links = [
    [
        'page' => 'contacts',
        'title' => 'Контакты',
    ],
    [
        'page' => 'about',
        'title' => 'О компании',
    ],
    [
        'page' => 'catalog',
        'title' => 'Каталог',
    ],
    [
        'page' => 'service',
        'title' => 'Услуги',
    ]
];

$scripts = [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css" integrity="sha512-wYsVD8ho6rJOAo1Xf92gguhOGQ+aWgxuyKydjyEax4bnuEmHUt6VGwgpUqN8VlB4w50d0nt+ZL+3pgaFMAmdNQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.min.css" integrity="sha512-wCwx+DYp8LDIaTem/rpXubV/C1WiNRsEVqoztV0NZm8tiTvsUeSlA/Uz02VTGSiqfzAHD4RnqVoevMcRZgYEcQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/index.css" />
    <title><?= $contacts['company_name'] ?></title>
</head>

<body>
    <header>
        <div class="container">
            <a href="/" class="logo">
                <img src="assets/img/logo.png" alt="Logo" />
            </a>
            <div class="links">
                <?php foreach ($links as $link) { ?>
                    <a href="<?= $link['page'] ?>" <?= currentPage($link['page']) ?>><?= $link['title'] ?></a>
                <?php } ?>
            </div>
            <a href="order.php" class="btn online-order">Онлайн-заявка</a>
            <div class="actions">
                <div class="phone">
                    <a href="tel:<?= $contacts['phone'] ?>"><?= $contacts['phone'] ?></a>
                </div>
                <a href="cart.php" class="cart icon-btn">
                    <i class="material-icons-outlined">shopping_cart</i>
                </a>
                <a href="login.php" class="user icon-btn">
                    <i class="material-icons-outlined">person</i>
                </a>
            </div>
        </div>
    </header>