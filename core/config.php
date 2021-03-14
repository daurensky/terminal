<?php

function config(string $name)
{
    $data = [
        'DB_HOST' => 'localhost',
        'DB_USER' => 'mysql',
        'DB_PASSWORD' => 'mysql',
        'DB_NAME' => 'online_shop'
    ];

    return $data[$name];
}
