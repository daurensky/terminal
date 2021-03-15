<?php

$categories = DB::call()->query('SELECT id, name FROM categories')->fetchAll();
$isAdmin = DB::call()->query('SELECT is_admin FROM users WHERE id = ?', [$_SESSION['user']['id']])->fetchObject()->is_admin;

if (!$_SESSION['user']) {
    redirect('/login');
}

if (isset($_POST['logout'])) {
    session_destroy();
    redirect('/');
}

if (isset($_POST['change_account'])) {
    $_POST = array_map('trim', $_POST);

    $user = DB::call()->query('SELECT * FROM users WHERE email = ?', [$_POST['email']])->fetchObject();

    if ($user && $user->id !== $_SESSION['user']['id']) {
        $errors['email'] = 'Данный e-mail занят';
    }

    if (mb_strlen($_POST['email'], 'utf-8') > 255) {
        $errors['email'] = 'Максимальная длинна электронного адреса - 255 символов';
    }

    if (mb_strlen($_POST['name'], 'utf-8') > 30) {
        $errors['user_name'] = 'Максимальная длинна имени - 30 символов';
    }

    if (mb_strlen($_POST['phone'], 'utf-8') > 255) {
        $errors['phone'] = 'Максимальная длинна телефона - 255 символов';
    }

    if ($_POST['password'] !== '') {
        if (mb_strlen($_POST['password'], 'utf-8') > 60 || mb_strlen($_POST['password'], 'utf-8') < 5) {
            $errors['password'] = 'Минимальная длинна пароля - 5. Максимальная - 60 символов';
        }

        if ($_POST['password'] !== $_POST['passwordConfirm']) {
            $errors['passwordConfirm'] = 'Пароли не совпадают';
        }
    }

    if (empty($errors)) {
        DB::call()->query(
            'UPDATE users SET email = ?, name = ?, phone = ? WHERE id = ?',
            [
                $_POST['email'],
                $_POST['name'],
                clearPhone($_POST['phone']),
                $_SESSION['user']['id']
            ]
        );

        if ($_POST['password']) {
            DB::call()->query(
                'UPDATE users SET password = ? WHERE id = ?',
                [
                    password_hash($_POST['password'], PASSWORD_DEFAULT),
                    $_SESSION['user']['id']
                ]
            );
        }

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

        redirect('/cabinet?success_profile');
    }
}

if (isset($_POST['add_product'])) {
    $_POST = array_map('trim', $_POST);

    if (mb_strlen($_POST['name'], 'utf-8') > 255) {
        $errors['product_name'] = 'Максимальная длинна названия продукта - 255 символов';
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $acceptedFileTypes = [
        'jpg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
        'webp' => 'image/webp'
    ];

    if (false === $ext = array_search(
        $finfo->file($_FILES['image']['tmp_name']),
        $acceptedFileTypes,
        true
    )) {
        $errors['image'] = 'Неверный формат изображения';
    } else {
        $fileLocation = sprintf(
            'assets/img/products/%s.%s',
            sha1_file($_FILES['image']['tmp_name']),
            $ext
        );

        if (!move_uploaded_file(
            $_FILES['image']['tmp_name'],
            $fileLocation
        )) {
            $errors['image'] = 'Не удалось загрузить изображение';
        }
    }

    if (empty($errors)) {
        DB::call()->query(
            'INSERT INTO products (category_id, name, description, image, price) VALUES (?, ?, ?, ?, ?)',
            [
                $_POST['category'],
                $_POST['name'],
                $_POST['description'],
                $fileLocation,
                $_POST['price'],
            ]
        );

        redirect('/cabinet?success_product');
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
        <div class="container <?= $isAdmin ? 'admin' : '' ?>">
            <?php if ($isAdmin) { ?>
                <div class="products">
                    <h2>Создание продуктов</h2>

                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="category">Категория</label>
                            <select name="category" id="category">
                                <?php foreach ($categories as $category) { ?>
                                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_name">Название</label>
                            <input type="text" name="name" id="product_name" required>
                            <p class="error"><?= error('product_name') ?></p>
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea type="text" name="description" id="description" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Фото</label>
                            <div>
                                <label class="file-btn">
                                    Выбрать
                                    <input type="file" name="image" id="image" required>
                                </label>
                            </div>
                            <p class="error"><?= error('image') ?></p>
                        </div>
                        <div class="form-group">
                            <label for="price">Цена</label>
                            <input type="num" name="price" id="price" required>
                        </div>
                        <?php if (isset($_GET['success_product'])) { ?>
                            <div class="form-group">
                                <div class="alert">
                                    Профиль успешно изменен
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <div class="btns-container">
                                <button name="add_product" type="submit" class="btn">Создать</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>

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
                                <label for="user_name">Имя пользователя</label>
                                <input type="text" name="name" id="user_name" value="<?= value('name') ?>" required>
                                <p class="error"><?= error('user_name') ?></p>
                            </div>
                            <div class="form-group">
                                <label for="phone">Телефон</label>
                                <input type="text" name="phone" id="phone" value="<?= value('phone') ?>" required data-inputmask="'mask': '+7 (999) 999-99-99'" placeholder="+7 (___) ___-__-__">
                                <p class="error"><?= error('phone') ?></p>
                            </div>
                            <div class="form-group">
                                <label for="password">Новый пароль</label>
                                <input type="password" name="password" id="password" value="<?= value('password') ?>">
                                <p class="error"><?= error('password') ?></p>
                            </div>
                            <div class="form-group">
                                <label for="passwordConfirm">Подтверждение пароля</label>
                                <input type="password" name="passwordConfirm" id="passwordConfirm" value="<?= value('passwordConfirm') ?>">
                                <p class="error"><?= error('passwordConfirm') ?></p>
                            </div>
                            <?php if (isset($_GET['success_profile'])) { ?>
                                <div class="form-group">
                                    <div class="alert">
                                        Профиль успешно изменен
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <div class="btns-container">
                                    <button name="change_account" type="submit" class="btn">Изменить профиль</button>
                                </div>
                            </div>
                        </form>

                        <form method="post">
                            <button name="logout" type="submit" class="btn-outlined logout-btn">Выйти</button>
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</main>