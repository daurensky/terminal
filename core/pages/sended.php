<?php

if ($_POST) {
    $_POST = array_map('trim', $_POST);

    DB::call()
        ->query(
            'INSERT INTO appeals (name, phone, type, message) VALUES (?, ?, ?, ?)',
            [
                $_POST['name'],
                clearPhone($_POST['phone']),
                $_POST['type'],
                $_POST['message']
            ]
        );
}

?>

<main class="sended">
    <h1>
        <?php if ($_POST) {
            echo 'Спасибо за ваше обращение, с вами свяжутся!';
        } else {
            echo 'Хотите отправить обращение?';
        } ?>
    </h1>

    <section class="sended">
        <div class="container">
            <div class="btns-container">
                <?php if (!$_POST) { ?>
                    <a href="/contacts#contact-form" class="btn">Отправить обращение</a>
                <?php } ?>
                <a href="/" class="btn">Домой</a>
            </div>
        </div>
    </section>
</main>