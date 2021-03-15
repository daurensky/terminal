<?php

if (!$_SESSION['user']) {
    redirect('/login');
}

if (isset($_POST['logout'])) {
    session_destroy();
    redirect('/');
}

if (isset($_POST['change_account'])) {
    $_POST = array_map('trim', $_POST);

    $user = DB::call()->rowCount('SELECT * FROM users WHERE email = ?', [$_POST['email']]);

    if ($user > 0) {
        $errors['email'] = 'Пользователь с данным электронным адресом уже существует';
    }

    if (mb_strlen($_POST['email'], 'utf-8') > 255) {
        $errors['email'] = 'Максимальная длинна электронного адреса - 255 символов';
    }

    if (mb_strlen($_POST['name'], 'utf-8') > 30) {
        $errors['name'] = 'Максимальная длинна имени - 30 символов';
    }

    if (mb_strlen($_POST['phone'], 'utf-8') > 255) {
        $errors['phone'] = 'Максимальная длинна телефона - 255 символов';
    }

    if (mb_strlen($_POST['password'], 'utf-8') > 60 || mb_strlen($_POST['password'], 'utf-8') < 5) {
        $errors['password'] = 'Минимальная длинна пароля - 5. Максимальная - 60 символов';
    }

    if ($_POST['password'] !== $_POST['passwordConfirm']) {
        $errors['passwordConfirm'] = 'Пароли не совпадают';
    }

    if (empty($errors)) {
        DB::call()->query(
            'INSERT INTO users (email, name, phone, password, created_at) VALUES (?, ?, ?, ?, ?)',
            [
                $_POST['email'],
                $_POST['name'],
                clearPhone($_POST['phone']),
                password_hash($_POST['password'], PASSWORD_DEFAULT),
                time()
            ]
        );

        $id = DB::call()
            ->query('SELECT id FROM users WHERE email = ?', [$_POST['email']])
            ->fetchObject()
            ->id;

        $_SESSION['user'] = [
            'id' => $id,
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'phone' => $_POST['phone']
        ];

        redirect('/catalog');
    }
}

function error($name)
{
    global $errors;
    return isset($errors[$name]) ? $errors[$name] : '';
}

function value($name)
{
    if (isset($_POST[$name])) return $_POST[$name];
    else {
        if (isset($_SESSION['user'][$name])) return $_SESSION['user'][$name];
        else return '';
    }
}

?>

<main class="cabinet">
    <section>
        <div class="container">
            <div class="products">
                <h2>Создание продуктов</h2>
            </div>
            <div>
                <aside class="profile">
                    <div class="texts-container">

                        <p class="title">Изменить профиль</p>

                        <form method="post">
                            <div class="form-group">
                                <label for="email">Электронная почта</label>
                                <input type="email" name="email" id="email" value="<?= value('email') ?>" required>
                                <p class="error"><?= error('email') ?></p>
                            </div>
                            <div class="form-group">
                                <label for="name">Имя пользователя</label>
                                <input type="text" name="name" id="name" value="<?= value('name') ?>" required>
                                <p class="error"><?= error('name') ?></p>
                            </div>
                            <div class="form-group">
                                <label for="phone">Телефон</label>
                                <input type="text" name="phone" id="phone" value="<?= value('phone') ?>" required data-inputmask="'mask': '+7 (999) 999-99-99'" placeholder="+7 (___) ___-__-__">
                                <p class="error"><?= error('phone') ?></p>
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="password" name="password" id="password" value="<?= value('password') ?>" required>
                                <p class="error"><?= error('password') ?></p>
                            </div>
                            <div class="form-group">
                                <label for="passwordConfirm">Подтверждение пароля</label>
                                <input type="password" name="passwordConfirm" id="passwordConfirm" value="<?= value('passwordConfirm') ?>" required>
                                <p class="error"><?= error('passwordConfirm') ?></p>
                            </div>
                            <div class="form-group">
                                <div class="btns-container">
                                    <button name="change_account" type="submit" class="btn">Зарегистрироваться</button>
                                </div>
                            </div>
                        </form>

                        <form method="post">
                            <button name="logout" type="submit" class="btn logout-btn">Выйти</button>
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</main>