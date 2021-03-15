<?php

require_once 'core/db.php';

$firstPage = substr($_SERVER['REDIRECT_URL'], 1);

$isHomePage = $_SERVER['REDIRECT_URL'] === NULL;
$isPageExist = file_exists("$firstPage.php");

function page($pageName)
{
    return "core/pages/$pageName.php";
}

# Глобальные данные
$contacts = [
    'street' => 'Республика Казахстан, г.Павлодар ул. Ломова д. 45к2',
    'phone' => '+7 (777) 777-77-77',
    'service_center_phone' => '+7 (771) 771-11-11',
    'email' => 'info@online-shop.kz',
    'company_name' => 'Интернет-магазин ИП Кубахова В.Е.'
];

require_once 'core/components/header.php';

if ($isHomePage) require_once page('home');
else {
    if (file_exists(page($firstPage))) require_once page($firstPage);
    else require_once page('404');
}

require_once 'core/components/footer.php';
