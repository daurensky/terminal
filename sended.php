<?php
require_once 'core/blocks/header.php';
require_once 'core/db.php';

if ($_POST) {
    $state = (new DB)->query(
        'INSERT INTO appeals (name, phone, type, message) VALUES (?, ?, ?, ?)',
        [$_POST['name'], $_POST['phone'], $_POST['type'], $_POST['message']]
    );

    $state->execute();
}

?>

<main class="sended">
    <div class="container">
        <div class="title">
            <?php if ($_POST) { ?>
                <h1>Спасибо за ваше обращение, с вами свяжутся!</h1>
            <?php } else { ?>
                <h1>Хотите отправить обращение?</h1>
            <?php } ?>
        </div>

        <div class="btns">
            <?php if (!$_POST) { ?>
                <a href="/contacts.php#contact-form" class="btn">Отправить обращение</a>
            <?php } ?>
            <a href="/" class="btn">Домой</a>
        </div>
    </div>
</main>

<?php require_once 'core/blocks/footer.php' ?>