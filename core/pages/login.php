<?php

if ($_SESSION['user']) {
    redirect('/cabinet');
}

if (isset($_POST['submitted'])) {
    $_POST = array_map('trim', $_POST);

    $user = Db::call()->query('SELECT id, email, name, phone, password FROM users WHERE email = ?', [$_POST['email']])->fetchObject();

    if (!$user) {
        $errors['email'] = 'Пользователь не найден';
    } else {
        if (!password_verify($_POST['password'], $user->password)) {
            $errors['password'] = 'Неверный пароль';
        }
    }

    if (empty($errors)) {
        $_SESSION['user'] = [
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user->name,
            'phone' => $user->phone
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
    return isset($_POST[$name]) ? $_POST[$name] : '';
}

?>

<main class="login">
    <h1>Авторизация</h1>

    <section>
        <div class="container">
            <form method="POST">
                <div class="form-group">
                    <label for="email">Электронная почта</label>
                    <input type="email" name="email" id="email" value="<?= value('email') ?>" required>
                    <p class="error"><?= error('email') ?></p>
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password" value="<?= value('password') ?>" required>
                    <p class="error"><?= error('password') ?></p>
                </div>
                <div class="form-group">
                    <div class="btns-container">
                        <button name="submitted" type="submit" class="btn">Войти</button>
                        <a href="register" class="btn-outlined">Регистрация</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>